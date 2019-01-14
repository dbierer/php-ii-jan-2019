<?php

class GrandFather
{
}

class Father extends GrandFather
{
}

class Son extends Father
{
}

class Test
{
	public function test1(GrandFather $f)
	{
		return __METHOD__ . PHP_EOL;
	}

	public function test2(Son $s)
	{
		return __METHOD__ . PHP_EOL;
	}
}

$test = new Test();
$son  = new Son();

// polymorphism allows descendent classes as acceptable arguments
echo $test->test1($son);
echo $test->test2($son);

try {
	$father = new Father();
	echo $test->test1($father);
	// polymorphism dis-allows ascendent classes: doesn't work backwards!
	echo $test->test2($father);
} catch (Throwable $t) {
	echo $t . PHP_EOL;
}
