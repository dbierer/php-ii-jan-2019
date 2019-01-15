<?php declare(strict_types=1);
namespace Unipa\Core;

class Employee extends Person {
	
	// Only supported in PHP >= 7.4
	// protected string $role;
	protected $role;

	public function getContactDetails() : string {
		return $this->getFullName() . ", Role: " . $this->getRole();
	}
}
