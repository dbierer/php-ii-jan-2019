<?php
try {
	throw new Exception('This is a test');
} catch (Exception $e) {
	echo $e;
}

class DontStringMeAlong
{
	public function __toString()
	{
		throw new Exception('This object is not designed to be used in a string context');
	}
}

$dont = new DontStringMeAlong();
echo $dont;
