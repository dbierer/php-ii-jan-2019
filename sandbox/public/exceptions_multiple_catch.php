<?php
define('ERROR_LOG', __DIR__ . '/error.log');

try {
	$pdo = new PDO('this will not work');
} catch (PDOException $e) {
    $logEntry = date('Y-m-d H:i:s') . '|' . __LINE__ . '|' . get_class($e) . ':' . $e->getMessage() . PHP_EOL;
    error_log($logEntry, 3, ERROR_LOG);
} catch (Exception $e ) {
    $logEntry = date('Y-m-d H:i:s') . '|' . __LINE__ . '|' . get_class($e) . ':' . $e->getMessage() . PHP_EOL;
    error_log($logEntry, 3, ERROR_LOG);
} catch (Throwable $e ) {
    $logEntry = date('Y-m-d H:i:s') . '|' . __LINE__ . '|' . get_class($e) . ':' . $e->getMessage() . PHP_EOL;
    error_log($logEntry, 3, ERROR_LOG);
}

echo PHP_EOL;
readfile(ERROR_LOG);

