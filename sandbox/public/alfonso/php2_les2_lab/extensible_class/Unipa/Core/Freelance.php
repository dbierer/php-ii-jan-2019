<?php

namespace Unipa\Core;

class Freelance extends Person {
	
	protected $VAT;

	public function getVAT() {
		return $this->VAT;
	}
	
	public function setVAT($VAT) {
		$this->VAT = $VAT;
	}
}
