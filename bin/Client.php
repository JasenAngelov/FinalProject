<?php

/**
 * Клас който съдържа информация за клиента, 
 * @author Jasen
 *
 */
class Client implements JsonSerializable {
	private $id;
	private $first_name;
	private $last_name;
	private $email;
	private $phone;	
	private $IBAN;
	private $currency;
	private $balance;
	private $transactions;
	private $perfix;
	private $key;
	
	public function __construct($client_id, $first_name, $last_name, $email, $phone, $IBAN, $currency, $balance, $transactions,$perfix, $key) {
			
		    $this->id = $client_id;
		    $this->first_name = $this->decode($first_name, $key);
			$this->last_name = $this->decode($last_name, $key);
			$this->email = $this->decode($email, $key);
			$this->phone = $this->decode($phone, $key);			
			$this->IBAN = $this->decode($IBAN, $key);
			$this->currency = $this->decode($currency, $key);
			$this->balance = $this->decode($balance, $key);
			$this->transactions = $this->decode($transactions, $key);
			$this->perfix = $perfix;
			$this->key = $key;
	}
	public function jsonSerialize() {
		return get_object_vars ( $this );
	}
	public function __get($prop) {
		return $this->decode($this->$prop, $this->key);
	}
	private function decode($data, $key) {
		$iv = substr($data, 0, 16);
		$ct = substr($data, 16);
		$value = openssl_decrypt($ct, 'AES-256-CBC', $key, 0, $iv);
		
		return $value;
	}
}





//  Algoritym za kriptirane na danni DA SE ISTRIE SLED KATO NAPISHES DAOto!!!!!!!

$str = 'Jasen1234';
$key = hash('sha512', $str);
$iv = openssl_random_pseudo_bytes(16);
$value = 'tiger192,3';

$value= openssl_encrypt($value, 'AES-256-CBC', $key, 1, $iv);
$data = $iv . $value;
function decode($data, $key) {
	$iv = substr($data, 0, 16);
	$ct = substr($data, 16);
	$value = openssl_decrypt($ct, 'AES-256-CBC', $key, 1, $iv);
	return $value;
}
echo $data. "<br />";
echo decode($data, $key);
?>


