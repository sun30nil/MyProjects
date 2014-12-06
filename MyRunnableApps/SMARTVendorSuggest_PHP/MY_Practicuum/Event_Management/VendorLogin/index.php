<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Haritha and Prashanth
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Our Dream Website
Description: A three-column, fixed-width design with dark color scheme.
Version    : 0.1
Released   : 2014/06/07

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vendor Login</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="css/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/fonts.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/slide.css" rel="stylesheet" type="text/css" media="all" />
<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

<script src = "Js/jquery.js"></script>
<script src = "Js/Slide.js"></script>

<script src="jquery.min.js"></script>
<script>
function chk_ajax_login_with_php(){
  var username=document.getElementById("username").value;
  var password=document.getElementById("password").value;
 
    var params = "username="+username+"&password="+password;
		   var url = "login.php";
				$.ajax({
							   type: 'POST',
							   url: url,
							   dataType: 'html',
							   data: params,
							   beforeSend: function() {
							     document.getElementById("status").innerHTML= 'checking...'  ;
										 },
							   complete: function() {
										
							   },
							   success: function(html) {
								   
									 document.getElementById("status").innerHTML= html;
									 if(html=="Success!"){
									   window.location = "../wdCalendar/sample.php?uname="+username
									 }
							    }
					   });
  
}
</script>
<link rel="stylesheet" href="style.css">	
</head>
<body>

<div id="logo" class="container">
<table cellspacing="0" class="container">
<tr>
<td><h1><a href="Homepage.php">Dream<span>EventZ</span></a></h1>   
		<p>Your Event Our Plan</p>
		</td>
</tr>
</table> 	
</div>
<br><br>

<div id='logindiv'>
	
		<label>Username:</label>
			<input name="username"  id="username" type="text">
		<label>Password:</label>
			<input name="password" id="password" type="password">
			<input value="Submit" name="submit" class="submit" type="submit" onclick='chk_ajax_login_with_php();'>
        <div id='status'></div>
</div>	


<div style="position : absolute;bottom : 0;height : 40px;margin-top : 40px;" id="copyright" class="container">
	<p>Follow Us On <img src="../images/facebook.png" height="25" width="25"></img></p>
</div>
</body>
</html>

