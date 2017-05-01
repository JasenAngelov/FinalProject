function createClient(){
	
    $('#create_Form').submit(function(){
     
        // show that something is loading
        $('#dadada').html("<b>Loading response...</b>");
         
        /*
		 * 'post_receiver.php' - where you will pass the form data
		 * $(this).serialize() - to easily read form data function(data){... -
		 * data contains the response from post_receiver.php
		 */
        $.post('../controllr/CreateUserControler.php', $(this).serialize(), function(data){
             
            // show the response
            $('#dadada').html(data);
             
        }).fail(function() {
         
            // just in case posting your form failed
            alert( "Posting failed." );
             
        });
 
        // to prevent refreshing the whole page page
        return false;
 
    });
};





// -=-=-=-=-=-=--=---=-= Chech for e-mail exist=-=-=-=-=-=-=--=-=-==-=-=\\
// var email = document.getElementById('e-mail');
// email.onblur = function() {
// var currier = new XMLHttpRequest();
// currier.onreadystatechange = function() {
// if (this.readyState === 4 && this.status === 200) {
// console.log(this.responseText);
// var incomeData = JSON.parse(this.responseText);
//
// if (incomeData['haveMail'] === true) {
// alert("Email " + incomeData['mail'] + " alredy exist!");
// }
// }
// }
// var dataSend = 'data=' + JSON.stringify({
// mail : email.value
// });
// currier
// .open(
// 'POST',
// 'http://localhost/Project1/Team-Project/SmartMoney/php/checkForExistEmailJS.php',
// true);
// currier.setRequestHeader("Content-Type", "application/json");
// currier.send(dataSend);
// }
// -=-=-=-=-=-=--=---=-= email end =-=-=-=-=-=-=--=-=-==-=-=\\

// -=-=-=-=-=-=--=---=-= Field validation =-=-=-=-=-=-=--=-=-==-=-=\\
function fieldCheck(id) {
	var field = $(id).val();

	if (!field.length > 0) {
		$(id).css("border-color", "red");
		return false;
	} else {
		$(id).css("border-color", "green");
		return true;
	}

}
// -=-=-=-=-=-=--=---=-= Field validation end =-=-=-=-=-=-=--=-=-==-=-=\\

// -=-=-=-=-=-=--=---=-= email validation =-=-=-=-=-=-=--=-=-==-=-=\\
function validateEmail() {
	var email = $("#client_email").val();
	var emailReg = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
	var chech = emailReg.test(email);

	if (!chech) {
		$("#client_email").css("border-color", "red");
		return false;
	} else {
		$("#client_email").css("border-color", "green");
		return true;
	}

};

// -=-=-=-=-=-=--=---=-= email validation end =-=-=-=-=-=-=--=-=-==-=-=\\

// -=-=-=-=-=-=--=---=-= Phone validation =-=-=-=-=-=-=--=-=-==-=-=\\
function validatePhone() {
	var phone = $("#client_phone").val();
	var phoneReg = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
	var chech = phoneReg.test(phone);

	if (!chech) {
		$("#client_phone").css("border-color", "red");
		return false;
	} else {
		$("#client_phone").css("border-color", "green");
		return true;
	}

};
// -=-=-=-=-=-=--=---=-= Phone validation end =-=-=-=-=-=-=--=-=-==-=-=\\

// -=-=-=-=-=-=--=---=-= Chech for password corect=-=-=-=-=-=-=--=-=-==-=-=\\

function checkMatch(id1, id2) {
	var password = $(id1).val();
	var confirmPassword = $(id2).val();

	if (password != confirmPassword || confirmPassword.length == 0) {
		$(id1).css("border-color", "red");
		$(id2).css("border-color", "red");
		return false;
	} else {
		if (confirmPassword.length < 8) {
			alert("Полето трябва да е с дължина поне 8 символа!");
			return false;
		} else {
			$(id1).css("border-color", "green");
			$(id2).css("border-color", "green");
			return true;
		}
	}

}
// -=-=-=-=-=-=--=---=-= password end =-=-=-=-=-=-=--=-=-==-=-=\\


// -=-=-=-=-=-=--=---=-= Finale check before sublith =-=-=-=-=-=-=--=-=-==-=-=\\
function finalCheck() {
	var final = true;
	if (!checkMatch('#pass', '#pass_check')) {
		event.preventDefault();
		final = false;
	}
	if (!checkMatch('#username', '#username_check')) {
		event.preventDefault();
		final = false;
	}
	if (!validatePhone()) {
		event.preventDefault();
		final = false;
	}
	if (!validateEmail()) {
		event.preventDefault();
		final = false;
	}
	if (!fieldCheck('#last_name')) {
		event.preventDefault();
		final = false;
	}
	if (!fieldCheck('#first_name')) {
		event.preventDefault();
		final = false;
	}
	if (final) {
		
		$('#create_Form').submit();
	
		event.preventDefault();
	}
}
// -=-=-=-=-=-=--=---=-= Finale check before sublith END
// =-=-=-=-=-=-=--=-=-==-=-=\\

/*
 * ////$(document).ready(function(){ //// $('#create_Form').submit(function(){ //
 * //// // show that something is loading //// $('#dadada').html("<b>Loading
 * response...</b>"); // //// /* //// * 'post_receiver.php' - where you will
 * pass the form data //// * $(this).serialize() - to easily read form data //// *
 * function(data){... - data contains the response from post_receiver.php ////
 */
//				
//	         
// // $.post('../controller/CreateUserControler.php', $(this).serialize(),
// function(data){
//
//
//	        	
// // // show the response
//	            
// // $('#response').html(data);
//	             
// // }).fail(function() {
//	         
// // // just in case posting your form failed
// // alert( "Posting failed." );
//	             
// // });
//	 
// // // to prevent refreshing the whole page page
// // return false;
//	 
// // });
// //});








