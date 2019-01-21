<?php
$test = [
	'some_graphic.jpg',
	'some_graphic.png',
	'22some_graphic.jpg',
	'doesnt.match',
];

$pattern = '/^[a-z].*\.(jpg|png)$/';
foreach ($test as $item) {
	echo $item . ' : ';
	echo (preg_match($pattern, $item)) ? 'MATCH': 'NO MATCH';
	echo PHP_EOL;
}

// sub patterns
$test = [
	'<img src="http://unlikelysource.com/img/test.png" />',
	'<img src="https://zend.com/img/logo.png" />',
	'<a href="http://roguewave.com/">Home</a>',
];
	
$pattern = '/"*\.(jpg|png)"/';
foreach ($test as $item) {
	echo $item . ' : ';
	if (preg_match($pattern, $item, $matches)) {
		var_dump($matches);
	}
	echo PHP_EOL;
}
