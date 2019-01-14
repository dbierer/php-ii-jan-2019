<?php

class MyDate
{
	public $date;
	public function __construct(string $date)
	{
		$this->date = new DateTime($date);
	}
	public function getDate()
	{
		return $this->date->format('Y-m-d');
	}
}

class Test
{
	public $date;
	public function __construct($string)
	{
		$this->date = new MyDate($string);
	}
}

$test = new Test('now');
$date = $test->date->date;

$clone = clone $test;
$date->add(new DateInterval('P1W'));

// these two values s/be 1 week apart
echo $test->date->getDate();
echo PHP_EOL;
// but they're the same because clone is shallow: date is the same object for both
echo $clone->date->getDate();
echo PHP_EOL;

