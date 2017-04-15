<?php
class Transactions implements JsonSerializable {
	
	private $sum;
	private $recipient_iban;
	private $recipient;
	private $date;
	
	public function __construct($sum, $recipient_iban, $recipient, $date){
		$this->sum= $sum;
		$this->recipient_iban= $recipient_iban;
		$this->recipient= $recipient;
		$this->date = $date;
	}
	
	public function jsonSerialize() {
		return get_object_vars ( $this );
	}
	public function __get($prop) {
		return $this->$prop;
	}
}
$options = [
		'cost' => 12,
];
				
$password = 1234;
$before= microtime(true);
$password = password_hash($password, PASSWORD_BCRYPT, $options);
$after = microtime(true);



echo $password. "<br />" . ($after - $before)."<br />";

echo var_dump(password_verify('1232', $password));