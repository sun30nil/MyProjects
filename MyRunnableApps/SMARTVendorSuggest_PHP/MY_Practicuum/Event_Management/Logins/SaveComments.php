<?php
require_once("function_only.inc.php");
echo $_SESSION['name']." Thank You for your valuable comments!<br>"; 
echo "<br>";
$obj=new Database();
 $con=$obj->openConnection();
$vend_map = $myAssocVendors;

if(isset($_POST))
{
	$rating = $_POST['rating'];
	$comments = $_POST['comments'];
	$vid = $_POST['details'];
	$liked = $_POST['userlike'];
}
if($_SESSION['role']=="admin")
{$id = $_SESSION['username'];}
else 
{
	$id = $_SESSION['his_id'];
}
$varr = explode(',', $vid);  //getting the url encoded event id split from vendor id
$r_eventID = $varr[0];  // event id to be removed
$r_vendID = $varr[1];   // vendor id to be removed

$myquery="INSERT INTO comments VALUES (DEFAULT,$r_eventID, $rating ,'$comments','$liked','$id','$r_vendID', NOW())";

$retval = mysqli_query($con , $myquery);
if(! $retval )
{
  die('Could not save data ' . mysql_error());
}
else echo "Successfully saved your comments!";
	  
$obj->closeConnection($con);
?>
