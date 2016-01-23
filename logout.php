<?php
session_start();
include('include.php');
$u=$_SESSION['accno'];
mysql_query("insert into b1_useractivities(accno,action) values('$u','You Logged out')");
unset($_SESSION['accno']);
echo "<script>window.location.href='index.php';</script>";
?>
