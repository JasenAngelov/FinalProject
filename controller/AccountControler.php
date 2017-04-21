<?php
session_start();
function __autoload($className){
	require_once '../model/' .$className.".php";
}


if (isset($_SESSION['client'])) {
	$dao = new AccountDAO();
	$accounts = $dao->request_info($_SESSION['client']);
	
	$_SESSION['account'] =  $accounts;	
	
}else {
	return "You are not logged In!";
}

