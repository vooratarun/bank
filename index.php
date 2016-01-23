<?php
session_start();
include('include.php')

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
<body>

    <div class="navbar navbar-inverse " style="position:static;" >
      <div class="navbar-inner" >
        <div class="container" >
         
          <a class="brand" href="#" style="position:relative;left:250px;"><span style="color:;">Banking Management System</span></a>
          <div class="nav-collapse collapse">
            <ul class="nav" style="position:relative;left:300px;">
	       <li class="active"><a target="frame" href="home.php">Home</a></li>
              <li><a href="#myModal" role="button"  data-toggle="modal">Login</a></li>
              <li><a target="_top" href="manager.php">Manager</a></li>
	      <li><a target="frame" href="register.php">Register</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
	
<div class="modal hide fade" id="myModal" aria-hidden="true">

	<div class="modal-header">
		<h2> Login</h2>
	</div>	
   
	<div class="modal-body">
		<form  method="post" action="#">
		<label>Acc NO</label>			
		<input type="text" class="span4" name="accno" /><br/>
		
		<label>Password</label>			
		<input type="password" class="span4" name="passwd" /><br/>
		
		<button type="submit" name="send" class="btn btn-success">Login</button>
		<button type="reset" class="btn btn-warning">Reset</button>
		</form>
	</div>		

	<div class="modal-footer"> 
		<button class="btn"  data-dismiss="modal" aria-hidden="true">Close</button>
	</div>
</div>


	<div style="padding-top:0px;margin-left:150px;">
	<iframe name="frame" src="home.php" style="height:100%;width:90%;border:1px solid red;" ></iframe>
	</div>

<?
if(isset($_POST['send']))
{
	
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


	if($count==1)
	{
			
			$_SESSION['accno']=addslashes($u);
			$result=mysql_query("select uname from b1_users where accno='$u'");
			$_SESSION['uname']=mysql_result($result,0,'uname');
			$uname=mysql_result($result,0,'uname');
			mysql_query("insert into b1_lastlog(accno,uname) values('$u','$uname')");
			mysql_query("insert into b1_useractivities(accno,action) values('$u','You Logged in')");
			echo"<script>window.location.href='main.php'</script>"; 
				
	}	
	else
	{
			echo "
			<script>
			alert(\"incorrect username or password\");
			window.location.href='index.php'</script>";
	}

}
?>

</body>
</html>
