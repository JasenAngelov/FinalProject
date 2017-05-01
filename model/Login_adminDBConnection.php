<?php

class Login_adminDBConnection{
	private static $db = null;
	const DB_HOST = 'localhost';
	const DB_NAME = 'bank_administration';
	const DB_USER = 'admin';
	public static function getDb() {
		if (self::$db === null) {
			try {
				
				$pass = trim ( file_get_contents ( 'C:\xampp\htdocs\FinalProject\db__credentials\admin-pass.txt' ) );
				
				self::$db = new PDO ( "mysql:host=" . self::DB_HOST . ";dbname=" . self::DB_NAME, self::DB_USER, $pass );
				self::$db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			} catch ( PDOException $e ) {
				
				throw new Exception($e);
			}
		}
		
		return self::$db;
	}
}
?>