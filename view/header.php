<?php
if (! defined ( 'header' )) {
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
				<a class="logo" href=""><img src="./assets/images/logo.png"
					alt="Burkan Home"></a>
				<nav id="service-area">
					<ul class="messages">
						<li><a href="" title="Комуникация с BBBG"><img
								src="./assets/images/messages-17.png" alt=""></a><span
							style="color: #f00; font-size: 0.8em; padding-right: 5px;"><span
								id="span_welcomeCnt"
								xmlns:xsd="http://www.w3.org/2001/XMLSchema">23</span></span></li>
						<li></li>
					</ul>
					<ul class="welcome">
						<control id="Welcome" ctype="Control"
							xmlns:xsd="http://www.w3.org/2001/XMLSchema"> <span
							class="user tooltip"><?php  echo "Здравейте, " . $account_info->first_name;?><label
							class="show-tooltip-text"> <?php echo "$account_info->first_name $account_info->last_name";?><br></label></span>
						<span class="ip"> <?php echo "IP $tech_info->ip";?> </span> </control>
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
					<div id="menu0" class="menuitem bg"	style="opacity: 1; left: 103px;">
						<div id="menuh0" class="bg" >
							<a href="./Paiments.php" class="mgreen">НОВ ПРЕВОД</a>
							<a href="" class="myellow">ЧАКАЩИ</a>
							<a href="" class="mblue">КОМУНАЛНИ</a>
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