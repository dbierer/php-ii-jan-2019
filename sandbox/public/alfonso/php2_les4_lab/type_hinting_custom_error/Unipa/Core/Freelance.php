<?php declare(strict_types=1);
namespace Unipa\Core;


class Freelance extends Person {
	
	protected $VAT;

	public function getContactDetails() : string {
		return $this->getFullName() . ", VAT: " . $this->getVAT();
	}

	// no respect convention so I define methods explicitly 
	public function getVAT() : string {
		return $this->VAT;
	}

	public function setVAT(string $vat) : object {
		return $this->VAT = $vat;
	}

	public function setRole(string $role) {

		throw new FreelanceNotFoundMethodException("unused string");

	}
}
