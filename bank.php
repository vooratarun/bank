<html>
<body>
<?php
include('include.php');
$con=mysql_connect("localhost","bank","iiitn");
if (!$con)
  die('Could not connect: ' . mysql_error());

/*
echo "<center><table border=1 cellspacing=0 cellpadding=20>";
echo "<tr><td>User name </td><td>$_POST[uname]</td></tr>";
echo "<tr><td>Gender </td><td>$_POST[gender]</td></tr>";
echo "<tr><td>Account Type</td><td>$_POST[acctype]</td></tr>";
echo "<tr><td>DOB</td><td>$_POST[d1]-$_POST[d2]-$_POST[d3]</td></tr>";
echo "<tr><td>Phone number</td><td>$_POST[phno]</td></tr>";
echo "<tr><td>Email</td><td>$_POST[email]</td></tr>";
echo "<tr><td>Address</td><td>$_POST[address]</td></tr>";
echo "</table>";
*/
echo "<center><b>Account Details:-</b></center>";
$a = (int) $_POST['phno'];
$date=$_POST['d1'].'-'.$_POST['d2'].'-'.$_POST['d3'];
$passwd=$_POST['passwd'];

mysql_select_db("bank",$con);

//writing data to b1_users table
$sql="INSERT INTO b1_users (uname,passwd,date,gender,acctype,accno, phno,email,fname,hno,village,mandal,district,ctime)
VALUES('$_POST[uname]','$passwd','$date', '$_POST[gender]', '$_POST[acctype]', NULL,'$_POST[phno]','$_POST[email]','$_POST[fname]',
'$_POST[hno]','$_POST[village]','$_POST[mandal]','$_POST[district]',CURRENT_TIMESTAMP);";

mysql_query($sql,$con);

//writing data to b1_deposite table and b1_loans table
$sql="select * from b1_users";
$result=mysql_query($sql,$con);

for($i=0;$i< mysql_num_rows($result);++$i);    
$accno=mysql_result($result,$i-1,"accno");
$sql="insert into b1_deposite(accno,damount) values('$accno','$_POST[damount]')";
mysql_query($sql,$con);

$sql="insert into b1_deposite_log(accno,damount) values('$accno','$_POST[damount]')";
mysql_query($sql,$con);

$sql="insert into b1_loans(accno,lamount) values('$accno',0)";
mysql_query($sql,$con);

mysql_query("update b1_details set deposites=deposites+'$_POST[damount]' ",$con);

for($i=0;$i< mysql_num_rows($result);++$i);    //printing data of just created user.
echo "<center><br/><br/><br/><br/><br/><table class='table ' style='width:70%;' border=1 cellspacing=0 cellpadding=20>";
echo "<tr  class='info'><td>User name:- </td><td>".mysql_result($result,$i-1,"uname")."</td></tr>";
echo "<tr class='success'><td>Father Name:-</td><td>".mysql_result($result,$i-1,"fname")."</td></tr>";
$accno=mysql_result($result,$i-1,"accno");
echo "<tr  class='info'><td>Account Number:- </td><td>".$accno."</td></tr>";
echo "<tr class='success'><td>Gender:- </td><td>".mysql_result($result,$i-1,"gender")."</td></tr>";
echo "<tr class='info'><td>Account Type:-</td><td>".mysql_result($result,$i-1,"acctype")."</td></tr>";
echo "<tr class='success'><td>DOB:- </td><td>".mysql_result($result,$i-1,"date")."</td></tr>";
echo "<tr class='info'><td>Phone number:-</td><td>".mysql_result($result,$i-1,"phno")."</td></tr>";
echo "<tr class='success'><td>Email:-</td><td>".mysql_result($result,$i-1,"email")."</td></tr>";
echo "<tr class='info'><td>House No:-</td><td>".mysql_result($result,$i-1,"hno")."</td></tr>";
echo "<tr class='success'><td>Village :-</td><td>".mysql_result($result,$i-1,"village")."</td></tr>";
echo "<tr class='info'><td>Mandal:- </td><td>".mysql_result($result,$i-1,"mandal")."</td></tr>";
echo "<tr class='success'><td>District :-</td><td>".mysql_result($result,$i-1,"district")."</td></tr>"; 
echo "<tr class='info'><td>Deposited Amount:-</td><td>Rs.".$_POST['damount']."/-</td></tr>";
echo "<tr class='success'><td>Created time:-</td><td>".mysql_result($result,$i-1,"ctime")."</td></tr>"; 
echo "</table>";
echo '<a  target="_top" href=\'login.php\'" ><button>Login</button></a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<button style="background:white;" align="left" onclick="Javscript:window.print()">Print page</button>';

if ((($_FILES["file"]["type"] == "image/gif")
		|| ($_FILES["file"]["type"] == "image/jpeg")
		|| ($_FILES["file"]["type"] == "image/pjpeg")
		|| ($_FILES["file"]["type"] == "image/ico")
		|| ($_FILES["file"]["type"] == "image/png"))
		&& ($_FILES["file"]["size"] < 10485760))
{	
	if($_FILES["file"]["error"]>0)
		echo "error uploading file <br>";
	else
	{
		
	move_uploaded_file($_FILES["file"]["tmp_name"],"upload/".$accno);
	}

}
else
	echo "invalid file";


?>
<div style="position:absolute;top:20px;left:450px">
<img src="upload/<?php echo $accno;?>" class="img-poloroid" width="160" height="250" >
</div>

</body>
</html>
