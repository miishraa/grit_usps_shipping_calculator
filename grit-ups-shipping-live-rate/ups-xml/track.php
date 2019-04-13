<?php

/******************************************************************************************************

	UPS Tracking
	Version 1.0

	by mrchip
	2011-08-12
	
	DISCLAIMER: USE THIS SCRIPT AT YOUR OWN RISK. I AM NOT RESPONSIBLE FOR ANYTHING.

	This is the rate XML file that gets sent to UPS with the information you provided.

	If you have any questions please feel free to contact me, I normally reply in 24 hours M-F.

	Thank you for purchasing my script.
	

*******************************************************************************************************/

$xml_data = '
<?xml version="1.0"?>
<AccessRequest xml:lang="en-US">
  <AccessLicenseNumber>'.$this->ups_access_key.'</AccessLicenseNumber>
  <UserId>'.$this->ups_user_id.'</UserId>
  <Password>'.$this->ups_password.'</Password>
</AccessRequest>
<?xml version="1.0"?>
<TrackRequest xml:lang="en-US">
  <Request>
    <TransactionReference>
      <CustomerContext>Tracking for '.$this->tracking_number.'</CustomerContext>
       <XpciVersion>1.0</XpciVersion>
    </TransactionReference>
    <RequestAction>Track</RequestAction>
    <RequestOption>activity</RequestOption>
  </Request>
  <TrackingNumber>'.$this->tracking_number.'</TrackingNumber>
</TrackRequest>';

?>