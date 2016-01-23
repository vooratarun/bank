<?php
session_start();
include('include.php');
?>
<html>
		<head>
			<link rel="shortcut icon" href="rel.png" type="image/x-icon" />
		</head>
		<body background="backgrounds/24.png">
		<center>
		<div id="error"></div>
		</center>
		<?php
		$content=mysql_real_escape_string($_GET['content']);
		$opt=mysql_real_escape_string($_GET['opt']);
		//echo $opt;
		if($opt=="Name")
		{
			$perPage =7;
			$page=(isset($_GET['page'])) ? (int)$_GET['page'] : 1;
			$startAt=$perPage * ($page - 1);
			$q1=mysql_query("SELECT * FROM b1_users WHERE uname LIKE '%$content%' ");
			$cou=mysql_num_rows($q1);
			$totalPages = ceil($cou / $perPage);
			if(strlen(trim($content))==0)
			{
				echo "<script>show_info('Messg : Search Content should not be null');</script>";
				exit;
			}
			$q0=mysql_fetch_array($q1);
			if(empty($q0))
			{
				echo "<script>show_info('Messg : No Results Found');</script>";
				exit;
			}
			else
			{
				$q=mysql_query("SELECT * FROM b1_users WHERE uname LIKE '%$content%' ORDER BY accno ASC LIMIT $startAt, $perPage ");
				echo '<table class="table table-hover table-bordered" width="90%">';
				$m=0;
				$se=1;
				while($r=mysql_fetch_array($q))
				{
					if($se==1)
					{
					echo "<br/><center><font color='green' face='Arial' size='5'><blink>Search Results</blink></center></font>";
					$se=0;
					}
					$accno=$r['accno'];
					$uname=$r['uname'];
					$gender=$r['gender'];			  	
				?>
				<tr class="info">
					<td width="5%"><b><center><?php echo $m+1; ?></center></b></td>
					<td width="25%"><b><?php echo $uname; ?></b></td>
					<td width='25%'><b><?php echo $accno; ?></b></td>
					<td width='25%'><b><?php echo $gender; ?></b></td>
					<td width="15%" valign=top><center><a href="view_profile.php?accno=<?php echo $accno; ?>" class="btn btn-mini btn-warning"><strong>View Profile</strong></a></center></td>
			    	</tr>
				<?
					$m++;
					some();
				}

			}
		}

function some()
{
global $totalPages,$content,$opt,$page;
if($totalPages>1)
		{
?>
    <div style="position:absolute;bottom:55px;right:18px;">
    	<div class="pagination pagination-mini">
    		<ul>
    		<li><a href="search.php?content=<?php echo $content ; ?>&opt=<?php echo $opt; ?>&page=1">First</a></li>
<?php
    if($page==1)
    {
    	echo "<li class='disabled'><a href='#' class=''>Prev</a></li>";
    }
    else
    {
?>
		<li><a href="search.php?content=<?php echo $content ; ?>&opt=<?php echo $opt; ?>&page=<?php echo $page-1 ?>">Prev</a></li>
<?php
    }
    $i=0;
    while($i<$totalPages)
    {
?>
    		<li><a href="search.php?content=<?php echo $content ; ?>&opt=<?php echo $opt; ?>&page=<?php echo $i+1; ?>"><?php echo $i+1; ?></a></li>
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
		<li><a href="search.php?content=<?php echo $content ; ?>&opt=<?php echo $opt; ?>&page=<?php echo $page+1;?>">Next</a></li>
 <?php
     }
?>
    		<li><a href="search.php?content=<?php echo $content ; ?>&opt=<?php echo $opt; ?>&page=<?php echo $totalPages; ?>">Last</a></li>
    		</ul>
    	</div>
      </div>
<?php
		}


}

