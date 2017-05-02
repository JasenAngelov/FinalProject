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

<link type="text/css" rel="stylesheet" href="./assets/css/login.css">
<link href="./assets/css/preloader.css" rel="stylesheet" type="text/css">
<title>Burkan Plus</title>
</head>
<body>	
<?php
	include './header.php';
?>

	<div id="content" class="clearfix">
		<div id="main" role="main" class="middle">
			<section class="controls">
				<div id="overview">
					<table class="data">
						<thead class="accounts">
							<tr>
								<th class="caption primo"><span>Сметки</span></th>
								<th class="secundo">Валута</th>
								<th class="tertio">&nbsp;</th>
								<th class="amt quarto">Баланс</th>
								<th class="amt quinto"><span
									style="width: 180px; display: block">Разполагаема наличност</span></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="5" class="bclname accounts"><?php  echo  $account_info->first_name . " " .$account_info->last_name;?></td>
							</tr>
							<tr class="bg0">
								<td class="grouper_item"><a href=""><?php echo $account_info->IBAN; ?></a></td>
								<td class="cali"><?php echo $account_info->currency; ?></td>
								<td class="amt"><sup style="margin-left: 3px; font-size: 9px"></sup></td>
								<td class="amt debit "><?php echo number_format($account_info->balance, 2, ',', ' ')?></td>
								<td class="amt debit"><?php echo number_format($account_info->balance, 2, ',', ' ')?></td>
							</tr>
						</tbody>
						
					</table>
				</div>
				<div class="overviewMoveTable">
					<table class="data">
						<thead class="movements">
							<tr>
								<th class="caption"><span>Последни движения</span></th>
								<th>Получен превод от </th>
								<th>Основание</th>
								<th>Дата</th>
								<th class="amt">Сума</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if (is_array ( $transaction_info )) {
									
									foreach ( $transaction_info as $info ) {
										echo '<tr class="bg0">';
										echo "<td>" . $info->recipientIban. "</td>";
										echo "<td>" . $info->recipient_name. "</td>";
										echo "<td>" . $info->reason. "</td>";
										echo "<td>" . $info->Date . "</td>";
										echo "<td class='amt incoming'>" . $info->Sum. "</td>";
										echo "<td style='width: 20px;'>" . $info->Type. "</td>";
										echo "</tr>";
									}
								} else {
									echo '<tr class="bg0">';
									echo "<td></td>";
									echo "<td></td>";
									echo "<td>$transaction_info</td>";
									echo "<td></td>";
									echo "<td class='amt incoming'></td>";
									echo "<td style='width: 20px;'></td>";
									echo "</tr>";
								}
									
							?>									
						</tbody>
					</table>
				</div>
			</section>
		</div>
	</div>		
	<?php
		include './footer.php';
	?>	
</body>
</html>