<?php
require_once("function_only.inc.php");

$vid = $_GET['vend_id'];
$vname = $_GET['v_name'];
$user = $_SESSION['username'];

$obj=new Database();
$con=$obj->openConnection();
$vvid = explode(",", $vid);
$result = mysqli_query($con,"select * from comments where user_id='$user' AND vendor_id='$vvid[1]'");
$result1 = mysqli_query($con,"SELECT * FROM `comments` WHERE user_id in (select userid from family where admin='$user') AND vendor_id='$vvid[1]'");
$count_rows1=mysqli_num_rows($result);
 $count_rows2=mysqli_num_rows($result1);

echo "<table>";
echo "<tr><td bgcolor='greenyellow'>Showing Comments for </td><td bgcolor='greenyellow' ><b>$vname</b></td></tr>";
echo "<tr><td style='height:25px'></td><td></td></tr>";
echo "<tr><td bgcolor='pink' >Admin Comments</td><td></td></tr>";
if($count_rows1==0)
{
	echo "<tr><td>No Comments Posted Yet.</td><td>Be the first to post a Comment/Review now!</td></tr>";
}
else {
		while($adminComm = mysqli_fetch_array($result))
		{
			echo "<tr><td>Rating</td><td>".$adminComm['rating']."</td></tr>";
		  	echo "<tr><td>Comments</td><td>".$adminComm['comments']."</td></tr>";
		}
      }

echo "<tr><td style='height:50px'></td><td></td></tr>";
echo "<tr><td bgcolor='yellow'>Family Comments</td><td></td></tr>";
if($count_rows2==0)
{
	echo "<tr><td>No Comments Posted Yet.</td><td></td></tr>";
}
else{
		while($familyComm = mysqli_fetch_array($result1))
		{
			echo "<tr><td>Family Member ID</td><td>".$familyComm['user_id']."</td></tr>";
			echo "<tr><td>Rating</td><td>".$familyComm['rating']."</td></tr>";
		  	echo "<tr><td>Comments</td><td>".$familyComm['comments']."</td></tr>";
		}
}

  	
echo "</table>";
$obj->closeConnection($con);
?>