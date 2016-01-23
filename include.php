<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<script  type="text/javascript" src="scripts/register.js"></script>
<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>   	
<script src="bootstrap/js/show_error.js"></script>

<style>
body{

background:url("./backgrounds/18.png");

}

input[type="text"]
{
	font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
}
input[type="password"]
{
	font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
}	

@font-face
{
	font-family: 'title';
	src: url('fonts/title.ttf');
}
@font-face
{
	font-family: 'title2';
	src: url('fonts/title2.ttf');
}
@font-face
{
	font-family: 'title3';
	src: url('fonts/title3.ttf');
}
@font-face
{
	font-family: 'title4';
	src: url('fonts/title4.ttf');
}
</style>

<?php
     mysql_connect('localhost','bank','iiitn');
     mysql_select_db('bank');
?>
