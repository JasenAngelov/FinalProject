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
		
		$info = new stdClass ();
		foreach ( $_POST as $key => $value ) {
			$info->$key = $value;
		}
		
		// Проверка на валидността на паролата и името
		
		if (($info->username === $info->username_check) && ($info->pass === $info->pass_check) && $info->initial_amount >= 0) {
			
			$dao = new CreateuserDAO ();
			$result = $dao->create_user ( $info->first_name, $info->last_name, $info->client_email, $info->client_phone, $info->username, $info->pass, $info->currency_id, $info->initial_amount );
			
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