<?php
session_start ();
function __autoload($className) {
	require_once '../model/' . $className . ".php";
}
$account_info = $_SESSION ['account'];
$transaction_info = $_SESSION ['transaction'];
$tech_info = $_SESSION ['tech_info'];

if (isset ( $_REQUEST ['user_account'] )) {
	$json = json_decode ( $_REQUEST ['user_account'] );
	if ($json->session_num != session_id ()) {
		echo "fuck!";
	} else {
		
		$info = array (
				'name' => $account_info->first_name ." ".$account_info->last_name,
				
				'iban' => $account_info->IBAN 
		);
		
		echo json_encode ( $info );
	}
} else {
	die ( "Нямате директен достъп!" );
}



















