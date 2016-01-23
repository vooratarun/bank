<? include('include.php');
session_start();
?>
<html>
<head>
<title>Display</title>
<script type="text/javascript">
function message(x)
{
	var txt=x;
	if(txt==="takeloan")	
		document.getElementById("message").innerHTML="You have already taken loan";
}
function isInteger(s)
{
      var i;
	s = s.toString();
      for (i = 0; i < s.length; i++)
      {
         var c = s.charAt(i);
         if (isNaN(c)) 
	   {
		alert("Given value is not a number");
		return false;
	   }
      }
      return true;
}
function loc()
{
	window.location='authorize.php';
}
</script>
</head>
<body>

<?php

$con=mysql_connect("localhost","bank","iiitn");
if(!$con) die("Can not connect");

if(!mysql_select_db("bank",$con)) die("can not select");





function details()
{
global $u,$con;
$result=mysql_query("select * from b1_users where accno=$u;",$con);

echo "<br/><br/><center><strong>Last-Deposites</strong></center><br/>";

$result=mysql_query("select * from b1_deposite_log where accno=$u",$con);
echo "<center><table style='width:70%' class='table table-hover table-condensed' border=1 cellspacing=0 cellpadding=20>";
		echo "<tr class='success'><th>Deposited id</th><th>Deposited amount</th><th>Dept time</th></tr>";
while($row=mysql_fetch_array($result))		
	echo "<tr class='info'><td>$row[0]</td><td>$row[2]</td><td>$row[3]</td></tr>";
	echo "</table>";


echo "<br/><br/><center><strong>Last-Transfers</strong></center>";
$result=mysql_query("select * from b1_transfers where oldacc=$u",$con);
echo "<center><table style='width:70%' class='table table-hover table-condensed' border=1 cellspacing=0 cellpadding=20>";
		echo "<tr><th>Transferred id</th><th>Transferred from</th><th>Transferred amount </th> <th>Transferred time </th></tr>";

while($row=mysql_fetch_array($result))		
	echo "<tr class='success'><td>$row[0]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td></tr>";
	echo "</table>";

echo "<br/><br/><center><strong>Last-Withdrawls</strong></center>";

$result=mysql_query("select * from b1_withdraw where accno=$u",$con);
echo "<center><table style='width:70%' class='table table-hover table-condensed' border=1 cellspacing=0 cellpadding=20>";
		echo "<tr ><th>withdrawn id</th><th>Withdrawn amount</th><th>withdrawn time</th></tr>";
while($row=mysql_fetch_array($result))		
	echo "<tr class='error'><td>$row[0]</td><td>$row[1]</td><td>$row[3]</td></tr>";
	echo "</table>";

$result=mysql_query("select damount from b1_deposite where accno=$u",$con);
while($row=mysql_fetch_row($result))
	echo "<strong style='font-size:1.2em;color:green;' >Current Amount:-Rs.$row[0]/-</strong><br/><br/>";


$result=mysql_query("select * from b1_loans where accno=$u",$con);
echo "<center><table  style='width:70%' class='table table-hover table-condensed' border=1 cellspacing=0 cellpadding=20>";
	echo "<tr><th>Loan taken id</th><th>amount</th><th>time</th></tr>";

while($row=mysql_fetch_array($result))
	echo "<tr class='warning'><td>$row[0]</td><td>$row[2]</td><td>$row[4]</td></tr>";
	echo "</table>";


echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Print this page" 
onclick="Javscript:window.print()" />';


}
function deposite()
{
global $con,$u;
$result=mysql_query("select damount,dtime from b1_deposite where accno=$u",$con);

$total= mysql_result($result,0,"damount");
$dtime=mysql_result($result,0,"dtime");
$year= (int) substr($dtime,0,4);
$newyear= (int) date("Y");
$newmonth= (int) date("m");
$oldmonth= (int) substr($dtime,5,7);
$totaltime=($newyear-$year)+ ( ($newmonth-$oldmonth) / 12 );

$interest= ($total*$totaltime*0.06) ;
echo '<div style="position:absolute;right:10px;top:150px;">';
echo "<span style='color:green;font-size:1.2em;'><u>Amount:-</u></span>&nbsp;&nbsp;&nbsp; <span class='lead text-info  '>Rs.".$total.'/-</span><br/>';	
$result=mysql_query("select damount,dtime from b1_deposite_log where accno='$u' ");
$last=mysql_num_rows($result);
echo"<span style='color:green;font-size:1.2em;'><u> Last deposited time:-</u></span>&nbsp;&nbsp;&nbsp; <span class='lead text-info  '>".mysql_result($result,$last-1,'dtime').'/-</span><br/>';	
echo"<span style='color:green;font-size:1.2em;'><u> Last deposited Amount:-</u></span>&nbsp;&nbsp;&nbsp; <span class='lead text-info  '>Rs.".mysql_result($result,$last-1,'damount').'/-</span><br/>';	
echo '</div>';
?>
<div style="position:absolute;top:100px;left:150px;width:500px;height:400px;">
<p class="lead text-success text-center" style="font-size:1.5em;font-weight:bold"><u>Deposite Money</u></p>
<form  method="post" onsubmit="return validate()" ><center>
<table cellpadding=10 cellspacing=10>
<tr>
<td>Amount:- </td><td><input type="text" name="damount" onKeyup="isInteger(this.value)" required></td><tr/>
<tr>
<td>Accno:- </td><td><input type="text" name="accno"  readonly='readonly' value="<?php echo $u;?>"  ></td><tr/>
<tr>
<td></td><td><input type="hidden" name="select" value="deposite_money"  ></td><tr/>
<tr><td><button type="submit" class="btn" >submit</button></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="reset" class="btn" >Reset</button></td></table>
</form><br/><br/><br/><br/><br/><br/>

</div>
<?
}

