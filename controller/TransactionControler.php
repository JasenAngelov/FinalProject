<?php
session_start ();
function __autoload($className) {
	require_once '../model/' . $className . ".php";
}

$check = new Control_functions ();
$check->Check_connection_protocol ();
$check->Check_session_time ();

if (isset ( $_POST ['valid_req'] ) && isset ( $_SESSION ['account'] )) {
	
	$account = $_SESSION ['account'];
	
	// Създаване на обект от масива POST за по-лесна обработка на данните!
	
	$tInfo = new stdClass ();
	foreach ( $_POST as $key => $value ) {
		$tInfo->$key = htmlentities ( trim ( $value ) );
	}
	
	if ($account->IBAN === $tInfo->PayerIBAN && is_numeric ( $tInfo->Amount ) && $tInfo->Amount > 0) {
		
		$dao = new TransactionDAO ();
		/*
		 * Входните данни трябва да са подредени както следва:
		 *
		 * $encInfo[0] - IBAN на наредителя.
		 * $encInfo[1] - Дата и час.
		 * $encInfo[2] - Сума на транзакцията.
		 * $encInfo[3] - IBAN на получателят.
		 * $encInfo[4] - Основание за превод.
		 * $encInfo[5] - Допълнително основание за превод.
		 * $encInfo[6] - Имена на получателя (Първо и Фамилно, разделени с разстояние).
		 * $encInfo[7] - Тип на транзакцията (РИНГС, БИСЕРНА).
		 */
		
		$name = $tInfo->payee_fName . " " . $tInfo->payee_lName;
		$timestamp = date ( 'Y-m-d H:i:s' );
		
		$info = array (
				$tInfo->PayerIBAN,
				$timestamp,
				$tInfo->Amount,
				$tInfo->recipientIBAN,
				$tInfo->reason,
				$tInfo->aditional_reason,
				$name,
				$tInfo->Type 
		);
		
		$result = $dao->createTransaction ( $info );
		
		$transactions = $dao->transaction_history ( $account->IBAN );
		$_SESSION ['transaction'] = $transactions;
		
	} else {
		echo 'Моля проверете си входните данни!';
	}
} else {
	die ( 'Нямате директен достъп!' );
}

