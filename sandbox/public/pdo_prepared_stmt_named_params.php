<?php

// alternate using localhost: not as effecient as sockets (if they are available)
// $dsn = 'mysql:dbname=course;host=locahost';
$dsn = 'mysql:unix_socket=/var/run/mysqld/mysqld.sock;dbname=phpcourse';
$usr = 'vagrant';
$pwd = 'vagrant';
$opt = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
//$sql = 'SELECT * FROM orders';

$data = ['date' => '2019-01-' . rand(0,31), 'status' => 'open', 'amount' => rand(1,999), 'description' => 'Test 1', 'customer' => rand(1,5)];
$sql = 'INSERT INTO orders (' . implode(',', array_keys($data)) . ') VALUES (';
$sql .= ':' . implode(', :', array_keys($data)) . ')';
echo $sql . PHP_EOL;

try {
	$pdo = new PDO($dsn, $usr, $pwd, $opt);
	$stmt = $pdo->prepare($sql);
	$stmt->execute($data);
	echo ($stmt->rowCount()) ? 'Insert Succeeded' : 'Insert failed';
	echo PHP_EOL;
	$sql = 'SELECT * FROM orders';
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

	
