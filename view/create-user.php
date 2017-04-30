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
<title>Администрация Plus</title>
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
<script type="text/javascript" src="./assets/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="./assets/js/jquery.mmenu.min.all.js"></script>
<script type="text/javascript" src="./assets/js/singup-validation.js"></script>

</head>
<body>

<?php
include './header.php';
?>
<div class="corpCont" id="container_response" style="display: none">
			<div id="content" class="clearfix">
				<div id="main" role="main" class="middle">
					<section class="result">
						<div id="Payment" class="pmt_wrap">
							<div id="m_ctrl_Page" class="pmt_doc_wrap">
								
								<div class="pmt_footer clearfix">
									<a href="./create-user.php" class="back"><span>Създай нов клиент</span></a>
									<a id="btnSave" class="save" href="" onclick="finalCheck();"><span>Затвори</span></a>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	<form id="create_Form" method="post" style="margin: 0px" action="">
		<div class="corpCont" id="container">
			<div id="content" class="clearfix">
				<div id="main" role="main" class="middle">
					<section class="result">
						<div id="Payment" class="pmt_wrap">
							<div id="m_ctrl_Page" class="pmt_doc_wrap">
								<fieldset class="col2 bind_container fix" id="noBorder">
									<h2 class="buttons">Създайте клиент</h2>
									<p class="note">Попълнете данните на клиента</p>

									<div class="column">
										<label> Име <span>*</span></label><input
											class="bind inputedit input-validation-margin"
											id="first_name" maxlength="35" name="first_name" size="50"
											tabindex="1" type="text" value=""
											onblur="fieldCheck('#first_name');">

									</div>
									<div class="column">
										<label> Фамилия <span>*</span></label><input
											class="bind inputedit input-validation-margin" id="last_name"
											maxlength="35" name="last_name" size="30" tabindex="2"
											type="text" value="" onblur="fieldCheck('#last_name');">

									</div>
									<div class="column">
										<label> E-mail <span>*</span></label><input
											class="bind inputro input-validation-margin"
											placeholder="exmpl: Jhon@doe.abc" id="client_email"
											maxlength="35" name="client_email" size="50" tabindex="3"
											value="" onblur="validateEmail();">

									</div>
									<div class="column">
										<label> Телефон <span>*</span></label><input
											class="bind inputro input-validation-margin"
											id="client_phone" maxlength="35" name="client_phone"
											placeholder="exmpl: (+359)0876557610" tabindex="4" type="tel"
											value="" onblur="validatePhone();">

									</div>
								</fieldset>
								<fieldset class="col2 fix" id="noBorder">
									<h2 class="buttons">Удостоверение</h2>

									<br class="cl">
									<div class="column">
										<label for="Document_PayeeName">Име за достъп<span id="dadada">*</span></label>
										<input class="bind inputedit input-validation-margin"
											id="username" maxlength="35" name="username" size="50"
											onblur="checkMatch('#username','#username_check');"
											type="text" value=""> <label> Парола<span>*</span></label> <input
											class="bind inputro input-validation-margin" id="pass"
											name="pass" size="14" tabindex="-1" type="text" value=""
											onblur="checkMatch('#pass','#pass_check');">

									</div>
									<div class="column">
										<label for="Document_PayeeIBAN"> Повтори името за достъп<span>*</span></label><input
											class="bind inputedit input-validation-margin"
											id="username_check" maxlength="22" name="username_check"
											onblur="checkMatch('#username','#username_check');" size="30"
											type="text" value="">
										<div>
											<span class="field-validation-valid"> </span>
										</div>
										<label>Повтори паролата<span id="check_pass">*</span></label>
										<input class="bind inputro input-validation-margin"
											onblur="checkMatch('#pass','#pass_check');"
											data-helper-payee="BICName" id="pass_check" name="pass_check"
											size="40" tabindex="-1" type="text" value="">

									</div>
								</fieldset>
								<fieldset class="col3 bind_container fix" id="noBorder">
									<h2>Създаване на сметка</h2>
									<div class="column">
										<label for="Document_Amount"> Сума за захранване <span>*</span></label><input
											class="bind inputedit input-validation-margin"
											id="Document_Amount" maxlength="14" name="Document.Amount"
											size="15" type="text" value="0.00">
										<div>
											<span class="field-validation-valid"
												data-valmsg-for="Document.Amount" data-valmsg-replace="true"></span>
										</div>
									</div>
									<div class="column">
										<label> Валута <span>*</span></label><select
											class="bind  input-validation-margin" id="Document_RINGS"
											name="Document.RINGS" size="1">
											<option selected="selected" value="1">БИСЕРА</option>
											<option value="2">РИНГС</option>
										</select>
									</div>
								</fieldset>
								<div class="pmt_footer clearfix">
									<a href="./create-user.php" class="back"><span>Изчисти</span></a>
									<a id="btnSave" class="save" href="" onclick="finalCheck();"><span>Създай</span></a>
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
		<script>
$(document).ready(function(){
	 $('#create_Form').submit(function(){
	     
	        // show that something is loading
	        $('#dadada').html("<b>Loading response...</b>");
	         
	        /*
	         * 'post_receiver.php' - where you will pass the form data
	         * $(this).serialize() - to easily read form data
	         * function(data){... - data contains the response from post_receiver.php
	         */
	        $.post('../controller/CreateUserControler.php',{ fields : $(this).serialize()}, function(data){
	             
	            // show the response
	            
	            $('#response').html(data);
	             
	        }).fail(function() {
	         
	            // just in case posting your form failed
	            alert( "Posting failed." );
	             
	        });
	 
	        // to prevent refreshing the whole page page
	        return false;
	 
	    });
});
</script>

	</form>
</body>
</html>