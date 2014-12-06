<?php
//include "DBConnection.php";
include "function_only.inc.php";
$event_id = $_GET['event_id'];
$event_type = $_GET['v_type'];

if(preg_match('/'.$event_type.'/',"FN") == 1)
{
	echo "Vendor Category Type:<span style='color:blue'><b> Funtion Halls</b></span>";
}
else if(preg_match('/'.$event_type.'/',"CAT") == 1)
{
	echo "Vendor Category Type: <span style='color:blue'><b> Caterers</b></span>";
}
else if(preg_match('/'.$event_type.'/',"DEC") == 1)
{
	echo "Vendor Category Type: <span style='color:blue'><b> Decorators</b></span>";
}
else if(preg_match('/'.$event_type.'/',"PH") == 1)
{
	echo "Vendor Category Type: <span style='color:blue'><b> Photographers</b></span>";
}

$obj=new Database();
$con=$obj->openConnection();
$myAssocVend = $myAssocVendors;

$myAssocVendorsNew = array();
$result = mysqli_query($con,"select * from savedevents where event_id=$event_id");
$all_events = mysqli_fetch_array($result);

$vendors = $all_events['vendor_list'];
$all_vendors = explode(',', $vendors);

 for ($i=0; $i<count($all_vendors)-1; $i++)
			   	{
			   	if ($all_vendors[$i]!="" && preg_match('/FN/',$all_vendors[$i]) == 1 && preg_match('/'.$event_type.'/',$all_vendors[$i]) == 1) //regex to find the type  of vendor
					  	{
					  		$result1 = mysqli_query($con,"SELECT * FROM comments where `vendor_id`='".$all_vendors[$i]."'");
					  	while($each_vendor = mysqli_fetch_array($result1))
					  		{
					  			array_push($myAssocVendorsNew,$each_vendor);
					  		}
					  	}
			   	if ($all_vendors[$i]!="" && preg_match('/CAT/',$all_vendors[$i]) == 1 && preg_match('/'.$event_type.'/',$all_vendors[$i]) == 1) //regex to find the type  of vendor
					  	{
					  		$result1 = mysqli_query($con,"SELECT * FROM comments where `vendor_id`='".$all_vendors[$i]."'");
					  
					  		while($each_vendor = mysqli_fetch_array($result1))
					  		{
					  			array_push($myAssocVendorsNew,$each_vendor);
					  		}
					  	}
			   	if ($all_vendors[$i]!="" && preg_match('/DEC/',$all_vendors[$i]) == 1 && preg_match('/'.$event_type.'/',$all_vendors[$i]) == 1) //regex to find the type  of vendor
					  	{
					  		$result1 = mysqli_query($con,"SELECT * FROM comments where `vendor_id`='".$all_vendors[$i]."'");
					  	while($each_vendor = mysqli_fetch_array($result1))
					  		{
					  			array_push($myAssocVendorsNew,$each_vendor);
					  		}
					  	}
			   	if ($all_vendors[$i]!="" && preg_match('/PH/',$all_vendors[$i]) == 1 && preg_match('/'.$event_type.'/',$all_vendors[$i]) == 1) //regex to find the type  of vendor
					  	{
					  		$result1 = mysqli_query($con,"SELECT * FROM comments where `vendor_id`='".$all_vendors[$i]."'");
					  	while($each_vendor = mysqli_fetch_array($result1))
					  		{
					  			array_push($myAssocVendorsNew,$each_vendor);
					  		}
					  	}
			   	}
