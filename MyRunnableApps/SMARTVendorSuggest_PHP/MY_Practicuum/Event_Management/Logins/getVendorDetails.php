<?php
//include 'showSavedEvents.php';
require_once("function_only.inc.php");
$vend_map = $myAssocVendors;
$vid = $_GET['vend_id'];
$my_vendor = $vend_map[$vid];
echo "<table>";
if(preg_match('/FN/',$vid) == 1)
{
	echo "<tr><td bgcolor='yellow'>Function Hall</td><td></td></tr>";
  	echo "<tr><td>Name</td><td>".$my_vendor['fn_name']."</td></tr>";
  	echo "<tr><td>Venue Types</td><td>".$my_vendor['fn_venuetypes']."</td></tr>";
  	echo "<tr><td>Maximum Capacity</td><td>".$my_vendor['fn_capacity']."</td></tr>";
  	echo "<tr><td>Location</td><td>".$my_vendor['fn_location']."</td></tr>";
  	echo "<tr><td>Phone</td><td>".$my_vendor['fn_phone']."</td></tr>";
  	echo "<tr><td>Address</td><td>".$my_vendor['fn_address']."</td></tr>";
}
else if(preg_match('/CAT/',$vid) == 1)
{
	echo "<tr><td bgcolor='yellow'>Caterers</td><td></td></tr>";
  	echo "<tr><td>Name</td><td>".$my_vendor['cat_name']."</td></tr>";
  	echo "<tr><td>Rating</td><td>".$my_vendor['cat_rating']."</td></tr>";
  	echo "<tr><td>Food Types</td><td>".$my_vendor['cat_foodtype']."</td></tr>";
  	echo "<tr><td>Ordering Modes</td><td>".$my_vendor['cat_orders']."</td></tr>";
  	echo "<tr><td>Payment Modes</td><td>".$my_vendor['cat_paymode']."</td></tr>";
  	echo "<tr><td>Location</td><td>".$my_vendor['cat_place']."</td></tr>";
  	echo "<tr><td>Phone</td><td>".$my_vendor['cat_contact']."</td></tr>";
  	echo "<tr><td>Address</td><td>".$my_vendor['cat_address']."</td></tr>";
}
if(preg_match('/DEC/',$vid) == 1)
{
	echo "<tr><td bgcolor='yellow'>Decorators</td><td></td></tr>";
  	echo "<tr><td>Name</td><td>".$my_vendor['dec_name']."</td></tr>";
  	echo "<tr><td>Rating</td><td>".$my_vendor['dec_rating']."</td></tr>";
  	echo "<tr><td>Payment Modes</td><td>".$my_vendor['dec_paymode']."</td></tr>";
  	echo "<tr><td>Location</td><td>".$my_vendor['dec_place']."</td></tr>";
  	echo "<tr><td>Phone</td><td>".$my_vendor['dec_contact']."</td></tr>";
  	echo "<tr><td>Address</td><td>".$my_vendor['dec_address']."</td></tr>";
}
if(preg_match('/PH/',$vid) == 1)
{
	echo "<tr><td bgcolor='yellow'>Photographers</td><td></td></tr>";
  	echo "<tr><td>Name</td><td>".$my_vendor['ph_name']."</td></tr>";
  	echo "<tr><td>Rating</td><td>".$my_vendor['ph_rating']."</td></tr>";
  	echo "<tr><td>Profession</td><td>".$my_vendor['ph_type']."</td></tr>";
  	echo "<tr><td>Payment Modes</td><td>".$my_vendor['ph_paymode']."</td></tr>";
  	echo "<tr><td>Location</td><td>".$my_vendor['ph_place']."</td></tr>";
  	echo "<tr><td>Phone</td><td>".$my_vendor['ph_phone']."</td></tr>";
  	echo "<tr><td>Address</td><td>".$my_vendor['ph_address']."</td></tr>";
}
echo "</table>";

?>