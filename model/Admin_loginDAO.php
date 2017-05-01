<?php

class Admin_loginDAO {
	private $db;
	const GET_ADMIN_INFO_SQL = 'SELECT * FROM administrators WHERE login_name = ? AND login_pass = ?';
	public function __construct() {
		$this->db = Login_adminDBConnection::getDb ();
	}
	public function request_info($loggin_name, $login_pass, $ip) {
		$hashName = hash ( 'sha512', $loggin_name );
		$hashPass = hash ( 'sha512', $login_pass);
		$hashIp = hash ( 'sha512', $ip);
		
		$pstmt = $this->db->prepare ( self::GET_ADMIN_INFO_SQL );
		$pstmt->execute ( array (
				$hashName,
				$hashPass
		) );
		
		$info = $pstmt->fetch ( PDO::FETCH_ASSOC );
		
		if (! empty ( $info )) {
			return true;
		}
		return false;
	}
	
	
	
}
