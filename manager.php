<?
include('include.php');
session_start();
?>

<html>
<head>
<title>Manager</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<style>

body {
        padding-top: 140px;
        padding-bottom: 40px;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
</style>
</head>
<body>



    <div class="container">
      <form class="form-signin" method="post" action="#">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" name='mng' class="input-block-level" placeholder="Username">
        <input type="password" name='passwd' class="input-block-level" placeholder="Password">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-large btn-primary"  name="send" type="submit">Sign in</button>
      </form>
    </div> <!-- /container -->

</body>
</html>

<?
$con=mysql_connect("localhost","bank","iiitn");
if(!$con) die("cant connect");
mysql_select_db("bank",$con);

function authorize()
{
global $con;
$count=0;
$sql="select bman,bpwd from b1_details";
$result=mysql_query($sql,$con);
while($row=mysql_fetch_row($result))
	{	
	if($row[0]==$_POST['mng'] && $row[1]==$_POST['passwd'])
		$count=1;	
	}
if($count==1){
	$_SESSION['manager']=$_POST['mng'];
	header("Location:manager_main.php");}
else
echo "<div style='position:relative;left:350px;font-size:2em;font-family:verdana;color:red;font-weight:bold;'> wrong details</div>";
	
}


	if(isset($_POST['send'] ))
		authorize();

?>
