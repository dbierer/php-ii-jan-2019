<?php
class myClass {
	public $a = array(1,2,3,"name" => "doug");
	public $label = "ABC";
	public $date;
	public $thisIsNotInTheSerialization = 'NOT HAPPENING';
	function __construct() {
		$this->date = date("Y-m-d H:i:s",time());
	}
	function __sleep() {
		echo "Sleeping\n";
		var_dump($this);
		return array('a','label','date');
//		return array('label'); 	// what's in the return is what is placed into string
	}
	function __wakeup() {
		echo "Wakeup\n";
	}
}
$m = new myClass;
$s = serialize($m);
echo $s;
