<?include('include.php')?>
<html>
<head>
<title>Update Account</title>
<script>

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

}

function uppercase(x)
{
var y=document.getElementById(x).value;
document.getElementById(x).value=y.toUpperCase();

}
function res()
{
	var r=confirm("All content will be erased");
	if(r==true)		
		return true;
	else
		return false;		
}
function setstyle(x)
{
	var txt=x;
	if(txt==="passwd")	
		document.getElementById("message").innerHTML="Use specialchars";
	else if(txt==="phno")	
		document.getElementById("message").innerHTML="Ex:-9581129423";	
	else if(txt==="email")	
		document.getElementById("message").innerHTML="something@gmail.com";
	else if(txt==="address")	
document.getElementById("message").innerHTML="Name<br>Fathername<br>Landmark<br>H.No<br>Mandal<br>District<br>Pincode";
	document.getElementById(x).style.background="white";

}
function setstyle2(x)
{
	document.getElementById("message").innerHTML="";
	document.getElementById(x).style.background="white";

}
function hide()
{
	document.getElementById('main').innerHTML="";
}
</script>
</head>
<body>
<?$u = $_POST['accno'];
//mysql_connect("localhost","bank","iiitn");
//mysql_select_db("bank");
$result=mysql_query("select * from b1_users where accno='$u'");
$row=mysql_fetch_array($result);
echo $row['phno'];

?>
<div id="main">
<p style="position:fixed;top:200px;right:200px;color:blue;font-size:1.2em;font-family:arial;" id="message">hai</p>
<center><form action="#" method="post" onsubmit="return validate_form(this)" onreset="return res()" >
<table border="0" cellpadding="10" cellspacing="15" >

	
	<tr>
	<td class="one">Phone:-</td>
	<td><input type="text" name="phno" id="phno" onblur="setstyle2(this.id)" onfocus="setstyle(this.id)" value="<?php echo $row['phno']; ?>" ></td>
	</tr>

	<tr>
	<td class="one">Email:-</td>
	<td><input type="text" name="email"  id="email" onblur="setstyle2(this.id)" onfocus="setstyle(this.id)"  value="<?php echo $row['email']; ?>"  ></td>
	</tr>

	
	
	<tr class="info">
	<td class="one">Houser No:-</td>
	<td><input type="text" name="hno"  id="hno" onblur="setstyle2(this.id)" onfocus="setstyle(this.id)" value="<?php echo $row['hno']; ?>" ></td>
	</tr>
		
	<tr class="success">
	<td class="one">Village:-</td>
	<td><input type="text" name="village"  id="village" onblur="setstyle2(this.id)" onfocus="setstyle(this.id)" value="<?php echo $row['village']; ?>" ></td>
	</tr>
		
	<tr class="info">
	<td class="one">Mandal:-</td>
	<td><input type="text" name="mandal"  id="mandal" onblur="setstyle2(this.id)" onfocus="setstyle(this.id)" value="<?php echo $row['mandal']; ?>" ></td>
	</tr>
	
	<tr class="success">
	<td class="one">District:-</td>
	<td><input type="text" name="district"  id="district" onblur="setstyle2(this.id)" onfocus="setstyle(this.id)" value="<?php echo $row['district']; ?>" ></td>
	</tr>	
	
	<tr><td>	
	<input type="hidden"  name="accno" value="<?php echo $u ?>" ></td>
	</tr>																			
</table>
&nbsp;&nbsp;&nbsp;&nbsp;<input  style="background:white;width:90px;" type="submit"  name="send" value="submit" >
&nbsp;&nbsp;&nbsp;&nbsp;<input  style="background:white;width:90px;" type="reset" value="Reset">

</form></center>
</div>
<?
function changedetails()
{
$accno=$_POST['accno'];
$phno=$_POST['phno'];
$email= $_POST['email'];
$hno= $_POST['hno'];
$village= $_POST['village'];
$mandal= $_POST['mandal'];
$district= $_POST['district'];

$con=mysql_connect("localhost","bank","iiitn") or die('cant connect');
mysql_select_db('bank',$con);
$sql="update b1_users set phno='$phno',email='$email',hno='$hno',village='$village',mandal='$mandal',district='$district' where accno='$accno' ";
if(mysql_query($sql,$con))
	{

	$result=mysql_query("select * from b1_users where accno=$accno",$con);
	echo "<script>hide()</script>";
	echo "<center><strong>Updated Account-Details</strong></center>";
	while($row=mysql_fetch_array($result))
		{
		echo "<center><table border=1  class='table table-striped' style='width:70%;' cellspacing=0 cellpadding=10>";
		echo "<tr class='info'><td>User name </td><td>$row[0]</td></tr>";
		echo "<tr class='success'><td>DOB</td><td>$row[2]</td></tr>";
		echo "<tr class='info'><td>Gender </td><td>$row[3]</td></tr>";
		echo "<tr class='success'><td>Account Type</td><td>$row[4]</td></tr>";
		echo "<tr class='info'><td>Phone number</td><td>$row[6]</td></tr>";
		echo "<tr class='success'><td>Email</td><td>$row[7]</td></tr>";
		echo "<tr class='info'><td>House No</td><td>$row[9]</td></tr>";
		echo "<tr class='success'><td>Village</td><td>$row[10]</td></tr>";
		echo "<tr class='info'><td>Mandal</td><td>$row[11]</td></tr>";
		echo "<tr class='success'><td>District</td><td>$row[12]</td></tr></table>";
		}

	}
}
if(isset($_POST['send']))
	changedetails();
?>
</body>
</html>
