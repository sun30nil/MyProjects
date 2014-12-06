<?php ?>
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
<title>Dream Events</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="css/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/fonts.css" rel="stylesheet" type="text/css" media="all" />
<!--  <link href="css/view.css" rel="stylesheet" type="text/css" media="all" /> -->
<link href="css/slide.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/Register.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

<script src = "Js/jquery.js"></script>
<script src = "Js/Slide.js"></script>
<script src = "Js/ValidateRegister.js"></script>
<script src = "Js/PopUp.js"></script>
<script src = "Js/Dynamic.js"></script>

</head>
<body id="top">

<div id="regDiv" style="display: none;">
		<div id="regBg" style="opacity: 0.7; height: 650px; display: block"
			onclick="hide()"></div>
		<div id="main" style="position: absolute; top: 50px; left: 450px; width: 600px">
			
			<form name = "registration" onsubmit="return alertError()" action="RegisterUser.php" method='post'>
				<center>
					<table style="top: 20px; left: 12px; width: 530px; height: 80px;">
						<tbody>
							<tr>
								<td style="text-align: center; width: 480px">
									<h3>
										<span style="color: black"> <b>Registration Form</b></span>
									</h3>
								</td>
								<td style="width: 20px"><a onclick="hide()"><img src="images/close_button.png" alt="" /> </a></td>
							</tr>
						</tbody>
					</table>
				</center>
			<!--  	<fieldset name="registrationForm" style="margin: auto; width: 600px;"> -->
					<!--  <legend>Registration </legend> -->
					<div id="show2" height="200"></div>
					<table align="center" cellpadding="7" cellspacing="7">
						<tbody>	
						
		<tr>
    	<td colspan="2"><center><label id="errorMsg"></label></center></td>
      </tr>		
      			
	<tr>
		<td><b>Name</b><font color="red"> *</font></td>
		<td><input name="name" id="name" placeholder="Name" onblur="validateName()" onchange="resetFields()" /></td>
	</tr>
	
	<tr>
		<td><b>Mobile No</b><font color ="red">*</font></td>
		<td><input name="mobileno" id ="mobileno" placeholder="9876543210" onblur = "validateMobile()" onchange="resetFields()" />
		</td>
	</tr>
	
	<tr>
		<td><b>Location</b><span><font color="red">*</font></span></td>
        <td><input id="location" name="location" placeholder="+XXXXX XXXXX" type="text" onblur = "validateLocation()" onchange="resetFields()"/></td>
	</tr>
	
	<tr>
		<td><b>EmailId</b><font color="red"> *</font></td>
		<td><input name="email" id="email" placeholder="id@example.com" onblur="validateEmail()" onchange="resetFields()" />
		</td>
	</tr>
	
	<tr>
		<td><b>User Name</b><font color="red"> *</font></td>
		<td><input name="uname" id="uname" placeholder="User Name" onblur="validateUname()"onchange="resetFields()" />
		</td>
	</tr>
	
	<tr>
		<td><b>Choose Password</b><font color="red"> *</font></td>
		<td><input name="password" id="password" type="password" placeholder="Min 8 characters"  onblur="validatePassword()" onchange="resetFields()" /></td>
	</tr>
	
	<tr>
		<td><b>Re-Enter Password</b><font color="red"> *</font></td>
		<td><input name="reenter" id="reenter" type="password" placeholder="Re-enter" onblur="validateRePassword()" onchange="resetFields()" /></td>
	</tr>
				
	
	<tr>
		<td><b>I am</b><font color ="red"></font></td>
		<td><select name = "gender" id ="gender" style ="font-family:'Times New Roman';"> 
			    		<option>Male</option>
			    		<option>Female</option>
			    		</select>
        </td>
	</tr>
	
	<tr>
		<td align="right"><input type="checkbox" name="terms" value="conditions" /></td>
		<td align="left"><a onclick="myFunction()">Terms & conditions</a></td>
	
	</tr>
	
	<tr>
		<td><label align="center"><font color ="red">*</font>Fields are mandatory</label></td>
		</tr>	
	<tr>			
					<td align="right"><input type="reset" value="Reset"  name="reset"id="reset" style="border: solid 1px #7F9DB9" /></td>
					<td align="left"><input type="submit" align = "right" value="Register" name="register" id="register" style="border: solid 1px #7F9DB9"/></td>
				</tr> 
				
	<tr>
	  <td>
	  </td>
	</tr>
						</tbody>
					</table>
			<!--  	</fieldset> -->
			</form>
     </div>
