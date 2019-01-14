<?php

namespace Unipa\Core;

class Freelance extends Person {
	
	protected $VAT;

	public function getContactDetails() {
		return $this->getFullName() . ", VAT: " . $this->getVAT();
	}

	// no respect convention so I define methods explicitly 
	public function getVAT() {
		return $this->VAT;
	}
}
