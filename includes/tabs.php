<?php
 $tab_result = mysqli_query($connect,"SELECT * FROM $user_event ") or die("error");
echo "<table class='table zebra-striped' style='background-color:#FFFFE0'><thead><tr style='background-color:#BDB76B;color:#ffffff;'><th>NAME</th><th style='width:600px;background-color:grey;'><center>WRITE-UP</center></th></tr></thead>";
$count=0;
while ($user_tabs = mysqli_fetch_array($tab_result)) {
$tab_name=$user_tabs['name'];
$tab_write=$user_tabs['writeup'];
echo "<tbody><tr><td style='width:100px;'><b>$tab_name</b></td><td style='width:600px;background-color:#dae5f4;'>$tab_write</td></tr>";
 $count++;
 }
 if ($count==0) {
 	# code...
 	echo "<tr><td>NO TABS ARE CREATED</td></tr>";
 }
 echo "</tbody></table>";
?>