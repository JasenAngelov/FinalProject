<?php
class Admin_login implements JsonSerializable {
	
	private $username;
	private $password;
	private $ip;
	
	
	public function __construct($username, $password, $ip){
		$this->username= $username;
		$this->password= $password;
		$this->ip=$ip;
		
	}
	
	public function jsonSerialize() {
		return get_object_vars ( $this );
	}
	public function __get($prop) {
		return $this->$prop;
	}
}