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
<?php
include './header.php';
?>
	<form id="m_Form" method="post" style="margin: 0px" action="">
		<div class="corpCont" id="container">
			<div id="content" class="clearfix">
				<div id="main" role="main" class="middle">
					<section class="result">
						<div id="Payment" class="pmt_wrap">
							<div id="m_ctrl_Page" class="pmt_doc_wrap">
								<fieldset class="col2 bind_container fix" id="noBorder">
									<h2 class="buttons">Наредител</h2>
									<p class="note">Избери сметка на наредител</p>
									<div class="row" style="width: 500px">
										<select class="bind inputedit" id="Document_PayerPicker"
											name="Document.PayerPicker" tabindex="-1" onchange="dataQery()">
											<option selected="selected" value="none"></option>
											 <?php
												if (is_array ( $account_info )) {
													foreach ( $account_info as $key => $value ) {
														echo "<option value='$key + 1'>$value->IBAN $value->currency $value->balance</option>";
													}
												} else {
													echo "<option value='1'>$account_info->IBAN &nbsp; &nbsp; $account_info->currency  &nbsp; &nbsp;  $account_info->balance</option>";
												}
												
												?> 
											 </select>
									</div>
									<div class="column">
										<label> Име <span>*</span></label><input
											class="bind inputro input-validation-margin"
											id="Document_PayerName" maxlength="35"
											name="Document.PayerName" readonly="readonly" size="50"
											tabindex="-1" type="text" value="">

									</div>
									<div class="column">
										<label> IBAN на наредителя <span>*</span></label><input
											class="bind inputro input-validation-margin"
											id="Document_PayerIBAN" maxlength="22"
											name="Document.PayerIBAN" readonly="readonly" size="30"
											tabindex="-1" type="text" value="">

									</div>
								</fieldset>
								<fieldset class="col2 fix" id="noBorder">
									<h2 class="buttons">Получател</h2>

									<br class="cl">
									<div class="column">
										<label for="Document_PayeeName"> Име <span>*</span></label><input
											class="bind inputedit input-validation-margin"
											id="Document_PayeeName" maxlength="35"
											name="Document.PayeeName" size="50" type="text" value=""> <label>
											BIC <span>*</span>
										</label><input class="bind inputro input-validation-margin"
											id="Document_PayeeBIC" maxlength="8" name="Document.PayeeBIC"
											 size="14" tabindex="-1" type="text"
											value="">

									</div>
									<div class="column">
										<label for="Document_PayeeIBAN"> IBAN на получателя <span>*</span></label><input
											class="bind inputedit input-validation-margin"
											id="Document_PayeeIBAN" maxlength="22"
											name="Document.PayeeIBAN"
											onblur="GetBICByIBAN('Document_PayeeIBAN');"
											size="30" type="text" value="">
										<div>
											<span class="field-validation-valid"> </span>
										</div>
										<label> Име на банката на получателя </label><input
											class="bind inputro input-validation-margin"
											data-helper-payee="BICName" id="Document_PayeeBICName"
											name="Document.PayeeBICName"  size="40"
											tabindex="-1" type="text" value="">

									</div>
								</fieldset>
								<fieldset class="col3 bind_container fix" id="noBorder">
									<h2>Сума</h2>
									<div class="column">
										<label for="Document_Amount"> Сума <span>*</span></label><input
											class="bind inputedit input-validation-margin"
											id="Document_Amount" maxlength="14" name="Document.Amount"
											size="15" type="text" value="0.00">
										<div>
											<span class="field-validation-valid"
												data-valmsg-for="Document.Amount" data-valmsg-replace="true"></span>
										</div>
									</div>
									<div class="column">
										<label> Валута <span>*</span></label><input
											class="inputro input-validation-margin" data-val="true"
											data-val-required="Полето е задължително." id="Document_CCY"
											name="Document.CCY" readonly="readonly" size="3"
											tabindex="-1" type="text" value="<?php echo "$account_info->currency";?>">
										<div>
											<span class="field-validation-valid"
												data-valmsg-for="Document.CCY" data-valmsg-replace="true"></span>
										</div>
									</div>
									<div class="column">
										<label for="Document_RINGS"> Платежна система </label><select
											class="bind  input-validation-margin" id="Document_RINGS"
											name="Document.RINGS" size="1">
											<option selected="selected" value="1">БИСЕРА</option>
											<option value="2">РИНГС</option>
										</select>
									</div>
								</fieldset>

								<fieldset class="col2 fix" id="noBorder">
									<h2>Допълнителна информация</h2>
									<div class="column">
										<label for="Document_Description1"> Основание за плащане <span>*</span></label><input
											class="bind inputedit input-validation-margin"
											id="Document_Description1" maxlength="35"
											name="Document.Description1" size="50" type="text" value="">
										<div>
											<span class="field-validation-valid"
												data-valmsg-for="Document.Description1"
												data-valmsg-replace="true"></span>
										</div>
									</div>
									<div class="column">
										<label for="Document_Description2"> Още пояснения </label><input
											class="bind inputedit input-validation-margin"
											id="Document_Description2" maxlength="35"
											name="Document.Description2" size="50" type="text" value="">

									</div>
								</fieldset>
								<div class="pmt_footer clearfix">
									<a href="" class="back"><span>Назад</span></a> <a href="#"
										id="btnSaveAndSend" class="savesend"><span>Запиши и изпрати</span></a>
									<a href="#" id="btnSave" class="save"><span>Запази</span></a>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	
<?php
include './Footer.php';
?>	
<script type="text/javascript" src="./assets/js/ajax.js"></script>
</form>
</body>
</html>