<?php
$test = 'To this,ha ha,I say tally ho. Ta ta. "Ha hah"';

// This does not work:
$words = explode(' ', $test);
var_dump($words);

// Try this instead:
$words = array();
preg_match_all('/\w+?\b/', $test, $words);
var_dump($words);

// or using preg_split()
$words = preg_split('/[^A-Za-z]|\s|\b/', $test);
var_dump($words);
