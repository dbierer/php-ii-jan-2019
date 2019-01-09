<?php


define('BASE', realpath(__DIR__));



/**

 * @todo: revise this

 */

spl_autoload_register(

    function ($class) {

        $file = str_replace('\\', '/', $class) . '.php';

        require BASE . '/src/' . $file;

    }

);


use unipa\core\Person;

$p1 = new Person;
$p1->setName("Mario");
$p1->lastName = "Rossi";

// give error
//$p1->address = "Rossi";
$p1->setAddress("Via Roma 1");
var_dump($p1);

$p2 = new Person;
$p2->setName("Paolo");
$p2->lastName = "Rossi";

// give error
//$p2->address = "Rossi";
$p2->setAddress("Via Palermo 10");
var_dump($p2);