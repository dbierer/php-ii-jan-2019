<?php
/**
 * Application Entry
 */

define('BASE', realpath(__DIR__ . '/../'));

/**
 * @todo: revise this
 */
spl_autoload_register(
    function ($class) {
        $file = str_replace('\\', '/', $class) . '.php';
        require BASE . '/src/' . $file;
    }
);

/* Composer */
require_once "../vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// "use" the front controller and services
use OrderApp\Controller\IndexController;
use OrderApp\Core\Service\Services;

//Setup the services instance
Services::getInstance();

//Get a new index controller and startup
$controller = new IndexController();
$controller->index();