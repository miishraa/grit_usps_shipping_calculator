<?php
/*
Plugin Name: GRIT UPS Shipping Live Rate Calculator
Version: 1.0
Author: Mrityunjay Kumar & Nate Koester
Author URI: https://grittechnologies.com/
Plugin URI: https://grittechnologies.com/plugins
Description: This is used to calculate live shipping rate from UPS website.This is based on Codecanyone UPS shipping and live rate calculator
*/
?>
<?php


function grit_ajax_load_scripts() {
	wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'grit_ajax_load_scripts');
?>
<?php
function processFormDataUPS(){
	// first check if data is being sent and that it is the data we want

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
		define('UPS_ACCESSKEY', '--Enter Your UPS Key---');		// Enter your UPS Key here
		define('UPS_USERID', '--Enter Your UPS User ID---');			// Enter your UPS User ID here
		define('UPS_PASSWD', '--Enter Your UPS Password---');			// Enter your UPS Password here
		
		require_once('ups-rates.php');
	
		$ups_rates = new ups_rates();
		
		// For a list of pickup types referee to the readme.txt file
		$ups_rates->pickup_type = '01';		
	
		// You can have two weight types: LBS or KGS, depending on what country you ship FROM
		// depends on what weight type you choose for example England is KGS.
		$ups_rates->weight_type = 'LBS';
		if($_POST['weight']<150){
		$ups_rates->weight = $_POST['weight'];		// The weight of the shipment.
	    $ups_rates->multiplier = 1;
		}
		else{$ups_rates->weight = 150;$ups_rates->multiplier = ceil(($_POST['weight'])/150);}
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
<?php	
}
add_action( 'wp_ajax_nopriv_processFormDataUPS', 'processFormDataUPS' );
add_action( 'wp_ajax_processFormDataUPS', 'processFormDataUPS' );
?>
<?php function gritCalUPSShippingShortcode(){
 ?><!--
	
UPS Rates Calculator 
 
--> 

<div><?php
    $current_user = wp_get_current_user();
    ?>
	<div id="main_box">
		<h2>Estimated Shipping</h2>
		<br/>
		<div id="shipping_box">
			<p>
				<input class="text_box" type="text" name="zip_code" id='zip_code' placeholder='ZIP Code' value="<?php echo $current_user->user_registration_zipcode;?>">
				<input class="text_box1" type="hidden" name="weight" id='weight' value="">
				<input type="hidden" name="action" id='action' value="processFormDataUPS"/>
				<input type='hidden' name='ordervar' id='ordervar' value=''>
				<input type='hidden' name='ordername' id='ordername' value='<?php the_title();?>'>
				<input type='button' class="calculate call-btn btn btn-primary" id="calculate" Value='Apply' onclick="processClickUPS()">
				<!--<a href='#' id='linkId'>Calculate Shipping</a>-->
                  <div id="shipping_results"></div>
				<div id='loadingp' style='display:none;'>Loading</div>
				
			</p>
			<div id="shipping_results"></div>
		</div>
	</div> 
	</div>
	<script>
function processClickUPS(){
var v1=document.getElementById('zip_code').value;
var v2=document.getElementById('weight').value;
var v3=document.getElementById('action').value;
if(jQuery(v1).val() != '')

{

//var form_data = jQuery(this).serialize();

jQuery('#loadingp').show();
jQuery.ajax({ url:"/wp-admin/admin-ajax.php",type:"POST",datatype:JSON, data:{zip_code:v1,weight:v2,action:v3},success:function(data)

{
//jQuery('#shipping_methods')[0].reset();
jQuery("#shipping_results").html(data);
},

complete: function(){
        jQuery('#loadingp').hide();
      },

});
}

else

{
alert("Add Zip Code ");
}
}
</script>
	
	<?php }
add_shortcode( 'grit_ups_rate', 'gritCalUPSShippingShortcode' );
?>