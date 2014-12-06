<?php?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Haritha and Prashanth
Released for free under a Creative Commons Attribution 2.5 License

Name       : Our Dream Website
Description: A three-column, fixed-width design with dark color scheme.
Version    : 0.1
Released   : 2014/06/07
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="css/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

<script type='text/javascript'>
var ck_name = /^[A-Za-z0-9 ]{3,20}$/;
var ck_username = /^[A-Za-z0-9_]{1,20}$/;


function validateForm(form){
var name = document.getElementById("name").value;

var username = document.getElementById("username").value;

var errors = [];
 
 if (!ck_name.test(name)) {
  errors[errors.length] = "You must enter a valid Name .";
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


<div style="position:absolute;left:100px;top:50px;">
			
	<br><b><font size = 5 color=white ><center> Add your family memeber</center></font></b><br>
		
	<form name="form" class="well form-inline" align="left" action="addfamilyDB.php" onsubmit="return validateForm(this.form)" method="post" onreset="func(this.form)">
Name<span><font color="red">*</font></span>
<br> <input id="name" name="name" placeholder="Enter Full name" type="text" />
<br><br>
Relation<span><font color="red">*</font></span>
<br>
<select id="relation" name="relation">
<option value="Father" >Father</option>
<option value="Mother" >Mother</option>
<option value="Spouse">Spouse</option>
<option value="Brother">Brother</option>
<option value="Sister">Sister</option>
<option value="Uncle">Uncle</option>
<option value="Aunt">Aunt</option>
<option value="Cousin">Cousin</option>
<option value="Nephew">Nephew</option>
<option value="Nice">Nice</option>
<option value="Father-in-Law">Father-in-Law</option>
<option value="Mother-in-Law">Mother-in-Law</option>
<option value="GrandFather">GrandFather</option>
<option value="GrandMother">GrandMother</option>
<option value="Friend">Friend</option>
<option value="Other">Other</option>
</select>
<br>
<br>
User id<span><font color="red">*</font></span>

<br><input id="username" name="username" placeholder="user name" type="text" /></br>
<br>
Email<span><font color="red">*</font></span>
<br><input id="email" name="email" placeholder="valid email id of the member" type="email" /></br>
<br>	
<input type="reset" name="reset" value="Reset">
<input type="submit" value="Add" >
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
