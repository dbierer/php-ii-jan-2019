<?php
/**
 * Domain Class
 * Note: A class like this is where the business logic goes.
 */
namespace OrderApp\Domain;
use OrderApp\Core\{Service\Services, Form\Form};
use OrderApp\Form\ {OrderForm, AddOrderForm};
use OrderApp\Service\DomainService;

class Domain
{
    const CUSTOMERS_MODEL = 'Customers';
    const ORDERS_MODEL = 'Orders';
    protected $services;
    protected $domainService;
    protected $models = [];

    /**
     * Domain constructor.
     * @param Services $service
     */
    public function __construct(Services $service, DomainService $domainService){
        $this->services = $service;
        $this->domainService = $domainService;
        $this->models['orders'] = $service->getModel(static::ORDERS_MODEL);
        $this->models['customers'] = $service->getModel(static::CUSTOMERS_MODEL);
    }

    /**
     * @param Form $form
     * @return bool|mixed
     */
    public function processInput(Form &$form)
    {
        switch ($form) {
            case $form instanceof OrderForm :
                $orders = $this->getOrders($form->getData());
                //We set the default form here so the element values are set
                $this->setResultElementValues($form);
                return $orders;
                break;
            case $form instanceof AddOrderForm :
                //We will add for Jason since we have not implemented login processing
                $data['customer'] = $this->models['customers']->getCustomer(3);
                $data['data'] = $form->getData();
                if($this->models['orders']->save($data)){
                    return true;
                }
                break;
        }

        //On failure ...
        return false;
    }

    /**
     * @param Form $form
     */
    protected function setResultElementValues(Form $form){
        foreach($form->getElements() as $element){
            if(array_key_exists($element->name, $form->getData())){
                if($element->type === 'select'){
                    foreach($element->getOptions() as $option){
                        if(in_array($option->value, $form->getData())){
                            $option->selected = 'selected';
                        }
                    }
                } else {
                    $element->value = $form->getData()[$element->name];
                }
            }
        }
    }

    /**
     * @return mixed
     */
    public function getCustomers()
    {
        return $this->models['customers']->getCustomers();
    }

    /**
     * @param $args
     * @return null
     */
    public function getOrders($args)
    {
        if($data = $this->models['orders']->getOrders($args)){
            $this->domainService->formatCurrency($data['total']);
            return $data;
        }
        //On failure ...
        return false;
    }
}
