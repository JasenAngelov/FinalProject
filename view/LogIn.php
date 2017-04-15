<?php
// -=-=-=-=-=--=-=-=-=--=-==--==-=-=Comming validation=-=-=-=-=-=-=-=---==-=-=-\\
session_start();
function __autoload($className) {
	require_once '../model/' . $className . ".php";
}


if (isset($_SESSION['userName'])){
	
	$userName = $_SESSION['userName'];
	
	if (isset($_SESSION['log_ini'])){
		
		$info = $_SESSION['log_ini'];
		
	}
}

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
<meta name="author" content="Jasen & Kaloyan">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="./assets/css/flaticon.css">
<link type="text/css" rel="stylesheet" href="./assets/css/login.css">
<link type="image/x-icon"
	href="https://transact.bacbplus.bg/images/fav2icon.ico" rel="Icon">
</head>
<body>

	<form id="m_Form" method="post" style="margin: 0px" action="">
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
						<div class="clearfix">
							<div class="column-left">
								<div class="login-input-group">
									<label for="userName"> Потребител </label><input
										class="input-control valid" type="text" id="userName"
										tabindex="0" size="33" name="userName" autocomplete="off"
										maxlength="32" value="<?php echo $userName?>">
								</div>
								<div class="login-input-group">
									<label for="pwd"> Парола </label><input type="password"
										class="input-control" id="pwd" size="33" tabindex="0"
										name="pwd" autocomplete="off">
								</div>
								<div class="login-checkbox-list">
									<div class="login-input-group checkbox-group">
										<input type="checkbox" id="IsLoginETAN" name="LoginETAN"
											data-bind="checked: Data.ETANLoginHelpVisible"><label
											for="IsLoginETAN" class="check bind"><span
											class="pseudo-checkbox"></span> Парола от Е-ТАН </label><span
											class="hint"
											title="Това е уникална, еднократно използваема, 8-разрядна цифрова комбинация, представляваща парола за идентификация. Моля изберете Генерирай и после въведете получената като SMS парола.">?</span>
										<p class="passphrase note bind"
											data-bind="visible: Data.ETANLoginHelpVisible"
											style="display: none;">
											Вход в системата е възможен единствено при Е-ТАН, регистриран
											като текущо активно средство за сигурност . <a id="btnETAN"
												href="javascript:void(0)"
												onclick="GenerateETAN($('#userName').val())"> Генерирай </a>
										</p>
									</div>
								</div>
								<!--CAPTCHA-->
								<!--CAPTCHA-->
								<div class="login-links">
									<a class="show-dialog" id="passwordDialog" href="#"> Забравена
										парола ? </a>
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
								<button class="btn" type="submit"
									onclick="setCurrentTime('userTime');">вход</button>
							</div>
							<div class="mini-text">Всички транзакции са защитени посредством
								256-bit SSL криптиране</div>
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

		<footer id="footer">
			<div class="wrap" style="cursor: pointer">
				<ul>
					<li><span class="copyright">© BACB • 2017</span></li>
					<li><a target="_blank" class="userguide" href="">Потребителско
							ръководство</a></li>
					<li><a target="_blank" href="">Препоръки за сигурност</a></li>
					<li><div class="def_control_CurrentCCY">
							<span style="text-transform: uppercase"
								class="def_control_CurrentCCY">Валутни курсове:<span
								class="flaticon-storage"></span> &nbsp;EUR 1.955830&nbsp; USD
								1.834570&nbsp; GBP 2.293960&nbsp;
							</span>

						</div></li>
					<li><a class="userguide">EN</a></li>
				</ul>
			</div>
		</footer>
	</form>
	<div id="forgoten" style="visibility: hidden;">
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


				<form
					action="/individual/mvc/ForgotPassword/Index?xml_id=%2Fbg-BG%2F&amp;ajaxRequest=true"
					method="post">
					<div id="forgotPassword" class="pmt_doc_wrap">
						<p class="note" style="padding: 1em; text-align: justify;">В
							случай на забравена парола, тя може да бъде сменена онлайн чрез
							подаване на долната заявка и подписването й с КЕП, Е-ТАН или
							парола от дисплей карта. В случай, че нямате регистрирано активно
							средство за сигурност, за да смените Вашата парола е необходимо
							да посетите лично офис на банката.</p>

						<div class="validation-summary-valid"
							data-valmsg-summary-server-side="true">
							<ul>
								<li style="display: none"></li>
							</ul>
						</div>
						<fieldset class="col2">

							<div class="column">

								<label for="Name"> Потребител <span>*</span>




								</label> <input class="input-validation-margin valid"
									data-val="true" data-val-required="Полето е задължително."
									id="Name" name="Name" templateid="PaymentInputWithHelp"
									type="text" value="JasenAngelov111">

								<div>
									<span class="field-validation-valid" data-valmsg-for="Name"
										data-valmsg-replace="true"></span>

								</div>


							</div>

							<div class="column">
								<label for="SecurityDevice" style="white-space: nowrap">
									Средство за сигурност * </label> <select id="SecurityDevice"
									name="SecurityDevice">

									<option selected="selected" value="5">Парола от Е-ТАН</option>
									<option value="1">парола от диспплей карта</option>

									<option value="3">КЕП - Квалифициран Електронен Подпис</option>

								</select>
							</div>
						</fieldset>
						<fieldset class="col2" id="captchaHoldercall">
							<div class="column">
								<label for="Captcha_Code" style="white-space: nowrap"> Число за
									контрол * </label>
							</div>

							<div class="column">
								<input class="input-validation-margin" id="Captcha_Code"
									name="Captcha.Code" type="text" value=""> <label class="note">Въведете
									6-цифреното число, което виждате на своя екран.</label>

								<div>
									<span class="field-validation-valid"> </span>
								</div>


							</div>
							<input id="Captcha_EncodedCode" name="Captcha.EncodedCode"
								type="hidden" value="">
							<div class="column">
								<img id="Captcha_Image" src="./" alt="">

							</div>
						</fieldset>
						<br style="clear: both;">

						<div class="btnfoot clearfix">

							<a id="cancel" class="cancel" tabindex="2"><span>Откажи</span></a>

							<a id="changePassword" title="потвърди" class="save" tabindex="1"><span>потвърди</span></a>
						</div>

						<div style="clear: both; line-height: 0px;">&nbsp;</div>

					</div>

					<input type="hidden" name="as_sfid"
						value="AAAAAAUCeI6_OXUS2uoQwcGhDS2-_X_wpN5itz0-oKR8xkjKU9N8ADFo1pcjA5mIiELQe7TVZ3XG62S5sWAyjaCJazDezisPwM2KVO1xEyD-3YJSbchzUagGlAbQExZ0PLw47hw="><input
						type="hidden" name="as_fid"
						value="79924397c8966aaf493fc3686e960fa28bf59a17">
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="./assets/js/functions.js"></script>
</body>
</html>