<?php
// using scalar type hinting without the "declare" causes type casting to occur

// if you uncomment this: you will get a "TypeError" right away
//declare(strict_types=1);

class Select
{
    protected $arg1;
    protected $arg2;

    public function __construct(string $arg1, int $arg2) {
        $this->arg1 = $arg1 ;
        $this->arg2 = $arg2 ;
    }
    
    public function getArgs()
    {
		return var_export(get_object_vars($this), TRUE) . PHP_EOL;
	}
}

try {
	// works OK: these data types can be cross converted
	$select = new Select(1, '1');
	echo $select->getArgs();
	// works OK: bool values get promoted to "higher" level data types
	$select = new Select(TRUE, FALSE);
	echo $select->getArgs();
	// doesn't work!  internally unable to promote a string to an integer
	$select = new Select(FALSE, 'This is not an integer');
	echo $select->getArgs();
} catch (Throwable $e) {
	echo $e;
}
echo PHP_EOL;