function deposite_money()
{
global $u,$con;

$newamount = $_POST['damount'];
if($newamount>0)
  {
	$sql="select damount from b1_deposite where accno=$u";
	$result=mysql_query($sql,$con);	
	echo '<div style="position:absolute;top:100px;left:250px;width:500px;height:300px;">';
	echo '<p class="lead text-success text-center" style="font-size:1.3em;font-weight:bold"><u>Details</u></p>';
	echo "<center><br/><table  class='table table-striped' cellspacing=5 cellpadding=10 border=0>
	<tr class='info'><td>old amount</td> <td>Rs.".mysql_result($result,0,"damount").'/-</td><tr/>';
	echo "<tr class='info'><td>new amount</td><td> Rs.".$newamount.'/-</td><tr/>';
	$sql="update b1_deposite set damount=damount+$newamount  where accno=$u";
	mysql_query($sql,$con);
	
	$sql="insert into b1_deposite_log(accno,damount)values('$u','$newamount')";
	mysql_query($sql,$con);
	
	$sql="update b1_details set deposites=deposites+'$newamount' ";
	mysql_query($sql,$con);

	$sql="select * from b1_deposite where accno=$u";
	$result=mysql_query($sql,$con);

	echo "<tr class='info'><td>present amount</td><td> Rs.".mysql_result($result,0,"damount").'/-</td><tr/>';
	echo "<tr class='info'><td>Last time deposited</td><td>".mysql_result($result,0,"dtime").'</td><tr/></table>'; 
	
}
else{
	echo "Enter correct amount";
	echo '<button style="background:white;" align="left" onclick="Javscript:window.history.go(-1)">Back</button>';}			
}


