<?php


/**
 * Клас който се занимава с техническата информация на клиент. Взема му IPто и го записва в базата данни, след това с него може да се следи,
 * дали клиента има въвеждани грешни пароли с цел да се избегне Brute force atack!!!
 */    



class TechnicalDAO {
	private $db;
	
	
	const GET_TECH_INFO_SQL = 'SELECT * FROM burkanbank.technical_data WHERE ip = ?';	
	const UPDATE_TECH_DATA_SQL = 'UPDATE burkanbank.technical_data SET atempts = atempts+?, last_atempt = ? WHERE ip= ?';
	const INSERT_NEW_IP_SQL = 'INSERT INTO burkanbank.technical_data (ip, atempts, last_atempt) VALUES (?,?,?)';
	
	
	public function __construct() {
		$this->db = DBConnection::getDb ();
	}
	
	
	public function request_info() {
		$user_ip = $_SERVER ['REMOTE_ADDR'];
		$ip_exist = true;
		
		$pstmt = $this->db->prepare ( self::GET_TECH_INFO_SQL );
		$pstmt->execute ( array (
				$user_ip 
		) );
		$info = $pstmt->fetch ( PDO::FETCH_ASSOC );
		
		if (! empty ( $info )) {
			return new Technical_info ( $user_ip, $ip_exist, $info ['atempts'], $info ['last_atempt'] );
		}
		$ip_exist = false;
		return new Technical_info ( $user_ip, $ip_exist );
	}
	
	
	public function update_atempts($user_ip, $atempts = 1) {
		$time = time ();
		$pstmt = $this->db->prepare ( self::UPDATE_TECH_DATA_SQL );
		$result = $pstmt->execute ( array (
				$atempts,
				$time,
				$user_ip 
		) );
		
		if (! $result) {
			throw new Exception ( "We are expiriencing tempoary technical problem! Please try later!", $e );
		} else {
			return $pstmt->rowCount ();
		}
	}
	
	
	public function insert_new_ip() {
		$ip = $_SERVER['REMOTE_ADDR'];
		$atempts = 0;
		$time = time ();
		$pstmt = $this->db->prepare ( self::UPDATE_TECH_DATA_SQL );
		$result = $pstmt->execute ( array (
				$ip,
				$atempts,
				$time
		) );
		
		if (! $result) {
			throw new Exception ( "We are expiriencing tempoary technical problem! Please try later!", $e );
		} else {
			return $pstmt->rowCount ();
		}
	}
}



