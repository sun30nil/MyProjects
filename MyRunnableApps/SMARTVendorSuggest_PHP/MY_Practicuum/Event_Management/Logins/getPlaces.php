<?php
include 'DBConnection.php';

$obj=new Database();
$con=$obj->openConnection();


$city=$_GET['city'];

$result = mysqli_query($con,"SELECT DISTINCT fn_location FROM venuelist where fn_city='".$city."'");
 $rows = array();
  $table = array();
while($row = mysqli_fetch_array($result))
  {
      $temp = array();
      $rows[] = array('v' => (String) $row['fn_location']);
  }
  $table = $rows;

// convert data into JSON format
$jsonTable = json_encode($table);
echo $jsonTable;
?>