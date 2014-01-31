<center><h3>Add Event</h3></center>
<form action="core.php?action=add_event" method="post">
	<table class='table zebra-striped' style='background-color:#FFFFE0'><thead><tr style='background-color:#BDB76B;color:#ffffff;'><th>NAME</th><th style='width:300px;background-color:grey;'><center>SMALL DESCRIPTION</center></th><th>Save</th></tr></thead>
<tbody>
<tr><td style='width:100px;'><input name='event_name' type='text'></td><td style='width:100px;background-color:#dae5f4;'><textarea name="event_des" rows='1' cols='65'>write something</textarea></td>	
	<td style='width:100px;'><button name='submit_event' class='btn btn-primary'>SAVE</button></td></tr><tbody></table>
	</form>



<?php
if (isset($_POST['submit_event'])) {
	# code...
	if(empty($_POST['event_name'])){
	echo "<center><b color='red'>TAB NAME IS EMPTY</b></center>";
   }

    else{
    $event_name=$_POST['event_name'];
    $event_des=$_POST['event_des'];	
    $send_event=mysqli_query($connect,"INSERT INTO events (name,description) VALUES ('$event_name','$event_des')");
     echo "<center><b color='blue'>SAVED SUCCESFULLY</b></center>";
   $events_table=mysqli_query($connect,"CREATE TABLE $event_name ( id INT AUTO_INCREMENT,name VARCHAR(30) NOT NULL, writeup MEDIUMTEXT NOT NULL,primary key (id))"); 
  }
}
if(isset($_POST['submit_coord'])){
if(empty($_POST['cord_name'])){
	echo "<center><b color='red'>TAB NAME IS EMPTY</b></center>";
   }
else
  {
  	$cord_name=$_POST['cord_name'];
  	$cord_event=$_POST['event'];
   $send_event=mysqli_query($connect,"INSERT INTO coordinators (username,password,event) VALUES ('$cord_name','$cord_name','$cord_event')");
  }
}

?>
<center><h3>Add Coordinator</h3></center>
<form action="core.php?action=add_event" method="post">
	<table class='table zebra-striped' style='background-color:#FFFFE0'><thead><tr style='background-color:#BDB76B;color:#ffffff;'><th>NAME</th><th style='width:300px;background-color:grey;'><center>EVENT</center></th><th>Save</th></tr></thead>
<tbody>
<tr><td style='width:100px;'><input name='cord_name' type='text'></td><td style='width:100px;background-color:#dae5f4;'>
<?
echo "<center><select name='event'><option value=''>-----</option>";
$event_result = mysqli_query($connect,"SELECT * FROM events ") or die("error");
while ($events = mysqli_fetch_array($event_result)) {
//$event_id=$events['id'];
$event_name=$events['name'];
echo "<option value=$event_name>$event_name</option>";
}
echo "</select></center>";
?>
</td>	
	<td style='width:100px;'><button name='submit_coord' class='btn btn-primary'>SAVE</button></td></tr><tbody></table>
	</form>
<br><br>