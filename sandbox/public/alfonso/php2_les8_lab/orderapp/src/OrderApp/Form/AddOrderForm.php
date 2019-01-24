<?php
/**
 * Order Process Form Class
 */
namespace OrderApp\Form;
use OrderApp\Core\{Form\Form, Service\Services, Form\Inputs\SelectAssoc};
class AddOrderForm extends Form
{
    /**
     *
     */
    public function __construct()
    {
        $args = [
            'name' => 'AddOrderForm',
            'id' => 'addorder',
            'method' => 'post',
            'action' => 'index.php',
        ];
        parent::__construct($args);

        //Add Search element
        $this->addElement([
            'label' => 'Order Date',
            'type' => 'text',
            'name' => 'order_date',
            'class' => 'date',
            'value' =>  date('Y-m-d',time()),
            'priority' => 1,
            'readonly' => true,
            'validator' => [
                'StringLength' => [
                    'minimum' => 8,
                    'maximum' => 10,
                ],
            ],
        ]);

        //Add customer element
        $custCodes = Services::getInstance()->get('cust-codes');
        $this->addElement([
            'label' => 'Customer',
            'type' => 'select_assoc',
            'name' => 'cust_id',
            'multiple' => false,
            'priority' => 2,
            'required' => false,
            'options' => [SelectAssoc::ASSOC_KEY => $custCodes],
            'validator' => [
                'InArray' => array_keys($custCodes),
            ],
        ]);

        //Add Search element
        $this->addElement([
            'label' => 'Amount $',
            'type' => 'text',
            'name' => 'amount',
            'class' => 'amount',
            'priority' => 3,
            'required' => true,
            'size' => 6,
            'validator' => [
                'digit',
            ],
        ]);

        //Add order status select element
        $statuses = Services::getInstance()->get('status-codes');
        $this->addElement([
            'label' => 'Status Filter',
            'type' => 'select',
            'name' => 'status_filter',
            'multiple' => false,
            'priority' => 4,
            'required' => false,
            'options' => $statuses,
            'validator' => [
                'InArray' => $statuses,
            ],
        ]);

        //Add description element
        $this->addElement([
            'label' => 'Description',
            'type' => 'textarea',
            'name' => 'description',
            'cols' => 50,
            'rows' => 4,
            'maxlength' => 100,
            'priority' => 5,
            'required' => false,
            'validator' => [
                'StringLength' => [
                    'minimum' => 0,
                    'maximum' => 100,
                ],
                'Alnum',
            ],
        ]);

        //Add a submit button
        $this->addElement([
            'name' => 'submit',
            'type' => 'submit',
            'value' => 'Add Order',
            'priority' => 100,
        ]);

        //Sort the fields by priority
        ksort($this->elements);
    }
}
