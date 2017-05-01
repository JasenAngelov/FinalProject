
<?php
if (isset($_SESSION['admin_log'])) {
	
	session_destroy();
	session_gc();
	
	session_start();
	$_SESSION['error'] = 'Успешно излизане!';
	http_response_code ( 200 );
	header ( "Location: ../view/admin-login.php" );
	exit ();
}else {
	die('Нямате директен достъп!');
};
?>