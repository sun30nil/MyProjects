<?php
include 'DBConnection.php';

$obj=new Database();
$con=$obj->openConnection();
$date = mysql_real_escape_string($_GET['w_date']);
//$date = $_GET['w_date'];
$place = $_GET['selected'];
$budget = $_GET['budget'];
$capacity = $_GET['capacity'];

$vendorID = array(); //initialize an array for dynamically filling it

$venueCost=$budget*0.25;
$catererCost=$budget*0.40;
$decoratorCost=$budget*0.20;
$photographerCost=$budget*0.10;

$result = mysqli_query($con,"SELECT * FROM venuelist");
while($row = mysqli_fetch_array($result))
  {
     if($place==trim($row['fn_location']) && $capacity<=$row['fn_capacity'] && $row['fn_price']<=$venueCost)
     {
     	array_push($vendorID, $row['fn_id']);
     }
  }
 
  $result = mysqli_query($con,"SELECT * FROM catererlist");
while($row = mysqli_fetch_array($result))
  {
     if($place==trim($row['cat_place']) && $capacity<=$row['cat_capacity'] && ($row['cat_price']*$capacity)<=$catererCost)
     {
     	array_push($vendorID, $row['cat_id']);
     }
  }

  $result = mysqli_query($con,"SELECT * FROM decoratorlist");
while($row = mysqli_fetch_array($result))
  {
     if($place==trim($row['dec_place']) && $row['dec_price']<=$decoratorCost)
     {
     	array_push($vendorID, $row['dec_id']);
     }
  }

  $result = mysqli_query($con,"SELECT * FROM photographerlist");
while($row = mysqli_fetch_array($result))
  {
     if($place==trim($row['ph_place']) && $row['ph_price']<=$photographerCost)
     {
     	array_push($vendorID, $row['ph_id']);
     }
  }

 ///////////////////////matching with the calendar schedule of the vendors/////////////////////////////////////////
  $arrayLen=count($vendorID); // size of available vendors list
   $result = mysqli_query($con,"SELECT VId FROM `jqcalendar` WHERE DATE(StartTime) like '".$date."'");
 
while($row = mysqli_fetch_array($result))
  {
	for($i=0; $i<$arrayLen; $i++)
	{
		if($row['VId']==$vendorID[$i])
		{
			$vendorID[$i]="";  //removing those vendors who are already booked on the selected date 
		}
	}
  }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$functhall_array = array();
$caterer_array = array();
$decorator_array = array();
$photographer_array = array();

for($i=0; $i<$arrayLen; $i++)
  {
  	//echo $vendorID[$i];
  	if ($vendorID[$i]!="" & preg_match('/FN/',$vendorID[$i]) == 1) //regex to find the type  of vendor
  	{
  		array_push($functhall_array, $vendorID[$i]);
  	}
   else if ($vendorID[$i]!="" & preg_match('/CAT/',$vendorID[$i]) == 1)
  	{
  		array_push($caterer_array, $vendorID[$i]);
  	}
   else if ($vendorID[$i]!="" & preg_match('/DEC/',$vendorID[$i]) == 1)
  	{
  		array_push($decorator_array, $vendorID[$i]);
  	}
   else if ($vendorID[$i]!="" & preg_match('/PH/',$vendorID[$i]) == 1)
  	{
  		array_push($photographer_array, $vendorID[$i]);
  	}
  }
  
	 $rows = array();  //forming a JSON table
  $table = array();
  $table['cols'] = array(
    array('label' => 'Id', 'type' => 'string'),
    array('label' => 'Function Hall', 'type' => 'string'),
    array('label' => 'Types', 'type' => 'string'),
    array('label' => 'Capacity', 'type' => 'number'),
    array('label' => 'Phone Number', 'type' => 'string'),
    array('label' => 'Address', 'type' => 'string')
);
  for($i=0; $i<count($functhall_array); $i++)
  {
  	$result = mysqli_query($con,"SELECT * FROM venuelist where `fn_id`='".$functhall_array[$i]."'");
	while($row = mysqli_fetch_array($result))
	  {
	     if($place==trim($row['fn_location']) && $capacity<=$row['fn_capacity'] && $row['fn_price']<=$venueCost)
	     {
	     $temp = array();
	  $temp[] = array('v' => (String) $row['fn_id']); 
      $temp[] = array('v' => (String) $row['fn_name']); 
      $temp[] = array('v' => (String) $row['fn_venuetypes']);
      $temp[] = array('v' => (int) $row['fn_capacity']); 
      $temp[] = array('v' => (String) $row['fn_phone']); 
      $temp[] = array('v' => (String) $row['fn_address']); 
      $rows[] = array('c' => $temp);
	     }
	  }
  }
  $table['rows'] = $rows;
