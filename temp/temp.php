<?php     //start php tag
//include connect.php page for database connection
//include('connect.php')
//if submit is not blanked i.e. it is clicked.
$link = mysqli_connect('localhost', 'root', '', 'mybooking');

$sql="insert into booked(year,month,day) values('".$_REQUEST['name']."', '".$_REQUEST['fname']."', '".$_REQUEST['lname']."', '".$_REQUEST['reason']."',
 '".$_REQUEST['question']."')";

$res=$link->query($sql);


?>