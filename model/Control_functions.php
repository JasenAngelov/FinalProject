<?php
class Control_functions {
	public function Check_connection_protocol (){
		if($_SERVER['SERVER_PORT'] != 443)
		{
			echo  header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);			
		}
		
	}
	
	public function errorMessage_and_header($message){
		
		 function ($message){
			return $_SESSION ['error'] = $message;
		};
		 function (){
			return http_response_code ( 401 );
		};
		 function (){
			return header ( "Location: ../view/BurkanPlus.php" );
		};
	}
}