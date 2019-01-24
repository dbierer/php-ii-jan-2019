<pre>
<?php

$test = 'To this,ha ha,I say tally ho. Ta ta. "Ha hah"';
var_dump($test);

// Try this instead:
$words = array();
//preg_match_all('/\w+?\b/', $test, $words);
//var_dump($words);

// or using preg_split()
$words = preg_split('/[^a-z]/i', $test, 0, PREG_SPLIT_NO_EMPTY);
var_dump($words);


?>
</pre>