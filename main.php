<?
include('include.php');
session_start();
$accno=$_SESSION['accno'];

?>

<html>
<head>
<title>main</title>
<style>
body{

height:85%;


}
 #footer {
	position:fixed;
	bottom:0px;
	width:100%;
        background-color: black;
	
      }
</style>
</head>
<body  >

    <div class="navbar navbar-inverse " style="postion:static;">
      <div class="navbar-inner" >
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#" style="position:relative;left:250px;">Banking Management System</a>
          <div class="nav-collapse collapse">
            <ul class="nav" style="position:relative;left:300px;">
	       <li class="active"><a target="frame" href="userfunctions.php">Home</a></li>
		
		<li><a target="frame" href="useractivity.php">Activity</a></li>
		<li><a target="frame" href="userproblems.php">Problem</a></li>
            </ul>
		<ul class="nav pull-right">
		              <li class="divider-vertical"></li>
		              <li class="dropdown">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><font color="white"><?php echo "Welcome  $_SESSION[uname] "; ?><b class="caret"></font></b></a>
		                <ul class="dropdown-menu">		                 
		                   <li><a href="view_profile.php?accno=<?echo $accno; ?>" target="frame"><i class="icon-pencil"></i></i> View Profile</a></li>
		                   <li><a href="forgot_passwd.php" target="frame"><i class="icon-pencil"></i></i> Change Password</a></li>				   
<!--<li><a tabindex="-1" href="#">Change Theme</a></li>-->
		                  <li class="divider"></li>
	       		          <li><a href=logout.php>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logout</a></li>
		                </ul>
		              </li>
		            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>


<div style="padding-top:0px;margin-left:150px;">
<iframe   name="frame" src="userfunctions.php" style="height:100%;width:90%;border:1px solid red;" ></iframe>
</div>


</body>
</html>