function withdraw()
{
global $con,$u;
$result=mysql_query("select damount from b1_deposite where accno=$u",$con);
$total= mysql_result($result,0,'damount');

echo '<div style="position:absolute;right:10px;top:150px;">';
echo "<span style='color:green;font-size:1.2em;'><u>Total Amount:-</u></span>&nbsp;&nbsp;&nbsp; <span class='lead text-info  '>Rs.".$total.'/-</span><br/>';	
$result=mysql_query("select wamount,wtime from b1_withdraw where accno='$u' ");
$last=mysql_num_rows($result);
if($last>=1){
echo"<span style='color:green;font-size:1.2em;'><u> Last withdrew time:-</u></span>&nbsp;&nbsp;&nbsp; <span class='lead text-info  '>".mysql_result($result,$last-1,'wtime').'/-</span><br/>';	
echo"<span style='color:green;font-size:1.2em;'><u> Last withdrew Amount:-</u></span>&nbsp;&nbsp;&nbsp; <span class='lead text-info  '>Rs.".mysql_result($result,$last-1,'wamount').'/-</span><br/>';}	
echo '</div>';
?>

<div style="position:absolute;top:100px;left:150px;width:500px;height:400px;">
<form  method="post" ><center>
<p class="lead text-success text-center" style="font-size:1.5em;font-weight:bold"><u>WithDraw Money</u></p>
<table cellpadding=10 cellspacing=10>
<tr>
<td>Amount:- </td><td><input type="text" name="damount"  required></td><tr/>
<tr>
<td>Accno:- </td><td><input type="text" name="accno" value="<?php echo $u;?>" readonly='readonly'  ></td><tr/>
<tr>
<td></td><td><input type="hidden" name="select" value="withdraw_money"  ></td><tr/>
<tr><td><button type="submit" class="btn" >submit</button></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button type="reset" class="btn" >Reset</button></td></table>
</form><br/><br/><br/><br/><br/><br/>
 
</div>
<?
}


function withdraw_money()
{
global $u,$con;
$newamount = $_POST['damount'];
$result=mysql_query("select damount from b1_deposite where accno=$u",$con);
$total= mysql_result($result,0,'damount');
if($newamount <=($total-500))
{
	$sql="select damount from b1_deposite where accno=$u";
	$result=mysql_query($sql,$con);
	echo '<div style="position:absolute;top:100px;left:250px;width:500px;height:300px;">';
	echo '<p class="lead text-success text-center" style="font-size:1.3em;font-weight:bold"><u>Details</u></p>';
	echo "<center><br/><table class='table table-striped table-hover' cellspacing=5 cellpadding=10 border=0>
	<tr class='info'><td>old amount</td><td>Rs.".mysql_result($result,0,"damount").'/-</td><tr/>';
	echo "<tr class='info'><td>withdrawn amount</td><td> Rs.".$newamount.'/-</td><tr/>';
	$sql="update b1_deposite set damount=damount-$newamount  where accno=$u";
	mysql_query($sql,$con);

	mysql_query("update b1_details set  deposites=deposites-'$newamount' ");

	$sql="insert into b1_withdraw(wamount,accno) values('$_POST[damount]','$u')";
	mysql_query($sql,$con);

	$sql="select * from b1_deposite where accno=$u";
	$result=mysql_query($sql,$con);
	echo "<tr class='info'><td>Balance</td> <td>Rs.".mysql_result($result,0,"damount").'/-</td><tr/>';
	echo "<tr class='info'><td>Last withdrawl time</td><td>".mysql_result($result,0,"dtime").'</td></tr/></table>';
}
else{
	echo "Enter correct amount";}
}

