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
		
		$ufirstName= htmlentities ( trim ($firstName) );
		$ulastName= htmlentities ( trim ($lastName) );
		$uemail = htmlentities ( trim ($email) );
		$uphone = htmlentities ( trim ($phone) );		
		$username = htmlentities ( trim ($loginName) );
		$userpass = htmlentities ( trim ($loginPass) );
		
		$key = $username . $userpass;
		
		$key = hash('sha256', $key, true);
		$hashLoginName = hash('sha256', $username, true);
		$options = [
				'cost' => 15,
		];
		$hashPassword = password_hash($userpass, PASSWORD_BCRYPT, $options);
		
		$iv = openssl_random_pseudo_bytes(16);		
		$password = $iv . $key;
		
		$longIV = $iv . openssl_random_pseudo_bytes(16);
		
		$encFname = openssl_encrypt($ufirstName, 'AES-256-CBC', $password, OPENSSL_RAW_DATA, $iv);
		$encLname = openssl_encrypt($ulastName, 'AES-256-CBC', $password, OPENSSL_RAW_DATA, $iv);
		$encEmail = openssl_encrypt($uemail, 'AES-256-CBC', $password, OPENSSL_RAW_DATA, $iv);
		$encPhone = openssl_encrypt($uphone, 'AES-256-CBC', $password, OPENSSL_RAW_DATA, $iv);		
		
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
$us->create_user('Dobri', 'Ivanov', 'Dobri@abv.bg', '0144100', 'Dobri123', '772517');


