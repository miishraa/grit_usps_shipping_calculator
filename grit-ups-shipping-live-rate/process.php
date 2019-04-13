<?php

/******************************************************************************************************

	UPS Shipping Calculator
	Version 1.0

	by mrchip
	2010-10-29
	
	DISCLAIMER: USE THIS SCRIPT AT YOUR OWN RISK. I AM NOT RESPONSIBLE FOR ANYTHING.

	This is an example script for the ups object file "ups.php", enter your specific ups account 
	settings here & package information. If you do not have a UPS account you can request one directly 
	at www.ups.com

	If you have any questions please feel free to contact me, I normally reply in 24 hours M-F.

	Thank you for purchasing my script.
	

*******************************************************************************************************/
  error_reporting(0);
	session_start();
	
	//if ($_POST['shipping_rates'] != '') $_SESSION['ship_method'] = $_POST['shipping_rates'];
	if (trim($_POST['zip_code']) != '') $_SESSION['ship_zip'] = trim($_POST['zip_code']);

	if ($_SESSION['ship_zip'] != '') {

		// You need a UPS accesskey, userid, password contact www.ups.com for this information.
		define('UPS_ACCESSKEY', '2D4B2440CCB3827D');		// Enter your UPS Key here
		define('UPS_USERID', 'MrityunjayKumar');			// Enter your UPS User ID here
		define('UPS_PASSWD', 'usps123*#');			// Enter your UPS Password here
		
		require_once('ups-rates.php');
	
		$ups_rates = new ups_rates();
		
		// For a list of pickup types referee to the readme.txt file
		$ups_rates->pickup_type = '01';		
	
		// You can have two weight types: LBS or KGS, depending on what country you ship FROM
		// depends on what weight type you choose for example England is KGS.
		$ups_rates->weight_type = 'LBS';
		
		$ups_rates->weight = $_POST['weight'];		// The weight of the shipment.
	
		$ups_rates->from_state = 'CA';			// The state location you are shipping from.
		$ups_rates->from_zip = '90310';			// The zip location you are shipping from.
		$ups_rates->from_country = 'US';		// The country location you are shipping from.
	
		// The customers zip code, where the item is going, we store this in sessions so if the
		// customer navigates away from the page it is saved.
		$ups_rates->ship_zip = $_SESSION['ship_zip'];
		
		// The customers country, where the item is going, I set this as default to US because most
		// US e-commerce sites do not ask for the country. However, if you want to ask the customer
		// you can do so.
		$ups_rates->ship_country = 'US';
		
		// This just tell's UPS if the address is a residential address or a business. It doesn't 
		// seem to make any difference, so I just leave it on. However, you can ask the customer if you want.
		$ups_rates->residential = true;
	
		// This tell's the script what should be the default shipping method. We get this from the customer 
		// when he changes the shipping option, then next time he see's the page, he see's the same ship method.
		$ups_rates->default_rate = $_SESSION['ship_method'];
		
	
		// This gets the results from UPS and stores the data in a HTML select, which we use later down in the 
		// bottom of the document.
		$select_list = $ups_rates->fetch_rates();
	
	}
session_destroy();
?>
<?=$select_list?>