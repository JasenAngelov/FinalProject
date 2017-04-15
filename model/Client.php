<?php
class Client implements JsonSerializable {
	private $id;
	private $first_name;
	private $last_name;
	private $email;
	private $phone;
	
	public function __construct($client_id, $first_name, $last_name, $email, $phone) {
		if (empty ( $client_id ) || empty ( $first_name ) || empty ( $last_name ) || empty ( $email ) || empty ( $phone )) {
			throw new InvalidArgumentException ( 'Nevalidni danni' );
		} else {
			$this->id = $client_id;
			$this->first_name = $first_name;
			$this->last_name = $last_name;
			$this->email = $email;
			$this->phone = $phone;
		}
	}
	public function jsonSerialize() {
		return get_object_vars ( $this );
	}
	public function __get($prop) {
		return $this->$prop;
	}
}




