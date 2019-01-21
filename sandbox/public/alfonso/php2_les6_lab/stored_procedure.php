<?php

$dsn = 'mysql:unix_socket=/var/run/mysqld/mysqld.sock;dbname=phpcourse';
$usr = 'vagrant';
$pwd = 'vagrant';
$opt = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

 try {
    $pdo = new PDO($dsn, $usr, $pwd, $opt);
    
	// this is created directly in database:
    $pdo->exec('DROP PROCEDURE IF EXISTS phpcourse.getAllWhere');
    $procedure = <<<'EOT'
DELIMITER $
CREATE PROCEDURE phpcourse.getAllWhere(p_where int) 
BEGIN 
	SELECT * FROM `orders` WHERE `amount` > p_where; 
END 
$ 
DELIMITER ; 
EOT;
    $pdo->exec($procedure);
	
    $stmt = $pdo->prepare('CALL phpcourse.getAllWhere(?)');
    $stmt->execute(['amount > 10']);
}
catch(PDOException $e) {
    // Print PDOException message
    echo $e->getMessage() .PHP_EOL;
 
    
}
