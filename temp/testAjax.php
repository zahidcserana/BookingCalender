

<?php
    $month = $_REQUEST['month'];
    $year = $_REQUEST['year'];
var_dump($year);
var_dump($month);

$db = new mysqli('localhost', 'root', '', 'mybooking');
$sql = "SELECT * FROM booked where year=$year and month=$month  ";
$result = $db->query($sql);
echo "year-month-day<br>";
echo "....................<br>";
while ($row = $result->fetch_array())
{
	
	$day = $row['day'];
	$month = $row['month'];
	$year = $row['year'];
	$bookedArray = array($day); 
	//var_dump($bookedArray);
    //return $bookedArray;
	echo   $year."--".$month."--".$day."<br>";
}
?>