<?php

namespace Unipa\Core;

class Employee extends Person {
	
	protected $role;

	public function getContactDetails() {
		return $this->getFullName() . ", Role: " . $this->getRole();
	}
}
