<? include('include.php');
session_start();
$accno=$_SESSION['accno'];
?>

<html>
<head>
<title>User functions</title>
</head>
<body>

<div style="position:absolute;top:0px;left:250px;width:500px;height:300px;">
<p class="lead text-success text-center" style="font-size:1em;font-weight:bold"><u>Choose an Option</u></p>
<form action="display.php" method="post">
<label class="radio"><input type="radio" name="select" value="check" /><span  class="lead text-info ">Enqiry</span></label><br/>
<label class="radio"><input type="radio" name="select" value="loan" /><span class="lead text-info ">TakeLoan</span></label><br/>
<label class="radio"><input type="radio" name="select" value="cloan" /><span class="lead text-info ">ClearLoan</span></label><br/>
<label class="radio"><input type="radio" name="select" value="deposite"/><span class="lead text-info ">Deposite</span></label><br/>
<label class="radio"><input type="radio" name="select" value="withdraw" /><span class="lead text-info ">Withdraw</span></label><br/>
<label class="radio"><input type="radio" name="select" value="transaction" /><span class="lead text-info ">Transfer Money</span></label><br/>
<label class="radio"><input type="radio" name="select" value="chacdetails" /><span class="lead text-info ">Change Account details</span></label><br/>
<label class="radio"><input type="radio" name="select" value="delete" /><span class="lead text-info ">Delete Account</span></label><br/>
<button type="submit" class="btn">Submit</button>
</form>
</div>

<?php
	echo '<div style="position:absolute;top:130px;right:100px;">';
	echo "<img src='upload/$accno' style='border:solid green 2px;' height=200 width=180><br><br/> ";	
	$result=mysql_query("select uname from b1_users where accno='$accno'");
	echo "<span style='color:green;font-size:1.2em;'><u>Name:-</u></span>&nbsp;&nbsp;&nbsp; <span class='lead text-info  '>".mysql_result($result,0,'uname').'</span><br/>';
	echo "<span style='color:green;font-size:1.2em;'><u>Acc No:-</u></span>&nbsp;&nbsp;&nbsp; <span class='lead text-info  '>".$accno.'</span><br/>';	
	$result=mysql_query("select time from b1_lastlog where accno='$accno'");
	$last=mysql_num_rows($result);
	if($last>1)
		echo "<span style='color:green;font-size:1.2em;'><u>Last Login Time:-</u></span>&nbsp;&nbsp;&nbsp; <span class='lead text-info  '>".mysql_result($result,$last-2,'time').'</span>';	
	

?>
</body>
</html>