</div>

<div id="regVen" style="display: none;">
		<div id="regBg" style="opacity: 0.7; height: 650px; display: block"
			onclick="hideV()"></div>
		<div id="main" style="position: absolute; top: 50px; left: 450px; width: 600px">
			
			<form id = "vendorRegistration" name = "vendorRegistration"  action="RegisterVendor.php" method='post'>
				<center>
					<table style="top: 20px; left: 12px; width: 530px; height: 80px;">
						<tbody>
							<tr>
								<td style="text-align: center; width: 480px">
									<h3>
										<span style="color: black"> <b>Vendor Registration Form</b></span>
									</h3>
								</td>
								<td style="width: 20px"><a onclick="hideV()"><img src="images/close_button.png" alt="" /> </a></td>
							</tr>
						</tbody>
					</table>
				</center>
			<!--  	<fieldset name="registrationForm" style="margin: auto; width: 600px;"> -->
					<!--  <legend>Registration </legend> -->
					<div id="show2" height="200"></div>
					<table align="center" cellpadding="7" cellspacing="7">
						<tbody>	
						
		<tr>
			<td align="right">
			<span style="font-size: px; color: black">Select:</span><font color="red"> *</font>
			</td>
									
			<td>
				<select name="role" id="role" onchange="resetFields();setFormat()">
										<option value="select">Select--</option>
										<option value="FN">FunctionHall</option>
										<option value="CAT">Caterer</option>
										<option value="DEC">Decorator</option>
										<option value="PH">Photographer</option>
				</select>
			</td>
			
	<tr>
		<td>Name:<font color="red"> *</font></td>
		<td><input name="fname" id="fname" 
		placeholder="Name" onblur="validateName()" onchange="resetFields()">
		<span style="color: red;" id="error" /> </span></td>
	</tr>
	
	<tr>
		<td>Mobile No:<font color ="red">*</font></td>
		<td><input name="mobileno" id ="mobileno" placeholder = "mobile no"  
		onblur = "validateMobile();"  onchange="resetFields()" />
		<span style="color: red;" id="error4"> </span></td>
	</tr>
	<tr>
		<td>EmailId:<font color="red"> *</font></td>
		<td><input name="emailId" id="emailId"
		placeholder="id@example.com" onblur="validateEmail()" onchange="resetFields()" />
		<span style="color: red;" id="error5"> </span></td>
	</tr>
	<tr>
		<td>Address:<font color ="red">*</font> </td>
		<td><textarea name="Address" id ="Address" placeholder = "Address" onchange="resetFields()" /> </textarea>
		<span style="color: red;" id="error1" > </span></td>
	</tr>
	
	<tr>
		<td>Location:<font color ="red">*</font> </td>
		<td><input name="location" id="location" 
		placeholder="location" onblur="validateName()" onchange="resetFields()" />
	</tr>
	
	<tr>
		<td>Price:<font color ="red">*</font> </td>
		<td><input name="price" id="price" 
		placeholder="price" onblur="validateName()" onchange="resetFields()" />
	</tr>
	
		
	<tr>
	<td>City:<font color ="red">*</font> </td>
	<td><select id='city' name='city' > <option>--select--</option><option value="Hyderabad">Hyderabad</option></select></td>
	</tr>
	
	<tr>
	
		<td>Payment Type</td>
		<td><input type="checkbox" name="Payment" value="Cash" />Cash<input type="checkbox" name="Payment" value="Cheque" />Cheque<input type="checkbox" name="Payment" value="card">card</td>
	</tr>
	</table>
	
	<table id="foo" style="display:none;" cellspacing="5" cellpadding="10">
	
	
	
	<tr>
		<td>Capacity:<font color="red"> *</font></td>
		<td><input name="capacity" id="capacity" size="30"
		placeholder="capacity" onblur="validateName()" onchange="resetFields()" />
		<span style="color: red;" id="error"> </span></td>
	</tr>
	
	<tr>
		<td>VenueType:<font color ="red">*</font> </td>
		<td><input name="venueType" id="venueType" size="30"
		placeholder="AC,Banquet Halls" onblur="validateName()" onchange="resetFields()" />
	</tr>
	
	
	</table>
	
	<table id="foo1" style="display:none;" cellspacing="5" cellpadding="10" width="70%">
	
	<tr>
	
		<td>Food Type</td>
		<td><input type="checkbox" name="FoodType" value="Veg" />Veg<input type="checkbox" name="FoodType" value="Non-Veg" />Non-Veg </td>
	</tr>
	<tr>
	
		<td>Order Type</td>
		<td><input type="checkbox" name="OrderType" value="Bike" />In office<input type="checkbox" name="OrderType" value="Car" />Phone <input type="checkbox" name="OrderType" value="Doorstep" />Doorstep<input type="checkbox" name="OrderType" value="Online" />Online</td>
	</tr>

	</table>
	<table id="foo2" style="display:none;" cellspacing="5" cellpadding="10">
	</table>
	<table id="foo3" style="display:none;" cellspacing="5" cellpadding="10">
	<tr>
	
		<td>Photo Type</td>
		<td><input type="checkbox" name="PhotoType" value="PhotoStudio" />Photo Studio<input type="checkbox" name="PhotoType" value="Professional" />Professional<input type="checkbox" name="PhotoType" value="FreeLancer" />Free Lancer</td>
	</tr>
	</table>
	
	<table cellspacing="5" cellpadding="10" width="70%">
	
	<tr>
		<td align="right"><input type="checkbox" name="terms" value="conditions" /></td>
		<td><a onclick="myFunction()">Terms & conditions</a></td>
	
	</tr>
	
	<tr>			
		<td align="right"><input type="reset" value="Reset"  name="reset"id="reset" style="border: solid 1px #7F9DB9" /></td>
	    <td><input type="submit" align = "right" value="Register" name="register" id="register" style="border: solid 1px #7F9DB9"/></td>
	</tr> 

	 <tr><td align="center"><label><font color ="red">*</font>Fields are mandatory</label></td></tr>
	<tr>
	  <td>
	  </td>
	</tr>
						</tbody>
					</table>
			<!--  	</fieldset> -->
			</form>
     </div>
