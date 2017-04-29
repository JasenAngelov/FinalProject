<?php
session_start ();
function __autoload($className) {
	require_once '../model/' . $className . ".php";
}

$check = new Control_functions ();
$check->Check_connection_protocol ();

// Получаване на техническа информация от клиента
$dao = new TechnicalDAO ();
$_SESSION ['tech_info'] = $dao->request_info ();

if (isset ( $_SESSION ['error'] )) {
	$error = $_SESSION ['error'];
	unset ( $_SESSION ['error'] );
} else {
	$error = '';
}

$mesage = "<div class='ui-state-error-text'>$error</div>";

define ( 'Footer', TRUE );

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

	<form id="m_Form" method="post" style="margin: 0px"
		action="../controller/AccountControler.php">
		<div id="container" class="login">
			<div id="content" class="clearfix">
				<div id="main" role="main" class="wide">
					<section class="contentarea"></section>
					<input type="hidden" name="userTime" id="userTime">
					<section>
						<div class="login_wrap">
							<div class="login-container">
								<div class="login-logo">
									<img src="./" alt="Burcan Plus">
								</div>
								<div class="login-drop">
									<div class="login-heading">
										Вход в <strong> Burkan Bank Plus </strong><input type="hidden"
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
											<div class="login-checkbox-list">
												<div class="login-input-group checkbox-group">
													<input type="checkbox" id="IsLoginETAN" name="LoginETAN"><label
														for="IsLoginETAN" class="check bind"><span
														class="pseudo-checkbox"></span> Парола от Е-ТАН </label><span
														class="hint"
														title="Това е уникална, еднократно използваема, 8-разрядна цифрова комбинация, представляваща парола за идентификация. Моля изберете Генерирай и после въведете получената като SMS парола.">?</span>
													<p class="passphrase note bind"
														data-bind="visible: Data.ETANLoginHelpVisible"
														style="display: none;">
														Вход в системата е възможен единствено при Е-ТАН,
														регистриран като текущо активно средство за сигурност . <a
															id="btnETAN" href="javascript:void(0)" onclick="">
															Генерирай </a>
													</p>
												</div>
											</div>
											<!--CAPTCHA-->
											<!--CAPTCHA-->
											<div class="login-links">
												<a class="show-dialog" id="passwordDialog" href="#">
													Забравена парола ? </a>
											</div>
										</div>
										<div class="column-right">


											<div class="login-badge">
												<!--SSL Serticicates-->

											</div>
										</div>
									</div>
									<div class="login-drop-footer">
										<div class="login-btns">
											<button class="btn" type="submit" name="submit">вход</button>
										</div>
										<div class="mini-text">Всички транзакции са защитени
											посредством 256-bit SSL криптиране</div>
									</div>
								</div>
							</div>
							<div>
								<p class="clearfix">
									<input type="hidden" name="returnToUrl" value="">
								</p>
								<div class="login_wrap" style="display: none;" id="dialogText">
									<div class="login_container" id="dialogInner"></div>
								</div>

							</div>
						</div>
						<!--ADDITIONAL_MESSAGE-->
						<!--/////ADDITIONAL_MESSAGE-->
					</section>
					<div class="dialog-container"></div>
				</div>
			</div>
		</div>



		<?php
		include './footer.php';
		?>
	</form>
	<div id="forgoten" style="display: none">
		<form action="" method="post">
			<div id="forgotPassword" class="pmt_doc_wrap">

				<div
					class="ui-dialog ui-widget ui-widget-content ui-corner-all dialogfooter"
					tabindex="-1" role="dialog" aria-labelledby="ui-dialog-title-1"
					style="display: block; z-index: 1002; outline: 0px; height: auto; width: 650px; top: 222px; left: 375.5px;">
					<div
						class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
						<span class="ui-dialog-title" id="ui-dialog-title-1">Забравена
							парола</span><a href="#"
							class="ui-dialog-titlebar-close ui-corner-all" role="button"><span
							class="ui-icon ui-icon-closethick">close</span></a>
					</div>
					<div class="ui-dialog-content ui-widget-content"
						style="width: auto; min-height: 0px; height: 196px;" scrolltop="0"
						scrollleft="0">



						<p class="note" style="padding: 1em; text-align: justify;">В
							случай на забравена парола, тя може да бъде сменена онлайн чрез
							подаване на долната заявка и подписването й с КЕП, Е-ТАН или
							парола от дисплей карта. В случай, че нямате регистрирано активно
							средство за сигурност, за да смените Вашата парола е необходимо
							да посетите лично офис на банката.</p>


						<fieldset class="col2">

							<div class="column">

								<label for="Name"> Потребител <span>*</span>




								</label> <input class="input-validation-margin valid" id="Name"
									name="Name" type="text">

								<div>
									<span class="field-validation-valid"></span>

								</div>


							</div>

							<div class="column">
								<label style="white-space: nowrap"> Средство за сигурност * </label>
								<select id="SecurityDevice" name="SecurityDevice">
									<option selected="selected" value="5">Парола от Е-ТАН</option>
								</select>
							</div>
						</fieldset>

						<br style="clear: both;">

						<div class="btnfoot clearfix">

							<a id="cancel" class="cancel" tabindex="2"><span>Откажи</span></a>

							<a id="changePassword" title="потвърди" class="save" tabindex="1"><span>потвърди</span></a>
						</div>

						<div style="clear: both; line-height: 0px;">&nbsp;</div>

					</div>
				</div>

			</div>
		</form>
	</div>
	<script type="text/javascript" src="./assets/js/functions.js"></script>
	<script src="./assets/js/preloader.js"></script>
</body>
</html>