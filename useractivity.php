<?php
include('include.php');
session_start();

$u=$_SESSION['accno'];
$perPage =5;
$page=(isset($_GET['page'])) ? (int) $_GET['page'] : 1;
$q1= mysql_query("select * from b1_useractivities where accno='$u' ");
$cou= mysql_num_rows($q1);
$startAt=$perPage * ($page - 1);
$totalPages = ceil($cou / $perPage);

$result=mysql_query("select * from b1_useractivities where accno='$u' ORDER BY id desc  LIMIT $startAt, $perPage ");
$rows=mysql_num_rows($result);
echo "<span style='color:indigo;position:relative;left:400px;font-size:1.5em;'>Recent Activities</span>";
$m=0;
$se=1;

echo "<center><br/><table class='table table-striped' border=0 style='width:80%;'> ";
for($i=$rows;$i>0;$i--)
{
	$row=mysql_fetch_array($result);
	echo "<tr style='height:70px;'><td align='bottom'><span style='color:#C71585;'>$row[action]</span>
		<span style='position:absolute;right:130px;color:green;' '>$row[time]</span></td>";
	
	some();
	$m++;
}	

function some()
{

global $totalPages,$page;
if($totalPages>1)
		{
?>
    <div style="position:absolute;right:70px;top:370px;">
    	<div class="pagination pagination-mini">
    		<ul>
    		<li><a href="useractivity.php?page=1">First</a></li>
<?php
    if($page==1)
    {
    	echo "<li class='disabled'><a href='#' class=''>Prev</a></li>";
    }
    else
    {
?>
		<li><a href="useractivity.php?page=<?php echo $page-1 ?>">Prev</a></li>
<?php
    }
    $i=0;
    while($i<$totalPages)
    {
?>
    		<li><a href="useractivity.php?page=<?php echo $i+1; ?>"><?php echo $i+1; ?></a></li>
<?php
    $i++;
    }
    if($page==$totalPages)
    {
?>
		<li class='disabled'><a href="#">Next</a></li>
<?php
    }
    else
    {
?>
		<li><a href="useractivity.php?page=<?php echo $page+1;?>">Next</a></li>
 <?php
     }
?>
    		<li><a href="useractivity.php?page=<?php echo $totalPages; ?>">Last</a></li>
    		</ul>
    	</div>
      </div>
<?php
		}

}
	echo '</table>';
	echo "<form method='post'><button name='send' class='btn btn-warning btn-small'>clear</button></form>";
if( isset($_POST['send']) )
	mysql_query('truncate table b1_useractivities ');

?>
