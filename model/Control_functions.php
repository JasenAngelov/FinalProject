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
	
	public function Admin_check_session_time(){
		if (isset($_SESSION['logged_in_time']) && (time() - $_SESSION['logged_in_time']) < 1800){
			session_regenerate_id();
			
			$_SESSION['logged_in_time'] = time();
		}else {
			session_destroy();
			
			session_start();
			$_SESSION ['error'] = 'Изтекла  Сесия!';
			http_response_code ( 403 );
			header ( "Location: ../view/admin-login.php" );
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
	public function IssAdminLoged(){
		if (!isset($_SESSION['admin_log']) && !$_SESSION['admin_log']){
			die('Моля влезте в профила си!');
		}
		
	}
	public function getCurrencyNames(){
		$currencies = array_unique($this->currencies);
		$currencies = array_values($currencies);
		return $currencies;
	}
	public function checkIBAN($iban)
	{
		$iban = strtolower(str_replace(' ','',$iban));
		$Countries = array('al'=>28,'ad'=>24,'at'=>20,'az'=>28,'bh'=>22,'be'=>16,'ba'=>20,'br'=>29,'bg'=>22,'cr'=>21,'hr'=>21,'cy'=>28,'cz'=>24,'dk'=>18,'do'=>28,'ee'=>20,'fo'=>18,'fi'=>18,'fr'=>27,'ge'=>22,'de'=>22,'gi'=>23,'gr'=>27,'gl'=>18,'gt'=>28,'hu'=>28,'is'=>26,'ie'=>22,'il'=>23,'it'=>27,'jo'=>30,'kz'=>20,'kw'=>30,'lv'=>21,'lb'=>28,'li'=>21,'lt'=>20,'lu'=>20,'mk'=>19,'mt'=>31,'mr'=>27,'mu'=>30,'mc'=>27,'md'=>24,'me'=>22,'nl'=>18,'no'=>15,'pk'=>24,'ps'=>29,'pl'=>28,'pt'=>25,'qa'=>29,'ro'=>24,'sm'=>27,'sa'=>24,'rs'=>22,'sk'=>24,'si'=>19,'es'=>24,'se'=>24,'ch'=>21,'tn'=>24,'tr'=>26,'ae'=>23,'gb'=>22,'vg'=>24);
		$Chars = array('a'=>10,'b'=>11,'c'=>12,'d'=>13,'e'=>14,'f'=>15,'g'=>16,'h'=>17,'i'=>18,'j'=>19,'k'=>20,'l'=>21,'m'=>22,'n'=>23,'o'=>24,'p'=>25,'q'=>26,'r'=>27,'s'=>28,'t'=>29,'u'=>30,'v'=>31,'w'=>32,'x'=>33,'y'=>34,'z'=>35);
		
		if(strlen($iban) == $Countries[substr($iban,0,2)]){
			
			$MovedChar = substr($iban, 4).substr($iban,0,4);
			$MovedCharArray = str_split($MovedChar);
			$NewString = "";
			
			foreach($MovedCharArray AS $key => $value){
				if(!is_numeric($MovedCharArray[$key])){
					$MovedCharArray[$key] = $Chars[$MovedCharArray[$key]];
				}
				$NewString .= $MovedCharArray[$key];
			}
			
			if(bcmod($NewString, '97') == 1)
			{
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
		else{
			return FALSE;
		}
	}
}

?>		