if($opt=="Mandal")
		{
			$perPage =7;
			$page=(isset($_GET['page'])) ? (int)$_GET['page'] : 1;
			$startAt=$perPage * ($page - 1);
			$q1=mysql_query("SELECT * FROM b1_users WHERE mandal LIKE '%$content%' ");
			$cou=mysql_num_rows($q1);
			$totalPages = ceil($cou / $perPage);
			if(strlen(trim($content))==0)
			{
				echo "<script>show_info('Messg : Search Content should not be null');</script>";
				exit;
			}
			$q0=mysql_fetch_array($q1);
			if(empty($q0))
			{
				echo "<script>show_info('Messg : No Results Found');</script>";
				exit;
			}
			else
			{
				$q=mysql_query("SELECT * FROM b1_users WHERE mandal LIKE '%$content%' ORDER BY accno ASC LIMIT $startAt, $perPage ");
				echo '<table class="table table-hover table-bordered" width="90%">';
				$m=0;
				$se=1;
				while($r=mysql_fetch_array($q))
				{
					if($se==1)
					{
					echo "<br/><center><font color='green' face='Arial' size='5'><blink>Search Results</blink></center></font>";
					$se=0;
					}
					$accno=$r['accno'];
					$uname=$r['uname'];
					$gender=$r['gender'];			  	
				?>
				<tr class="info">
					<td width="5%"><b><center><?php echo $m+1; ?></center></b></td>
					<td width="25%"><b><?php echo $uname; ?></b></td>
					<td width='25%'><b><?php echo $accno; ?></b></td>
					<td width='25%'><b><?php echo $gender; ?></b></td>
					<td width="15%" valign=top><center><a href="view_profile.php?accno=<?php echo $accno; ?>" class="btn btn-mini btn-warning"><strong>View Profile</strong></a></center></td>
			    	</tr>
				<?
					$m++;
					some();

				}

			}
		}
else if($opt=="District")
		{
			$perPage =7;
			$page=(isset($_GET['page'])) ? (int)$_GET['page'] : 1;
			$startAt=$perPage * ($page - 1);
			$q1=mysql_query("SELECT * FROM b1_users WHERE district LIKE '%$content%' ");
			$cou=mysql_num_rows($q1);
			$totalPages = ceil($cou / $perPage);
			if(strlen(trim($content))==0)
			{
				echo "<script>show_info('Messg : Search Content should not be null');</script>";
				exit;
			}
			$q0=mysql_fetch_array($q1);
			if(empty($q0))
			{
				echo "<script>show_info('Messg : No Results Found');</script>";
				exit;
			}
			else
			{
				$q=mysql_query("SELECT * FROM b1_users WHERE district LIKE '%$content%' ORDER BY accno ASC LIMIT $startAt, $perPage ");
				echo '<table class="table table-hover table-bordered" width="90%">';
				$m=0;
				$se=1;
				while($r=mysql_fetch_array($q))
				{
					if($se==1)
					{
					echo "<br/><center><font color='green' face='Arial' size='5'><blink>Search Results</blink></center></font>";
					$se=0;
					}
					$accno=$r['accno'];
					$uname=$r['uname'];
					$gender=$r['gender'];			  	
				?>
				<tr class="info">
					<td width="5%"><b><center><?php echo $m+1; ?></center></b></td>
					<td width="25%"><b><?php echo $uname; ?></b></td>
					<td width='25%'><b><?php echo $accno; ?></b></td>
					<td width='25%'><b><?php echo $gender; ?></b></td>
					<td width="15%" valign=top><center><a href="view_profile.php?accno=<?php echo $accno; ?>" class="btn btn-mini btn-warning"><strong>View Profile</strong></a></center></td>
			    	</tr>
				<?
					$m++;
					some();
				}

			}
		}
else if($opt=="Accno")
{
	if(strlen(trim($content))==0 or strlen(trim($content))!=7 )
			{
				echo "<script>show_info('Messg : Search Content should not be null');</script>";
				exit;
			}
	$q1=mysql_query("SELECT * FROM b1_users WHERE accno LIKE '%$content%' ");	
	$q0=mysql_fetch_array($q1);
	if(empty($q0))
	{
		echo "<script>show_info('Messg : No Results Found');</script>";
		exit;
	}
	else
	{
		header("Location:view_profile.php?accno=$content");
		 
	}	

}

?>
	