$targetVendors = array();
			   	for ($i=0; $i<count($all_vendors)-1; $i++)
			   	{
			   		$count_rating=0;
			   		$add_rating=0;
			   		if(preg_match('/'.$event_type.'/',$all_vendors[$i])==1){
			   			foreach($myAssocVendorsNew as $y=>$y_value) {
						
							   			if($all_vendors[$i]==$y_value['vendor_id'])
									   		{
									   			//echo "<br>==".$event_type." ".$y_value['vendor_id'];
									   			$add_rating+= $y_value['rating'];
									   			$count_rating++;
									   		}
							   		if($count_rating!=0){
							   		$targetVendors[$all_vendors[$i]]=($add_rating*10)/(10*$count_rating);
							   		}
							   		else $targetVendors[$all_vendors[$i]]=0;
			        	}
			   		}
			   
			   	}
 $rows = array();  //forming a JSON table
  $table = array();
  $table['cols'] = array(
    array('label' => 'Vendor_Name', 'type' => 'string'),
    array('label' => 'Rating', 'type' => 'number')
);			   	
foreach($targetVendors as $y=>$y_value) {
	  $temp = array();
	  $vname_array = $myAssocVend[$y];
	//  echo $vname_array['fn_name'].";;;;".$y;
	  if(preg_match('/FN/',$y)==1)
	  {
	  	$temp[] = array('v' => (String) $vname_array['fn_name']);
	  }
      else if(preg_match('/CAT/',$y)==1)
	  {
	  	$temp[] = array('v' => (String) $vname_array['cat_name']);
	  }
else if(preg_match('/DEC/',$y)==1)
	  {
	  	$temp[] = array('v' => (String) $vname_array['dec_name']);
	  }
else if(preg_match('/PH/',$y)==1)
	  {
	  	$temp[] = array('v' => (String) $vname_array['ph_name']);
	  }
      $temp[] = array('v' => (float) $y_value); 
      $rows[] = array('c' => $temp);
  }
  $table['rows'] = $rows;
$jsonTable1 = json_encode($table);	   	
////////////////////////////////////////on the basis of likes////////////////////////////////////////////
$targetVendors1 = array();
			   	for ($i=0; $i<count($all_vendors)-1; $i++)
			   	{
			   		$likes_count=0;
			   		$dlike_count=0;
			   		if(preg_match('/'.$event_type.'/',$all_vendors[$i])==1){
			   			foreach($myAssocVendorsNew as $y=>$y_value) {
						
							   			if($all_vendors[$i]==$y_value['vendor_id'])
									   		{
									   			if($y_value['like']=="Like")
									   			{
									   				$likes_count++;
									   			}
									   			else if($y_value['like']=="Dislike")
									   			{
									   				$dlike_count++;
									   			}
									   		}  		
			        	}
			        	if($likes_count==0 && $dlike_count==0)
			        	{
			        		$targetVendors1[$all_vendors[$i]]= 0;
			        	}
			        	else 
			        	$targetVendors1[$all_vendors[$i]]= $likes_count - $dlike_count;  //($likes_count*100)/($dlike_count+$likes_count)
			   		}
			   
			   	}
 $rows = array();  //forming a JSON table
  $table = array();
  $table['cols'] = array(
    array('label' => 'Vendor_Name', 'type' => 'string'),
    array('label' => 'L/D_Ratio', 'type' => 'number')
);			   	
foreach($targetVendors1 as $y=>$y_value) {
	  $temp = array();
	  $vname_array = $myAssocVend[$y];
	//  echo $vname_array['fn_name'].";;;;".$y;
	  if(preg_match('/FN/',$y)==1)
	  {
	  	$temp[] = array('v' => (String) $vname_array['fn_name']);
	  }
      else if(preg_match('/CAT/',$y)==1)
	  {
	  	$temp[] = array('v' => (String) $vname_array['cat_name']);
	  }
else if(preg_match('/DEC/',$y)==1)
	  {
	  	$temp[] = array('v' => (String) $vname_array['dec_name']);
	  }
else if(preg_match('/PH/',$y)==1)
	  {
	  	$temp[] = array('v' => (String) $vname_array['ph_name']);
	  }
      $temp[] = array('v' => (float) $y_value); 
      $rows[] = array('c' => $temp);
  }
  $table['rows'] = $rows;
$jsonTable2 = json_encode($table);	 
////////////////////////////////////////on the basis of Revies / comments ////////////////////////////////////////////

