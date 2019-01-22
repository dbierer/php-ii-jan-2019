<?php

$dsn = 'mysql:unix_socket=/var/run/mysqld/mysqld.sock;dbname=phpcourse';
$usr = 'test';
$pwd = 'password';
$opt = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

 try {
    $pdo = new PDO($dsn, $usr, $pwd, $opt);
    
	// code to create stored procedure
    $stored = <<<'EOT'
CREATE PROCEDURE phpcourse.getAllWhere(p_where int) 
BEGIN 
SELECT * FROM `orders` WHERE `amount` > p_where; 
END #
EOT;

    // erase the existing stored procedure
    $pdo->exec('DROP PROCEDURE IF EXISTS phpcourse.getAllWhere');
    
    // shell out and set the delimiter
    // NOTE: the DELIMITER command is *not* an SQL command and is therefore not conveyed by PDO
    shell_exec('mysql -u vagrant -pvagrant -e "DELIMITER #"');
    
    // create the stored procedure    
    $pdo->exec($stored);
    
    // set the delimiter back
    shell_exec('mysql -u vagrant -pvagrant -e "DELIMITER ;"');

    $stmt = $pdo->prepare('CALL phpcourse.getAllWhere(?)');
    $stmt->execute([1000]);
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo implode(':', $row) . PHP_EOL;
    }  
}
catch(PDOException $e) {
    // Print PDOException message
    echo $e->getMessage() .PHP_EOL;
 
    
}
