<?include('include.php')?>
<html>
<head>
<title>Add employee</title>
</head>

<script>

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


function validate_form(thisform)
{
	with(thisform)
	{

//check empname
		if(validate_required(empname,"Name should be entered")==false)
		{
			empname.focus();
			return false;
		}

//check radio buttons of gender	
		var x=checkradio();

		if( (x==false) )
		{
			
			return false;
		}

//check designation
		if(validate_required(design,"designation  should be entered")==false)
		{
			design.focus();
			return false;
		}
//salary
		if(validate_required(salary,"salary  should be entered")==false)
		{
			salary.focus();
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
	}
//check Address
	if(validate_required(empaddress,"Address should be entered")==false)
		{
			empaddress.focus();
			return false;
		}

}

function setstyle(x)
{
	var txt=x;
	if(txt==="empname")	
		document.getElementById("message").innerHTML="Ex:John";
	else if(txt==="phno")	
		document.getElementById("message").innerHTML="Ex:-9581129423";	
	else if(txt==="email")	
		document.getElementById("message").innerHTML="something@gmail.com";
	else if(txt==="design")	
		document.getElementById("message").innerHTML="designation";
	else if(txt==="salary")	
		document.getElementById("message").innerHTML="Salary";
	else if(txt==="empaddress")	
document.getElementById("message").innerHTML="Name<br>Fathername<br>Landmark<br>H.No<br>Mandal<br>District<br>Pincode";
	document.getElementById(x).style.background="white";

}
function setstyle2(x)
{
	document.getElementById("message").innerHTML="";
	document.getElementById(x).style.background="white";

}

function isInteger(s)
{
	var v=s;
      var i;
	s = s.toString();
      for (i = 0; i < s.length; i++)
      {
         var c = s.charAt(i);
         if (isNaN(c)) 
	   {
		alert("Given value is not a number");
		document.getElementById('phno').value="";
		return false;
	   }
      }
      return true;
}

function isInteger2(s)
{
	var v=s;
      var i;
	s = s.toString();
      for (i = 0; i < s.length; i++)
      {
         var c = s.charAt(i);
         if (isNaN(c)) 
	   {
		alert("Given value is not a number");
		document.getElementById('salary').value="";
		return false;
	   }
      }
      return true;
}
</script>
<body>
<a  style="font-size:2em;text-decoration:none;" href="mngfunctions.php">Home</a>
<p style="position:fixed;top:200px;right:200px;color:blue;font-size:1.2em;font-family:arial;" id="message">hai</p>
<div id="main" style="position:absolute;left:300px;">
<form  method="post" onsubmit="return validate_form(this)" onreset="return res()" >
<table cellspacing=5 cellpadding=20>
	<tr>
	<td>EmpName:-</td>
	<td><input name="empname" id="empname" type="text" onblur="setstyle2(this.id)"  onfocus="setstyle(this.id)" ></td>
	</tr>

	<tr>
	<td>Gender:-</td>
	<td><input name="gender"  type="radio" value="male" id="myCheck">Male&nbsp;
	<input name="gender" value="female" type="radio" id="myCheck2" >Female</td>
	</tr>

	<tr>
	<td>Designation:-</td>
	<td><input name="design" id="design" type="text" onblur="setstyle2(this.id)"  onfocus="setstyle(this.id)" ></td>
	</tr>
		
	<tr>
	<td>Salary:-</td>
	<td><input name="salary" id="salary" type="text" onblur="setstyle2(this.id)"  onfocus="setstyle(this.id)"
	onkeypress="return isInteger2(this.value)" ></td>
	</tr>
	
	<tr>
	<td>Phno:-</td>
	<td><input name="phno" id="phno" type="text" onblur="setstyle2(this.id)"  onfocus="setstyle(this.id)" 
	onkeypress="return isInteger(this.value)" ></td>
	</tr>

	<tr>
	<td>Email:-</td>
	<td><input name="email" id="email" type="text" onblur="setstyle2(this.id)"  onfocus="setstyle(this.id)" ></td>
	</tr>

	<tr>
	<td>EmpAddress:-</td>
	<td><textarea cols=5 rows=5 name="empaddress" id="empaddress" type="text" onblur="setstyle2(this.id)"  onfocus="setstyle(this.id)" ></textarea></td>
	</tr>

	<tr>
	<td><input type="submit" name="send"></td>
	<td><input type="reset" value="Reset"></td>	
	</tr>
	

</table>
</form>
</div>
<?
function insert()
{
	$con=mysql_connect("localhost","bank","iiitn");
	mysql_select_db("bank",$con);
$sql="INSERT INTO b1_employ(ename,gender,designation,salary,phno,email,eaddress,jdate)VALUES ('$_POST[empname]','$_POST[gender]','$_POST[design]','$_POST[salary]','$_POST[phno]','$_POST[email]','$_POST[empaddress]', CURRENT_TIMESTAMP);";
mysql_query($sql,$con);
echo "<script>window.location.href='mngfunctions.php'</script>";

}

if(isset($_POST['send']))
{
	insert();
}

?>
</body>
</html>
