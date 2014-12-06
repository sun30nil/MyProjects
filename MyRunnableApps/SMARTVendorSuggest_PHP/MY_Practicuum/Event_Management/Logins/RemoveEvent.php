<?php
require_once("function_only.inc.php");
$obj=new Database();
 $con=$obj->openConnection();

$eventid = $_GET['event_id'];

mysqli_query($con,"DELETE from savedevents WHERE event_id=$eventid");
$obj->closeConnection($con);

echo "Successfully Deleted the event!";
?>