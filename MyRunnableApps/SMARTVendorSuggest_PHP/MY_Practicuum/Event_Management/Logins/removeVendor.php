<?php
require_once("function_only.inc.php");
$obj=new Database();
 $con=$obj->openConnection();
$vend_map = $myAssocVendors;

 
 
$vid = $_GET['vend_id'];
$varr = explode(',', $vid);  //getting the url encoded event id split from vendor id
$r_eventID = $varr[0];  // event id to be removed
$r_vendID = $varr[1];   // vendor id to be removed
$copy_target = $myAssocEvent[$r_eventID];
$get_vendors = $copy_target['vendor_list'];
$varr1 = explode(',', $get_vendors);
for($i=0;$i<count($varr1);$i++)
{
	if($varr1[$i]==$r_vendID)
	{
		unset($varr1[$i]);
	}
}
$myvar = implode(",", $varr1);
mysqli_query($con,"UPDATE savedevents SET vendor_list='$myvar' WHERE event_id='$r_eventID'");
$obj->closeConnection($con);
//echo $get_vendors." ///////  ".$r_vendID;
$my_vendor = $vend_map[$r_vendID];
if(preg_match('/FN/',$r_vendID) == 1)
echo "Successfully Deleted!<br> ".$my_vendor['fn_name'];
if(preg_match('/CAT/',$r_vendID) == 1)
echo "Successfully Deleted!<br>".$my_vendor['cat_name'];
if(preg_match('/DEC/',$r_vendID) == 1)
echo "Successfully Deleted!<br>".$my_vendor['dec_name'];
if(preg_match('/PH/',$r_vendID) == 1)
echo "Successfully Deleted!<br>".$my_vendor['ph_name'];
?>