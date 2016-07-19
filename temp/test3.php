<?php

//include('class/database.class.php'); ?>
<?php

//require_once("class/customer.class.php");
if($_POST){
  $name = $_POST['name'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $reason = $_POST['reason'];
    $question = $_POST['question'];
    $dateValue = $_POST['dateValue'];
    echo "string".$dateValue;
   
    //$db = ClassSingleton::GetDatabaseConnection();     
//$insertRow = $db->Insert(
      // "INSERT INTO users(name,first_name,last_name,reason,question) VALUES (?,?,?,?,?)",
       // array($name, $fname, $lname, $reason, $question),array("s","s","s","s","s")
    //);
    
    //$showDate = $db->Insert("INSERT INTO booked(year) VALUES (?)",
        //array($dateValue),array("i")); 
  }

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<style>
        .news{
            padding:10px;
            margin-top:2px;
            background-color:red;
            color:#fff;
        }
    </style>
</head>
<body>


<p id="month"></p>
<table >

  <tr>
    <td>Su</td>
    <td>Mo</td>
    <td>Tu</td>
    <td>We</td>
    <td>Th</td>
    <td>Fr</td>
    <td>Sa</td>
  </tr>
  
</table>

<p id="container"></p>

<p id="date"></p>

<script>
var cmonth = new Array(12);
   cmonth[0] = "Jan";
   cmonth[1] = "Feb";
   cmonth[2] ="March";
   cmonth[3] = "April";
   cmonth[4] = "May";
   cmonth[5] = "Jun";
   cmonth[6] = "July";
   cmonth[7] = "Augast";
   cmonth[8] = "September";
   cmonth[9] = "October";
   cmonth[10] ="November";
   cmonth[11] = "December";
   
    //document.getElementById("month").innerHTML = g;

var d = new Date();
    var n = d.getDay()
    var m = d.getMonth()
    var y = d.getFullYear(); 
    
    
    //document.getElementById("month").innerHTML=cmonth[m];
getDaysInMonth(m,y);
function DrawNextMonth()
{
  
     if (m == 11) 
        { m=0; y++}
     else
         m++;

      //$("#month").html(cmonth[m]);
    //document.getElementById("month").innerHTML=cmonth[m];
    getDaysInMonth(m,y); 
}
function DrawPrevMonth()
{
    if (m == 0) 
        { m=11; y--}
     else
         m--;

     // $("#month").html(cmonth[m]);
    //document.getElementById("month").innerHTML=cmonth[m];
    getDaysInMonth(m,y); 
}

  function getDaysInMonth(month, year) {
    $("#month").html(cmonth[m]+" #####"+y);
     var date = new Date(year, month, 1);
     var startingDay = date.getDay();


  var monthLength = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

  if (month == 1) { // February only!
    if((year % 4 == 0 && year % 100 != 0) || year % 400 == 0){
      monthLength[month] = 29;
    }
  }
  

//var weekday = [Su, Mo, Tu, We, Th, Fr, Sa];

    
    var table = document.createElement('table'), tr, td, row, cell;
for (row = 0; row < 5; row++) {
    tr = document.createElement('tr');

    if (row == 0) {
        for (cell = 0; cell < 7; cell++) {
        td = document.createElement('td');
        td.className = 'textNode clickable content';
        
        
        tr.appendChild(td);
        if (cell>=startingDay) {
          var dayNumber = td.innerHTML = row * 7 + cell + 1 - startingDay;
          if (dayNumber == 3) {td.className = 'textNode news content';}
        }
        else{td.innerHTML = " ";}

        
    }
    table.appendChild(tr);
    }
    else{
        for (cell = 0; cell < 7; cell++) {
        td = document.createElement('td');
        td.className = 'textNode clickable content';
        
        tr.appendChild(td);
        
        var dayNumber = td.innerHTML = row * 7 + cell + 1 - startingDay;
        if (dayNumber == 11||dayNumber==21) {td.className = 'textNode news content';}
        if (dayNumber == monthLength[month]) {break;}
    }
    table.appendChild(tr);
    }
}

$("#container").html(table);



$(document).ready(function()
      {
        $("#container").html(table);
        
        $("#PrevMonthButton").click(function()
        {
          DrawPrevMonth();
          $(".clickable").click(function(){
          $(".clickable").css('background-color', 'white');
         $(this).css('background-color', 'blue'); 
         var str = "";
          $(".clickable").click(function(){
          
          str += $( this ).text() + "/" + month + "/" + year;
          $("#date").html(str);
          
          $("#bookingForm input[name=dateValue]").val(str);
  

         });         
   });
        });
        $("#NextMonthButton").click(function()
        {
          DrawNextMonth();
          $(".clickable").click(function(){
          $(".clickable").css('background-color', 'white');
         $(this).css('background-color', 'blue'); 
         var str = "";
          $(".clickable").click(function(){
          
          str += $( this ).text() + "/" + month + "/" + year;
          $("#date").html(str);
          
          $("#bookingForm input[name=dateValue]").val(str);
  

         });

   });
        });
        $(".clickable").click(function(){
          $(".clickable").css('background-color', 'white');
         $(this).css('background-color', 'blue');
          var str = "";
          $(".clickable").click(function(){
          
          str += $( this ).text() + "/" + month + "/" + year;
          $("#date").html(str);
          
          $("#bookingForm input[name=dateValue]").val(str);
  

         });

   });
        

      });
}

</script>

<button id="NextMonthButton">next</button>
<button id="PrevMonthButton">prev</button>





<form class="bkform" id="bookingForm" method="post" action="">
<fieldset>
  <legend>Enter your valid information</legend>
  <p>
  <input type="hidden" id="dateShow" name="dateValue">
  </p>  

  <p>
    <label for="bname">Name</label>
    <input type="text" id="bname" name="name" minlength="3" required>
  </p>
  <p>
    <label for="bfname">First Name</label>
    <input type="text" id="bfname" name="fname" required>
  </p>
  <p>
    <label for="blname">Last Name</label>
    <input type="text" id="blname" name="lname" required>
  </p>
  <p>
    <label for="breason">Why</label>
    <input type="textarea" id="breason" name="reason" required>
  </p>
  <p>
    <label for="bquestion">Question</label>
    
    <textarea class="input-text" name="question" id="bquestion" cols="20" rows="5"></textarea>
  </p>
  <p>
    <input type="submit" class="submit" value="submit">
  </p>

</fieldset>
  
</form>
  




</body>
</html>

