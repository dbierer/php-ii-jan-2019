<?php declare(strict_types=1);
    error_reporting(E_ALL);
    spl_autoload_register(

        function ($class) {

            $file = str_replace('\\', '/', $class) . '.php';

            require_once __DIR__ . '/' . $file;

        }

    );


    use Unipa\Core\{Employee, Freelance};
    use Unipa\Test\TestClass;

    $e1 = new Employee(['firstName' => 'Jack' , 'lastName' => 'Ryan', "address" => "Via Roma 1", "role" => "Developer" ]);
    $f1 = new Freelance(['firstName' => 'Jack' , 'lastName' => 'White', "address" => "Via Roma 2", "VAT" => "123456789" ]);
   

?>

<pre>

<?php
    echo '$e1 methods: ' . implode (", ", get_class_methods(get_class($e1))) . PHP_EOL . PHP_EOL;

    // @see Base.php
    // Returns protected and private properties
    echo  json_encode($e1, JSON_PRETTY_PRINT) . PHP_EOL . PHP_EOL;

    $f1->setFirstName("Mario");
    $f1->setLastName("Rossi");
    echo $f1 . PHP_EOL . PHP_EOL;

    // 	getContactDetails() is abstract on Base.php
    echo $e1->getContactDetails() . PHP_EOL . PHP_EOL;
   

    // Throws "custom" error because method does not exist for Freelance Object
    try {
        $e1->setVAT("12345567");
    } catch (Exception $e) {
        echo $e . PHP_EOL;
    }

    echo $f1->getContactDetails() . PHP_EOL . PHP_EOL;
    
    // Custom exception __toString() method override with trait
    try {
        $f1->setRole("Developer");
    } catch (Exception $e) {
        echo $e . PHP_EOL;
    }


    $tc = new TestClass();
    $ti = $tc->getMeAsInterface();

    var_dump(get_class($tc));
    var_dump(get_class($ti));
    echo 'Object Type: ' . $tc->getType() . PHP_EOL;
    echo 'Object Type: ' . $ti->getType() . PHP_EOL;

?>

</pre>
