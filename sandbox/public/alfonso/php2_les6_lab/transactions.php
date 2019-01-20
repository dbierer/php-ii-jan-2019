<?php
 
 // Set default timezone
 date_default_timezone_set('UTC');

 try {

    // Create new database in memory
    // $pdo = new PDO('sqlite::memory:');

    // Create (connect to) SQLite database in file
    $pdo = new PDO('sqlite:database.sqlite3');
    
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
                    array('title' => 'Hello No in DB!',
                        'message' => 'More testing...',
                        'time' => 1339428612),
                    array('title' => 'Hi! No in DB',
                        'message' => 'SQLite3 is cool...',
                        'time' => 1327214268)
                );

    // Prepare INSERT statement to SQLite3 memory db
    $insert = "INSERT INTO messages (id, title, message, time) 
                VALUES (:id, :title, :message, :time)";
    $stmt = $pdo->prepare($insert);

    // It will fails because first record exists
    /*$pdo->beginTransaction();
    try {
        foreach($messages as $index => $m) {
            $stmt->execute($m);
        }
        $pdo->commit();
    
    }
    catch(PDOException $e) {
        echo "I - Record already exists" . PHP_EOL;
        echo $e->getMessage() .PHP_EOL;
        $pdo->rollBack();
    }
    */
    
    // Without first insert it will success
    $pdo->beginTransaction();
    try {
        foreach($messages as $index => $m) {
            
            if ($index !== 0) {
                $stmt->execute($m);
            }
                
        }
        $pdo->commit();
    }
    catch(PDOException $e) {
        echo "II - Record already exists" . PHP_EOL;
        echo $e->getMessage() .PHP_EOL;
        $pdo->rollBack();
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

        
    // Delete 2nd and 3rd message
    $stmt = $pdo->prepare("DELETE FROM messages WHERE title=:title");
    
    foreach($messages as $index => $m) {
        if ($index !== 0)
            $stmt->execute(["title" => $m["title"]]);
    }


 }
 catch(PDOException $e) {
   // Print PDOException message
   echo $e->getMessage() .PHP_EOL;
 }
 finally {
     // Close db connection
     $pdo = null;
 }