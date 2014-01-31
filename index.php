<?php
ob_start();
session_start();
if(isset($_SESSION['login_core']))
{
	header("location: core.php");
	exit();
}
if(isset($_SESSION['login_cord']))
{
	header("location: coordinator.php?action=event");
	exit();
}
include("includes/cong.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 # code...
	$username=$_POST['username'];
	$password=$_POST['password'];

  $clean_username = strip_tags(mysql_real_escape_string($username));
  $clean_pass = strip_tags(mysql_real_escape_string($password));
  
  $sql1="SELECT * FROM cores WHERE username='$clean_username' and password='$clean_pass'";
  $sql2="SELECT * FROM coordinators WHERE username='$clean_username' and password='$clean_pass'";
  $result1=mysqli_query($connect, $sql1)or die ("Query failed");//checking indb
  $result2=mysqli_query($connect, $sql2)or die ("Query failed");
  $count1=mysqli_num_rows($result1);//counting cores
  $count2=mysqli_num_rows($result2);
 if($count1 == 1) // User not found. So, redirect to login_form again.
  {

     session_register("myusername");
     $_SESSION['login_core']=$clean_username;
     header("location: core.php");
 }

  if($count2 != 0) // User not found. So, redirect to login_form again.
  {

     session_register("myusername");
     $_SESSION['login_cord']=$clean_username;
     header("location: coordinator.php?action=event");
 }

  if($count1!=1 && $count2!=1){
  $error= "Your Login Name or Password is invalid";
  }

}

?>

<!DOCTYPE html>
<html lang='en' xml:lang='en' xmlns='http://www.w3.org/1999/xhtml'>
<head>
<title>Events Portal</title>
<meta content='text/html' http-equiv='Content-Type'>
<link href="bootstrap.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<body>
<div class='topbar'>
<div class='topbar-inner'>
<div class='container-fluid'>
<h4><a href="/">CHEM-CLAVE EVENTS PORTAL</a></h4>
<!--
<ul class='nav'>
<li class='active'><a href="/">Home</a></li>
<li><a href="/about">About</a></li>
<li><a href="/help">Help</a></li>
<li><a href="/contact">Contact</a></li>
</ul>
-->
</div>
</div>
</div>
<div class='container-fluid'>

<div class='content'>
<div class='well'>
<h1>
Login
</h1>
<form action='index.php' method='POST'>
<div class='clearfix'>
<label>
<strong>Username</strong>
</label>
<div class='input'>
<input name='username' type='text'>
</div>
<br>
<label>
<strong>Password</strong>
</label>
<div class='input'>
<input name='password' type='password'>
</div>
</div>
<div class='actions'>
<input class='btn primary' name='commit' type='submit' value='Login'>
</div>
</form>
<? echo "<center><b>$error</b></center>";?>
</div>
<footer>
<p>Copyright &copy; R D Teja</p>
</footer>
</div>
</div>
</body>
</html>
