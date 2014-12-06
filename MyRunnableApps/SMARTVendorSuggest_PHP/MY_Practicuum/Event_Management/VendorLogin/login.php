<?php
include "DBConnection.php";
session_start();
  if($_POST){
  
	  $username=$_POST['username'];
	  $password=$_POST['password'];
	  
	  $obj=new Database();
      $con=$obj->openConnection();

$result = mysqli_query($con,"select fn_id from venuelist where fn_id='$username'");
	  
	 //  $sql=mysql_query("select fn_id from venuelist where fid='$username'");
	   $count_rows=mysqli_num_rows($result);
	// $count_rows = $result->num_rows;
	   
	   if($count_rows>0 && $username==$password)
	   {
	      $rs_login=mysqli_fetch_assoc($result);
		  $uid=$rs_login['fn_id'];
		  $_SESSION['username']=$uid;
		  echo "Success!";
	   }
	   else{
		 echo "Invalid Username or Password";
	   }
   }
   
?>