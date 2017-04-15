<?php

class AccountDAO {
	private $db;
	
	const GET_ACCOUNT_INFO_SQL = 'SELECT IBAN, curency, balance FROM accounts a INNER JOIN currency_type c ON a.curency = c.type_id WHERE users_id = ?';
	
	
	public function __construct() {
		$this->db = DBConnection::getDb ();
	}
	public function request_info($user_id) {
		$pstmt = $this->db->prepare ( self::GET_ACCOUNT_INFO_SQL );
		$pstmt->execute ( array ($user_id) );
		
		$accounts = $pstmt->fetchAll ( PDO::FETCH_ASSOC );
		$result = array ();
		
		foreach ( $accounts as $account ) {
			$result [] = new Account ( $account ['IBAN'], $account ['curency'], $account ['balance']);
		}
		
		return $result;
	}
}

var_dump(hash_algos());
