<?php
$mysql_host="localhost";
$mysql_dbuser="root";
$mysql_dbpass="darmateja";
$mysql_dbname="chemclave";
 
 $connect = mysqli_connect("$mysql_host","$mysql_dbuser","$mysql_dbpass","$mysql_dbname");
   if (mysqli_connect_errno()){
  die ("Failed to connect to MySQL: " . mysqli_connect_error());
  }
  ?>