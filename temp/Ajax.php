

<?php
    

$db = new mysqli('localhost', 'root', '', 'mybooking');
$sql = "SELECT * FROM booked where year=2016 and month=5  ";
$result = $db->query($sql);
echo "year-month-day<br>";
echo "....................<br>";
while ($row = $result->fetch_array())
{
	
	$day = $row['day'];
	$month = $row['month'];
	$year = $row['year'];
	
    
	echo   $year."--".$month."--".$day."<br>";
}
?>