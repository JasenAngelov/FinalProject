<?php
if (isset($_SESSION['account'])) {
	
	session_destroy();
	session_gc();
	
	session_start();
	$_SESSION['error'] = 'Успешно излизане!';
	http_response_code ( 200 );
	header ( "Location: ../view/BurkanPlus.php" );
	exit ();
}else {
	http_response_code ( 403 );
	header ( "Location: ../view/BurkanPlus.php" );
	exit ();
};
?>