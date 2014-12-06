<?php?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : WellFormed 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20130731

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

<script type='text/javascript'>
var ck_name = /^[A-Za-z0-9 ]{3,20}$/;
var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i ;
var ck_username = /^[A-Za-z0-9_]{1,20}$/;
var ck_password =  /^[A-Za-z0-9!@#$%^&*()_]{6,20}$/;

function validateForm(form){
var name = document.getElementById("name").value;
var email = document.getElementById("email").value;//form.email.value;
var username = document.getElementById("username").value;
var password = document.getElementById("password").value;//form.password.value;
var repassword = document.getElementById("repassword").value;//form.password.value;
var gender = document.getElementById("gender").value;//form.gender.value;
var errors = [];
 
 if (!ck_name.test(name)) {
  errors[errors.length] = "You must enter a valid Name .";
 }
 if (!ck_email.test(email)) {
  errors[errors.length] = "You must enter a valid email address.";
 }
 if (!ck_username.test(username)) {
  errors[errors.length] = "You valid UserName no special char.";
 }
 if (!ck_password.test(password)) {
  errors[errors.length] = "You must enter a valid Password. ";
 }
 if (gender==0) {
  errors[errors.length] = "Select Gender.";
 }
 if (errors.length > 0) {

  reportErrors(errors);
  return false;
 }
  return true;
}
function reportErrors(errors){
 var msg = "Please Enter Valid Data...\n";
 for (var i = 0; i<errors.length; i++) 
	 {
 var numError = i + 1;
  msg += "\n" + numError + ". " + errors[i];
}
 alert(msg);
}
</script>

</head>
<body>
<div id="logo" class="container">
	<h1><a href="Homepage.php">Dream<span>EventZ</span></a></h1>
	<p>Your Event Our Plan</a></p>
</div>
<div id="menu" class="container">
	<ul>
		<li ><a href="Homepage.php" accesskey="1" title="">Homepage</a></li>
		<li><a href="#" accesskey="1" title="">Services</a></li>
		<li><a href="Signin.php" accesskey="2" title="">Sign In</a></li>
		<li class="current_page_item"><a href="signUp.php" accesskey="3" title="">Sign Up</a></li>
		<li><a href="#" accesskey="4" title="">About Us</a></li>
		<li><a href="#" accesskey="5" title="">Contact Us</a></li>
	</ul>
</div>

<div style="position:absolute;left:550px;top:250px;">
			
	<br><b><font size = 5 color=white ><center> Create your account</center></font></b><br>
		
	<form name="form" class="well form-inline" align="left" action="RegisterUser.php" onsubmit="return validateForm(this.form)" method="post" onreset="func(this.form)">
Name<span><font color="red">*</font></span>
<br> <input id="name" name="name" placeholder="Enter Full name" type="text" />
<br></br>
Location<span><font color="red">*</font></span>
<br><input id="location" name="location" placeholder="Your current city" type="text" /></br>
<br>
Phone Number<span><font color="red">*</font></span>
<br><input id="phone" name="phone" placeholder="+XXXXX XXXXX" type="text" /></br>
<br>
Email<span><font color="red">*</font></span>
<br> <input id="email" name="email" placeholder="e.g. xxx@gmail.com" type="text" /></br>
<br>
Username<span><font color="red">*</font></span>
<br><input id="username" name="username" placeholder="user name" type="text" /></br>
<br>
Password<span><font color="red">*</font></span>
<br> <input id="password" name="password" type="password" />
<br><br>
Re-Enter Password<span><font color="red">*</font></span>
<br> <input id="repassword" name="repassword" type="password" />
<br><br>
<select id="gender" name="gender">
<option value="">Gender</option>
<option value="M">Male</option>
<option value="F">Female</option>
</select>
<br><br>
<input type="checkbox" name="terms" value="conditions"> &nbsp;&nbsp;
			<a onclick="myFunction()">Terms & conditions</a><br>
			
<input type="reset" name="reset" value="Reset">
<input type="submit" value="Create my account" >
<br><br>
<p>Fields marked <span><font color="red">*</font></span> are mandatory.</p>

</form> 
		
		<!--  	
	<form name="sign_up_form" class="well form-inline" align="left" action="#" method="get" onsubmit="return validateForm()">
			Full name*<br> <input type="text" name="name" placeholder="enter Full name" required><br><br>			
			E- mail*<br> <input type="email" name="email" placeholder="enter email" required><br><br>
			Choose your user name*<br> <input type="text" name="username" required><br><br>
			Create password* <br> <input type="password" name="password" required><br><br>
			Confirm password* <br> <input type="password" name="confirm" required><br><br>
			
			
			<input type="checkbox" name="terms" value="conditions"> &nbsp;&nbsp;
			<a onclick="myFunction()">Terms & conditions</a>			
			<br><br>
			<button type="submit" class="btn btn-primary" name="submission">Create my account</button>
		</form> -->
	</div>

</body>
</html>
