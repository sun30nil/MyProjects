<?php 
include 'DBConnection.php';

$obj1=new Database();
$con1=$obj1->openConnection();
if($_POST)
{
	$role = $_POST["role"];
	$name = $_POST["fname"];
	$phone = $_POST["mobileno"];
	$email = $_POST["emailId"];
	$address = $_POST["Address"];
	$location = $_POST["location"];
	$price = $_POST["price"];
	$city = $_POST["city"];
}

if($role=="FN")
{
	$capacity = $_POST['capacity'];
	$venueType = $_POST['venueType'];
   $num = rand(0, 1000);
   $fn_id = "FN1".$num;
   $myquery="INSERT INTO venuelist VALUES ('$fn_id', '$name', $capacity, '$venueType', '$phone', '$address', '$location', '$city',$price, NOW())";

}
//echo "Query: ".$myquery;
else if($role=="CAT")
{
	$pay_type = $_POST['Payment'];
	$capacity = $_POST['capacity'];
	$foodType = $_POST['FoodType'];
	$OrderType = $_POST['OrderType'];
	$num = rand(0, 1000);
   $cat_id = "CAT1".$num;
   $myquery="INSERT INTO catererlist VALUES ('$cat_id', '$name','$address','$location','$city','N/A','$pay_type', $capacity, '$foodType', '$OrderType', '$phone',$price, NOW())";
}
else if($role=="DEC")
{
	$pay_type = $_POST['Payment'];
	$num = rand(0, 1000);
   $dec_id = "DEC1".$num;
   $myquery="INSERT INTO decoratorlist VALUES ('$dec_id', '$name','$address','$location', '$city', 'N/A', '$pay_type',$price,'$phone', NOW())";
}
else if($role=="PH")
{
	$pay_type = $_POST['Payment'];
	$PhotoType = $_POST['PhotoType'];
	$num = rand(0, 1000);
   $ph_id = "PHO1".$num;
   $myquery="INSERT INTO photographerlist VALUES ('$ph_id', '$name', '$address','$location', '$city', 'N/A','$PhotoType', $price,'$pay_type','$phone', NOW())";
}
$retval = mysqli_query(  $con1 , $myquery);
if(! $retval )
{
  die('Sorry! Could not enter data: ' . mysql_error());
}
$obj1->closeConnection($con1);
echo "<h1>You have successfully registered! Thank You</h1>"
?>
