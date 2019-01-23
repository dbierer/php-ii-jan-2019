<?php
$test = '<p>Paragraph 1</p><p>Paragraph 2</p><p>Paragraph 3</p>';

// Greedy Example
$pattern = '/<p>.*<\/p>/';
preg_match($pattern, $test, $matches);
echo $matches[0] . PHP_EOL;
// output: "<p>Paragraph 1</p><p>Paragraph 2</p><p>Paragraph 3</p>"

// Non-Greedy Example
$pattern = '/<p>.*?<\/p>/';
preg_match($pattern, $test, $matches);
echo $matches[0] . PHP_EOL;
// output: "<p>Paragraph 1</p>"

// Non-Greedy Using Modifier
$pattern = '/<p>.*<\/p>/U';
preg_match($pattern, $test, $matches);
echo $matches[0] . PHP_EOL;
// output: "<p>Paragraph 1</p>"

// returns an array of all possible matches
preg_match_all($pattern, $test, $matches);
print_r($matches[0]) . PHP_EOL;
// output: "<p>Paragraph 1</p>"
