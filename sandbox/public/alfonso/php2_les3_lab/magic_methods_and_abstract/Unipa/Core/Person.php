<?php

namespace Unipa\Core;

abstract class Person extends Base {
	
	protected $firstName;
	protected $lastName;
	protected $address;
	
	public function getFullName() {
		return "First Name: $this->lastName, Last Name: $this->firstName";
	}

	public abstract function getContactDetails();

}
