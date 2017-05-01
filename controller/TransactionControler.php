<?php
session_start ();
function __autoload($className) {
	require_once '../model/' . $className . ".php";
}

$check = new Control_functions ();
$check->Check_connection_protocol ();
$check->Check_session_time ();


if (isset($_POST ['valid_req']) && isset($_SESSION['account'])) {
	
	$account = $_SESSION['account'];
		
	// Създаване на обект от масива POST за по-лесна обработка на данните!
		
	$tInfo = new stdClass ();
	foreach ( $_POST as $key => $value ) {
		$tInfo->$key = htmlentities ( trim ( $value) );
	}	
	
	if ($account->IBAN === $tInfo->PayerIBAN && is_numeric($tInfo->Amount) && $tInfo->Amount > 0 ) {		
		
		$name =  $tInfo->payee_fName ." ".$tInfo->payee_lName; 
		
		$dao = new TransactionDAO();		
		$result = $dao->createTransaction($tInfo->Amount, $tInfo->recipientIBAN, $tInfo->reason, $name, $tInfo->Type, $tInfo->aditional_reason);
		
		
		
		
	}else {
		echo 'Моля проверете си входните данни!';
	}
	
	
} else {
	die ( 'Нямате директен достъп!' );
}

