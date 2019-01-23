<?php
$test = ['<p>ฉันเพิ่งเห็นคนลงรถไฟ</p>',
		 '<p>คุณรู้ไหมว่ารถไฟขบวนนี้คืออะไร</p>',
		 '<p>คุณกำลังนั่งรถไฟ</p>',
		 '<p>วันนี้คุณเป็นอย่างไรบ้าง</p>'
];

// Multi-byte Example
$pattern = '/รถไฟ/u';	// "u" modifier == treat string as UTF-8 encoded
foreach ($test as $item) {
	echo $item . ' : ';
	echo (preg_match($pattern, $item)) ? 'MATCH' : 'NO MATCH';
	echo PHP_EOL;
}

// testing str_replace and multi-byte
$search  = 'รถไฟ';  // Thai for "train"
$replace = 'รถบัส';	// Thai for "bus"

foreach ($test as $item) {
	$count = 0;
	echo $item . ' : ';
	echo str_replace($search, $replace, $item, $count);
	echo ($count) ? 'Replacement Made' : 'No Replacements Made';
	echo PHP_EOL;
}
