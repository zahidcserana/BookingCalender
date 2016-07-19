
<?php
    $month = $_POST['month'];
    //$year = $_REQUEST['year'];


$db = new mysqli('localhost', 'root', '', 'mybooking');
$sql = "SELECT * FROM booked where year=2016 and month=6  ";
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>
  $(function (){
    var m = 6;
    $.post('test4.php',{"month":m},function(data){
      
    });
  } 
                                     
      
</script>