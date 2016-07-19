

<?php
   

$db = new mysqli('localhost', 'root', '', 'mybooking');
$sql = "SELECT dates FROM booked ";
$result = $db->query($sql);
echo "year-month-day<br>";
echo "....................<br>";
while ($row = $result->fetch_array())
{
	
	$day = $row['dates'];
	
	 
	echo $day;
}
?>