<?php

$event_result = mysqli_query($connect,"SELECT * FROM coordinators WHERE username='$login_user'");
 

 $count1=mysqli_num_rows($event_result);
 if($count1==1){
 	$events = mysqli_fetch_array($event_result);
 $_SESSION['cord_event']=$events['event'];
 }
 if ($count1==2) {

 	 	echo "<center><form action='coordinator.php?' method='get'><b>Your Events</b>: <select name='selected_event'>";
 	while ($events= mysqli_fetch_array($event_result)) {
 		# code...
 		$event_name=$events['event'];
 		echo "<option  value=$event_name>$event_name</option>";
    }
 	echo "</select> <button type='submit' class='btn btn-primary' name='submit_event' value='teja'>select</button></form>";
 if(isset($_GET['selected_event'])){

 	$_SESSION['cord_event']=$_GET['selected_event'];
 	 }
 }

 
?>