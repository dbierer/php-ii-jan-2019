<?php

// alternate using localhost: not as effecient as sockets (if they are available)
// $dsn = 'mysql:dbname=course;host=locahost';
$dsn = 'mysql:unix_socket=/var/run/mysqld/mysqld.sock;dbname=phpcourse';
$usr = 'vagrant';
$pwd = 'vagrant';
$opt = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
$sql = 'SELECT * FROM orders';

try {
	$pdo = new PDO($dsn, $usr, $pwd, $opt);
	$stmt = $pdo->query($sql);
	// overrides the default fetch mode
	$stmt->setFetchMode(PDO::FETCH_CLASS, 'ArrayObject');
	echo 'i d: date : status : amount : description : customer' . PHP_EOL;
	while ($row = $stmt->fetch()) {
		//echo vprintf('%4d : %16s : %6s : %8.2f : %12s : %12s', $row) .PHP_EOL;
		var_dump($row);
	}
} catch (PDOException $e) {
	echo $e . PHP_EOL;
}

	
