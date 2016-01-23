<?
include('include.php');
session_start();
?>

<html>
<head>
<title>main</title>
<style>
body{

height:85%;


}
 #footer 
{
	position:fixed;
	bottom:0px;
	width:100%;
        background-color: black;
	
}
.sidebar-nav {
padding: 7px 0;
padding-left: 0px;
padding-right:0px;
	}
</style>
</head>
<body  >

    <div class="navbar" style="position: static;">
		      <div class="navbar-inner">
		        <div class="container">
		          <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </a>
		         <a class="brand" href="#" style="position:relative;left:100px;">Banking Management system</a>
		          <div class="nav-collapse collapse navbar-inverse-collapse">
		            <b><ul class="nav" style="position:relative;left:150px;">
		              <li class="active"><a  target="frame" href="mngfunctions.php"><i class="icon-home"></i><font color="black">Home</font></a></li>
		              <li><a href=""><font color="black"><i class="icon-search"></i><b>Search :</b></font></a></li>
		            <form class="navbar-search pull-center" action="manager_main.php" method="post">			      
					<div>
					<select class="span2" name="opt">
						<option name="select">Search By</option>
					    	<option name="accno">Accno</option>
					    	<option name="name">Name</option>
						<option name="mandal">Mandal</option>
						<option name="district">District</option>
					</select>				
					<div class="input-append">
					<input type="text" style="height:30px;" name="input" class="span3" placeholder="search content using left dropdown list">
					<button type="submit" name="search" class="btn"><font color="black">&nbsp;Go</font></button>
					</div>				   
					</div>
		            </form>
		     <li><a href="adminproblem.php" target="frame"><font color="black"><b>Problems</b></font></a></li>
		            </ul></b>
		            <ul class="nav pull-right">
		              <li class="divider-vertical"></li>
		              <li class="dropdown">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><font color="black"><?php echo "Welcome  $_SESSION[manager]"; ?><b class="caret"></font></b></a>
		                <ul class="dropdown-menu">
		                   <li><a href="mng_passwd.php" target="frame"><i class="icon-pencil"></i></i> Change Password</a></li>				   		                 
		                  <li class="divider"></li>
	       		          <li><a href=logout.php>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logout</a></li>
		                </ul>
		              </li>
		            </ul>
		          </div><!-- /.nav-collapse -->
		        </div>
		      </div><!-- /navbar-inner -->
		    </div><!-- /navbar -->  
<div style="padding-top:0px;margin-left:150px;">
<?php 
if (isset($_POST['search'])){
$content=$_POST['input'];
$opt=$_POST['opt']
?>
<iframe   name="frame" src="search.php?content=<?php echo $content ; ?>&opt=<?php echo $opt; ?> " style="height:100%;width:90%;border:1px solid red;" ></iframe>
<?
}

else 
echo' 
<iframe   name="frame" src="mngfunctions.php" style="height:100%;width:90%;border:1px solid red;" ></iframe>';

?>
</div>


</body>
</html>
