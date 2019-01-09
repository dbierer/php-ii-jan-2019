<?php

namespace Unipa\Core;

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