</div>


<div id="logo" class="container">
<table cellspacing="0" class="container">
<tr>
<td><h1><a href="Homepage.php">Dream<span>EventZ</span></a></h1>   
		<p>Your Event Our Plan</p>
		</td>
<td><a href="#" onclick="unHide()" title="User sign up"><img src="images/signup.png" height="64" width="60"></img></a></td>             
<td><a href="Logins/customerLogin.php" title="User sign in"><img src="images/signin.png" height="64" width="60"></img></a></td>
</tr>
</table> 	
</div>

<div id="menu" class="container">
	<ul>
		<li class="current_page_item"><a href="#" accesskey="1" title="">Home</a></li>
		<li><a href="" accesskey="1" title="">Services</a></li>
		<li><a href="#" accesskey="4" title="">About Us</a></li>
		<li><a href="ContactUs.php" accesskey="5" title="">Contact Us</a></li>
	</ul>
</div>

<div id="three-column" class="container">
	<div id="tbox1">
		<h2>Wedding</h2>
		<p>A delightful ceremony in everyone's life on earth irrespective of religion or nationality which binds two souls together. </p>
		<a href="ShowVenues.php" class="button">Plan your Wedding</a> 
		<a href="LoginWithGoogle/index.php" class="button">Plan using Google Account</a> 
	</div>
	
		<div id="slideshow">
    		
        		<div><img src="images/event1.jpg" height="300" width="400"/></div>
        		<div><img src="images/event2.jpg" height="300" width="400"/></div>
        		<div><img src="images/event3.jpg" height="300" width="400"/></div>
        		<div><img src="images/event4.jpg" height="300" width="400"/></div>
        		<div><img src="images/event5.jpg" height="300" width="400"/></div>
        		<div><img src="images/event6.jpg" height="300" width="400"/></div>
        		<div><img src="images/event7.jpg" height="300" width="400"/></div>
        		<div><img src="images/event8.jpg" height="300" width="400"/></div>
   		 
		</div>
	
	<div id="tbox3" class="container">
	
	<ul>
		<li><a href="#" onclick = "unHideV()" class="button">Vendor Sign Up</a></li>
		<li><a href="VendorLogin/index.php" class="button">Vendor Add An Event</a> </li>
		
	</ul>
	</div>
	

</div>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=1539373592956604&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div style="position : variable; bottom : 0;height : 40px;margin-top : 40px;margin-left:700px" class="fb-like" data-href="https://www.facebook.com/pages/Dream-Eventz/225645657645836?ref=hl" data-width="200" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
</body>
</html>
