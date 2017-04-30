
<?php

/**
 * Контролерът проверява дали има такъв юзернейм (с викането на LoginDAO) ако има ще направи проверка на паролата,
 * ако съвпада ще създаде клас Акаунт, който ще се запази в сесията, ако входните данни са грешни, ще върне към логин пейджа
 * и ще генерира грешка "Грешно име или парола", която ще се запази в сесията и ще се покаже на юзера.
 * *
 */
session_start ();
function __autoload($className) {
	require_once '../model/' . $className . ".php";
}
$check = new Control_functions ();
$check->Check_connection_protocol ();

$_POST ['userName'] = "Dobriaa123";
$_POST ['pwd'] = "772517";
$_POST ['submit'] = true;

try {
	$error = '';
	$flag = false;
	
	if (isset ( $_POST ['submit'] )) {
		if (mb_strlen ( $_POST ['userName'] ) > 0 && mb_strlen ( $_POST ['pwd'] ) > 0) {
			$username = htmlentities ( trim ( $_POST ['userName'] ) );
			$userpass = htmlentities ( trim ( $_POST ['pwd'] ) );
			$key = $username . $userpass;
			
			//Първоначална проверка на данните (Прави запитване до DB за конкретен username, ако такъв съществува му взема хешираната парола)
			
			if (isset ( $username )) {
				$dao = new LoginDAO ();
				$info = $dao->request_info ( $username );
			}
			if (is_object ( $info )) {
				
				$hash = $info->password;
				
				$dao = new AccountDAO ();
				
				if ($dao->password_check ( $userpass, $info->password )) {
					
					$_SESSION ['logged_in_time'] = time ();
					
					$accounts = $dao->request_info ( $info->username, $info->password, $key );
					$_SESSION ['account'] = $accounts [0];
					$perfix = $accounts [0]->perfix;
					$iban = $accounts [0]->rawIban;
					
					// Създаване на обект, съдържащ информация за транзакциите на клиента (Ако клиента няма транзакции връща folse)
					
					$dao = new TransactionDAO ();
					$transactions = $dao->transaction_history ( $iban, $key, $perfix );
					$_SESSION ['transaction'] = $transactions;
				} else {
					$error = "Грешно име или парола!";
					$flag = true;
				}
			}
		} else {
			$error = "Моля въведете коректни данни!";
			$flag = true;
		}
	} else {
		$error = "Моля влезте в профила си!";
		$flag = true;
	}
	if ($flag) {
		$_SESSION ['error'] = $error;
		http_response_code ( 401 );
		header ( "Location: ../view/BurkanPlus.php" );
		exit ();
	}
	if (! $flag) {
		http_response_code ( 200 );
		header ( "Location: ../view/inner.php" );
		exit ();
	}
} catch ( Exception $e ) {
	echo $_SESSION ['error'] = $e->message;
	http_response_code ( 401 );
	header ( "Location: ../view/BurkanPlus.php" );
	exit ();
}

?>