$jsonTable1 = json_encode($table);
	  
	  ///for decorators///////////////////////////////////////////////////////////
	   
	$rows = array();  //forming a JSON table
  $table = array();
  $table['cols'] = array(
    array('label' => 'Id', 'type' => 'string'),
    array('label' => 'Caterer Name', 'type' => 'string'),
    array('label' => 'Food Type', 'type' => 'string'),
    array('label' => 'Rating', 'type' => 'number'),
    array('label' => 'Capacity', 'type' => 'number'),
    array('label' => 'Price', 'type' => 'number'),
    array('label' => 'Payment Modes', 'type' => 'string'),
    array('label' => 'Phone Number', 'type' => 'string'),
    array('label' => 'Address', 'type' => 'string')
);
for($i=0; $i<count($caterer_array); $i++)
  {
  	 $result = mysqli_query($con,"SELECT * FROM catererlist where `cat_id`='".$caterer_array[$i]."'");
	 
	while($row = mysqli_fetch_array($result))
	  {
	     if($place==trim($row['cat_place']) && $capacity<=$row['cat_capacity'] && ($row['cat_price']*$capacity)<=$catererCost)
	     {
	     	$temp = array();
	  $temp[] = array('v' => (String) $row['cat_id']); 
      $temp[] = array('v' => (String) $row['cat_name']); 
      $temp[] = array('v' => (String) $row['cat_foodtype']);
      $temp[] = array('v' => (float) $row['cat_rating']); 
      $temp[] = array('v' => (int) $row['cat_capacity']);
      $temp[] = array('v' => (int) $row['cat_price']); 
      $temp[] = array('v' => (String) $row['cat_paymode']); 
      $temp[] = array('v' => (String) $row['cat_contact']); 
      $temp[] = array('v' => (String) $row['cat_address']); 
      $rows[] = array('c' => $temp);
	     
	     }
	  }
  }
  $table['rows'] = $rows;
$jsonTable2 = json_encode($table);
 
	  
	  //for decorators /////////////////////////////////////////////////////////
 $rows = array();  //forming a JSON table
  $table = array();
  $table['cols'] = array(
    array('label' => 'Id', 'type' => 'string'),
    array('label' => 'Decorator Name', 'type' => 'string'),
    array('label' => 'Rating', 'type' => 'number'),
    array('label' => 'Max Price', 'type' => 'number'),
    array('label' => 'Payment Modes', 'type' => 'string'),
    array('label' => 'Phone Number', 'type' => 'string'),
    array('label' => 'Address', 'type' => 'string')
);
 
	  for($i=0; $i<count($decorator_array); $i++)
	  {
	  	 $result = mysqli_query($con,"SELECT * FROM decoratorlist where `dec_id`='".$decorator_array[$i]."'");
	while($row = mysqli_fetch_array($result))
	  {
	     if($place==trim($row['dec_place']) && $row['dec_price']<=$decoratorCost)
	     {
	     	$temp = array();
	  $temp[] = array('v' => (String) $row['dec_id']);
      $temp[] = array('v' => (String) $row['dec_name']); 
      $temp[] = array('v' => (float) $row['dec_rating']); 
      $temp[] = array('v' => (int) $row['dec_price']); 
      $temp[] = array('v' => (String) $row['dec_paymode']); 
      $temp[] = array('v' => (String) $row['dec_contact']); 
      $temp[] = array('v' => (String) $row['dec_address']); 
      $rows[] = array('c' => $temp);
	     }
	  }
	  }	
  $table['rows'] = $rows;
