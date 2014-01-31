<?php
include("cong.php");
 $event_result = mysqli_query($connect,"SELECT * FROM coordinators WHERE username='$login_user'");
 $events = mysqli_fetch_array($event_result);
 $user_event=$events['event'];
?>