$positive_file = file_get_contents("../WordsFiles/positive.txt");
$negative_file = file_get_contents("../WordsFiles/negative.txt");
$pos_array = explode(",", $positive_file);
$pos_hash = array();
//indexing all postive words in a hash table
for ($i=0; $i<count($pos_array); $i++)
{
	$pos_hash[$pos_array[$i]] = $pos_array[$i];
}
$neg_array = explode(",", $negative_file);
$neg_hash = array();
//indexing all negative words in a hash table
for ($i=0; $i<count($neg_array); $i++)
{
	$neg_hash[$neg_array[$i]] = $neg_array[$i];
}
$targetVendors2 = array();
			   	for ($i=0; $i<count($all_vendors)-1; $i++)
			   	{
			   		$positive_count=0;
			   		$negative_count=0;
			   		if(preg_match('/'.$event_type.'/',$all_vendors[$i])==1){
			   			foreach($myAssocVendorsNew as $y=>$y_value) {
						
							   			if($all_vendors[$i]==$y_value['vendor_id'])
									   		{
									   			$comment = $y_value['comments'];
									   			$comm_array = preg_split("/(?<=\w)\b\s*/", $comment);
									   		for ($m=0; $m<count($comm_array); $m++)
													{
														$getWord = strtolower($comm_array[$m]);
														if(array_key_exists($getWord, $pos_hash))
														{
															$positive_count++;
														}
													else if(array_key_exists($getWord, $neg_hash))
														{
															$negative_count++;
														}
													}
									   		}  		
			        	}
			        	if($positive_count==0 && $negative_count==0)
			        	{
			        		$targetVendors2[$all_vendors[$i]]= 0;
			        	}
			        	else 
			        	$targetVendors2[$all_vendors[$i]]= $positive_count - $negative_count;  //($likes_count*100)/($dlike_count+$likes_count)
			   		}
			   
			   	}
 $rows = array();  //forming a JSON table
  $table = array();
  $table['cols'] = array(
    array('label' => 'Vendor_Name', 'type' => 'string'),
    array('label' => 'Comment_Value', 'type' => 'number')
);			   	
foreach($targetVendors2 as $y=>$y_value) {
	  $temp = array();
	  $vname_array = $myAssocVend[$y];
	//  echo $vname_array['fn_name'].";;;;".$y;
	  if(preg_match('/FN/',$y)==1)
	  {
	  	$temp[] = array('v' => (String) $vname_array['fn_name']);
	  }
      else if(preg_match('/CAT/',$y)==1)
	  {
	  	$temp[] = array('v' => (String) $vname_array['cat_name']);
	  }
else if(preg_match('/DEC/',$y)==1)
	  {
	  	$temp[] = array('v' => (String) $vname_array['dec_name']);
	  }
else if(preg_match('/PH/',$y)==1)
	  {
	  	$temp[] = array('v' => (String) $vname_array['ph_name']);
	  }
      $temp[] = array('v' => (float) $y_value); 
      $rows[] = array('c' => $temp);
  }
  $table['rows'] = $rows;
$jsonTable3 = json_encode($table);	
/////////////////////////////////summarized report of all above///////////////////////// 
$targetVendors3 = array();
$countV =count($targetVendors);
foreach($targetVendors2 as $y=>$y_value) {
	if(array_key_exists($y, $targetVendors))
	$first = $targetVendors[$y];
	else $first = 0;
	
	if(array_key_exists($y, $targetVendors1))
	$second = $targetVendors1[$y]; 
	else $second = 0;
	
	if(array_key_exists($y, $targetVendors2))
	$third = $targetVendors2[$y];
	else $third = 0;
	
	if($second<0)
	{
		$second=$second/$countV;  //divide by the number of vendors being compared 
	}
if($third<0)
	{
		$third=$third/$countV;  //divide by the number of vendors being compared 
	}
	$targetVendors3[$y] = ($first+$second+$third)/3;
}
 $rows = array();  //forming a JSON table
  $table = array();
  $table['cols'] = array(
    array('label' => 'Vendor_Name', 'type' => 'string'),
    array('label' => 'Final_Score', 'type' => 'number')
);			   	
foreach($targetVendors3 as $y=>$y_value) {
	  $temp = array();
	  $vname_array = $myAssocVend[$y];
	//  echo $vname_array['fn_name'].";;;;".$y;
	  if(preg_match('/FN/',$y)==1)
	  {
	  	$temp[] = array('v' => (String) $vname_array['fn_name']);
	  }
      else if(preg_match('/CAT/',$y)==1)
	  {
	  	$temp[] = array('v' => (String) $vname_array['cat_name']);
	  }
else if(preg_match('/DEC/',$y)==1)
	  {
	  	$temp[] = array('v' => (String) $vname_array['dec_name']);
	  }
else if(preg_match('/PH/',$y)==1)
	  {
	  	$temp[] = array('v' => (String) $vname_array['ph_name']);
	  }
      $temp[] = array('v' => (float) $y_value); 
      $rows[] = array('c' => $temp);
  }
  $table['rows'] = $rows;
