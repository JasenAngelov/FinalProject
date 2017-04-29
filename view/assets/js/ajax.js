

/**
 * Функция за проверка на номера на сесията
 * @returns 
 * session_id 
 */
function session_id() {
    return /SESS\w*ID=([^;]+)/i.test(document.cookie) ? RegExp.$1 : false;
};


/**
 * Функция, която прави AJAX request към AJAX контролера. Функцията 
 * @param target
 * @returns
 */
function fetching(target) {
	  var xhttp = new XMLHttpRequest();	
	  var session = session_id();
		var info = {
				 "account" : target,
				 "session_num" : session
		  };	  
	  var vars = "user_account="+ encodeURIComponent(JSON.stringify(info));
	  xhttp.open("POST", "../controller/JScontroler.php", true);
	  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  xhttp.onreadystatechange = function() {	
		  console.log(xhttp.responseText);
	    if (xhttp.readyState == 4 && xhttp.status == 200) {
	    	
	     var information = JSON.parse(this.responseText);	     
	     document.getElementById('Document_PayerName').value = information.name;	     
	     document.getElementById('Document_PayerIBAN').value = information.iban;
	     
	    }
	  };	  
	  xhttp.send(vars);
};

function dataQery() {
	var element = document.getElementById("Document_PayerPicker");
	var target = element.options[element.selectedIndex].value;
	fetching(target);
}