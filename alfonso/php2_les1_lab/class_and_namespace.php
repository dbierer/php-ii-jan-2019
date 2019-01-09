<?php

//  
namespace unipa\core {

	class Person {
		
		private $name;
		
		// externally visible
		public $lastName;
		
		//public const TABLE = 'user_details';
		
		// visibility only in the class scope
		protected $address;
		
		public function getName() {
			return $this->name;
		}
		
		public function setName($name) {
			$this->name = $name;
		}
		
		public function getAddress() {
			return $this->address;
		}
		
		public function setAddress($address) {
			$this->address = $address;
		}
	}

}


namespace {
	use unipa\core\Person;

	$p1 = new Person;
	$p1->setName("Mario");
	$p1->lastName = "Rossi";
	
	// give error
	//$p1->address = "Rossi";
	$p1->setAddress("Via Roma 1");
	var_dump($p1);
	
	$p2 = new Person;
	$p2->setName("Paolo");
	$p2->lastName = "Rossi";
	
	// give error
	//$p2->address = "Rossi";
	$p2->setAddress("Via Palermo 10");
	var_dump($p2);
	
	
	
}
