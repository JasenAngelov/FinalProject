<?php

class DBConnection {
	private static $db = null;
	const DB_HOST = 'localhost';
	const DB_NAME= 'BurkanBank';
	const DB_USER= 'root';
	const DB_PASS= '';
	
	public static function getDb() {
		if (self::$db === null) {
			try {
				self::$db = new PDO ( "mysql:host=" . self::DB_HOST . ";dbname=" . self::DB_NAME, self::DB_USER, self::DB_PASS );
				self::$db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			}
			catch (PDOException $e) {
				throw new Exception("Databasata ne raboti!", $e);
			}
		}
		
		return self::$db;
	}
}
?>