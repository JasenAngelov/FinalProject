<?php
if (! defined ( 'ADMIN_HEADER' )) {
	die ( 'Direct access not permitted' );
}
?>


<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title></title>
</head>
<body>
	<div class="corpCont" id="container">
		<header id="head">
			<div class="wrap clearfix">

				<nav id="service-area">

					<ul class="welcome">
						<li><a href="" title="Профил"><img src="./assets/images/user.png"
								alt="Профил"></a></li>
						<li><a id="logMeOut" href="../controller/LogoutControler.php"
							title="Изход"><img src="./assets/images/logout.png" alt=""></a></li>
					</ul>
				</nav>
			</div>
		</header>
		<nav class="topnavig">
			<nav id="mainnav" class="wrap clearfix">
				<div id="menu">
					<div id="menu0" class="menuitem bg"
						style="opacity: 1; left: 103px;">
						<div id="menuh0" class="bg">
							<a href="./debit-transfer.php" class="mgreen">НОВ ПРЕВОД</a> <a
								href="" class="myellow">ЧАКАЩИ</a> <a href="" class="mblue">КОМУНАЛНИ</a>
							<a href="" class="mpurple">РЕГУЛЯРНИ</a>
						</div>
					</div>

				</div>
			</nav>
		</nav>
		<div class="sitepath">
			<div class="wrap">
				<div class="path">
					<a href="">Начало</a>
				</div>
			</div>
		</div>

</body>
</html>