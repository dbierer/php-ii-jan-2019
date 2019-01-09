<?php
spl_autoload_register(
    function ($class) {
        $file = str_replace('\\', '/', $class) . '.php';
        require_once __DIR__ . '/' . $file;
    }
);
use Application\Entity\User;

$user[] = new User (['firstname' => 'Jack' , 'lastname' => 'Ryan' ]);
$user[] = new User (['firstname' => 'Monte' , 'lastname' => 'Python' ]);
$user[] = new User (['firstname' => 'James' , 'lastname' => 'Bond' ]);
$user[] = new User (['firstname' => 'Doulas', 'lastname' => 'Bierer', 'middle_init' => 'A']);

var_dump($user);

$lastNames = array_column($user, 'lastname');
sort($lastNames);
var_dump($lastNames);
