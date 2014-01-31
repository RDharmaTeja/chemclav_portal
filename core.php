<?php
session_start();
$login_user=$_SESSION['login_core'];
if(!isset($_SESSION['login_core']))
{
	header("location: index.php");
	exit();
}
//else echo "$login_user";
//session_destroy();
?>

<!DOCTYPE html>
<html >
<head>
<title>Event's Portal</title>
<meta content='text/html' http-equiv='Content-Type'>
<link href="bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" />
<style>
.side-bar{
top: 10%;
left: 10%;
position: absolute;
}
.box{
    position: absolute;
  top: 20%;
  left: 20%;
  width: 75%;
  padding:10px;
  background-color: #b8d1f3;
  border-radius:15px;
}
.red{
  color: red;
}
.blue{
  color: blue;
}
</style>
</head>
<body>


     <!-- Static top navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
    <div class="navbar-header">
    <ul class="nav navbar-nav navbar-left">
    <li><a class="navbar-brand" href="#">Che-Clave Events Core</a></li></ul>
    </div>
    <div class="navbar-collapse collapse top-collapse"><!-- NOTE! the class top-collapse was added here -->
    <ul class="nav navbar-nav navbar-right">
  <li><a href="#">Logged in as <? echo $login_user?></a></li>    	
    <li><a href="">Edit Profile</a></li>
    
    <li><a href="logout.php">Sign Out</a></li>
    </ul>
    </div><!--/.nav-collapse -->
    </div>
    </div>

 <div class="side-bar">
<ul class="nav nav-pills ">
  <li class="<? if($_GET['action']=='events'||$_GET['action']=='') echo "active";?>"><a href="core.php?action=events">Events/Cords</a></li>
  <!--<li class="<? //if($_GET['action']=='coordinators') echo "active";?>" ><a href="core.php?action=coordinators">Coordinators</a></li>-->
  <li class="<? if($_GET['action']=='add_event') echo "active";?>"><a href="core.php?action=add_event">Add Events/Cord</a></li>
  <li class="<? if($_GET['action']=='writeups') echo "active";?>"><a href="core.php?action=writeups">Writeups</a></li>
</ul></div>

<div class="box">
  <?php
  if($_GET['action']=='events'||$_GET['action']==''){
   include("includes/cong.php"); 
   //include("includes/user_event.php");
   include("includes/events.php");

   }
  if($_GET['action']=='add_event'){
   include("includes/cong.php"); 
   //include("includes/user_event.php");
   include("includes/add_event_cord.php");

   }
   if($_GET['action']=='writeups'){
   include("includes/cong.php"); 
   //include("includes/user_event.php");
   include("includes/writeups.php");

   }

  ?>


  </div>




	</body>
	</html>