function loan()
{
global $con,$u;
$sql="select * from b1_loans where accno=$u";
$result=mysql_query($sql,$con);
$ltimes=mysql_result($result,0,"ltimes");
if($ltimes==0)
   {
	echo '	<div style="position:absolute;top:100px;left:150px;width:500px;height:400px;">';
	echo '<p class="lead text-success text-center" style="font-size:1.3em;font-weight:bold"><u>Take Loan</u></p>';
	?>
	<form  method="post" ><center>
	<table cellpadding=10 cellspacing=10>
	<tr>
	<td>Amount:- </td><td><input type="text" name="lamount" required></td><tr/>
	<tr>
	<td>Accno:- </td><td><input type="text" name="accno" value="<?php echo $u;?>" readonly='readonly'  ></td><tr/>
	<tr>
	<tr>
	<td> Security Accno:- </td><td><input type="text" name="seaccno" required	 ></td><tr/>
	<tr>
	<td></td><td><input type="hidden" name="select" value="loan_money"  ></td><tr/>
	<tr><td><button type="submit" class="btn" >submit</button></td><td>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="reset" class="btn" >Reset</button></td></table>
	</form><br/><br/><br/><br/><br/><br/>	
	</div>

<div style="position:absolute;right:50px;top:150px;">
<span style='color:green;font-size:1.2em;'><u>Interest Rate:-</u></span>&nbsp;&nbsp;&nbsp; <span class="lead text-info"  >6%</span><br/>
<span style='color:green;font-size:1em;'><u> Max amount You can take:-</u></span>&nbsp;&nbsp;&nbsp; <span class="lead text-info"  >Rs.25000/-</span><br/></div>

	<?
   }
else {
	echo '<div style="position:absolute;right:350px;top:150px;">
		<span style="color:green;font-size:1.2em;"><u>You have already taken loan. First clear that one. </u></span>';
	echo '<button  class="btn btn-primary btn-small" align="left" onclick="Javscript:window.history.go(-1)">Back</button>';}

}

