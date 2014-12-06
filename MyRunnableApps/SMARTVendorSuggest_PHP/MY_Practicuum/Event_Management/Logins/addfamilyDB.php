<?php 
include 'DBConnection.php';

$obj1=new Database();
$con1=$obj1->openConnection();
if($_POST)
{
	$name=$_POST["name"];
	$relation=$_POST["relation"];	
	$username=$_POST["username"];
	$email = $_POST["email"];
}
session_start();
	$adminid =  $_SESSION['username'];
	
	$date = date('Y-m-d H:i:s');

$myquery="INSERT INTO family VALUES ('$adminid', '$username', '$name', '$email','$relation', NOW())";


$retval = mysqli_query(  $con1 , $myquery);
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
$obj1->closeConnection($con1);

$to = $email;
$subject = "Dream Eventz Family Invite";
$message = "Mr.".$_SESSION['name']. " has added you as his family member for a marriage event on Dream Eventz website. \n He would like your valuable suggestions on which vendor to select from a number of available vendors. \n Please login to our website and accept the invitation.\n Link: http://localhost/MY_Practicuum/Event_Management/Homepage.php\n Login ID: ".$username."\n Password: ".$username;
 $header = "From: <postmaster@localhost> \r\n";
 
 $retvalmail = mail ($to,$subject,$message,$header);

		 if( $retvalmail == true )  
			   {
			      echo "<p> <font color=green>Congrats....".$name." has been added successfully.<br> Also an invite has been sent to him to join you for this event on our website. <br> Thank You!</font>";
			   }
		 else
			   {
			      echo "Message could not be sent...";
			   }

?>