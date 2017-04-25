<?php
// function __autoload($className) {
// 	require_once '../model/' . $className . ".php";
// }
class CreateuserDAO {
	private $db;
	
	const CREATE_USER_SQL = 'INSERT INTO users (first_name, last_name, user_email, user_phone, login_name, login_pass, perfix) VALUES (?, ?, ?, ?, ?, ?, ?)';
	
	const CREATE_ACCOUNT_SQL = 'INSERT INTO accounts (IBAN, curency, balance, users_id) VALUES (?, ?, ?, ?)';
	
	public function __construct() {
		$this->db = DBConnection::getDb ();
	}
	public function create_user($firstName, $lastName, $email, $phone, $loginName, $loginPass, $currency, $balance) {
		$func = new Control_functions();
		
		
		$ufirstName = htmlentities ( trim ( $firstName ) );
		$ulastName = htmlentities ( trim ( $lastName ) );
		$uemail = htmlentities ( trim ( $email ) );
		$uphone = htmlentities ( trim ( $phone ) );
		$username = htmlentities ( trim ( $loginName ) );
		$userpass = htmlentities ( trim ( $loginPass ) );
		$balance= htmlentities ( trim ( $balance) );
		$currency= htmlentities ( trim ( $currency) );
		$currencyCod = $func->getCurrencyCode($currency);
		
		$key = $username . $userpass;
		
		$key = hash ( 'sha512', $key, true );
		$hashLoginName = hash ( 'sha256', $username, true );
		$options = [ 
				'cost' => 15 
		];
		$hashPassword = password_hash ( $userpass, PASSWORD_BCRYPT, $options );
		
		$iv = openssl_random_pseudo_bytes ( 16 );
		$password = $iv . $key;
		
		$longIV = $iv . openssl_random_pseudo_bytes ( 16 );
		
		$encFname = openssl_encrypt ( $ufirstName, 'AES-256-CBC', $password, OPENSSL_RAW_DATA, $iv );
		$encLname = openssl_encrypt ( $ulastName, 'AES-256-CBC', $password, OPENSSL_RAW_DATA, $iv );
		$encEmail = openssl_encrypt ( $uemail, 'AES-256-CBC', $password, OPENSSL_RAW_DATA, $iv );
		$encPhone = openssl_encrypt ( $uphone, 'AES-256-CBC', $password, OPENSSL_RAW_DATA, $iv );
		$encBalance = openssl_encrypt ( $balance, 'AES-256-CBC', $password, OPENSSL_RAW_DATA, $iv );
// 		$encCurrency = openssl_encrypt ( $currency, 'AES-256-CBC', $password, OPENSSL_RAW_DATA, $iv );
		
		
		
		
		
		//Започване на транзакцията!
		
		$this->db->beginTransaction();
		
		$pstmt = $this->db->prepare ( self::CREATE_USER_SQL );
		$pstmt->execute ( array (
				$encFname,
				$encLname,
				$encEmail,
				$encPhone,
				$hashLoginName,
				$hashPassword,
				$longIV 
		) );
		
		$user_id = $this->db->lastInsertId();
		$randN = rand(100000000, 999999999);
		$iban = str_pad($user_id, 10, $randN, STR_PAD_RIGHT);
		
		$encIBAN = openssl_encrypt ( $iban, 'AES-256-CBC', $password, OPENSSL_RAW_DATA, $iv );
		
		
		
		
		$pstmt = $this->db->prepare ( self::CREATE_ACCOUNT_SQL );		
		$pstmt->execute(array($encIBAN, $currencyCod, $encBalance, $user_id ));		
		
		//Завършване на транзакцията!
		
		$this->db->commit();
		
		
		
		$info = $pstmt->columnCount ();
		
		if ($info != 0) {
			return true;
		} else {
			return false;
		}
	}
}
// $us = new CreateuserDAO();
// $us->create_user('Dobri', 'Ivanov', 'Dobraai@abv.bg', '0144100', 'Dobriaa123', '772517', 'BGN', '150');




