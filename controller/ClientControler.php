<?php

function __autoload($className){
	require_once '../model/' .$className.".php";
}


session_start();




	$dao = new AccountDAO();
	
	
