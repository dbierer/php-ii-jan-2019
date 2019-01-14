<?php

    //declare(strict_types=1);
    error_reporting(E_ALL);
    spl_autoload_register(

        function ($class) {

            $file = str_replace('\\', '/', $class) . '.php';

            require_once __DIR__ . '/' . $file;

        }

    );


    use Unipa\Test\TestClass;

    $t1 = new TestClass();
    
    

?>

<pre>
<?php
    echo 'Object Type: ' . $t1->getType() . PHP_EOL;

    // throws error - NULL is not allowed
    try {
    echo TestClass::getVarType(NULL) . PHP_EOL;
    }
    catch (Throwable $e) {
    echo "caught exception: " .  $e->getMessage()  . PHP_EOL;
    }
    
?>

</pre>