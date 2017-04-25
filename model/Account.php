<?php
class Account implements JsonSerializable {
	private $id;
	private $first_name;
	private $last_name;
	private $email;
	private $phone;
	private $IBAN;
	private $currency;
	private $balance;
	private $perfix;
	private $key;

//  Èçïîëçâàì ãî çà òàìèðàíå íà òðàíçàêöèèòå íà ïîòðåáèòåëÿ !!!!ÑÌÅÍÈ ÊÀÒÎ ÈÇÌÈÑËÈØ ÏÎ-ÄÎÁÚÐ ÌÅÒÎÄ!!!

	private $rawIban;
	
	public function __construct($client_id, $first_name, $last_name, $email, $phone, $IBAN, $currency, $balance, $perfix, $key) {
		$trueIV = substr($perfix, 0, 16);
		
		$this->id = $client_id;		
		$this->first_name = $this->decode($first_name, $key, $trueIV);
		$this->last_name = $this->decode($last_name, $key, $trueIV);
		$this->email = $this->decode($email, $key, $trueIV);
		$this->phone = $this->decode($phone, $key, $trueIV);
		$this->IBAN = $this->decode($IBAN, $key, $trueIV);
		$this->currency = $this->decode($currency, $key, $trueIV);
		$this->balance = $this->decode($balance, $key, $trueIV);
		$this->perfix = $trueIV;
		$this->key = $key;
		$this->rawIban = $IBAN;
	}
	public function jsonSerialize() {
		return get_object_vars ( $this );
	}
	public function __get($prop) {
		
		return $this->$prop;
	}
	private function decode($data, $key, $perfix) {
		$iv = $perfix;
		$pass = $iv . $key;
		$value = openssl_decrypt($data, 'AES-256-CBC', $pass, OPENSSL_RAW_DATA, $iv);
		
		return $value;
	}
}