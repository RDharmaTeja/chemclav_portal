<?
$event_result = mysqli_query($connect,"SELECT * FROM events ") or die("error");
echo "<center><table class='table' style='background-color:#FFFFE0'><thead><tr style='background-color:#BDB76B;color:#ffffff;'><th>EVENT</th></tr></thead>";
$count=0;
while ($events = mysqli_fetch_array($event_result)) {
$event_name=$events['name'];


echo "<tbody><tr><td style='width:100px;'><b><a target='_blank' href=show_events.php?event_select=$event_name>$event_name</a></b></td><t>";
}
echo "</tbody></table></center>";
?>