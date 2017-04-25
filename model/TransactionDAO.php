<?php
class TransactionDAO {
	private $db;
	
	const GET_ALL_TRANSACTIONS_SQL = 'SELECT * FROM transactions WHERE sender_iban = ? OR recipient_iban = ?';
	
	const MAKE_TRANSACTION_SQL = 'INSERT INTO transactions (sender_iban, date, sum, recipient_iban) VALUES (?, ?, ?, ?)';
	
	public function __construct() {
		$this->db = DBConnection::getDb ();
	}
	
	public function transaction_history($iban, $key ,$perfix){
		
		$hashkey = hash('sha512', $key, true);
		
		$pstmt = $this->db->prepare ( self::GET_ALL_TRANSACTIONS_SQL);
		
		$pstmt->execute ( array ($iban , $iban) );
	
		$accounts = $pstmt->fetchAll ( PDO::FETCH_NUM );
		$result = array ();
		
		foreach ( $accounts as $account ) {
			$result [] = new Transactions( $account [0], $account [1], $account [2], $account [3], $account [4], $account [5],  $hashkey, $perfix);
		}
		if (!empty($result)) {
			return $result;
		}else {
			return false;
		}
	}
	public function createTransaction($recipientIBAN, $sum){
		
		$info = $_SESSION['account'];
		$key = $_SESSION['key'];
		
		$hashkey = hash('sha512', $key, true);
		$iv = $info->perfix;		
		$userIBAN = $info->IBAN;
		$timestamp = date('Y-m-d H:i:s');
		
		$encSUM = openssl_encrypt ( $sum, 'AES-256-CBC', $hashkey, OPENSSL_RAW_DATA, $iv );
		$encSenderIBAN = openssl_encrypt ( $userIBAN, 'AES-256-CBC', $hashkey, OPENSSL_RAW_DATA, $iv );
		$encTimestamp = openssl_encrypt ( $timestamp, 'AES-256-CBC', $hashkey, OPENSSL_RAW_DATA, $iv );
		$encRecipientIBAN = openssl_encrypt ( $recipientIBAN, 'AES-256-CBC', $hashkey, OPENSSL_RAW_DATA, $iv );
		
		$pstmt = $this->db->prepare ( self::MAKE_TRANSACTION_SQL);
		
		$result = $pstmt->execute ( array ($encSenderIBAN , $encTimestamp, $encSUM, $encRecipientIBAN) );
		
		if ($result){
			return true;
		}else {
			return false;
		}
		
	}
	
	
}