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
	
	public function __construct($info) {
		
		$key_name = $this->class_keys ();
		$raw_data = array_combine ( $key_name, $info );
		
		foreach ( $raw_data as $key => $value ) {
			$this->$key = $this->decode ( $value );
		}
		$this->id = $info [0];
	}
	public function jsonSerialize() {
		return get_object_vars ( $this );
	}
	public function __get($prop) {
		return $this->$prop;
	}
	public function __set($prop, $value) {
		$this->$prop = $value;
	}
	private function decode($data) {
		$key = file_get_contents ( 'C:\xampp\htdocs\FinalProject\db__credentials\key.txt' );
		$iv = file_get_contents ( 'C:\xampp\htdocs\FinalProject\db__credentials\iv.txt' );
		
		$value = openssl_decrypt ( $data, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv );
		
		return $value;
	}
	private function class_keys() {
		return array_keys ( get_class_vars ( __CLASS__ ) );
	}
}
