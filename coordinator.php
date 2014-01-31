<?php
session_start();
$login_user=$_SESSION['login_cord'];
if(!isset($_SESSION['login_cord']))
{
	header("location: index.php");
	exit();
}
//else echo "<center><h1>$login_user</h1></center>";
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
  width: 65%;
  padding:10px;
  background-color: #b8d1f3;
  border-radius:15px;
}
.tab{
  width: 100px;
  color: red;
}
</style>
</head>
<body>


     <!-- Static top navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
    <div class="navbar-header">
    <ul class="nav navbar-nav navbar-left">
    <li><a class="navbar-brand" href="#">Che-Clave Event Coordinator</a></li></ul>
    </div>
    <!--<div class="navbar-collapse collapse top-collapse">--><!-- NOTE! the class top-collapse was added here -->
    <ul class="nav navbar-nav navbar-right">
    <li><a href="">Logged in as <? echo $login_user?></a></li>    	
    <li><a href="">Edit Profile</a></li>
    
    <li><a href="logout.php">Sign Out</a></li>
    </ul>
   <!-- </div>/.nav-collapse -->
    </div>
    </div>

     <div class="side-bar">
<ul class="nav nav-pills ">
  <li class="<? if($_GET['action']=='event'||$_GET['action']=='') echo "active";?>"><a href="coordinator.php?action=event">Event</a></li>
  <li class="<? if($_GET['action']=='show') echo "active";?>"><a href="coordinator.php?action=show">Tabs</a></li>
  <li class="<? if($_GET['action']=='add') echo "active";?>"><a href="coordinator.php?action=add">Add Tabs</a></li>
  <li class="<? if($_GET['action']=='edit') echo "active";?>"><a href="coordinator.php?action=edit">Edit Tabs</a></li>
  <li class="<? if($_GET['action']=='upload') echo "active";?>"><a href="coordinator.php?action=upload">Upload Files</a></li>
  <li class="<? if($_GET['action']=='preview') echo "active";?>"><a href="coordinator.php?action=preview">Preview</a></li>
  <li class="<? if($_GET['action']=='tdp') echo "active";?>"><a href="coordinator.php?action=tdp">TDP</a></li>				
</ul>
</div>

<div class="box">


	<?
   include("includes/cong.php");
  include("includes/user_event.php");
 $user_event=$_SESSION['cord_event'];
 echo "<center><h3>$user_event</h3></center>";
//$GLOBALS['i']=0;
	//showing tabs
   if($_GET['action']=='show'){

   include("includes/tabs.php");
  //$GLOBALS['i']++;
   }

//adding tabs
   if($_GET['action']=='add'){

 include("includes/add_tabs.php");
   //$GLOBALS['i']++;
   }
//editing tabs
      if($_GET['action']=='edit'){

 include("includes/edit_tabs.php");
 //$GLOBALS['i']++;
   }
         if($_GET['action']=='upload'){
     echo "<form action='coordinator.php?action=upload' method='post' enctype='multipart/form-data'><label for='file'>Filename:</label><input type='file' name='file' id='file' class='btn'><br><input type='submit' name='submit' value='Submit' class='btn btn-primary'></form>";
         include("includes/upload.php");
      //  $GLOBALS['i']++;
   }
      if($_GET['action']=='preview'){
 
 include("includes/tabs.php");
    // $GLOBALS['i']++;
   }
     if($_GET['action']=='tdp'){
   echo "<center><i>NO TDPs AVAILABLE</i></center>";
  //$GLOBALS['i']++;
 }

	?>


	</div>


	</body>
	</html>
