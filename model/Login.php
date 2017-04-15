<?php
class Login implements JsonSerializable {
	
	private $username;
	private $password;
	
	
	public function __construct($username, $password){
		$this->username= $username;
		$this->password= $password;
		
	}
	
	public function jsonSerialize() {
		return get_object_vars ( $this );
	}
	public function __get($prop) {
		return $this->$prop;
	}
}