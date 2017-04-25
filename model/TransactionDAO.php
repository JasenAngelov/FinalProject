<?php
class TransactionDAO {
private $db;
	
	const GET_ALL_TRANSACTIONS_SQL = 'SELECT * FROM transactions WHERE sender_iban = ? OR recipient_iban = ?';
	
	
	public function __construct() {
		$this->db = DBConnection::getDb ();
	}
	
	public function transaction_history($iban, $key ,$perfix){
		
		$hashkey = hash('sha512', $key, true);
		
		$pstmt = $this->db->prepare ( self::GET_ACCOUNT_INFO_SQL );
		
		$pstmt->execute ( array ($iban , $iban) );
	
		$accounts = $pstmt->fetchAll ( PDO::FETCH_NUM );
		$result = array ();
		
		foreach ( $accounts as $account ) {
			$result [] = new Transactions( $account [0], $account [1], $account [2], $account [3], $account [4], $account [5], $account [6], $hashkey, $perfix);
		}
		if (!empty($result)) {
			return $result;
		}else {
			return false;
		}
	}
	
	
}