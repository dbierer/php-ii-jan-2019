<?php
    error_reporting(E_ALL);
    spl_autoload_register(

        function ($class) {

            $file = str_replace('\\', '/', $class) . '.php';

            require_once __DIR__ . '/' . $file;

        }

    );


    use Unipa\Core\{Employee, Freelance};

    $e1 = new Employee(['firstName' => 'Jack' , 'lastName' => 'Ryan', "address" => "Via Roma 1", "role" => "Developer" ]);
    $e2 = new Employee(['firstName' => 'Bob' , 'lastName' => 'Ryan', "address" => "Via Roma 2", "role" => "Manager", "VAT" => "123456789" ]);

    $f1 = new Freelance(['firstName' => 'Jack' , 'lastName' => 'White', "address" => "Via Roma 2", "VAT" => "123456789" ]);
    $f2 = new Freelance(['firstName' => 'Bob' , 'lastName' => 'White', "address" => "Via Roma 2", "role" => "Manager", "VAT" => "123456789" ]);

?>

<pre>

    <?php
        echo '$e1 methods: ' . implode (", ", get_class_methods(get_class($e1)));

        var_dump($e1->toJSON()) . PHP_EOL;
        var_dump($e2) . PHP_EOL;

        var_dump($f1->toJSON()) . PHP_EOL;
        var_dump($f2) . PHP_EOL;

        echo '$e1->getFirstName() ==  $f1->getFirstName() ? "' . ($e1->getFirstName() ==  $f1->getFirstName())  . '"'  . PHP_EOL;

        echo 'For Doug: strange PHP behavior when using == on different strings. Better strcmp ;-)?' . PHP_EOL;
        echo '$e1->getLastName() ==  $f1->getLastName() ? "' . ($e1->getLastName() == $f1->getLastName()) . '"' . PHP_EOL;

        echo 'strcmp($e1->getLastName(), $f1->getLastName()) ? "' . strcmp($e1->getLastName(), $f1->getLastName()) . '"' . PHP_EOL;

        // And
        if ("" && 1) {
            echo "Why am I here?";
        }

        if ($e1->getLastName() == $f1->getLastName() && 1) {
            echo "Why am I here?";
        }

    ?>

</pre>