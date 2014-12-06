function validateName()
{ 
	var name = document.getElementById("name").value;
	var pattern=/^[a-zA-Z]+$/;
	if(pattern.test(name)&&name.length>5&&name.length<20)
	{
		document.getElementById("errorMsg").innerHTML="";
	}
	else{
	
	  	document.getElementById("errorMsg").innerHTML="ERROR: please enter name with 5 to 20 characters";
	  	document.getElementById("errorMsg").style.color ="red";
	  	return false;
	  //	document.getElementById("errorMsg").style.fontStyle ="italic";
	}
}
function validateUname()
{ 
	var name = document.getElementById("uname").value;
	var pattern=/^[a-zA-Z]+$/;
	if(pattern.test(name)&&name.length>5&&name.length<20)
	{
		document.getElementById("errorMsg").innerHTML="";
	}
	else{
	
	  	document.getElementById("errorMsg").innerHTML="ERROR: please enter name with 5 to 20 characters";
	  	document.getElementById("errorMsg").style.color ="red";
	  	return false;
	  //	document.getElementById("errorMsg").style.fontStyle ="italic";
	}
}
function validateLocation()
{ 
	var name = document.getElementById("location").value;
	var pattern=/^[a-zA-Z]+$/;
	if(pattern.test(name)&&name.length>3&&name.length<20)
	{
		document.getElementById("errorMsg").innerHTML="";
	}
	else{
	
	  	document.getElementById("errorMsg").innerHTML="ERROR: please enter name with 3 to 20 characters";
	  	document.getElementById("errorMsg").style.color ="red";
	  	return false;
	  //	document.getElementById("errorMsg").style.fontStyle ="italic";
	}
}

function validateEmail()
{
	var id = document.getElementById("email").value;
	//var pat=/[A-Z a-z 0-9]+@+[A-Z a-z]+.+[A-Z a-z]{2,3}+$/; 
	var pattern= /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(id.match(pattern))
	{
		document.getElementById("errorMsg").innerHTML="";
	}
	else
	{
		//window.alert(id);
		document.getElementById("errorMsg").innerHTML="ERROR: please enter valid email";
	  	document.getElementById("errorMsg").style.color ="red";
	  	return false;
	}
}
function validatePassword()
{
	var pwd = document.getElementById("password").value;
	  if(pwd="" || pwd.length < 8)
	  {
		  document.getElementById("errorMsg").innerHTML="ERROR: please enter password with minimum length 8";
		  	document.getElementById("errorMsg").style.color ="red";
		  	return false;
	  }
	  else
	 {
			document.getElementById("errorMsg").innerHTML="";
	 }	
}
function validateRePassword()
{
	var pwd=document.regform.password.value;
	var cpwd = document.getElementById("reenter").value;
	
	if(pwd!=cpwd)
	{
		document.getElementById("errorMsg").innerHTML="ERROR: please enter correct password";
	  	document.getElementById("errorMsg").style.color ="red";
	  	return false;
	}
	else
	{
		document.getElementById("errorMsg").innerHTML="";
	}	
}
function validateDate()
{
  if( document.registration.dob.value == "" )
  {
     document.getElementById("errorMsg").innerHTML="Enter Date of Birth";
	 return false;
  }
  else
	{
		document.getElementById("errorMsg").innerHTML="";
	}	
}

function validateGender()
{
  if ( ( registration.gender[0].checked == false ) && ( registration.gender[1].checked == false ) )
  {
     document.getElementById("errorMsg").innerHTML="Please choose your Gender: Male or Female" ;
     return false;
  } 
  else
	{
		document.getElementById("errorMsg").innerHTML="";
	}	
}

function validateMobile()
{
	var phone = document.getElementById("mobileno").value;
	  if( phone == "" || isNaN(phone) ||  phone.length != 10 )
	  {
		  document.getElementById("errorMsg").innerHTML="ERROR: please enter corret mobile number";
		  	document.getElementById("errorMsg").style.color ="red";
		  	return false;
	  }
	  else
		{
			document.getElementById("errorMsg").innerHTML="";
		}	
}

function alertError(){
	
	var flag = 1;
	//window.alert("test");
	if(document.registration.name.value=="")
	{		
		document.getElementById("name").style.display="block";
		document.getElementById("name").style.border = "solid 1px red";
		flag = 0;
	}	

	if(document.registration.mobileno.value=="")
	{		
		
		document.getElementById("mobileno").style.display="block";
		document.getElementById("mobileno").style.border = "solid 1px red";
		flag = 0;
	}
	
	if(document.registration.uname.value=="")
	{		
		document.getElementById("uname").style.display="block";
		document.getElementById("uname").style.border = "solid 1px red";
		flag = 0;
	}
	
	if(document.registration.password.value=="")
	{		
		document.getElementById("password").style.display="block";
		document.getElementById("password").style.border = "solid 1px red";
		flag = 0;
	}
	if(document.registration.reenter.value=="")
	{		
		document.getElementById("reenter").style.display="block";
		document.getElementById("reenter").style.border = "solid 1px red";
		flag = 0;
	}	
	
	if(document.registration.email.value=="")
	{		
		document.getElementById("email").style.display="block";
		document.getElementById("email").style.border = "solid 1px red";
		flag = 0;
	}	
	
	if(document.registration.location.value=="")
	{		
		document.getElementById("location").style.display="block";
		document.getElementById("location").style.border = "solid 1px red";
		flag = 0;
	}
	
	if(flag == 0)
		return false;
	else
		return true;
}
function resetFields()
{
	document.getElementById("name").style.border="solid 1px black";
	document.getElementById("uname").style.border="solid 1px black";
	document.getElementById("email").style.border="solid 1px black";
	document.getElementById("password").style.border="solid 1px black";
	document.getElementById("reenter").style.border="solid 1px black";
	document.getElementById("mobileno").style.border="solid 1px black"; 
	document.getElementById("location").style.border="solid 1px black";
}
	