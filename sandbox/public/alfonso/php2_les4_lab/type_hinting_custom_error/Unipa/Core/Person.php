<?php declare(strict_types=1);
namespace Unipa\Core;

abstract class Person extends Base {
	
	protected $firstName;
	protected $lastName;
	protected $address;
	
	public function getFullName() : string {
		return "First Name: $this->lastName, Last Name: $this->firstName";
	}

	public abstract function getContactDetails() : string;

}
