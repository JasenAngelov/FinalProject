<?php

class ClientDAO {
	private $db;	
	const GET_CLIENT_INFO_SQL = 'SELECT id, first_name, last_name, user_email, user_phone FROM users WHERE login_name = ? AND login_pass = ?';
	
	public function __construct() {
		$this->db = DBConnection::getDb ();
	}
	public function request_info($loggin_name, $loggin_pass) {
		$pstmt = $this->db->prepare ( self::GET_CLIENT_INFO_SQL );
		$pstmt->execute ( array (
				$loggin_name,
				$loggin_pass 
		) );
		
		$client_info = $pstmt->fetchAll ( PDO::FETCH_ASSOC );
		
		if (empty ( $client_info )) {
			
			
			throw new Exception ( 'Wrong username or password' );
		}
		
		return $client_info;
	}
}

