<?php
session_start();
$tomail = $_GET['v_mail'];
$vendor = $_GET['v_name'];
$phone = $_SESSION['phone_number'];
$to = $tomail;
$subject = "Dream Eventz Customer";
$message = "A cutomer with the following phone number is interested in your services. Please contact the customer asap."."\nCustomer Name:".$_SESSION['name']."\nCustomer Phone No. ".$phone;
 $header = "From: <postmaster@localhost> \r\n";
 
 $retval = mail ($to,$subject,$message,$header);

		 if( $retval == true )  
			   {
			      echo "<p> <font color=green>Message sent successfully...to ".$vendor." saying that you are interested in his services.<br> He will contact you by phone asap.<br> Thank You!</font>";
			   }
		 else
			   {
			      echo "Message could not be sent...";
			   }
 
?>


