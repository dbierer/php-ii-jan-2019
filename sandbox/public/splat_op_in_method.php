<?php

class Db
{
    public function connect($driver, $dbname, ...$other)
    {
	echo $driver . PHP_EOL;
	echo $dbname . PHP_EOL;
	echo var_export($other, TRUE) . PHP_EOL;
	switch ($driver) {
	    case 'mysql' :
		$username = $other[0] ?? '';
		$password = $other[1] ?? '';
		break;
	    case 'sqlite' :
		break;
	}
    }
}

$db = new Db();
$db->connect('sqlite','path/to/datase');


