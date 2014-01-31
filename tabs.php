<?php
include("user_event.php");
 $tab_result = mysqli_query($connect,"SELECT * FROM $user_event ");
 
 while ($user_tabs = mysqli_fetch_array($tab_result)) {
 	# code...
$tab_name=$user_tabs['name'];
$tab_write=$user_tabs['writeup'];
echo "<table class='zebra-striped'><thead><tr><th>NAME</th><th>WRITE-UP</th></tr></thead>"
echo "<tbody><tr><td>$tab_name</td><td>$tab_write</td></tr>";
 }
 echo "</tbody></table>";
?>