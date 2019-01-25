<?php
/**
 * PDO Database Wrapping Class
 * Note: This wraps a PDO instance so the DB can be a singleton instance
 */
namespace OrderApp\Core\Db;
use Exception;
use OrderApp\Core\Service\Services;

final class Db
{
    private static $db;
    public $pdo;

    /**
     * @return Db
     */
    public static function getInstance()
    {
        if (!self::$db) {
            self::$db = new self();
        }
        return self::$db;
    }

    /**
     * Constructor is private because this class cannot be instantiated directly.
     */
    private function __construct()
    {
        // Get the db access credentials
        $services = Services::getInstance();
        $cred = $services->get('db');
        try {
            $this->pdo = new \PDO($cred['dsn'], $cred['username'], $cred['password'], $cred['options']);
        } catch (\PDOException $e) {
            //Append the error to the defined log
            error_log($e->getMessage(), 3, 'error.log');
        }
    }

    /**
     * Singletons may not be cloned
     */
    private function __clone()
    {
        try {
            throw new Exception('Cannot clone object');
        } catch (Exception $e) {
            // Log exception
        }
    }
}

