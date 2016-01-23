<?
include('include.php');
session_start();


$result=mysql_query("select * from b1_problem where status=0 limit 1 ");

if(mysql_num_rows($result)==0){
	echo "<center><span style='color:green'> No problems posted</span></center>";return;}

echo "<br><br><center><form  method='post'>";
while($row=mysql_fetch_array($result))
{
	?>
	Problem:- <input type="text" value="<?echo $row['problem'] ?>" readonly='readonly' " ><br/>
	Solution :- <textarea name='sol' cols=5 rows=5  ></textarea><br/><br/>
	<input type="hidden" value="<?echo $row['pid'] ?>"  name='pid' readonly='readonly' " ><br/>
	<input type='submit' name='send' /></form> <br/><br/>
	
	<?
}
echo "</center>";
if( isset($_POST['send']))
{
	$pid=$_POST['pid'];
	$sol= $_POST['sol'];
	mysql_query("update b1_problem set solution='$sol',status=1 where status=0 and pid='$pid'");
	header('Location:adminproblem.php');

}


?>

