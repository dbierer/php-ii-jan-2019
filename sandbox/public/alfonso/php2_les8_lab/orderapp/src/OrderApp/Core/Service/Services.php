<?php
/**
 * Service Wrapper Class
 */
namespace OrderApp\Core\Service;
use OrderApp\Core\ {Db\Db, View\View};
use OrderApp\Domain\Domain;
use OrderApp\Service\DomainService;

class Services
{
    protected static $instance;
    protected $config;
    protected $db;
    protected $models = [];
    protected $domain;

    /**
     * @return Services
     */
    public static function getInstance()
    {
        if(!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Service constructor.
     * @param $config
     */
    public function __construct()
    {
        $this->setConfig();
    }

    /**
     * @param array $config
     * @return $this
     */
    public function setConfig()
    {
        $this->config = require BASE . '/config/config.php';
        return $this;
    }

    /**
     * @param $model
     * @return mixed
     */
    public function getModel($model)
    {
        $model = 'OrderApp\\Model\\' . ucfirst($model) . 'Model';
        if(!isset($this->models[$model])){
            $this->setModel($model);
        }
        return $this->models[$model];
    }

    /**
     * @param $model
     * @return $this
     */
    protected function setModel($model)
    {
        $this->models[$model] = new $model($this);
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @return Services
     */
    public function setDb()
    {
        $this->db = DB::getInstance($this);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDb()
    {
        if(!$this->db){
            $this->setDb();
        }
        return $this->db;
    }

    /**
     * @param $service
     * @return mixed
     */
    public function get($service)
    {
        if ($service === 'db') {
            return $this->config['db'];
        } elseif ($service === 'cust-codes') {
            $custCodes = [];
            foreach ($this->getDomain()->getCustomers() as $row) {
                $custCodes[$row['id']] = $row['customer_name'];
            }
            return $custCodes;
        }
        return $this->config['services'][$service];
    }

    /**
     * @return mixed
     */
    public function getDomain()
    {
        if(!$this->domain){
            $this->setDomain();
        }
        return $this->domain;
    }

    /**
     * @return Services
     */
    protected function setDomain()
    {
        $this->domain = new Domain($this, new DomainService);
    }

    /**
     * @return View
     */
    public function getViewContainer($arg)
    {
        return new View($arg);
    }

    /**
     * @param $form
     * @return mixed
     */
    public function getForm($form)
    {
        $class = 'OrderApp\\Form\\' . $form;
        return new $class();
    }
}