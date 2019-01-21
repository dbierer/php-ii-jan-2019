<?php

$dsn = 'mysql:unix_socket=/var/run/mysqld/mysqld.sock;dbname=phpcourse';
$usr = 'vagrant';
$pwd = 'vagrant';
$opt = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

 try {
    $pdo = new PDO($dsn, $usr, $pwd, $opt);
    
    $procedure = 'DROP PROCEDURE IF EXISTS customers.getAllWhere;
            DELIMITER $
            CREATE PROCEDURE customers.getAllWhere(
                p_where text
            )
            BEGIN
                SELECT * FROM messages WHERE p_where
            END
            $
            DELIMITER;

    ';
    $stmt = $pdo->prepare($procedure);
    $stmt->execute();

    $stmt = $pdo->prepare("CALL customers.getAllWhere(?)");
    $stmt->execute("amount > 10");
}
catch(PDOException $e) {
    // Print PDOException message
    echo $e->getMessage() .PHP_EOL;
 
    
}