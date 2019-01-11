<?php

namespace Unipa\Core;

class Person extends Base {
	
	protected $firstName;
	protected $lastName;
	protected $address;
	
	public function getName() {
		return "$this->lastName $this->name";
	}

	public function getFirstName(){
		return $this->firstName;
	}

	public function setFirstName($firstName) {
		$this->firstName = $firstName;
	}

	public function getLastName(){
		return $this->lastName;
	}

	public function setLastName($lastName) {
		$this->lastName = $lastName;
	}
	
	public function getAddress() {
		return $this->address;
	}
	
	public function setAddress($address) {
		$this->address = $address;
	}
}
