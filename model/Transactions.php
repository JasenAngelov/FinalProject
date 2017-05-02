<?php
class Transactions implements JsonSerializable {
	private $refrece;
	private $senderIban;
	private $date;
	private $sum;
	private $recipientIban;
	private $reason;
	private $aditional_reason;
	private $recipient_name;	
	private $type;
	public function __construct($refrece, $iban, $date, $sum, $recipientIban, $reason, $aditional_reason, $recipient_name, $type) {
		$this->IBAN = $this->decode ( $iban );
		$this->refrece = $this-> $refrece;
		$this->Date = $this->decode ( $date );
		$this->Sum = $this->decode ( $sum );
		$this->recipientIban = $this->decode ( $recipientIban );
		$this->reason = $this->decode ( $reason );
		$this->aditional_reason = $this->decode ( $aditional_reason );
		$this->recipient_name = $this->decode ( $recipient_name );
		$this->Type = $this->decode ( $type );
	}
	public function jsonSerialize() {
		return get_object_vars ( $this );
	}
	public function __get($prop) {
		return $this->$prop;
	}
	private function decode($data) {
		$key = file_get_contents ( 'C:\xampp\htdocs\FinalProject\db__credentials\key.txt' );
		$iv = file_get_contents ( 'C:\xampp\htdocs\FinalProject\db__credentials\iv.txt' );
		
		$value = openssl_decrypt ( $data, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv );
		
		return $value;
	}
}	
