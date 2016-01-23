<?
include('include.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>View Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
	<link rel="shortcut icon" href="rel.png" type="image/x-icon" />    

    <!-- Le styles -->
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 0px;
        background-color: #f5f5f5;
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
<body background='backgrounds/24.png'>
<center><div id="error"></div></center>
<?php
	$accno=$_GET['accno'];
	$result=mysql_query("select * from b1_users where accno='$accno'");
	$res=mysql_fetch_array($result);
?>
	<h3 class="text-center"><font color="green"><?php echo $res['uname']; ?>'s Profile</h3>
	<table class="table table-striped" style="position:absolute;left:200px;width:60%;" cellpadding="0" cellspacing="0" border="1">
	<tr class="error">
	<td colspan="2" class="text-center"><center><img src="upload/<?php echo $res['accno']; ?>" height="200" width="180" /></center></td>
	</tr>
		<tr class="success">
		<td width="50%"><b>User Name</b></td>
		<td><?php echo $res['uname']; ?></td>
			</tr>	
		<tr class="info">
				<td><b> Father Name </b></td>
				<td><?php echo $res['fname']; ?></td>
		</tr>		
			<tr class="success">
				<td><b>ACCOUNT NUMBER</b></td>
				<td><?php echo $res['accno']; ?></td>
			</tr>
			<tr class="info">
				<td><b>ACCOUNT TYPE</b></td>
				<td><?php echo $res['acctype']; ?></td>
			</tr>
			<tr class="success">
				<td><b>GENDER</b></td>
				<td><?php echo $res['gender']; ?></td>
			</tr>
			<tr class="info">
				<td><b>Date Of Birth</b></td>
				<td><?php echo $res['date']; ?></td>
			</tr>
	
			<tr class="info">
				<td><b>Phone Number</b></td>
				<td><?php echo $res['phno']; ?></td>
			</tr>
	
			<tr class="success">
				<td><b>Email Id</b></td>
				<td><?php echo $res['email']; ?></td>
			</tr>
			
			<tr class="info">
				<td><b>House Number </b></td>
				<td><?php echo $res['hno']; ?></td>
			</tr>
			<tr class="info">
				<td><b> Village </b></td>
				<td><?php echo $res['village']; ?></td>
			</tr>
			<tr class="info">
				<td><b> Mandal </b></td>
				<td><?php echo $res['mandal']; ?></td>
			</tr>
			<tr class="info">
				<td><b> District </b></td>
				<td><?php echo $res['district']; ?></td>
			</tr>			
	</table>		

