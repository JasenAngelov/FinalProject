<?php
class Technical_info implements JsonSerializable{
	private $ip;
	private $ip_exist;
	private $login_atempts;
	private $login_lockout;
	private $last_login;
	
	public function __construct($ip, $ip_exist, $login_atempts = 0,  $last_login = null, $login_lockout = false) {
		$this->ip = $ip;		
		$this->ip_exist=$ip_exist;
		$this->login_atempts = $login_atempts;
		$this->login_lockout = $login_lockout;
		$this->last_login= $last_login;
	}
	public function __get($prop_name){
		return $this->$prop_name;
	}
	public function jsonSerialize(){
		return get_object_vars ( $this );
	}
	public function __set($prop, $value){
		$this->$prop = $value;
	}
}