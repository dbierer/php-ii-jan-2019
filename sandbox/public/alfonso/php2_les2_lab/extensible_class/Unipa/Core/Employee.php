<?php

namespace Unipa\Core;

class Employee extends Person {
	
	protected $role;

	public function getRole() {
		return $this->role;
	}
	
	public function setRole($role) {
		$this->role = $role;
	}
}
