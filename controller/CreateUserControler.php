<?php

session_start ();
function __autoload($className) {
	require_once '../model/' . $className . ".php";
}
$check = new Control_functions ();
$check->Check_connection_protocol ();
$check->Admin_check_session_time ();
$check->IssAdminLoged ();
$flag = true;
try {
	if (isset ( $_POST ["valid_req"] ) && ! array_search ( "", $_POST )) {
		
		// Създаване на обект от масива POST за по-лесна обработка на данните
		
		$class = new stdClass ();
		foreach ( $_POST as $key => $value ) {
			$class->$key = htmlentities(trim($value));
		}
		
		// Проверка на валидността на паролата и името
		
		if (($class->username === $class->username_check) && ($class->pass === $class->pass_check) && $class->initial_amount >= 0) {
			
			$dao = new CreateuserDAO ();
			/* Данните в $info трябва да са подредени както следва:
			 * 
			 * 
			 * $info[0] - Първо име.
			 * $info[1] - Фамилно име.
			 * $info[2] - E-mail.
			 * $info[3] - Телефон.
			 * $info[4] - Име за достъп.
			 * $info[5] - Парола.
			 * $info[6] - Първоначална сума.
			 * $info[7] - Вид на валутата.			 	
			 */
			
			$info = array($class->first_name, $class->last_name, $class->client_email, $class->client_phone, $class->username, $class->pass, $class->initial_amount, $class->currency_id);
			
			
			$result = $dao->create_user ( $info );
			
			if ($result) {				
				$_SESSION ['responseMSG'] = "Успешно създадохте нов Клиент!";
				$flag = true;
			} else {				
				$_SESSION ['responseMSG'] = "Нещо се обърка, проверете дали вече няма такъв клиент!";
				$flag = false;
			}
		} else {
			$_SESSION ['responseMSG'] = "Моля проверете входните си данни и опитайте пак!";
			$flag = false;
		}
	} else {
		$_SESSION ['responseMSG'] = "Ne minava proverkata";
		$flag = false;
	}
	if ($flag){
		http_response_code ( 200 );
		header ( "Location: ../view/create-user.php" );
		exit ();
	}else {
		http_response_code ( 403 );
		header ( "Location: ../view/create-user.php" );
		exit ();
	}
	
} catch ( PDOException $e ) {
	
	if ($e->errorInfo[1] = 1062) {
		$_SESSION ['responseMSG'] = "Вече съществува такъв клиент!";
	}
	
	http_response_code ( 403 );
	header ( "Location: ../view/create-user.php" );
	exit ();
}

?>