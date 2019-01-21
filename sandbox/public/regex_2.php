<?php
// sub patterns
$test = [
	'<img src="http://unlikelysource.com/img/test.png" />',
	'<img src="https://zend.com/img/logo.png" />',
	'<a href="http://roguewave.com/">Home</a>',
];
	
$pattern = '/img.*?\"(.*?)\"/';
foreach ($test as $item) {
	echo $item . ' : ';
	if (preg_match($pattern, $item, $matches)) {
		var_dump($matches);
	}
	echo PHP_EOL;
}
