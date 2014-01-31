<div style="background-color:#BDB76B;"><center><form action="coordinator.php?action=add" method="post">
<b>NAME:</b><br>
<input type="text" name="name"><br>
<b>WRITE UP:</b><br>
<textarea rows="15" cols="100" name="writeup">You can use html tags like for high-lighting</textarea><br><br>
<center><button class="btn btn-primary">SAVE</button></center>
</form></center><br>
</div>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $tab_name=$_POST['name'];
   $tab_writeup=$_POST['writeup'];

if(empty($_POST['name'])){
	echo "<center><b>TAB NAME IS EMPTY</b></center>";
}

else{
$send_tab=mysqli_query($connect,"INSERT INTO $user_event (name,writeup) VALUES ('$tab_name','$tab_writeup')");
echo "<center><b>SAVED SUCCESFULLY</b></center>";
}
}
?>

