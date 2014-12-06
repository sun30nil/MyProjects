<?php 
include 'DBConnection.php';

$obj1=new Database();
$con1=$obj1->openConnection();
if($_POST)
{
	$name=$_POST["name"];
	$loc=$_POST["location"];
	$phone=$_POST["mobileno"];
	$email = $_POST["email"];
	$username=$_POST["uname"];
	$password=$_POST["password"];
	$gender=$_POST["gender"];
}

$myquery="INSERT INTO register VALUES ('$name', '$loc', $phone, '$email', '$username', '$password', '$gender', NOW())";
//echo "Query: ".$myquery;

$retval = mysqli_query(  $con1 , $myquery);
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
$obj1->closeConnection($con1);
echo "<h1>You have successfully registered! Thank You</h1>"
?>