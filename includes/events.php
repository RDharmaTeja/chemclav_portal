<?php
if (isset($_GET['delete_event'])) {
    
    $id=$_GET['delete_event'];
    $del_event="DELETE FROM events WHERE id='$id'";
    $del_result=mysqli_query($connect,$del_event);
    $del_event_name=$_GET['event_name'];
    $del_cord="DELETE FROM coordinators WHERE event='$del_event_name'";
    $del_result=mysqli_query($connect,$del_cord);
    $sql = "DROP TABLE $del_event_name";
    $drop_table=mysqli_query($connect,$sql);
}
if (isset($_GET['delete_cord'])) {
    
    $id=$_GET['delete_cord'];
    $del_cord="DELETE FROM coordinators WHERE id='$id'";
    $del_result=mysqli_query($connect,$del_cord);
    //$del_event_name=$_GET['event_name'];
    //$del_cord="DELETE FROM coordinators WHERE event='$del_event_name'";
    //$del_result=mysqli_query($connect,$del_cord);
}	

 $event_result = mysqli_query($connect,"SELECT * FROM events ") or die("error");
echo "<table class='table zebra-striped' style='background-color:#FFFFE0'><thead><tr style='background-color:#BDB76B;color:#ffffff;'><th>NAME</th><th style='width:300px;background-color:grey;'><center>SMALL DESCRIPTION</center></th><th style='width:300px;background-color:#BDB76B;'><center>COORDINATORS</center></th><td style='width:300px;background-color:grey;'>DELETE</td></tr></thead>";
$count=0;
while ($events = mysqli_fetch_array($event_result)) {
$event_id=$events['id'];
$event_name=$events['name'];
$event_des=$events['description'];

echo "<tbody><tr><td style='width:100px;'><b>$event_name</b></td><td style='width:100px;background-color:#dae5f4;'>$event_des</td><td style='width:300px;'>";
$cord_result=mysqli_query($connect,"SELECT * FROM coordinators WHERE event='$event_name'") or die("error");
while ($cords = mysqli_fetch_array($cord_result)){
$cord_name=$cords['username'];
$cord_id=$cords['id'];
echo "<center><b>NAME: $cord_name<b> <a href='core.php?action=events&delete_cord=$cord_id'>delete</a></center><br>";
}
echo "</td><td style='width:100px;background-color:#dae5f4;'><a href='core.php?action=events&delete_event=$event_id&event_name=$event_name'><button class='btn btn-danger'>Delete</button></a></td></tr>";
 $count++;
 }
 if ($count==0) {
 	# code...
 	echo "<tr><td>NO EVENTS ARE CREATED</td></tr>";
 }
 echo "</tbody></table>";
?>