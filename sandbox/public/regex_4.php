<?php
function match($pattern, $test)
{
	echo "\nPattern: " . $pattern . PHP_EOL;
	foreach ($test as $item) {
		echo $item . ' : ';
		echo (preg_match($pattern, $item)) ? 'MATCH' : 'NO MATCH';
		echo PHP_EOL;
	}
}

// sub patterns
$test = [
	' TEST ',
	'TEST',
	'TEST ',
];
	
// anything with "TEST"
match('/TEST/', $test);

// starts with:
match('/^TEST/', $test);

// ends with:
match('/TEST$/', $test);

// exactly:
match('/^TEST$/', $test);
