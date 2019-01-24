<?php
namespace OrderApp\Core\Db;
use OrderApp\Core\Service\Services;
/**
 * Abstract Db Class
 */
class AbstractModel implements ModelInterface
{
    const ERROR_LOG = 'error.log';
    protected $services;
    protected $db;

    /**
     * AbstractModel constructor.
     * @param Services $services
     */
    public function __construct(Services $services)
    {
        $this->services = $services;

        //Get the singleton PDO and cache it so all models have it.
        $this->db = $this->services->getDb();
    }
}
