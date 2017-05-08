<?php
class TransactionDAO {
	private $db;
	const GET_ALL_TRANSACTIONS_SQL = 'SELECT * FROM transactions WHERE sender_iban = ? OR recipient_iban = ?';
	const MAKE_TRANSACTION_SQL = 'INSERT INTO transactions (sender_iban, date, sum, recipient_iban, reason, aditional_reason, recipient_name, type) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
	const UPDATE_BALLANCE_SQL = 'UPDATE accounts SET balance=? WHERE users_id= ?; ';
	public function __construct() {
		$this->db = DBConnection::getDb ();
	}
	public function transaction_history($iban) {
		$ecnIban = $this->encrypt ( $iban );
		$pstmt = $this->db->prepare ( self::GET_ALL_TRANSACTIONS_SQL );
		$pstmt->execute ( array (
				$ecnIban,
				$ecnIban 
		) );
		
		$accounts = $pstmt->fetchAll ( PDO::FETCH_NUM );
		$result = array ();
		
		foreach ( $accounts as $account ) {
			
			$result [] = new Transactions ( $account );
		}
		
		if (! empty ( $result )) {
			return $result;
		} else {
			return "Все още нямате транзакции!";
		}
	}
	
	public function createTransaction($info) {
		$accInfo = $_SESSION ['account'];
		$currentBalance = $accInfo->balance;
		$id = $accInfo->id;		
		$updatedBalance = $currentBalance - $sum;
		$encUdatedBalance = $this->encrypt($updatedBalance);
		
		$encInfo = array();
		
		// Кодиране на входните данни
		
		foreach ($info as $value){
			if (!empty($value)){
			$encInfo[] = $this->encrypt($value);
			}else {
				$encInfo[] = null;
			}
		}
			
		/* Входните данни са подредени както следва:
		 * 
		 * $encInfo[0] - IBAN на наредителя.
		 * $encInfo[1] - Дата и час.
		 * $encInfo[2] - Сума на транзакцията.
		 * $encInfo[3] - IBAN на получателят.
		 * $encInfo[4] - Основание за превод.
		 * $encInfo[5] - Допълнително основание за превод.
		 * $encInfo[6] - Имена на получателя (Първо и Фамилно, разделени с разстояние).
		 * $encInfo[7] - Тип на транзакцията (РИНГС, БИСЕРНА).
		 */
	
		
				
		
		
		$updatedBalance = $currentBalance - $sum;
		if ($updatedBalance > 0) {
			
			$this->db->beginTransaction ();
			
			//Създаване на нова транзакция
			
			$pstmt = $this->db->prepare ( self::MAKE_TRANSACTION_SQL );
			$pstmt->execute ( $encInfo );
			
			/*Осъвременяване на баланса на клиента (Тъй като баланса е в кодирана форма на DB сървъра, не мо же да се използва аритметика в реално време.
			 * вероятно е по-добре баланса да не се кодира, за да може да се обработва в DB).
			 */
						
			$pstmt = $this->db->prepare ( self::UPDATE_BALLANCE_SQL );			
			$pstmt->execute ( array (
					$encUdatedBalance,
					$id 
			) );
			
			$result = $this->db->commit ();
						
			
		} else {
			$result = false;
		}
		$_SESSION ['account']->balance = $updatedBalance;
		if ($result) {
			$_SESSION ['message'] = 'Успешно направихте плащане!';
			http_response_code ( 200 );
			header ( "Location: ../view/inner.php" );
			exit ();
		} else {
			$_SESSION ['message'] = 'Имаше проблем с ранзакцията!';
			http_response_code ( 403 );
			header ( "Location: ../view/inner.php" );
			exit ();
		}
	}
	private function encrypt($data) {
		$key = file_get_contents ( 'C:\xampp\htdocs\FinalProject\db__credentials\key.txt' );
		$iv = file_get_contents ( 'C:\xampp\htdocs\FinalProject\db__credentials\iv.txt' );
		
		$value = openssl_encrypt ( $data, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv );
		
		return $value;
	}
}





