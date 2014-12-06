<?php
include "DBConnection.php";
session_start();
  if($_POST){
  
	  $username=$_POST['username'];
	  $password=$_POST['password'];
	  
	  $obj=new Database();
      $con=$obj->openConnection();

$result = mysqli_query($con,"select * from register where username='$username' AND password='$password'");
$result1 = mysqli_query($con,"select * from family where userid='$username'");
	  
	 //  $sql=mysql_query("select fn_id from venuelist where fid='$username'");
	   $count_rows=mysqli_num_rows($result);
	   $count_rows1 = mysqli_num_rows($result1);
	// $count_rows = $result->num_rows;
	   
	   if($count_rows>0)
	   {
	      $rs_login=mysqli_fetch_assoc($result);
		  $uid=$rs_login['username'];
		  //setting some session attributes for future use
		  $_SESSION['role']="admin";             //to identify the admin from other family members
		  $_SESSION['username']=$uid;
		  $_SESSION['name']=$rs_login['name'];
		  $_SESSION['location']=$rs_login['location'];
		  $_SESSION['phone_number']=$rs_login['phone_number'];
		  $_SESSION['passowrd']=$rs_login['password'];
		  $_SESSION['email']=$rs_login['email'];
		  
		  echo "Success!";
	   }
  else if($count_rows1>0)
	   {
	      $rs_login=mysqli_fetch_assoc($result1);
		  $uid=$rs_login['userid'];
		  //setting some session attributes for future use
		  $_SESSION['role']="family";             //to identify the family members
		  $_SESSION['his_id']=$uid;
		  $_SESSION['username']=$rs_login['admin'];
		  $_SESSION['name']=$rs_login['name'];
		  $_SESSION['relation']=$rs_login['relation'];
		  $_SESSION['admin']=$rs_login['admin'];
		  echo "Success!";
	   }
	   else{
		 echo "Invalid Username or Password";
	   }
   }
   
?>