$jsonTable4 = json_encode($table);

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
<title>Summary Report</title>
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
    google.load('visualization', '1.0', {'packages':['corechart']});
    </script>   
<script type="text/javascript">
var option=""; // to store the user summary type
var json1;
var chartoption="";
function summaryType()
{
	document.getElementById('selectChart').style.display = "none";
}
function selectedSummary()
{
	var selected = document.getElementById("summType");
    option = selected.options[selected.selectedIndex].value;
    document.getElementById('selectChart').style.display = "block";
    selectJsonType();
}
function selectJsonType()
{
	if(option == "ratings")
	{
		json1 = '<?php echo $jsonTable1;?>'; 
		 chartoption = 'Average Rating on a scale of 10';
	}
	else if(option == "likes")
	{
		json1 = '<?php echo $jsonTable2;?>';
		 chartoption = 'Dislikes to Likes Comparison';
	}
	else if(option == "comments")
	{
		json1 = '<?php echo $jsonTable3;?>';
		chartoption = 'Score based on user comments/reviews';
	}
	else if(option == "inclusive")
	{
		json1 = '<?php echo $jsonTable4;?>';
		chartoption = 'Score based inclusive of rating, likes and comments';
	}
		
}

function selectChart()
{
	var e = document.getElementById("chartType");
    var chart = e.options[e.selectedIndex].value;
    if (chart=="pie")
    {
    	document.getElementById('bar_div').style.display = "none";
    	document.getElementById('pie_div').style.display = "block";
    	drawChart1();
    }
    	else if (chart=="bar")
    	{
    		document.getElementById('pie_div').style.display = "none";
    		document.getElementById('bar_div').style.display = "block";
        	drawChart2();
        }
}
//Load the Visualization API and the piechart package.
google.load('visualization', '1.0', {'packages':['corechart']});

function drawChart1 () {
	alert(json1); 
  var data = new google.visualization.DataTable(json1);
  var chart = new google.visualization.PieChart(document.getElementById('pie_div'));
  alert(chartoption);
  var options = {'title':chartoption,
          'width':700,
          'height':500};
  chart.draw(data, options);
}

function drawChart2 () {
	alert(json1); 
  var data = new google.visualization.DataTable(json1);
  var chart = new google.visualization.BarChart(document.getElementById('bar_div'));
  var options = {'title':chartoption,
          'width':700,
          'height':500};
  chart.draw(data, options);
}
</script>	
</head>

<body onload="summaryType();">
<br></br>
<span>
<div id="summaryType">
Summary Based On:<select id="summType" onchange="selectedSummary();">
<option value="selec">Select</option>
<option value="ratings">Ratings</option>
<option value="likes">Likes</option>
<option value="comments">Comments/Reviews</option>
<option value="inclusive">Inclusively</option>
</select>
</div>


<div id="selectChart" > 
Chart type:<select id="chartType" onchange="selectChart();">
<option value="selec">Select</option>
<option value="pie">Pie</option>
<option value="bar">Bar</option>
</select>
</div>
</span>

<div id='pie_div'></div>
<div id='bar_div'></div>
 
</body>
</html>
