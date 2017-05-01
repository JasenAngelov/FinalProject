<?php

class LoginDAO {
	private $db;
	
	const GET_INI_INFO_SQL = 'SELECT login_name, login_pass FROM users WHERE login_name = ?';
	
	public function __construct() {
		$this->db = DBConnection::getDb();
	}
	public function request_info($loggin_name) {
		
		$hashName = hash('sha256', $loggin_name, true);
		
		$pstmt = $this->db->prepare ( self::GET_INI_INFO_SQL);		
		$pstmt->execute ( array ($hashName) );
		
		$info = $pstmt->fetch( PDO::FETCH_ASSOC );
		
		
		if (!empty ( $info)) {			
			return new Login($info['login_name'], $info['login_pass']);
		}		
		return false;
	}
}
