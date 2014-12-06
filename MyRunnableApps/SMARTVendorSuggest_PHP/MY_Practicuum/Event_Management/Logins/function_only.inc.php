<?php
include "DBConnection.php";
session_start();
$id = $_SESSION['username'];
 $obj=new Database();
 $con=$obj->openConnection();
$myAssocVendors = array();
$myAssocEvent = array();
$result = mysqli_query($con,"select * from savedevents where user_id='$id'");
	 //  $sql=mysql_query("select fn_id from venuelist where fid='$username'");
	   $count_rows=mysqli_num_rows($result);
	// $count_rows = $result->num_rows;
	   
	   if($count_rows>0)
	   {
	 //  	echo "You've ".$count_rows." event(s) saved.";
		   	while($all_events = mysqli_fetch_array($result))
		   	{
			   	$vendors = $all_events['vendor_list'];
			  // 	echo $vendors;
			   	$vendorsArray = explode(',', $vendors);
			   //	echo "<br>";
			   	
			 for ($i=0; $i<count($vendorsArray)-1; $i++)
			   	{
			   	if ($vendorsArray[$i]!="" & preg_match('/FN/',$vendorsArray[$i]) == 1) //regex to find the type  of vendor
					  	{
					  		$result1 = mysqli_query($con,"SELECT * FROM venuelist where `fn_id`='".$vendorsArray[$i]."'");
					  		$each_vendor = mysqli_fetch_array($result1);
					  		$myAssocVendors[$vendorsArray[$i]]=$each_vendor;
					  	}
			   	if ($vendorsArray[$i]!="" & preg_match('/CAT/',$vendorsArray[$i]) == 1) //regex to find the type  of vendor
					  	{
					  		$result1 =  mysqli_query($con,"SELECT * FROM catererlist where `cat_id`='".$vendorsArray[$i]."'");
					  		$each_vendor = mysqli_fetch_array($result1);
					  		$myAssocVendors[$vendorsArray[$i]]=$each_vendor;
					  	}
			   	if ($vendorsArray[$i]!="" & preg_match('/DEC/',$vendorsArray[$i]) == 1) //regex to find the type  of vendor
					  	{
					  		$result1 =  mysqli_query($con,"SELECT * FROM decoratorlist where `dec_id`='".$vendorsArray[$i]."'");
					  		$each_vendor = mysqli_fetch_array($result1);
					  		$myAssocVendors[$vendorsArray[$i]]=$each_vendor;
					  	}
			   	if ($vendorsArray[$i]!="" & preg_match('/PH/',$vendorsArray[$i]) == 1) //regex to find the type  of vendor
					  	{
					  		$result1 =  mysqli_query($con,"SELECT * FROM photographerlist where `ph_id`='".$vendorsArray[$i]."'");
					  		$each_vendor = mysqli_fetch_array($result1);
					  		$myAssocVendors[$vendorsArray[$i]]=$each_vendor;
					  	}
			   	}
		  $myAssocEvent[$all_events['event_id']] = $all_events;
		   }
	   }
	   else {
	   	echo "You don't have any events saved yet.";
	   }
	   $obj->closeConnection($con);
?>