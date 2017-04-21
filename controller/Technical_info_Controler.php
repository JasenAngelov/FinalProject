<?php
session_start ();

function __autoload($className) {
	require_once '../model/' . $className . ".php";
}


if (!isset($_POST['burkan_plus'])) {
	try {
		$dao = new TechnicalDAO();
		$_SESSION['tech_info'] = $dao->request_info();
	} catch (Exception $e) {
		
	}	
	http_response_code ( 200 );
	header ( 'Location: ../view/BurkanPlus.php' );
	
}