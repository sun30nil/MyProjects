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
<title>Post Comments</title>

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

<script type="text/javascript">
function validate()
{
    var place = document.getElementById("rating");
    var x = place.value;
    if (x>=1 && x<=10 && x.length>0) 
        {
        return true;
    } 
    else
        {
        alert("Must be between 1 and 10");
        place.focus();
        return false;
    }
}
function fillHidden()
{
	var hid='<?php echo $_GET['vend_id'];?>';
	document.getElementById("details").value = hid;
}
function getVendorName()
{
	var hid='<?php echo $_GET['v_name'];?>';
	document.getElementById("v_name").innerHTML = hid;
}
function setLike(v)
{
	document.getElementById("userlike").value = v;
}
</script>	
</head>
<body onload="getVendorName();">
<form method="post" action="SaveComments.php">
<table>
<tr>
<td style="width:200px" bgcolor='pink' >Vendor Selected</td>
<td bgcolor='pink' id="v_name" ></td>
</tr>

<tr>
<td bgcolor='yellow'>Rate on a scale of 10: </td>
<td bgcolor='yellow'><input onfocusout="return validate();" type="text" id="rating" name="rating"> </input></td>
</tr>

<tr>
<td bgcolor='yellow'></td>
<td bgcolor='yellow'><input type="button" name="likes" id="likes" value="Like" onclick="setLike(this.value);"> </input> <input type="button" name="likes" id="likes" value="Dislike" onclick="setLike(this.value);"></input></td>
</tr>

<tr>
<td bgcolor='cyan'>Post Comment Here:</td>
<td bgcolor='cyan'> <textarea rows="4" cols="50" name="comments"></textarea></td>
</tr>

<tr>
<td><input type="hidden" name="details" id="details"></input>  <input type="hidden" name="userlike" id="userlike"></input></td>
</tr>

<tr>
<td><input type="reset"></input></td>
<td> <input type="submit" onclick="fillHidden();" value="Submit"> </input></td>
</tr>
</table>
</form>

</body>
</html>
