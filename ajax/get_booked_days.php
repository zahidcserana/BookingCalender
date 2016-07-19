<?php
    require_once("/../class/database.class.php");
	require_once dirname(__FILE__).'/../class/booked.class.php';

    $month = $_GET['month'];
    $year = $_GET['year'];
    
    //validation
    $parameters = array( 'success'=>false, 'message' => 'parameter is not passed properly' );

    $bookedObj = new Booked();
    $getBookedDays = $bookedObj->GetBookedDays($year, $month);
    $parameters = array( 'success'=>true, 'booked_days' => $getBookedDays );
    echo json_encode($parameters);
    
?>