<?php
function __autoload($className){
	require_once '../model/' .$className.".php";
}


class CreateuserDAO {
	private $db;
	
	const CREATE_USER_SQL = 'INSERT INTO burkanbank.users (first_name, last_name, user_email, user_phone, login_name, login_pass, perfix) VALUES (?, ?, ?, ?, ?, ?, ?)';
	
	
	
	public function __construct() {
		$this->db = DBConnection::getDb ();
	}
	public function create_user($firstName, $lastName, $email, $phone, $loginName, $loginPass) {
		$username = htmlentities ( trim ($loginName) );
		$userpass = htmlentities ( trim ($loginPass) );
		
		$key = $username . $userpass;
		
		$key = hash('sha256', $key, true);
		$hashLoginName = hash('sha256', $loginName, true);
		$options = [
				'cost' => 15,
		];
		$hashPassword = password_hash($loginPass, PASSWORD_BCRYPT, $options);
		
		$iv = openssl_random_pseudo_bytes(16);		
		$password = $iv . $key;
		
		$longIV = $iv . openssl_random_pseudo_bytes(16);
		
		$encFname = openssl_encrypt($firstName, 'AES-256-CBC', $password, OPENSSL_RAW_DATA, $iv);
		$encLname = openssl_encrypt($lastName, 'AES-256-CBC', $password, OPENSSL_RAW_DATA, $iv);
		$encEmail = openssl_encrypt($email, 'AES-256-CBC', $password, OPENSSL_RAW_DATA, $iv);
		$encPhone = openssl_encrypt($phone, 'AES-256-CBC', $password, OPENSSL_RAW_DATA, $iv);		
		
		$pstmt = $this->db->prepare ( self::CREATE_USER_SQL);
		$pstmt->execute ( array ($encFname, $encLname, $encEmail, $encPhone, $hashLoginName, $hashPassword, $longIV) );
		
		$info = $pstmt->columnCount();
				
		if ($info != 0) {
			return true;
		}else {
		return false;
		}
	}
}
$us = new CreateuserDAO();
$us->create_user('Ivan', 'Ivanov', 'abaaaav@abv.bg', '0144100', 'Iavan123', '772517');


