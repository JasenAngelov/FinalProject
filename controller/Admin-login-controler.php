<?php
session_start ();
function __autoload($className) {
	require_once '../model/' . $className . ".php";
}
$check = new Control_functions ();
$check->Check_connection_protocol ();
$check->Admin_check_session_time();
$flag = true;

try {
	if (isset ( $_POST ['submit'] )) {
		
		if (mb_strlen ( $_POST ['userName'] ) > 0 && mb_strlen ( $_POST ['pwd'] ) > 0) {
			$username = htmlentities ( trim ( $_POST ['userName'] ) );
			$userpass = htmlentities ( trim ( $_POST ['pwd'] ) );
			$ip = $_SERVER ['REMOTE_ADDR'];
			
			$dao = new Admin_loginDAO ();
			
			// Проверка на данните (Прави запитване до DB за конкретно Име и Парола и ако са верни връща boolean!)
			
			if ($info = $dao->request_info ( $username, $userpass, $ip )) {
				
				$_SESSION ['admin_log'] = true;
				http_response_code ( 200 );
				header ( "Location: ../view/create-user.php" );
			} else {
				$flag = false;										
			}
		}else {
			$flag = false;			
		}
	}else {
		$flag = false;		
	}
	if (!$flag) {	
		$_SESSION ['admin_log'] = false;
		$_SESSION ['error'] = "Грешенo Име ли Парола!";	
		http_response_code ( 403 );
		header ( "Location: ../view/admin-login.php" );
		exit ();
	}
	
} catch ( Exception $e ) {
	$_SESSION ['error'] = $e->message;
	http_response_code ( 403 );
	header ( "Location: ../view/admin-login.php" );
	exit ();
}

?>