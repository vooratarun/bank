
function checkage(field,alerttext)
{
	with(field)
	{
	if(isNaN(value)||value<1||value>100)
	{
		alert(alerttext);
		return false;
	}
	else
		return true;
	}	
}
function checkradio()
{
	var x=document.getElementById("myCheck");
	var y=document.getElementById("myCheck2");
	//document.write(x.value);
	if( (x.checked==false) && (y.checked==false) )
	{
		alert("one should be checked");
		return false;
	}	
}
function checkradio2()
{
	var x=document.getElementById("myCheck3");
	var y=document.getElementById("myCheck4");
	//document.write(x.value);
	if( (x.checked==false) && (y.checked==false) )
	{
		alert("one should be checked");
		return false;
	}	
}

function checkphno(field,alerttext)
{
	with(field)
	{
	if(isNaN(value)||value<6000000000||value>9999999999)
	{
		alert(alerttext);
		return false;
	}
	else
		return true;
	}	
}
function checkdamount(field,alerttext)
{
	with(field)
	{
	if(isNaN(value)||value<500)
	{
		alert(alerttext);
		return false;
	}
	else
		return true;
	}	
}

function checkemail(field,alerttext)
{
with(field)
{
	var at=value.indexOf("@");
	
	if(at==-1)
	{
		alert(alerttext);
		return false;
	}
	else
		return true;
	}	
}


function validate_required(field,alerttext)
{
	with(field)
	{
		if(value==null || value=="")
		{
			alert(alerttext);
			return false;
		}	
		else
		{

			return true;
		}	

	}

	
}
function validate_form(thisform)
{
	with(thisform)
	{
//check name
		if(validate_required(uname,"Name should be entered")==false)
		{
			uname.focus();
			return false;
		}
//check password
		if(validate_required(passwd,"Password should be entered")==false)
		{
			passwd.focus();
			return false;
		}
//check radio buttons of gender	
		var x=checkradio();

		if( (x==false) )
		{
			
			return false;
		}
//check radio buttons of account type
		var x=checkradio2();

		if( (x==false) )
		{
			
			return false;
		}

//check phone number		
		var s=validate_required(phno,"phone number should be entered");
		if(s==true)
		{
			if(checkphno(phno,"Enter Valid Phone Number")==false)
			{
				phno.focus();
				return false;
			}
		}
		else
		{
			phno.focus();
			return false;
		}
//check email
		var s=validate_required(email,"email should be entered");
		if(s==true)
		{
		    if(checkemail(email,"Enter valid email")==false)
		    {	
			email.focus();
			return false;
		    }	
		}
		else
		{
			email.focus();
			return false;
		}		
	
//check Address
	if(validate_required(fname,"Father name should be entered")==false)
		{
			fname.focus();
			return false;
		}
	if(validate_required(hno,"House Number should be entered")==false)
		{
			hno.focus();
			return false;
		}
	if(validate_required(village,"village name should be entered")==false)
	{
		village.focus();
		return false;
	}
	
	if(validate_required(mandal,"Mandal name should be entered")==false)
	{
		mandal.focus();
		return false;
	}
	if(validate_required(district,"District name should be entered")==false)
	{
		district.focus();
		return false;
	}

//check amount
var s=validate_required(damount,"Amount should be entered");
		if(s==true)
		{
			if(checkdamount(damount,"Amount should be greatet than 500")==false)
			{
				damount.focus();
				return false;
			}
		}
		else
		{
			damount.focus();
			return false;
		}
	}

}
function uppercase(x)
{
var y=document.getElementById(x).value;
document.getElementById(x).value=y.toUpperCase();

}
function setstyle(x)
{
	var txt=x;
	if(txt==="uname")	
		document.getElementById("message").innerHTML="Ex:-JOHN";
	else if(txt==="passwd")	
		document.getElementById("message").innerHTML="Use specialchars";
	else if( (txt==="d1") || (txt==="d1") || (txt==="d1"))	
		document.getElementById("message").innerHTML="Use specialchars";
	else if(txt==="phno")	
		document.getElementById("message").innerHTML="Ex:-9581129423";	
	else if(txt==="email")	
		document.getElementById("message").innerHTML="something@gmail.com";
	else if(txt==="address")	
document.getElementById("message").innerHTML="Name<br>Fathername<br>Landmark<br>H.No<br>Mandal<br>District<br>Pincode";
	else if(txt==="phno")	
		document.getElementById("message").innerHTML="Ex:-9581129423";
	else if(txt==="damount")	
		document.getElementById("message").innerHTML="Amount should be <br>greater than 500";								
	document.getElementById(x).style.background="white";

}
function setstyle2(x)
{
	document.getElementById("message").innerHTML="";
	document.getElementById(x).style.background="white";

}
function sub()
{
	alert("Thanque "+document.forms["myform"]["uname"].value+'\n'+"for spending your valuable time");	

}
function res()
{
	var r=confirm("All content will be erased");
	if(r==true)		
		return true;
	else
		return false;		
}
function disp_confirm()
{
var r=confirm("Press a button");
if (r==true)
  {
  return true;
  }
else
  {
 return false;
  }
}