$jsonTable3 = json_encode($table);
 
  //for photographers
  $rows = array();  //forming a JSON table
  $table = array();
  $table['cols'] = array(
    array('label' => 'Id', 'type' => 'string'),
    array('label' => 'Photographer Name', 'type' => 'string'),
    array('label' => 'Proficiency', 'type' => 'string'),
    array('label' => 'Rating', 'type' => 'number'),
    array('label' => 'Max Price', 'type' => 'number'),
    array('label' => 'Payment Modes', 'type' => 'string'),
    array('label' => 'Phone Number', 'type' => 'string'),
    array('label' => 'Address', 'type' => 'string')
);
	  for($i=0; $i<count($photographer_array); $i++)
		  {
		  	$result = mysqli_query($con,"SELECT * FROM photographerlist where `ph_id`='".$photographer_array[$i]."'");
				while($row = mysqli_fetch_array($result))
				  {
				     if($place==trim($row['ph_place']) && $row['ph_price']<=$photographerCost)
				     {
				     	$temp = array();
	  $temp[] = array('v' => (String) $row['ph_id']);
      $temp[] = array('v' => (String) $row['ph_name']); 
      $temp[] = array('v' => (String) $row['ph_type']); 
      $temp[] = array('v' => (float) $row['ph_rating']); 
      $temp[] = array('v' => (int) $row['ph_price']); 
      $temp[] = array('v' => (String) $row['ph_paymode']); 
      $temp[] = array('v' => (String) $row['ph_phone']); 
      $temp[] = array('v' => (String) $row['ph_address']); 
      $rows[] = array('c' => $temp);
				     }
				  }
		  }
 $table['rows'] = $rows;
$jsonTable4 = json_encode($table);
$obj->closeConnection($con);  

//SELECT * FROM `jqcalendar` WHERE DATE(StartTime) like '2014-05-24'
?>

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
<title>Results</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="css/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/fonts.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/slide.css" rel="stylesheet" type="text/css" media="all" />
<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

<script src = "Js/jquery.js"></script>
<script src = "Js/Slide.js"></script>
<title> Search Vendors</title>

