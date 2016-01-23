<?php
include('include.php');
session_start();
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<title>Authorize</title>
<script >
</script>
</head>
<body >
<?php
$con=mysql_connect("localhost","bank","iiitn");
if(!$con) die("Can not connect");
if(!mysql_select_db("bank",$con)) die("can not select");


$result=mysql_query("SELECT accno,passwd from b1_users");
$count=0;
$u=$_POST['accno'];
$p=$_POST['passwd'];
while($row=mysql_fetch_row($result))
{
	if ($u=="$row[0]" && $p=="$row[1]" )	
		{
		$count=1;
		}
		
}

function display()
{
global $u,$p;
?>
<div style="position:absolute;top:100px;left:250px;width:500px;height:400px;"><center>
<form action="userfunctions.php" method="post"><br/>
<input type="hidden"  name="accno"  style="height:30px;"value="<?php echo $u ?>"></br><br/><br/>
</form>
</div>
<?
}
if($count==1)
{
		echo "<script>
		alert(\"Welcome\");	
		</script>";
		display();
		include('userfunctions.php');
		//details();
		
}	
else
{
		echo "
		<script>
		alert(\"incorrect username or password\");
		window.location.href=\"http://localhost/ss/login.php\"
		</script>
		";
}

?>
</body>
</html>
