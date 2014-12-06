<?php
include "function_only.inc.php"
?>
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
<title><?php 
	echo $_SESSION['name'];
?>  </title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

<script src = "Js/jquery.js"></script>
<script src = "Js/Slide.js"></script>
<script src = "jquery.min.js"></script>
<script src = "../Js/clocks.js"></script>
<script src = "../Js/dates.js"></script>
<script type="text/javascript">

function pop_up(){
	window.open('addfamily.php','win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=500,height=500,directories=no,location=no,top=100,left=100') 
}
function findVendorDetails(v)
{
	window.open("getVendorDetails.php?vend_id="+v,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=500,height=500,directories=no,location=no,top=100,left=100') 
}
function removeVendor(v1,v2)
{
	var confi = confirm("Would you like to remove "+v2+"?");
	if(confi)
	{
		var vend = document.getElementById(v1).value;
		window.open("removeVendor.php?vend_id="+vend,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=500,height=500,directories=no,location=no,top=100,left=100') 
		location.reload();
	}
}
function removeEvent(v1)
{
	var confi = confirm("Are you sure you want to remove this Event?");
	if(confi)
	{
		var event = document.getElementById(v1).value;
		window.open("RemoveEvent.php?event_id="+event,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=500,height=500,directories=no,location=no,top=100,left=100') 
		location.reload();
	}
}

function summarize(v1, v2)
{
	var vend = document.getElementById('summaryfh').value;
	window.open("SummarizeVendors.php?event_id="+v1+"&v_type="+v2,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=900,height=700,directories=no,location=no,top=100,left=100')
}
function getEventNotification(){
	//alert();
	var params = "usame=user";
			   var url = "DaysToEvent.php";
					$.ajax({
								   type: 'GET',
								   url: url,
								   dataType: 'html',
									   data: params,
								   beforeSend: function() {
								     document.getElementById("eventDate").innerHTML= 'checking...'  ;
											 },
								   complete: function() {
											
								   },
								   success: function(html) {
									   
										 document.getElementById("eventDate").innerHTML= html;
								    }
						   });
	  
	}
</script>	
<link rel="stylesheet" href="css1/style.css" type="text/css" media="screen, projection, tv" />
<link rel="stylesheet" href="css1/style-print.css" type="text/css" media="print" />
</head>
<body onload="getEventNotification();">

<div id="logo" class="container">
<table cellspacing="0" class="container">
<tr>
<td><h1><a href="../Homepage.php">Dream<span>EventZ</span></a></h1>   
		<p>Your Event Our Plan</p>
		</td> <div id="clock" class="clock" style="float: right; margin-right: 20px;color:green">  </div>
		<div id="dates" class="dates" style="float: right; margin-right: 20px;color:green">  </div>
</tr>
</table> 	
</div>
<form action="Logout.php" method="get"><input type="submit" value="Sign Out" style="float:right;color:yellow; background-color:red;margin-right: 20px;"></input></form>
<div id="eventDate1" class="eventDate1" style="float: right; margin-right: 20px;"> <a href="../wdCalendar/sample.php" style="color:yellow" id="eventDate" class="eventDate"></a></div>
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
          <?php if($_SESSION['role']!="family") echo "<li><a href='ShowVenues.php'>Plan a wedding</a></li> ";?>        
   <?php if($_SESSION['role']!="family") echo "<li><a href='#' onclick='pop_up()'>Add family member</a></li> ";?> 
        <li><a href="showSavedEvents.php" >Show My Events</a></li>      
        <li><a href="../wdCalendar/sample.php" >Calendar Application</a></li> 
        <?php if($_SESSION['role']!="family") echo "<li><a href='SummaryReport.php' class='active'>Summarize Vendors</a></li> ";?>  
        <li class="last"><a href="#">Contact Dream events</a></li>
      </ul>
    </div>
    <div id="skip-menu"></div>
    <div class="column-right">
      <div class="box">
        <div class="box-top"></div>
        <div class="box-in" id="box-in">
        <table style="color:black;">
         <?php 
         
         if($_SESSION['role']!="family")
         {
         $counter = 1;
     foreach($myAssocEvent as $x=>$x_value) {
	   	echo "<tr><td bgcolor='cyan' style='width:125px'>Event #".$counter."</td>
	   	<td style='width:175px'> <button id='$x' onclick='removeEvent(this.id);' value='$x'>Remove Event</button> </td> <td style='width:70px'></td></tr>";
	   	echo "<tr><td>Place</td><td>".$x_value['location']."</td></tr>";
	   	echo "<tr><td>Budget</td><td>".$x_value['budget']."</td></tr>";
	   	echo "<tr><td>Capacity</td><td>".$x_value['capacity']."</td></tr>";
	   	echo "<tr><td>Event Date</td><td>".$x_value['event_date']."</td></tr>";
	   	echo "<tr><td>Last Saved</td><td>".$x_value['timesaved']."</td></tr>";
//  echo "EventID=" . $x . ", Budget=" . $x_value['budget']. ", Capacity=" . $x_value['capacity']. ", Event Date=" . $x_value['event_date']. ", Last Saved on=" . $x_value['timesaved'];
  foreach($myAssocVendors as $y=>$y_value) {
  	if(preg_match('/'.$y.'/',$x_value['vendor_list']) == 1 && preg_match('/FN/',$y) == 1)
  	{
  		$fnid = $y_value['fn_id'];
  		$event = $x_value['event_id'];
  		$type = "FN";
  		$id1=$x.",".$y_value['fn_id'];
  		$vname=$y_value['fn_name'];
  		echo "<tr bgcolor='greenyellow'><td>Function hall</td>
  	<td> <a id=$fnid href='javascript:void(0);' onclick=findVendorDetails('$fnid'); >".$y_value['fn_name']."</a></td>
  	<td> <button id='".$id1."' onclick='removeVendor(this.id,this.name);' name='".$vname."' value='".$id1."'>Remove Vendor</button></td>
  	<td> <a id=summaryfh href=javascript:void(0); onclick=summarize('$event','$type'); >Summarize Function Halls</a></td></tr>";
  		
  	}
  	else if(preg_match('/'.$y.'/',$x_value['vendor_list']) == 1 && preg_match('/CAT/',$y) == 1)
  	{
  		$catid = $y_value['cat_id'];
  		$id1=$x.",".$y_value['cat_id'];
  		$vname=$y_value['cat_name'];
  		$event = $x_value['event_id'];
  		$type = "CAT";
  		echo "<tr bgcolor='pink'><td>Caterer</td>
  		<td> <a id=$catid href='javascript:void(0);' onclick=findVendorDetails('$catid'); >".$y_value['cat_name']."</a></td>
  		<td> <button id='".$id1."' onclick='removeVendor(this.id,this.name);' name='".$vname."' value='".$id1."'>Remove Vendor</button></td>
  		<td> <a id=summaryfh href=javascript:void(0); onclick=summarize('$event','$type'); >Summarize Caterers</a></td></tr>";
  	}
  	else if(preg_match('/'.$y.'/',$x_value['vendor_list']) == 1 && preg_match('/DEC/',$y) == 1)
  	{
  		$decid = $y_value['dec_id'];
  		$id1=$x.",".$y_value['dec_id'];
  		$vname=$y_value['dec_name'];
  		$event = $x_value['event_id'];
  		$type = "DEC";
  		echo "<tr bgcolor='moccasin'><td>Decorator</td>
  		<td> <a id=$decid href='javascript:void(0);' onclick=findVendorDetails('$decid'); >".$y_value['dec_name']."</a></td>
  		<td> <button id='".$id1."' onclick='removeVendor(this.id,this.name);' name='".$vname."' value='".$id1."'>Remove Vendor</button></td>
  		<td> <a id=summaryfh href=javascript:void(0); onclick=summarize('$event','$type'); >Summarize Decorators</a></td></tr>";
  	}
  	else if(preg_match('/'.$y.'/',$x_value['vendor_list']) == 1 && preg_match('/PH/',$y) == 1)
  	{
  		$phid = $y_value['ph_id'];
  		$id1=$x.",".$y_value['ph_id'];
  		$vname=$y_value['ph_name'];
  		$event = $x_value['event_id'];
  		$type = "PH";
  		echo "<tr bgcolor='PaleTurquoise'><td>Photographer</td>
  		<td> <a id=$phid href='javascript:void(0);' onclick=findVendorDetails('$phid'); >".$y_value['ph_name']."</a></td>
  		<td> <button id='".$id1."' onclick='removeVendor(this.id,this.name);' name='".$vname."' value='".$id1."'>Remove Vendor</button></td>
  		<td> <a id=summarycat href=javascript:void(0); onclick=summarize('$event','$type'); >Summarize Photographers</a></td></tr>";
  	}
  }
  $counter++;
  echo "<tr><td style='height:40px'> </td><td> </td></tr> <tr><td> </td><td> </td></tr>";
}
         }
         
  ?>
        </table>
 
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


<div style="position : variable; bottom : 0;height : 40px;margin-top : 40px;" class="fb-like" data-href="https://www.facebook.com/pages/Dream-Eventz/225645657645836?ref=hl" data-width="200" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
</body>
</html>



