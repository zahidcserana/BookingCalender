<?php                       
      require_once("class/database.class.php");
      require_once dirname(__FILE__).'/class/booked.class.php';
      require_once dirname(__FILE__).'/class/user_request.class.php';
?>
<?php

if($_POST)
{             
      $name = $_POST['name'];
      $firstName = $_POST['fname'];
      $lastName = $_POST['lname'];
      $reason = $_POST['reason'];
      $question = $_POST['question'];
      $dateValue = $_POST['dateValue'];

      $userRequest = new UserRequest();
      $userRequest->Insert($name, $firstName, $lastName, $reason, $question, $dateValue);

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
<div id="demo"></div>
<div id="booked"></div>
<p id="month"></p>
<table>
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
        cmonth[2] = "March";
        cmonth[3] = "April";
        cmonth[4] = "May";
        cmonth[5] = "Jun";
        cmonth[6] = "July";
        cmonth[7] = "Augast";
        cmonth[8] = "September";
        cmonth[9] = "October";
        cmonth[10] ="November";
        cmonth[11] = "December";
                 
    var d = new Date();
    var n = d.getDay()
    var month = d.getMonth()
    var year = d.getFullYear();

    getDaysInMonth(month,year);

    function DrawNextMonth(month,year)
    {
      if (month == 11)
      {
        month=0; 
        year++;
      }
      else
        month++;
      getDaysInMonth(month,year);
    }
  
    function DrawPrevMonth(month,year)
    {
      if(month == 0)
      {
        month =11;
        year--;
      }
      else
        month--;
      getDaysInMonth(month,year);
    }

    function getDaysInMonth(month, year) 
    {
      $.ajax({
        method: "GET",
        url: "ajax/get_booked_days.php",
        data: { year: year, month: month}
      }).done(function( response ) 
      {       
        var jsonResponse = JSON.parse(response);
        if(jsonResponse.success==false)
        {
          alert(message);
          return;
        }

        var thisMonthBookingDays = jsonResponse.booked_days;      

        $("#month").html(cmonth[month]+" ##### "+year);
        var date = new Date(year, month, 1);
        var startingDay = date.getDay();
        var monthLength = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

        if (month == 1) { // February only!
          if((year % 4 == 0 && year % 100 != 0) || year % 400 == 0){
            monthLength[month] = 29;
          }
        }

        var bookedDay = thisMonthBookingDays;

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
                for ($i=0; $i < bookedDay.length; $i++) {
                  var strrr = "";
                  strrr = year+ "-" + month + "-" + dayNumber ;
                  var d2 = new Date(strrr);
                  var n2 = d2.toDateString();
                  
                  var y = bookedDay[$i];
                  var d1 = new Date(y);
                  var n1 = d1.toDateString();
                  if (n1== n2) {
                    td.className = 'textNode news content';
                  }
                }
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
              for ($i=0; $i < bookedDay.length; $i++) {
                var strrr = "";
                strrr = year+ "-" + month + "-" + dayNumber ;
                var d2 = new Date(strrr);
                var n2 = d2.toDateString();
  
                var y = bookedDay[$i];
                var d1 = new Date(y);
                var n1 = d1.toDateString();
                if (n1 == n2) {
                  td.className = 'textNode news content';
                }
              }
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
            DrawPrevMonth(month,year);
            $(".clickable").click(function(){
              $(".clickable").css('background-color', 'white');
              $(this).css('background-color', 'blue'); 
              if (t==0) {month--;t++;}
              var str = "";
              str += year + "-" + month+"-"+ $( this ).text();
              $("#date").html(str);
              $("#bookingForm input[name=dateValue]").val(str);
            });
          });

          $("#NextMonthButton").click(function(){
            DrawNextMonth(month,year);
            $(".clickable").click(function(){
              $(".clickable").css('background-color', 'white');
              $(this).css('background-color', 'blue'); 
              if (t==0) {month++;t++;}
              var str = "";
              str += year + "-" + month+"-"+ $( this ).text();
              $("#date").html(str);
              $("#bookingForm input[name=dateValue]").val(str);
            });
          });

          $(".clickable").click(function(){
            $(".clickable").css('background-color', 'white');
            $(this).css('background-color', 'blue');
            var str = "";
            str += year + "-" + month+"-"+ $( this ).text();
            $("#date").html(str);
            $("#bookingForm input[name=dateValue]").val(str);
            var t = 0;
          });
        }); 
      });
        
    }
    </script>
    <button id="PrevMonthButton"><<</button>
    <button id="NextMonthButton">>></button>
    </body>
    </html>

    <?php
    require_once("TestBookingMenu.php");
    ?>
