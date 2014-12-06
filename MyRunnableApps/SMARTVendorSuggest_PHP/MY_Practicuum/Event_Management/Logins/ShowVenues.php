<?php ?>

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
<title><?php 
	session_start();
	echo $_SESSION['name'];
?>  </title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

<script src = "Js/jquery.js"></script>
<script src = "Js/Slide.js"></script>
<script src="jquery.min.js"></script>
<!--Load the AJAX API-->
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="//www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1', {packages: ['table']});
    </script>   
<script type="text/javascript">
function pop_up(url){
	window.open('addfamily.php','win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=500,height=500,directories=no,location=no,top=100,left=100') 
}
function giveQuery()
{
	$("#box-in").load("ShowVenues.php");
}
function findPlaces() {
var e = document.getElementById("city").value;
//var v=e.options[e.selectedIndex].value;
//"<option></option>").text(this.v).attr('value', this.v)
var urll="getPlaces.php?city="+e;
//alert(urll);
  var jsonData = $.ajax({
      url: urll,
      dataType:"json",
      async: false
      }).responseText;
  
	// alert (jsonData);

	 var json1 = JSON.parse(jsonData);
//	 alert (json1);
	 if(json1.length==0)
	 {
	 alert("No matching result sets found.");
	 }
$.each(json1, function () 
	{
    $("#selected").append(
        $("<option value='" +this.v+ "'>" + this.v + "</option>"));
});

$("#selected").on('change', '[type=option]', function () {
   console.log($(this).val());
});
	    
}

</script>	
<link rel="stylesheet" href="css1/style.css" type="text/css" media="screen, projection, tv" />
<link rel="stylesheet" href="css1/style-print.css" type="text/css" media="print" />
</head>
<body>

<div id="logo" class="container">
<table cellspacing="0" class="container">
<tr>
<td><h1><a href="userHome.php">Dream<span>EventZ</span></a></h1>   
		<p>Your Event Our Plan</p>
		</td>
</tr>
</table> 	
</div>
<form action="Logout.php" method="get"><input type="submit" value="Sign Out" style="float:right;color:yellow; background-color:red;margin-right: 20px;"></input></form>
<div id="wrapper">
  <div class="title">
    <div class="title-top">
      <div class="title-left">
        <div class="title-right">
          <div class="title-bottom">
            <div class="title-top-left">
              <div class="title-bottom-left">
                <div class="title-top-right">
                  <div class="title-bottom-right">
                    <h1>Welcome <span><?php echo $_SESSION['name'];?></span></h1>
                    <p>Your profile..&hellip; </p>
                    
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr class="noscreen" />
  <div class="content">
    <div class="column-left">
      <h3>MENU</h3>
      <a href="#skip-menu" class="hidden">Skip menu</a>
      <ul class="menu">
        <li><a href="userHome.php" >Home</a></li>
         <?php if($_SESSION['role']!="family") echo "<li><a href='ShowVenues.php' class='active'>Plan a wedding</a></li> ";?>        
   <?php if($_SESSION['role']!="family") echo "<li><a href='#' onclick='pop_up()'>Add family member</a></li> ";?> 
        <li><a href="showSavedEvents.php" >Show My Events</a></li>      
        <li><a href="../wdCalendar/sample.php" >Calendar Application</a></li>  
         <?php if($_SESSION['role']!="family") echo "<li><a href='SummaryReport.php' >Summarize Vendors</a></li> ";?>      
        <li class="last"><a href="#">Contact Dream events</a></li>
      </ul>
    </div>
    <div id="skip-menu"></div>
    <div class="column-right">
      <div class="box">
        <div class="box-top"></div>
        <div class="box-in" id="box-in">
        <form action="showCustomVendors.php" method="get" >
<table align="center" style="background-color:springgreen;" >
<tr>
<td>Date: </td>
<td><input type="date" id="w_date" name="w_date" value="" placeholder="Enter the wedding date"></td>
</tr>
<tr>
<td>City:</td>
<td> <select id="city" onchange="findPlaces();" name="city">
            <option value="0" selected="selected">Choose a City</option>
            <option value="Hyderabad">Hyderabad</option>
          </select></td>
</tr>
<tr>
<td>Place:</td>
<td><select id="selected" name="selected"></select></td>
</tr>
<tr>
<td>Capacity:</td>
<td><input type ="text" name="capacity" value="" placeholder="eg. 1000"></td>
</tr>
<tr>
<td>Budget:</td>
<td><input type="text" name="budget" placeholder="eg. 50000"></td>
</tr>
<tr>
<td><input  type="reset"></td>
<td><input type="submit" value="Find" ></td>
</tr>
</table>
</form>
         
        </div>
      </div>
    
    </div>
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


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=1539373592956604&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div style="position : variable; bottom : 0;height : 40px;margin-top : 40px;" class="fb-like" data-href="https://www.facebook.com/pages/Dream-Eventz/225645657645836?ref=hl" data-width="200" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
</body>
</html>



