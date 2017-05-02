<?php
class TransactionDAO {
	private $db;
	const GET_ALL_TRANSACTIONS_SQL = 'SELECT * FROM transactions WHERE sender_iban = ? OR recipient_iban = ?';
	const MAKE_TRANSACTION_SQL = 'INSERT INTO transactions (sender_iban, date, sum, recipient_iban, reason, aditional_reason, recipient_name, type) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
	const UPDATE_BALLANCE_SQL = '';
	public function __construct() {
		$this->db = DBConnection::getDb ();
	}
	public function transaction_history($iban) {		
		
		$key = file_get_contents('C:\xampp\htdocs\FinalProject\db__credentials\key.txt');
		$iv = file_get_contents('C:\xampp\htdocs\FinalProject\db__credentials\iv.txt');
		
		$ecnIban = openssl_encrypt($iban, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
		
		$pstmt = $this->db->prepare ( self::GET_ALL_TRANSACTIONS_SQL );
		
		$pstmt->execute ( array (
				$ecnIban,
				$ecnIban
		) );
		
		$accounts = $pstmt->fetchAll (PDO::FETCH_NUM);
		$result = array ();
		
		foreach ( $accounts as $account ) {			
		
			$result [] = new Transactions ( $account [0], $account [1], $account [2], $account [3], $account [4], $account [5], $account [6], $account [7], $account [8] );
		}
		
		if (! empty( $result )) {
			return $result;
		} else {
			return "Все още нямате транзакции!";
		}
	}
	public function createTransaction($sendIban ,$sum, $recipientIBAN, $reason, $recipientName, $type, $aditionalReason) {
		
		
		$key = file_get_contents('C:\xampp\htdocs\FinalProject\db__credentials\key.txt');
		$iv = file_get_contents('C:\xampp\htdocs\FinalProject\db__credentials\iv.txt');	
		
		
		$userIBAN = $sendIban;
		$timestamp = date ( 'Y-m-d H:i:s' );
		
		 //Кодиране на входните данни
		 
		$encSenderIBAN = openssl_encrypt ( $userIBAN, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
		$encTimestamp = openssl_encrypt ( $timestamp, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
		$encSUM = openssl_encrypt ( $sum, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);		
		$encRecipientIBAN = openssl_encrypt ( $recipientIBAN, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
		$encReason= openssl_encrypt ( $reason, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
		$encAditionalReason=($aditionalReason === '')? null : openssl_encrypt ( $aditionalReason, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv); 
		$encRecipientName= openssl_encrypt ( $recipientName, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
		$encType= openssl_encrypt ( $type, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
		
		$this->db->beginTransaction ();
		
		$pstmt = $this->db->prepare ( self::MAKE_TRANSACTION_SQL );
		$pstmt->execute ( array (
				$encSenderIBAN,
				$encTimestamp,
				$encSUM,
				$encRecipientIBAN,
				$encReason,
				$encAditionalReason,
				$encRecipientName,
				$encType
		) );
		
		
		
		$result =$this->db->commit();
		
		if ($result) {
			
			http_response_code ( 200 );
			header ( "Location: ../view/inner.php" );
			exit ();
		} else {
			
			http_response_code ( 403 );
			header ( "Location: ../view/inner.php" );
			exit ();
		}
	}
}





