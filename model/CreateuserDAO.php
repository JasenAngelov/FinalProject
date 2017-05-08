<?php
class CreateuserDAO {
	private $db;
	const CREATE_USER_SQL = 'INSERT INTO users (first_name, last_name, user_email, user_phone, login_name, login_pass) VALUES (?, ?, ?, ?, ?, ?)';
	const CREATE_ACCOUNT_SQL = 'INSERT INTO accounts (IBAN, curency, balance, users_id) VALUES (?, ?, ?, ?)';
	public function __construct() {
		$this->db = AdminDBconnection::getDb ();
	}
	public function create_user($info) {
		$func = new Control_functions ();
				
		/* Данните в $info са подредени както следва:
		 *
		 * $info[0] - Първо име.
		 * $info[1] - Фамилно име.
		 * $info[2] - E-mail.
		 * $info[3] - Телефон.
		 * $info[4] - Име за достъп.
		 * $info[5] - Парола.
		 * $info[6] - Първоначална сума.
		 * $info[7] - Вид на валутата.	
		 */
		
		$encInfo = array ();		
		foreach ( $info as $value ) {			
			$encInfo[] = $this->encrypt ( $value );
		}
		
		$hashUsername = hash ( 'sha256', $info[4], true );
		
		$options = [ 
				'cost' => 15 
		];
		$hashPass = password_hash ( $info[4], PASSWORD_BCRYPT, $options );
		
		//Добасяне на паролата и името за достъп към масивът, който ще се използва за SQL заявката.
		$encInfo_sql1 = array_slice($encInfo, 4);
		$encInfo_sql1[4] = $hashUsername;
		$encInfo_sql1[5] = $hashPass;
		
		
		
		// Започване на транзакцията!
		
		$this->db->beginTransaction ();
		
		$pstmt = $this->db->prepare ( self::CREATE_USER_SQL );
		$pstmt->execute ( $encInfo_sql1);
		
		$user_id = $this->db->lastInsertId ();
		
		// Генериране на уникален IBAN
		
		$randN = rand ( 100000000, 999999999 );
		$accaoutNumber = str_pad ( $user_id, 10, $randN, STR_PAD_RIGHT );
		$generator = new IBANGenerator ( $accaoutNumber );
		$iban = $generator->generate ();
		
		// Край на генерирането
		
		$encIBAN = $this->encrypt ( $iban );
		
		$pstmt = $this->db->prepare ( self::CREATE_ACCOUNT_SQL );
		$pstmt->execute ( array (
				$encIBAN,
				$info[7],
				$encInfo[6],
				$user_id 
		) );
		
		// Завършване на транзакцията!
		
		$outputInfo = $this->db->commit ();
		
		return $outputInfo;
	}
	private function encrypt($data) {
		$key = file_get_contents ( 'C:\xampp\htdocs\FinalProject\db__credentials\key.txt' );
		$iv = file_get_contents ( 'C:\xampp\htdocs\FinalProject\db__credentials\iv.txt' );
		
		return openssl_encrypt ( $data, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv );
	}
}







