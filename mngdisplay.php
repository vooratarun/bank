<?include('include.php')?>
<html>
<head>
<title>Manager display</title>
<body>
<?
$con=mysql_connect("localhost","bank","iiitn");
if(!$con) die("cant connect");
mysql_select_db("bank");

function bankdetails()
{
global $con;
$sql="select * from b1_details";
$result=mysql_query($sql,$con);
echo '<br><center><table border=0 class="table" style="width:60%" cellpadding=5 ><thead style="color:green;font-weight:bold;">Bank Details</thead>';
while($row=mysql_fetch_array($result))
	{

		echo "<tr class='info' ><td>Bank name</td><td>$row[bname]</td></tr>";
		echo "<tr class='success'><td>Total Cash</td><td>$row[bcash]</td></tr>";
		echo "<tr class='info'><td>Deposites Amount</td><td>$row[deposites]</td></tr>";
		echo "<tr class='success'><td>Loans Amount</td><td>$row[loans]</td></tr>";
		echo "<tr class='info'><td>Bank Address</td><td>$row[baddress]</td></tr>";
		echo "<tr class='success'><td>Bank established Date</td><td>$row[date]</td></tr>";
		
	}
$result=mysql_query("select * from b1_users where acctype='ca' ");
echo "<tr  class='info'><td>SA type accounts</td><td>".mysql_num_rows($result)."</td></tr>";
$result=mysql_query("select * from b1_users where acctype='sa' ");
echo "<tr  class='success'><td>CA type accounts</td><td>".mysql_num_rows($result)."</td></tr>";
$result=mysql_query("select * from b1_employ");
echo "<tr  class='info'><td>Number of employees</td><td>".mysql_num_rows($result)."</td></tr>";
while($row=mysql_fetch_array($result))
{
echo "<tr  class='error'><td>$row[designation]</td><td>$row[ename]</td></tr>";
}

echo '</table><button style="background:white;" align="left" onclick="Javascript:window.history.go(-1)">Back</button>';

}

function employdetails()
{
global $con;
$result=mysql_query("select * from b1_employ");
echo "<center><span class='lead text-info'>Total No.of staff ".mysql_num_rows($result).'</span></center><br>';
echo '<center><table class="table table-striped" border=0 cellpadding=5 >';
echo"<tr class='error'><td><b>SNo</b></td><td><b>EmpName</b></td><td><b>Gender</b></td><td><b>Designation</b></td><td><b>Salary</b></td><td><b>Phno</b></td><td><b>Email</b></td><td><b>EmpAddress</b></td><td><b>Joined Date</b></td></tr>";
$m=1;
while($row=mysql_fetch_array($result))
{
$flag=$row['eid'];
echo"<tr class='info'><td>".$m++."</td><td>$row[ename]</td><td>$row[gender]</td><td>$row[designation]</td><td>$row[salary]</td><td>$row[phno]</td><td>$row[email]</td><td>$row[eaddress]</td><td>$row[jdate]</td>";
?>
<td><form  method='post'>
<input type="hidden" value="<?echo $flag; ?>" name="empid" readonly="readonly">
<button name='select' class="btn btn-mini btn-warning" value="deleteemp" >delete</button></form></td></tr>
<?
}
echo '</table>';
?>
<button style="position:relative;top:27px;right:100px;" class="btn btn-info btn-small" align="left" onclick="Javascript:window.history.go(-1)">Back</button>
<form action="addemployee.php" method="post" >
<input type="submit"  class="btn btn-info btn-medium " value="add employee"  >
</form> 
<?
}

function userdetails()
{
global $con;
$result=mysql_query("select * from b1_users");
echo "<br/><br/><center><p class='lead text-success' >Total No.of users ".mysql_num_rows($result)."</p></center>";
echo '<table  class="table" border=0 cellpadding=5 >';
echo"<tr><td><b>Name</b></td><td><b>Accno</td><td><b>Gender</td><td><b>Phno</td><td><b>Email</td><td><b>Address</td><td><b>CreatedTime</b></td></tr>";
while($row=mysql_fetch_array($result))
	{
	$flag=$row['accno'];
	echo"<tr><td>$row[uname]</td><td>$row[accno]</td><td>$row[gender]</td><td>$row[phno]</td><td>$row[email]</td><td>$row[ctime]</td>";?>
	<td><form  method='post'>
	<input type="hidden" value="<?echo $flag; ?>" name="delacno" readonly="readonly">
	<button name='select' value="delete" class="btn btn-danger " >delete</button></form></td>
	<?
	}

}

function deleteuser($acno)
{
global $con;
mysql_query("delete from b1_deposite where accno='$acno' ",$con);
mysql_query("delete from b1_loans where accno='$acno' ",$con);
mysql_query("delete from b1_users where accno='$acno' ",$con);
userdetails();
}

function deleteemp($no)
{
global $con;
mysql_query("delete from b1_employ where eid='$no' ",$con);
employdetails();
}

function lastlogin()
{
global $con;
$result=mysql_query("select * from b1_lastlog");
echo "<center><b>Last Logged Users</b><br><table class='table table-striped' style='width:70%'  border=0 cellpadding=5 >";
echo "<tr><td><b>S.NO</b></td><td><b>Acc.No</b></td><td><b>Uname</b></td><td><b>Time</b></td></tr>";	
	$m=1;
	while($row=mysql_fetch_array($result))
	{
	echo "<tr class='info'><td>".$m++."</td><td>$row[accno]</td><td>$row[uname]</td><td>$row[time]</td></tr>";				
		if($m==10)
			break;
	}
	echo "</table>";
echo '<br><br><form method="post" action="#"><button name="select"  value="deletelog" class="btn btn-warning btn-mini">Clear Log</button></form>';

}
$select=$_POST['select'];
switch($select)
{
	case "bankdetails":
		bankdetails();
		break;
	case "employdetails":
		employdetails();
		break;
	case "userdetails":
		userdetails();
		break;
	case "delete":
		$acno=$_POST['delacno'];
		deleteuser($acno);
		break;
	case "deleteemp" :
		$no=$_POST['empid'];
		echo $no;
		deleteemp($no);
		break;
	case "lastlogin":
		lastlogin();
		break;
	case "deletelog":
		mysql_query('truncate table b1_lastlog');
		echo "<center><span class='lead  text-success'>Log was cleared</span></center>";
		break;
	default:
		echo "wrong option";
		
}

?>
</body>
</html>
