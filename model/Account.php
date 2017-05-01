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
	

//  Èçïîëçâàì ãî çà òàìèðàíå íà òðàíçàêöèèòå íà ïîòðåáèòåëÿ !!!!ÑÌÅÍÈ ÊÀÒÎ ÈÇÌÈÑËÈØ ÏÎ-ÄÎÁÚÐ ÌÅÒÎÄ!!!

	
	
	public function __construct($client_id, $first_name, $last_name, $email, $phone, $IBAN, $currency, $balance) {
				
		$key = file_get_contents('C:\xampp\htdocs\FinalProject\db__credentials\key.txt');
		$iv = file_get_contents('C:\xampp\htdocs\FinalProject\db__credentials\iv.txt');
		
		$this->id = $client_id;		
		$this->first_name = $this->decode($first_name);
		$this->last_name = $this->decode($last_name);
		$this->email = $this->decode($email);
		$this->phone = $this->decode($phone);
		$this->IBAN = $this->decode($IBAN);
		$this->currency = $this->decode($currency);
		$this->balance = $this->decode($balance);
		
		
	}
	public function jsonSerialize() {
		return get_object_vars ( $this );
	}
	public function __get($prop) {
		
		return $this->$prop;
	}
	private function decode($data) {
		$key = file_get_contents('C:\xampp\htdocs\FinalProject\db__credentials\key.txt');
		$iv = file_get_contents('C:\xampp\htdocs\FinalProject\db__credentials\iv.txt');
		$value = openssl_decrypt($data, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
		
		return $value;
	}
}
