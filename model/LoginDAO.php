<?php

class LoginDAO {
	private $db;
	const GET_INI_INFO_SQL = 'SELECT id, login_pass FROM users WHERE login_name = ?';
	public function __construct() {
		$this->db = DBConnection::getDb ();
	}
	public function request_info($loggin_name) {
		$pstmt = $this->db->prepare ( self::GET_INI_INFO_SQL);
		$pstmt->execute ( array ($loggin_name) );
		
		$info = $pstmt->fetch( PDO::FETCH_ASSOC );
		
		
		if (!empty ( $info)) {			
			return new Login($info['id'], $info['login_pass']);
		}		
		return false;
	}
}

