<?php
  
    $db = new mysqli('localhost', 'root', '', 'mybooking');
    $sql = "SELECT * FROM booked where year=2016 and month=5  ";
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