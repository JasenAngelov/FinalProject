<?php

class AccountDAO {
	private $db;
	
	const GET_ACCOUNT_INFO_SQL = 'SELECT u.id, u.first_name, u.last_name, u.user_email, u.user_phone, a.IBAN, c.currency, a.balance, u.perfix  
FROM users u LEFT JOIN accounts a ON u.id = a.users_id LEFT JOIN currency_type c ON a.curency = c.type_id WHERE login_name = ? AND login_pass = ?';
	
	
	public function __construct() {
		$this->db = DBConnection::getDb ();
	}
	public function request_info($login_name, $Login_pass, $key) {
		
		$hashkey = hash('sha256', $key, true);
		
		$pstmt = $this->db->prepare ( self::GET_ACCOUNT_INFO_SQL );
		$pstmt->execute ( array ($login_name, $Login_pass) );
		
		$accounts = $pstmt->fetchAll ( PDO::FETCH_NUM );
		$result = array ();
		
		foreach ( $accounts as $account ) {
			$result [] = new Account ( $account [0], $account [1], $account [2], $account [3], $account [4], $account [5], $account [6], $account [7], $account [8], $hashkey);
		}
		if (!empty($result)) {
			return $result;
		}else {
			throw new Exception("Грешно име или парола!",$e);
		}
		
	}
	public function password_check ($pass, $hash){
		return password_verify($pass, $hash);
	}
}

