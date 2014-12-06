<?php 
include 'DBConnection.php';

session_start();

$obj1=new Database();
$con1=$obj1->openConnection();
if($_POST)
{
	$list = $_POST["vendor_list"];
	$location = $_POST["place"];
	$budget = $_POST["budget"];
	$capacity = $_POST["capacity"];
	$date = $_POST["date"];
}
$descript = "Budget=".$budget."; capacity=".$capacity;
$username = $_SESSION['username'];
$myquery = "INSERT INTO savedevents VALUES (DEFAULT,'$username', '$list',$budget,$capacity,'$date','$location', NOW())";

$myquery1 = "INSERT INTO jqcalendar VALUES (DEFAULT,'$username', 'Marriage','$location','$descript','$date','$date',1,'1','NULL')";

$retval = mysqli_query($con1 , $myquery);
$retval1 = mysqli_query($con1 , $myquery1);
if(! $retval  )
{
  die('Could not save data ' . mysql_error());
}
else if (! $retval1 )
{
  die('Could not save data into the Calendar' . mysql_error());
}
else echo "Success!";

$obj1->closeConnection($con1);
?>