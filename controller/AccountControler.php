<?php
/**
 * Контролерът проверява дали има такъв юзернейм (с викането на LoginDAO) ако има ще направи проверка на паролата, 
 * ако съвпада ще създаде клас Акаунт, който ще се запази в сесията, ако входните данни са грешни, ще върне към логин пейджа
 * и ще генерира грешка "Грешно име или парола", която ще се запази в сесията и ще се покаже на юзера. * 
 * 
 */
session_start ();
function __autoload($className) {
	require_once '../model/' . $className . ".php";
}
$check = new Control_functions ();
$check->Check_connection_protocol ();
try {
	if (isset ( $_POST ['submit'] )) {
		if (mb_strlen ( $_POST ['userName'] ) > 0 && mb_strlen ( $_POST ['pwd'] ) > 0) {
			$username = htmlentities ( trim ( $_POST ['userName'] ) );
			$userpass = htmlentities ( trim ( $_POST ['pwd'] ) );
			$key = $username . $userpass;
			
			if (isset ( $username )) {
				$dao = new LoginDAO ();
				$info = $dao->request_info ( $username );
			}
			if (is_object ( $info )) {
				
				$dao = new AccountDAO ();
				$accounts = $dao->request_info ( $info->username, $info->password, $key );
				
				$_SESSION ['acount'] = $accounts;
			}
			
		} else {
			$_SESSION ['error'] = "Моля въведете коректни данни!";
			http_response_code ( 401 );
			header ( "Location: ../view/BurkanPlus.php" );
			exit ();
		}
	}else {
		$_SESSION ['error'] = "Моля влезте в профила си!";
		http_response_code ( 401 );
		header ( "Location: ../view/BurkanPlus.php" );
		exit ();
	}
}
 catch ( Exception $e ) {
	$_SESSION ['error'] = $e->message;
	http_response_code ( 401 );
	header ( "Location: ../view/BurkanPlus.php" );
	exit ();
 }

?>