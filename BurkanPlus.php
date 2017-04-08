



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
<link type="image/x-icon"
	href="https://transact.bacbplus.bg/images/fav2icon.ico" rel="Icon">
<link type="text/css" rel="stylesheet" href="./assets/css/login.css">

</head>

<body>
	<form id="m_Form" method="post" style="margin: 0px" action="./LogIn.php">
		<div id="container" class="login">
			<div id="content" class="clearfix">
				<div id="main" role="main" class="wide">
					<section class="contentarea"></section>

					<input type="hidden" name="userTime" id="userTime">
					<section>
						<div class="login_wrap">
							<div class="login-container">
								<div class="login-logo">
									<img src="./" alt="Burkan Bank Plus">
								</div>
								<div class="login-drop">
									<div class="login-heading">
										Вход в <strong> Burkan Bank Plus </strong> <input type="hidden"
											name="processlogin" value="true">
										<div class="subheading">Изход успешен</div>
									</div>
									<div class="clearfix">
										<div class="column-left">
											<div class="login-input-group">
												<label for="userName"> Потребител </label><input
													class="input-control" type="text" id="userName"
													tabindex="0" size="33" name="userName" autocomplete="off"
													maxlength="32" value="">
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
												<!--SSL Sertificates-->

											</div>
										</div>
									</div>
									<div class="login-drop-footer">
										<div class="login-btns">
											<button class="btn" type="submit" name="submith">
												Продължи</button>
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
								<p></p>
							</div>
						</div>
						<!--ADDITIONAL_MESSAGE-->
						<!--/////ADDITIONAL_MESSAGE-->
					</section>					
					<div class="dialog-container"></div>
				</div>
			</div>
		</div>

		<footer id="footer">
			<div class="wrap" style="cursor: pointer">
				<ul>
					<li><span class="copyright">© BACB • 2017</span></li>
					<li><a target="_blank" class="userguide" href="">Потребителско
							ръководство</a></li>
					<li><a target="_blank" href="">Препоръки за сигурност</a></li>
					<li><div class="def_control_CurrentCCY">
							<span style="text-transform: uppercase"
								class="def_control_CurrentCCY">Валутни курсове:<span class="flaticon-storage"></span> &nbsp;EUR 1.955830&nbsp; USD
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