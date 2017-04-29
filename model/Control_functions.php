<?php
class Control_functions {
	
	private $currencies = array("AFA","ALL","DZD","USD","EUR","AOA","XCD","NOK","XCD","ARA","AMD","AWG","AUD","EUR","AZM","BSD","BHD","BDT","BBD","BYR","EUR","BZD","XAF","BMD","BTN","BOB","BAM","BWP","NOK","BRL","GBP","BND","BGN","XAF","BIF","KHR","XAF","CAD","CVE","KYD","XAF","XAF","CLF","CNY","AUD","AUD","COP","KMF","CDZ","XAF","NZD","CRC","HRK","CUP","EUR","CZK","DKK","DJF","XCD","DOP","TPE","USD","EGP","USD","XAF","ERN","EEK","ETB","FKP","DKK","FJD","EUR","EUR","EUR","EUR","XPF","EUR","XAF","GMD","GEL","EUR","GHC","GIP","EUR","DKK","XCD","EUR","USD","GTQ","GNS","GWP","GYD","HTG","AUD","EUR","HNL","HKD","HUF","ISK","INR","IDR","IRR","IQD","EUR","ILS","EUR","XAF","JMD","JPY","JOD","KZT","KES","AUD","KPW","KRW","KWD","KGS","LAK","LVL","LBP","LSL","LRD","LYD","CHF","LTL","EUR","MOP","MKD","MGF","MWK","MYR","MVR","XAF","EUR","USD","EUR","MRO","MUR","EUR","MXN","USD","MDL","EUR","MNT","XCD","MAD","MZM","MMK","NAD","AUD","NPR","EUR","ANG","XPF","NZD","NIC","XOF","NGN","NZD","AUD","USD","NOK","OMR","PKR","USD","PAB","PGK","PYG","PEI","PHP","NZD","PLN","EUR","USD","QAR","EUR","ROL","RUB","RWF","XCD","XCD","XCD","WST","EUR","STD","SAR","XOF","EUR","SCR","SLL","SGD","EUR","EUR","SBD","SOS","ZAR","GBP","EUR","LKR","SHP","EUR","SDG","SRG","NOK","SZL","SEK","CHF","SYP","TWD","TJR","TZS","THB","XAF","NZD","TOP","TTD","TND","TRY","TMM","USD","AUD","UGS","UAH","SUR","AED","GBP","USD","USD","UYU","UZS","VUV","VEF","VND","USD","USD","XPF","XOF","MAD","ZMK","USD");
	
	
	public function Check_connection_protocol (){
		if($_SERVER['SERVER_PORT'] != 443)
		{
			header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
			exit ();
			
		}
		
	}
	public function Check_session_time(){
		if (isset($_SESSION['logged_in_time']) && (time() - $_SESSION['logged_in_time']) < 1800){
			session_regenerate_id();
			
			$_SESSION['logged_in_time'] = time();
		}else {
			session_destroy();
			
			session_start();
			$_SESSION ['error'] = 'Изтекла  Сесия!';
			http_response_code ( 403 );
			header ( "Location: ../view/BurkanPlus.php" );
			exit ();
		}
	}
	
	
	
	
	
	public function errorMessage_and_header($message){
		
		function ($message){
			return $_SESSION ['error'] = $message;
		};
		function (){
			return http_response_code ( 403 );
		};
		function (){
			return header ( "Location: ../view/BurkanPlus.php" );
		};
	}
	
	public function getCurrencyCode($currency){
		
		$currencies = array_unique($this->currencies);
		$currencies = array_values($currencies);
		return array_search($currency, $currencies) + 1;
	}
	
	
	
}

?>		