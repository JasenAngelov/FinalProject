<?php
class Transactions implements JsonSerializable {
	
	private $iban;
	private $refrece;
	private $date;
	private $sum;
	private $recipient;
	private $type;
	
	public function __construct($refrece, $iban, $date, $sum, $recipient, $type, $key, $perfix){
				
		$this->IBAN= $this->decode($iban, $key, $perfix);
		$this->refrece= $this->decode($refrece, $key, $perfix);
		$this->Date= $this->decode($date, $key, $perfix);
		$this->Sum = $this->decode($sum, $key, $perfix);
		$this->recipient = $this->decode($recipient, $key, $perfix);
		$this->Type = $this->decode($type, $key, $perfix);
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
