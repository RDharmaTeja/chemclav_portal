
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$save_id=$_GET['id'];
	$save_name=$_POST['name'];
	$save_write=$_POST['writeup'];
$save_tab=mysqli_query($connect,"UPDATE $user_event SET name='$save_name',writeup='$save_write' WHERE id='$save_id'");
 echo "<center><b><h4>SAVED</h4></b></center>";
}
$id=$_GET['delete'];
$del="DELETE FROM $user_event WHERE id='$id'";
$del_result=mysqli_query($connect,$del);	
$tab_result = mysqli_query($connect,"SELECT * FROM $user_event ") or die("error");										
$count=0;
 while ($user_tabs = mysqli_fetch_array($tab_result)) {
$tab_id=$user_tabs['id'];
$tab_name=$user_tabs['name'];
$tab_write=$user_tabs['writeup'];
echo "<div style='background-color:#BDB76B;'><center><form action='coordinator.php?action=edit&id=$tab_id' method='post'><b>NAME:</b><input type='text' name='name' value=$tab_name><br><br><textarea rows='7' cols='80' name='writeup'>$tab_write</textarea><br><br><button class='btn btn-primary' type='submit'>SAVE</button> <a href='coordinator.php?action=edit&delete=$tab_id'><buttom class='btn btn-danger'>DELETE TAB</button></a></form></center><br></div><br><br>";
$count++;
} 
 if ($count==0) {
 	# code...
 	echo "<center><div style='background-color:#BDB76B;'>NO TABS ARE CREATED</div></center>";
 }


?>
