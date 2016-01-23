<?include('include.php');?>
<html>
<head>
<title>Manager's page</title>
</head>
<body>
<div  style="position:absolute;left:350px;top:100px;">
<form method="post" action="mngdisplay.php">
<p class="lead text-success text-center" style="font-size:2em;font-weight:bold"><u>Choose an Option</u></p>
<label class='radio'><input type="radio" name="select" value="bankdetails" /><span class="lead text-info ">Check bank details</span></label><br/><br/>
<label class='radio'><input type="radio" name="select" value="employdetails" /><span class="lead text-info ">Check employe details</span></label><br/><br/>
<label class='radio'><input type="radio" name="select" value="userdetails" /><span class="lead text-info ">Check user details</span></label><br/><br/>
<label class='radio'><input type="radio" name="select" value="lastlogin" /><span class="lead text-info ">Lost login users</span></label><br/><br/>
<button type="submit" name=send class="btn btn-pri-mary ">Submit</button>
	
</form> 
</div>


</body>
</html>
