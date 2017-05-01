<?php
session_start ();
function __autoload($className) {
	require_once '../model/' . $className . ".php";
}
$check = new Control_functions ();
$check->Check_connection_protocol ();

$_SESSION['logged_in_time'] = time();

if (isset ( $_SESSION ['error'] )) {
	$error = $_SESSION ['error'];
	unset ( $_SESSION ['error'] );
} else {
	$error = '';
}

$mesage = "<div class='ui-state-error-text'>$error</div>";



?>



<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Burkan Bank Plus</title>
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<meta name="keywords"
	content="Burkan Bank online, Burkan Bank, онлайн банкиране, електронно банкиране, банка, интернет, защита, сигурност, токен, информация, сметка, извлечение, валутен курс, валутни курсове, обмяна, Виза, МастърКард ">
<meta name="description"
	content="Портал за онлайн банкиране, Online banking portal">
<meta name="author" content="Jasen Angelov ">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="./assets/css/flaticon.css">
<link type="image/x-icon"
	href="https://transact.bacbplus.bg/images/fav2icon.ico" rel="Icon">
<link type="text/css" rel="stylesheet" href="./assets/css/login.css">
<link href="./assets/css/preloader.css" rel="stylesheet" type="text/css">
</head>
<body>
	<form id="m_Form" method="post" name="submit" action="../controller/CreateUserControler.php" style="margin: 0px">
		<div id="container" class="login">
			<div id="content" class="clearfix">
				<div id="main" role="main" class="wide">
					<section>
						<div class="login_wrap">
							<div class="login-container">
								<div class="login-drop">
									<div class="login-heading">
										Вход в <strong> Админ Plus </strong><input type="hidden"
											name="processlogin" value="true">
									</div>
									<?php echo "<strong>$mesage</strong>"?>
									<div class="clearfix">
										<div class="column-left">
											<div class="login-input-group">
												<label for="userName"> Потребител </label><input
													class="input-control valid" type="text" id="userName"
													tabindex="0" size="33" name="userName" autocomplete="off"
													maxlength="32" value="">
											</div>
											<div class="login-input-group">
												<label for="pwd"> Парола </label><input type="password"
													class="input-control" id="pwd" size="33" tabindex="0"
													name="pwd" autocomplete="off">
											</div>
										</div>
									</div>
									<div class="login-drop-footer">
										<div class="login-btns">
											<button class="btn" type="submit" name="submit"  onclick="">вход</button>
										</div>
										<div class="mini-text">Всички транзакции са защитени
											посредством 256-bit SSL криптиране</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>		
	</form>
	<script type="text/javascript" src="./assets/js/functions.js"></script>
	<script src="./assets/js/preloader.js"></script>
</body>
</html>