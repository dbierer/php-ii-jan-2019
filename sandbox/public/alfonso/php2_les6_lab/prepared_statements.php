<?php

// ALFONSO: can you hear me?  I'm not getting any audio from you
//          try to logout and then back in again, OK?

 // Set default timezone
 date_default_timezone_set('UTC');
 
$dsn['sqlite'] = 'sqlite:database.sqlite3';
$dsn['mysql']  = 'mysql:dbname=phpcourse;host=localhost';

 try {

    // Create new database in memory
    // $pdo = new PDO('sqlite::memory:');

    // Create (connect to) SQLite database in file
    $pdo = new PDO($dsn['mysql'], 'vagrant', 'vagrant');
    
    // Set errormode to exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, 
                                PDO::ERRMODE_EXCEPTION);

    // Create tables
    $pdo->exec("CREATE TABLE IF NOT EXISTS messages (
                        id INTEGER PRIMARY KEY, 
                        title VARCHAR(50) UNIQUE, 
                        message TEXT, 
                        time INTEGER)");


    // Array with some test data to insert to database             
    $messages = array(
                    array('title' => 'Hello!',
                        'message' => 'Just testing...',
                        'time' => 1327301464),
                    array('title' => 'Hello again!',
                        'message' => 'More testing...',
                        'time' => 1339428612),
                    array('title' => 'Hi!',
                        'message' => 'SQLite3 is cool...',
                        'time' => 1327214268)
                );

    // Prepare INSERT statement to SQLite3 memory db
    $insert = "INSERT INTO messages (id, title, message, time) 
                VALUES (:id, :title, :message, :time)";
    $stmt = $pdo->prepare($insert);

	$id = 1;
    foreach($messages as $index => $m) {
		$m['id'] = $id++;
        $stmt->execute($m);
    }

    // Select all data from memory db messages table 
    $result = $pdo->query('SELECT * FROM messages');

    echo "<pre>";
    foreach($result as $row) {
        echo "Id: " . $row['id'] . "\n";
        echo "Title: " . $row['title'] . "\n";
        echo "Message: " . $row['message'] . "\n";
        echo "Time: " . (new DateTime())->setTimestamp($row['time'])->format('Y-m-d') . "\n";
        echo PHP_EOL;
    }
    echo "</pre>";

    // Close db connection
    $pdo = null;
 }
 catch(PDOException $e) {
   // Print PDOException message
   echo $e->getMessage() .PHP_EOL;
   $pdo->exec("DROP TABLE messages");
 }
