<?php

class CreateuserDAO {
	private $db;
	const CREATE_USER_SQL = 'INSERT INTO users (first_name, last_name, user_email, user_phone, login_name, login_pass) VALUES (?, ?, ?, ?, ?, ?)';
	const CREATE_ACCOUNT_SQL = 'INSERT INTO accounts (IBAN, curency, balance, users_id) VALUES (?, ?, ?, ?)';
	public function __construct() {
		$this->db = AdminDBconnection::getDb ();
	}
	public function create_user($firstName, $lastName, $email, $phone, $loginName, $loginPass, $currency, $balance) {
		$func = new Control_functions ();
		
		$key = file_get_contents('C:\xampp\htdocs\FinalProject\db__credentials\key.txt');
		$iv = file_get_contents('C:\xampp\htdocs\FinalProject\db__credentials\iv.txt');	
		
		
		$ufirstName = htmlentities ( trim ( $firstName ) );
		$ulastName = htmlentities ( trim ( $lastName ) );
		$uemail = htmlentities ( trim ( $email ) );
		$uphone = htmlentities ( trim ( $phone ) );
		$username = htmlentities ( trim ( $loginName ) );
		$userpass = htmlentities ( trim ( $loginPass ) );
		$ubalance = htmlentities ( trim ( $balance ) );
		$ucurrency = htmlentities ( trim ( $currency ) );
		
		
		$hashLoginName = hash ( 'sha256', $username, true );
		$options = [ 
				'cost' => 15 
		];
		$hashPassword = password_hash ( $userpass, PASSWORD_BCRYPT, $options );
			
		$encFname = openssl_encrypt ( $ufirstName, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv );
		$encLname = openssl_encrypt ( $ulastName, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv );
		$encEmail = openssl_encrypt ( $uemail, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv );
		$encPhone = openssl_encrypt ( $uphone, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv );
		$encBalance = openssl_encrypt ( $ubalance, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv );
		$encCurrency = openssl_encrypt ( $ucurrency, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv );
		
		// Започване на транзакцията!
		
		$this->db->beginTransaction ();
		
		$pstmt = $this->db->prepare ( self::CREATE_USER_SQL );
		$pstmt->execute ( array (
				$encFname,
				$encLname,
				$encEmail,
				$encPhone,
				$hashLoginName,
				$hashPassword,				
		) );
		
		$user_id = $this->db->lastInsertId ();
		$randN = rand ( 100000000, 999999999 );
		$accaoutNumber = str_pad ( $user_id, 10, $randN, STR_PAD_RIGHT );
		
		$generator = new IBANGenerator ( $accaoutNumber );
		$iban = $generator->generate ();
				
		$encIBAN = openssl_encrypt ( $iban, 'AES-256-CBC', $key,  OPENSSL_RAW_DATA, $iv);
		
		$pstmt = $this->db->prepare ( self::CREATE_ACCOUNT_SQL );
		$pstmt->execute ( array (
				$encIBAN,
				$ucurrency,
				$encBalance,
				$user_id 
		) );
		
		// Завършване на транзакцията!
		
		$info = $this->db->commit ();
		
		return $info;
	}
}