<!--Load the AJAX API-->
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="//www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1', {packages: ['table']});
    </script>   
	
	<script type="text/javascript">
    // Load the Visualization API and the piechart package.
    google.load('visualization', '1.0', {'packages':['corechart']});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Vendors');
      data.addColumn('number', 'Divison of Amount');
      data.addRows([
        ['Venue', <?php echo $venueCost?>],
        ['Catering', <?php echo $catererCost?>],
        ['Decoration', <?php echo $decoratorCost?>],
        ['Photographers', <?php echo $photographerCost?>]
      ]);

      // Set chart options
      var options = {'title':'Investment Division of Budget',
                     'width':500,
                     'height':300};

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
    
      google.load('visualization', '1', {packages:['table']});
      google.setOnLoadCallback(drawTable);
      var selection1;
      var selection2;
      var selection3;
      var selection4;
      var table1;
      var table2;
      var table3;
      var table4;
      var data1;
      var data2;
      var data3;
      var data4;  

      function drawTable() {
    	  var json1 = '<?php echo $jsonTable1;?>';  
    	 // alert(json1);
    	  data1 = new google.visualization.DataTable(json1);
    	  var dataView1 = new google.visualization.DataView(data1);
    	  dataView1.hideColumns([0]);
          table1 = new google.visualization.Table(document.getElementById('table_div1'));
          table1.draw(dataView1, {showRowNumber: true});
          google.visualization.events.addListener(table1, 'select', function1 );
         
      var json2 = '<?php echo $jsonTable2;?>';  
      data2 = new google.visualization.DataTable(json2);          //.responseText
      var dataView2 = new google.visualization.DataView(data2);
	  dataView2.hideColumns([0]);
      table2 = new google.visualization.Table(document.getElementById('table_div2'));
      table2.draw(dataView2, {showRowNumber: true});
      google.visualization.events.addListener(table2, 'select', function2 );

      var json3 = '<?php echo $jsonTable3;?>';  
      data3 = new google.visualization.DataTable(json3);          
      var dataView3 = new google.visualization.DataView(data3);
	  dataView3.hideColumns([0]);
      table3 = new google.visualization.Table(document.getElementById('table_div3'));
      table3.draw(dataView3, {showRowNumber: true});
      google.visualization.events.addListener(table3, 'select', function3 );
      
      var json4 = '<?php echo $jsonTable4;?>';  
      data4 = new google.visualization.DataTable(json4);          
      var dataView4 = new google.visualization.DataView(data4);
	  dataView4.hideColumns([0]);
      table4 = new google.visualization.Table(document.getElementById('table_div4'));
      table4.draw(dataView4, {showRowNumber: true});
      google.visualization.events.addListener(table4, 'select', function4 );
      }
    var fnHal="";
  	var cater="";
  	var decor="";
  	var photo="";
  	var ven1="";
  	var ven2="";
  	var ven3="";
  	var ven4="";
      function function1()
      {
          //alert();
          selection1 = table1.getSelection();
          for (var i = 0; i < selection1.length; i++) {
              //alert(data1.getValue(selection1[i].row,1));
              fnHal+= data1.getValue(selection1[i].row,1)+" \n ";
              ven1+= data1.getValue(selection1[i].row,0)+",";
          }
      }
      function function2()
      {
          //alert();
          selection2 = table2.getSelection();
          for (var i = 0; i < selection2.length; i++) {
             // alert(data2.getValue(selection2[i].row,1));
              cater+= data2.getValue(selection2[i].row,1)+" \n ";
              ven2+= data2.getValue(selection2[i].row,0)+",";
          }
      }
      function function3()
      {
          //alert();
          selection3 = table3.getSelection();
          for (var i = 0; i < selection3.length; i++) {
           //   alert(data3.getValue(selection3[i].row,1));
              decor+= data3.getValue(selection3[i].row,1)+" \n ";
              ven3+= data3.getValue(selection3[i].row,0)+",";
          }
      }
      function function4()
      {
          //alert();
          selection4 = table4.getSelection();
          for (var i = 0; i < selection4.length; i++) {
            //  alert(data4.getValue(selection4[i].row,1));
              photo+= data4.getValue(selection4[i].row,1)+" \n ";
              ven4+= data4.getValue(selection4[i].row,0)+",";
          }
      }
    </script>

</head>
<body>

<div id="logo" class="container">
<table cellspacing="0" class="container">
<tr>
<td><h1><a href="Homepage.php">Dream<span>EventZ</span></a></h1>   
		<p>Your Event Our Plan</p>
		</td>
<td><a href="SignUp.php" title="Sign Up"><img src="images/signup.png" height="64" width="60"></img></a></td>             
<td><a href="Logins/customerLogin.php" title="Sign In"><img src="images/signin.png" height="64" width="60"></img></a></td>
</tr>
</table> 	
</div>
<br>
<div align="center" id='chart_div'></div>
  
    <br><br>
    <div id='table_div1'></div>
    <br><br>
    <div id='table_div2'></div>
     <br><br>
    <div id='table_div3'></div>
    <br><br>
    <div id='table_div4'></div>
    <div id='status'></div>

	
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