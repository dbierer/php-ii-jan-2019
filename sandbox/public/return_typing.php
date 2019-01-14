<?php

class Select
{
    protected $arg1;
    protected $arg2;

    public function __construct(string $arg1, int $arg2) {
        $this->arg1 = $arg1 ;
        $this->arg2 = $arg2 ;
    }
    
    public function getArg1() : string
    {
		return $this->arg1;
	}

    public function getArg2() : int
    {
		return $this->arg2;
	}

    public function getArgSwitch($arg) : int
    {
		return $arg;
	}

}

try {
	// works OK: these data types can be cross converted
	$select = new Select(1, '1');
	var_dump($select->getArg1(), $select->getArg2());
	echo PHP_EOL;
	// works OK
	var_dump($select->getArgSwitch(111));
	echo PHP_EOL;
	// doesn't work: unable to promote downwards: same logic as with datatyping input values, but in reverse
	var_dump($select->getArgSwitch('Unable to convert'));
	echo PHP_EOL;
} catch (Throwable $e) {
	echo $e;
}
echo PHP_EOL;
