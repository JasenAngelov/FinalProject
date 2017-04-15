<?php
session_start ();
function __autoload($className) {
	require_once '../model/' . $className . ".php";
}

if (isset ( $_POST ['submith'] )) {
	if (! empty ( $_POST ['userName'] )) {
		
		$loggin_name = htmlentities ( trim ( $_POST ['userName'] ) );
		$dao = new LoginDAO ();
		$_SESSION ['log_ini'] = $dao->request_info ( $loggin_name );
		$_SESSION ['userName'] = $_POST ['userName'];
		
		http_response_code ( 200 );
		header ( 'Location: ../view/Login.php' );
		
	} else {
		$_SESSION ['error'] = 'Полето не може да бъде празно!';
		http_response_code ( 401 );
		header ( 'Location: ../view/BurkanPlus.php' );
	}
}











