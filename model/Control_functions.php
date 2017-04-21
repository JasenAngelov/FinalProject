<?php
class Control_functions {
	public function Check_connection_protocol (){
		if($_SERVER['SERVER_PORT'] != 443)
		{
			echo  header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);			
		}
		
	}
}