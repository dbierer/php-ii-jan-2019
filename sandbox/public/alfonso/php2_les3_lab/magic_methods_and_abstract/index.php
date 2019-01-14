<?php
    declare(strict_types=1);
    error_reporting(E_ALL);
    spl_autoload_register(

        function ($class) {

            $file = str_replace('\\', '/', $class) . '.php';

            require_once __DIR__ . '/' . $file;

        }

    );


    use Unipa\Core\{Employee, Freelance};

    $e1 = new Employee(['firstName' => 'Jack' , 'lastName' => 'Ryan', "address" => "Via Roma 1", "role" => "Developer" ]);
    $f1 = new Freelance(['firstName' => 'Jack' , 'lastName' => 'White', "address" => "Via Roma 2", "VAT" => "123456789" ]);
   

?>

<pre>

<?php
    echo '$e1 methods: ' . implode (", ", get_class_methods(get_class($e1))) . PHP_EOL . PHP_EOL;

    // @see Base.php
    // Returns protected and private properties
    echo  $e1->toJSON() . PHP_EOL . PHP_EOL;

    // I can access to protected properties because I created __get magic method
    echo $e1->getRole("Developer") . ' ' . $e1->address . PHP_EOL . PHP_EOL;

    $f1->setFirstName("Mario");
    $f1->setLastName("Rossi");
    echo $f1 . PHP_EOL . PHP_EOL;

    // 	getContactDetails() is abstract on Base.php
    echo $e1->getContactDetails() . PHP_EOL . PHP_EOL;
    echo $f1->getContactDetails() . PHP_EOL . PHP_EOL;

    // Throws error because method does not exist for Freelance Object
    $f1->setRole("Developer");
?>

</pre>