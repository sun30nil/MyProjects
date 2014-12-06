<?php
include "DBConnection.php";

session_start();
$username = $_SESSION['username'];

  $obj=new Database();
  $con=$obj->openConnection();

  $all_dates = array();
$result = mysqli_query($con,"select event_date from savedevents where user_id='$username'");
while($event_dates = mysqli_fetch_assoc($result))
{
	array_push($all_dates, $event_dates['event_date']);
}
$today = date("Y/m/d");
if(strtotime($all_dates[0])>=strtotime($today))
{   $latest = $all_dates[0];  }  //to find the latest event to happen for the user 


for($x=1;$x<count($all_dates);$x++) 
{
  if(strtotime($all_dates[$x]) < strtotime($latest) && strtotime($all_dates[$x])>=strtotime($today))
  {
  	$latest = $all_dates[$x];
  }
}

$now = time(); //current time
     $your_date = strtotime($latest);
     $datediff = $your_date - $now;
     echo floor($datediff/(60*60*24)). " Day(s) Left for the Event";
?>