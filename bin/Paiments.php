<?php
session_start ();
function __autoload($className) {
	require_once '../model/' . $className . ".php";
}
$check = new Control_functions ();
$check->Check_connection_protocol ();
$check->Check_session_time ();

$account_info = $_SESSION ['account'];
$transaction_info = $_SESSION ['transaction'];
$tech_info = $_SESSION ['tech_info'];
define ( 'Footer', TRUE );
define ( 'header', TRUE );
?>
<!DOCTYPE html>
<html>
<head>
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
<link href="./assets/css/preloader.css" rel="stylesheet" type="text/css">
<title>Burkan Plus</title>
</head>
<body>	
<?php 
include '../view/header.php';
?>
	<div id="content" class="clearfix">
		<div id="main" role="main" class="middle">
			<section class="contentarea"></section>
			<section class="controls">
				<div style="height: 100%">
					<table cellpadding="0" cellspacing="0" class="data">
						<tbody>
							<tr>
								<td>
								 	<a class="create-new-payment"  href="./debit-transfer.php" title="Кредитен превод">Кредитен	превод</a>
								</td>
								<td>
									<a class="create-new-payment" href="" title="Обмен на валута">Обмен на валута</a>
								</td>
							</tr>
							<tr>
								<td>
									<a class="create-new-payment" href="" title="Във валута">Във валута</a>
								</td>
								<td>
									<a class="create-new-payment" href="" title="Към бюджета">Към бюджета</a>
								</td>
							</tr>
							<tr>
								<td>
									<a class="create-new-payment" href="" title="Директен дебит">Директен дебит</a>
								</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>
									<a href="" title="Масово плащане">Масово плащане</a>
								</td>
								<td>&nbsp;</td>
							</tr>
						</tbody>
					</table>
				</div>
			</section>
			<section class="result"></section>
		</div>
		<aside id="right"></aside>
	</div>
	<?php 
	include './Footer.php';
	?>
</body>
</html>