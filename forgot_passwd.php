<?php
session_start();
include('include.php');
$user=(int) $_SESSION['accno'];

?>
	<!DOCTYPE html>
	<html lang="en">
	  <head>
	<script>
function show_error(msg){
	ht = '<div class="alert alert-error" style="width:400px;"><a href="#" data-dismiss="alert" class="close">&times;</a><strong>'+msg+'</strong></div>';
	$('#error').hide();
	$('#error').html(ht);
	$('#error').slideDown('slow');
	}

function show_success(msg){
	ht = '<div class="alert alert-success"><a href="#" data-dismiss="alert" class="close">&times;</a><strong>'+msg+'</strong></div>';
	$('#error').hide();
	$('#error').html(ht);
	$('#error').slideDown('slow');
	}

	</script>	
	    <meta charset="utf-8">
	    <title>Password Change</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="">
	    <script type="text/javascript">
		function validate_required(field,alerttxt)
		{
			with(field)
			{
				if(value==null||value=="")
				{show_error(alerttxt);return false;}
				else{return true}
			}
		}
		function validate_form(thisform)
		{
			with(thisform)
			{
				if(validate_required(uname,"Please Enter Your Username")==false)
					{uname.focus();return false;}
				else if(validate_required(color,"Please Enter Your Security Code")==false)
					{color.focus();return false;}
				else if(validate_required(passwd,"Please Enter New Password")==false)
					{passwd.focus();return false;}
				else if(validate_required(newpasswd,"Please Retpe Your New Password")==false)
					{newpasswd.focus();return false;}			
				else
					{return true;}		
			}
		}
		</script>
	    <!-- Le styles -->
	    <style type="text/css">
	      body {
		padding-top: 20px;
		padding-bottom: 0px;
	      }

	      .form-signin {
		max-width: 350px;
		padding: 0px 30px 30px;
		margin: 0 auto 0px;
		background-color: #fff;
		border: 1px solid #e5e5e5;
		-webkit-border-radius: 5px;
		   -moz-border-radius: 5px;
		        border-radius: 5px;
		-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
		   -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
		        box-shadow: 0 1px 2px rgba(0,0,0,.05);
	      }
	      .form-signin .form-signin-heading,
	      .form-signin .checkbox {
		margin-bottom: 5px;
	      }
	      .form-signin input[type="text"],
	      .form-signin input[type="text"] {
		font-size: 16px;
		height: auto;
		margin-bottom: 10px;
		padding: 7px 9px;
	      }
	    </style>
	  </head>

	  <body background="backgrounds/24.png">
	     <center><div id="error"></div></center>
	    <div class="container">
	      <form class="form-signin" action="forgot_passwd.php" onsubmit="return validate_form(this)" enctype="multipart/form-data" method="post">
      		<center><font color="indigo"><h2 class="form-signin-heading">Change Password</h2></font></center>
		<font color="green">
		<h4>New Password</h4><input type="password" name="passwd" style="height:35px;" placeholder="Enter New Password" class="input-block-level"  />
		<h4>Retype New Password</h4><input type="password" name="newpasswd" style="height:35px;" placeholder="Retype Your Password" class="input-block-level"  /></font>
		<p class="text-center"><button class="btn btn-primary" name="submit" type="submit">Submit</button></p>
		</form>
	    </div> <!-- /container -->
	  </body>
	</html>
	<?php

if(isset($_POST['submit']))
{
	$passwd=mysql_real_escape_string($_POST['passwd']);
	$repasswd=mysql_real_escape_string($_POST['newpasswd']);
	if(!($passwd==$repasswd))
	{
		echo "<script>show_error('Entered Wrong Passwords,Please Try Again');</script>";
		exit;	
	}
	if($passwd==$repasswd)
	{	
	$result=mysql_query("UPDATE b1_users SET passwd='$passwd' WHERE accno='$user'");
		if($result)
		echo "<script>show_success('Messg : Successfully Changed Your Account Password');</script>";
	}
	else
	{
		echo "<script>show_error('Error : Entered Username is not correct. Please Try again');</script>";
	}

}
?>
