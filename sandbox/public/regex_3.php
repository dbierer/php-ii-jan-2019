<?php
// sub patterns
$test = [
	'<p><a href="http://www.zend.com/" >ZEND</a></p>',
	'<a target="_blank" href="https://unlikelysource.com/about" >',
	"<a href='http://www.zend.com/' >",
];
	
$pattern = '/<a.*?href=["\'](.*?)["\'].*?>/';
foreach ($test as $item) {
	echo $item . ' : ';
	if (preg_match($pattern, $item, $matches)) {
		var_dump($matches);
	}
	echo PHP_EOL;
}
