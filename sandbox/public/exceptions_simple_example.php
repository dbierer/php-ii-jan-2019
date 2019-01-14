<?php
try {
	$pdo = new PDO('this will not work');
} catch (Exception $e) {
	echo $e;
}
echo PHP_EOL;
