<?php
class Account implements JsonSerializable {
	private $IBAN;
	private $currency;
	private $balance;
	
	public function __construct($IBAN, $currency, $balance){
		$this->IBAN = $IBAN;
		$this->currency = $currency;
		$this->balance = $balance;
	}
	
	public function jsonSerialize() {
		return get_object_vars ( $this );
	}
	public function __get($prop) {
		return $this->$prop;
	}
}