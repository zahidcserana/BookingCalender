<?php
  
  $month = $_REQUEST['month'];
    $year = $_REQUEST['year'];
    
    $db = new mysqli('localhost', 'root', '', 'mybooking');
    $sql = "SELECT * FROM booked where year=$month and month=$year  ";
    $result = $db->query($sql);
    //echo "year-month-day<br>";
    //echo "....................<br>";
    while ($row = $result->fetch_array())
    {
      
      $day = $row['day'];
      $bookedArray = array($day); 
      // var_dump($bookedArray);
      //echo   $year."--".$month."--".$day."<br>";
      for ($i=0; $i < count($bookedArray); $i++) { 
       echo $bookedArray[$i]." ";
       
      }
      
    }
  ?>