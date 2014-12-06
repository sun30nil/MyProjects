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

<script src = "../Js/jquery.js"></script>
<script src = "../Js/Slide.js"></script>
<script src="jquery.min.js"></script>
<script src = "../Js/clocks.js"></script>
<script src = "../Js/dates.js"></script>
<script>
function pop_up(){
	alert();
	window.open('addfamily.php','win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=500,height=500,directories=no,location=no,top=100,left=100') 
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
<td><h1><a href="userHome.php">Dream<span>EventZ</span></a></h1>   
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
       <li><a href="userHome.php" class="active">Home</a></li>
  <?php if($_SESSION['role']!="family") echo "<li><a href='ShowVenues.php'>Plan a wedding</a></li> ";?>        
   <?php if($_SESSION['role']!="family") echo "<li><a href='#' onclick='pop_up();'>Add family member</a></li> ";?> 
        <li><a href="showSavedEvents.php" >Show My Events</a></li>   
         <li><a href="../wdCalendar/sample.php" >Calendar Application</a></li>
   <?php if($_SESSION['role']!="family") echo "<li><a href='SummaryReport.php' >Summarize Vendors</a></li> ";?>   
        <li class="last"><a href="ContactUS.php">Contact Dream events</a></li>
      </ul>
    </div>
    <div id="skip-menu"></div>
    <div class="column-right">
      <div class="box">
        <div class="box-top"></div>
        <div class="box-in" id="box-in">
          <h2>Hello</h2>
          <p>We provide you a platform where you can select vendors like functional halls, caterers, decorators and photographers for the marriage.</p>
          <p>Select the vendors from the suggested list and let your family members post a feedback on them. So you can narrow down on which vendor to choose from.</p>
          <br />
          
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



