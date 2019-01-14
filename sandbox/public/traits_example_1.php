<?php

trait ModDate
{
	public function getDate()
	{
		return $this->date->format('Y-m-d H:i:s');
	}
}

class GrandFather
{
	protected $date;
	public function setDate(string $date)
	{
		$this->date = new DateTime($date);
	}
	public function getDate()
	{
		return $this->date->format('l, d M y');
	}
}

class Father extends GrandFather
{
	use ModDate;
}

class Son extends Father
{
	public function getDate()
	{
		return $this->date->format('j, d-m-Y');
	}
}

$gf = new GrandFather();
$father = new Father();
$son = new Son();

$gf->setDate('now');
$father->setDate('now');
$son->setDate('now');

echo $gf->getDate();
echo PHP_EOL;
echo $father->getDate();
echo PHP_EOL;
echo $son->getDate();
echo PHP_EOL;
