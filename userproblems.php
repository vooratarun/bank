<?php
session_start();
include('include.php');
$u=$_SESSION['accno'];
?>

<html>
<body>
<script>

function testhide()
{
	$(".hides").hide();

}
</script>
<div style="position:absolute;left:300px;top:350px;" class='hides'>
<center>
<button class="btn btn-primary btn-small" disabled >Post a Problem to manager</button>
<form method="post">
<br/><span style='color:green;'>Problem Discription:- </span><textarea cols="5" rows="3" name='prob'  required></textarea>
<button type='submit' name='send' class="btn btn-warning btn-small" onclick='testhide()'>submit</button>
</center>
</form>
</div>


<center>
<span style='color:indigo;font-size:1.5em;'>Recent conversations</span>
<table class="table table-striped" style="width:70%;"  >
<?

$result=mysql_query("select * from b1_problem where accno='$u' ORDER BY `b1_problem`.`time` DESC limit 3");

$flag=1;
while( $row=mysql_fetch_row($result) )
{

	if($row[2]==1)
	{
	echo "<br/><tr class='info'><td>$flag</td><td>$row[3]</td></tr>";	
	echo "<tr class='success'><td>Ans</td><td >$row[4]</td></tr>";			
	echo "<tr></tr>";

	}
	$flag++;	
	
}
echo "</table>";
global $u;
if( isset($_POST['send']))
{
	$prob=$_POST['prob'];
	echo "<span style='color:green'>Your problem was posted . Answer will come in soon</span>";
	mysql_query("insert into b1_problem(accno,problem) values('$u', '$prob')");


}

?>