function loan_money()
{
global $u,$con;
$flag=0;
$newamount=$_POST['lamount'];
$seaccno=$_POST['seaccno'];
$result=mysql_query("select * from b1_users where accno='$seaccno'");
$nrows=mysql_num_rows($result);
if($nrows!=1){
	echo '<div style="position:absolute;right:350px;top:150px;">
		<span style="color:green;font-size:1.2em;"><u>Account NOt found</u></span>';return ;}

	if($newamount<25000 && $nrows==1)
	{
		$result=mysql_query("select damount from b1_deposite where accno='$seaccno'");
		$seamount=mysql_result($result,0,'damount');
		$half=$newamount*(0.5);
		echo $seamount;
		if($half <= $seamount)
			$flag=1;
	
	}

	if($flag==1)
	{	
		$sql="update b1_details set bcash=bcash-'$newamount' ";
		mysql_query($sql,$con);
		$sql="update b1_details set loans=loans+'$newamount' ";
		mysql_query($sql,$con);

		$sql = "update b1_loans set lamount=lamount+$newamount,ltimes=ltimes+1,secaccno='$seaccno'  where accno=$u";
		mysql_query($sql,$con);
		echo '<div style="position:absolute;right:350px;top:150px;">
		<span style="color:green;font-size:1.2em;"><u>Your account was updated .check details once</u></span>';

	}
	else if($flag==0)
		echo '<div style="position:absolute;right:350px;top:150px;">
		<span style="color:green;font-size:1.2em;"><u>You are not eligible to take loan. </u></span>';;
}
function cloan()
{
global $u,$con;
$sql="select * from b1_loans where accno=$u";
$result=mysql_query($sql,$con);
$camount=mysql_result($result,0,"lamount");


$dtime=mysql_result($result,0,"ltime");
$year= (int) substr($dtime,0,4);
$newyear= (int) date("Y");
$newmonth= (int) date("m");
$oldmonth= (int) substr($dtime,5,7);
$totaltime=($newyear-$year)+ ( ($newmonth-$oldmonth) / 12 );
$interest= ($camount*$totaltime*0.06) ;
echo '
<div style="position:absolute;right:30px;top:150px;">
<span style="color:green;font-size:1.2em;"><u>Loan taken</u> Rs. :-'.$camount.'/-</span><br/><br/>';

$camount=$camount+$interest;
echo '<span style="color:green;font-size:1.2em;"><u>Interest</u>:- Rs.'.$interest.'/-</span><br/><br/>';

mysql_query("update b1_loans set lamount=$camount where accno=$u",$con);

if($camount>0)
 {
echo '<span style="color:green;font-size:1.2em;"><u>YOu have to clear</u>:- Rs.'.$camount.'/-</span><br/><br/></div>';
	?>
	<div style="position:absolute;top:100px;left:250px;width:500px;height:400px;">
	<p class="lead text-success text-center" style="font-size:1.3em;font-weight:bold"><u>Clear Loan</u></p>
	<form    method="post" >
	<center>
	<table cellpadding=10 cellspacing=10>
	<tr>
	<td>Amount:- </td><td><input type="text" name="lamount"  required></td><tr/>
	<tr>
	<td>Accno:- </td><td><input type="text" name="accno" value="<?php echo $u;?>" readonly="readonly"  ></td><tr/>
	<tr>
	<td></td><td><input type="hidden" name="select" value="clear_loan"   ></td><tr/>
	<tr><td><button type="submit" class="btn" >submit</button></td><td>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="reset" class="btn" >Reset</button></td></table><center>
	</form><br/><br/><br/><br/><br/><br/>
	</div>
	<?
   }
else if($camount==0){
		
	echo '</div><div style="position:absolute;right:350px;top:150px;" >';
	echo "<span style='color:green;font-size:1.5em;'>YOu have not taken any loan</span><br/><br/>";
	echo '<button class="btn btn-warning btn-small " align="left" onclick="Javscript:window.history.go(-1)">Back</button></div>';}
else
	echo "Your details were updated.check once";
	
   		
}

function clear_loan()
{
global $u,$con;

$amount=$_POST['lamount'];

$sql="select * from b1_loans where accno=$u";
$result=mysql_query($sql,$con);
$oldamount=mysql_result($result,0,"lamount");
if($amount>0 && $amount<$oldamount)
   {
	$sql="update b1_loans set lamount=lamount-$amount  where accno=$u";
	mysql_query($sql,$con);
	mysql_query("update b1_details set loans=loans-'$amount',bcash=bcash+'$amount'");
	echo '<div style="position:absolute;right:350px;top:150px;" >';
	echo "<p class='lead text-success'>Entered Amount is <b>Rs.$amount/- </b><br> ";
	echo "Your account was updated.check details once<br/>";
	echo "You have to pay Remaining<strong>&nbsp; Rs. ". ($oldamount-$amount). "/-</strong> money to clear your loan</p> </div>";


   }
else if($amount==$oldamount)
  {
	$sql="update b1_loans set lamount=lamount-$amount,ltimes=0,secaccno=0 where accno=$u";
	mysql_query("update b1_details set loans=loans-'$amount',bcash=bcash+'$amount'");
	mysql_query($sql,$con);
	echo '<div style="position:absolute;right:350px;top:150px;" >';
	echo "<p class='lead text-success'> Your loan was cleared.check details once</p></div>";
  }	
else{
	echo '<div style="position:absolute;right:350px;top:150px;" >';
 	echo " <p class='lead text-warning'>You have to pay just <b>Rs.$oldamount/-</b> only</p>";
	echo '<button class="btn btn-warning btn-small" align="left" onclick="Javscript:window.history.go(-1)">Back</button></div>';}	
}
function chacdetails()
{
global $u,$con;
$result=mysql_query("select * from b1_users where accno=$u",$con);
echo "<center><strong>Account-Details</strong></center>";
echo "<center><table border=1 style='width:70%' class='table table-hover table-condensed' cellspacing=0 cellpadding=10>";
while($row=mysql_fetch_array($result))
	{

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
?>	
<form method='post' action='updateaccount.php'>
<input type='hidden' name='accno' readonly="readonly" value=" <?php echo $u;?>"  ><br/>
<input type='submit' value="clickTomodify" class="btn btn-primary btn-medium" >
</form>
<?
} 

function transaction()
{

global $u,$con;
$result=mysql_query("select damount from b1_deposite where accno='$u' ");
$oldamount=mysql_result($result,0,'damount');
echo '<div style="position:absolute;right:50px;top:150px;" >';
echo "<span style='color:green;font-size:1.5em;'>";
echo ' Total Amount is:- Rs.'.$oldamount.'</span><br/>';
echo '<span style="color:green;font-size:1.5em;"> you can transfer Rs./-'.($oldamount-500).'/-</span></div>';
?>
<div style="position:absolute;top:100px;left:250px;width:500px;height:400px;">
<form  method="post"  ><center>
<p class="lead text-success text-center" style="font-size:1.3em;font-weight:bold"><u>Transfer Money</u></p>
<table cellpadding=10 cellspacing=10>
<td>Account no:- </td><td><input type="text" name="nacno" onKeyup="isInteger(this.value)" required></td><tr/>
<tr>
<tr>
<td>Amount:- </td><td><input type="text" name="tamount" onKeyup="isInteger(this.value)" required></td><tr/>
<tr>
<td> </td><td><input type="hidden" name="accno" value="<?php echo $u;?>"  ></td><tr/>
<tr>
<td></td><td><input type="hidden" name="select" value="transfer_money"  readonly="readonly"></td><tr/>
<tr><td><input type="submit" value="submit" class="btn btn-success" ></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="reset" class="btn btn-warning" >Reset</button></td></table>
</form>
</div>
<?
}


function transfer_money()
{
global $u,$con;

$accno=$_POST['nacno'];
$tamount= $_POST['tamount'];
$result=mysql_query("select * from b1_users where accno='$accno' ",$con);

if(mysql_num_rows($result)==1)
{
	mysql_query("update b1_deposite set damount=damount+'$tamount' where accno='$accno' ;",$con);
	mysql_query("update b1_deposite set damount=damount-'$tamount' where accno='$u'; ",$con);
	mysql_query("insert into b1_transfers(oldacc,newacc,tamount) values('$u','$accno','$tamount') ",$con);
	$result=mysql_query("select * from b1_transfers where oldacc='$u' ",$con);
	$t=mysql_num_rows($result)-1;
	$tid=mysql_result($result,$t,'tid');
	
	$result=mysql_query("select * from b1_transfers where oldacc='$u' and tid= '$tid' ",$con);
		
	echo '<div style="position:absolute;top:100px;left:250px;width:500px;height:400px;">
	<span class="text-center" style="color:green;font-size:1.5em;"> <u>Details</u> </span><br/>
	<table class="table table-striped table-hover" border=1 cellspacing=5 cellpadding=5>';
	while($row=mysql_fetch_array($result)) 
	{
		echo "<tr><td>Transfer id:- </td><td>$row[tid]</td></tr>";
		echo "<tr><td>Transfer from:- </td><td>$row[oldacc]</td></tr>";
		echo "<tr><td>Transfer to:- </td><td>$row[newacc]</td></tr>";
		echo "<tr><td>Transfered Amount:- </td><td>$row[tamount]</td></tr>";
		echo "<tr><td>Date:- </td><td>$row[Date]</td></tr>";
	}
		echo "</table></div>";
	
}
else

	echo "No user find with entered account number";


}

function delete()
{
	global $u;
echo "delete account";
$result=mysql_query("select lamount from b1_loans where accno='$u'");
$lamount=@mysql_result($result,0,"lamount");
if($lamount==0)
	{

	$result2=mysql_query("select damount from b1_deposite where accno='$u' ");
echo "You can withdraw or transfer  money Rs".mysql_result($result2,0,"damount")."/- <br/> first withdraw them.";	
	
	//mysql_query("delete from b1_loans where accno='$u' ");
	}	

}

$select= $_POST['select'];
$u = $_SESSION['accno'];
?>

<?
	switch($select)
	{
		case "check":
		details();
		break;

		case "deposite":
		deposite();
		break;
	
		case "deposite_money":
		deposite_money();
		break;

		case "withdraw":
		withdraw();
		break;

		case "withdraw_money":
		withdraw_money();
		break;

		case "loan":
		loan();
		break;
	
		case "loan_money":
		loan_money();
		break;

		case "cloan":
		cloan();
		break;
		
		case "clear_loan":
		clear_loan();
		break;	

		case "chacdetails":
		chacdetails();
		break;
		
		case "transaction":
		transaction();
		break;

		case "transfer_money":
		transfer_money();
		break;
		
		case "delete";
		delete();
		break;

		default:
		echo "wrong option";
	}
?>
</body>
</html>
