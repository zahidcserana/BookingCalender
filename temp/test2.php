
<?php //require_once("class/database.class.php"); ?>
<?php //require_once dirname(__FILE__).'/class/booking_table.class.php';?>
<?php //require_once dirname(__FILE__).'/class/rqst_tbl.class.php';?>
<?php

	if($_POST)
	{
		$userName=$_POST['userName'];
        $lastName=$_POST['lastName'];
        $firstName=$_POST['firstName'];
        $reason=$_POST['reason'];
        $email=$_POST['email'];
        $datepic=$_POST['datepic'];
        echo "string".$datepic;

		//$booking_tableObj = new booking_table();
		//$booking_tableObj->Insert($userName, $firstName, $lastName, $reason, $email);
		//$booking_tableObj->GetList();
		//$rqst_tblObj = new rqst_tbl();
		//$rqst_tblObj->Insert($datepic);

    }
?>

<!DOCTYPE html>



<html>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<head>
		<title>booking home page</title>

		<script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/	jquery/1.8.3/jquery.min.js"></script>
		<script language="javascript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/	jquery.validate/1.10.0/jquery.validate.min.js"></script>

		<script>
			var allMonths = ["January", "February", "March", "April", "May", "June", "July", "August", 	"September", "October", "November", "December"];
			var daysOfWeek = ["Sat", "Sun", "Mon", "Tue", "Wed", "Thu", "Fri"];
			var daysOfEachMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

			var dateInformation = new Date();
			var year = dateInformation.getFullYear();
			var month = dateInformation.getMonth();
			var date = dateInformation.getDate();
			var day = dateInformation.getDay();
			var numberOfDaysOfWeek = 6;
			var calNewLine = 0;
			//var 
			var dateInfoForSpace = new Date();
			dateInfoForSpace.setDate(1);

			var calendar;
			calendar ='<table>';
			calendar += '<tr>';
			//calendar += '<td>' + '<b>';
			calendar += '<TH COLSPAN=2>';
			calendar += allMonths[month] +'\' ' + year ;
			//calendar += '<b>' + '</td>';
			calendar += '</TH> ';
			calendar += '</tr>';

			calendar += '<tr>';
				for (var i = 0; i < daysOfWeek.length; i++) 
				{
					calendar += '<td> ' + '<b>';
					calendar +=daysOfWeek[i];
					calendar +=   '</b>' + '</td> ';
				}
			//calendar +='</tr>';
			calendar += '<tr>';
			for (var i = 0; i < dateInfoForSpace.getDay() + 1; i++) 
			{
				calendar += '<td>';
				calendar +=' ';
				calendar += '</td>';

				calNewLine++;
			}
			//calendar += '</tr>';
			//calendar += '<tr>';
			for (var i = 1; i <= daysOfEachMonth[month]; i++) 
			{
				if(calNewLine == 7 || calNewLine == 14 || calNewLine == 21 || calNewLine == 28)
				{
					calendar += '<tr>';
				}
				if(i==4 || i==16 || i==26)
				{
					calendar += '<td class = "booked"> ';
					calendar += i;
					calendar += '</td> ';
					calNewLine++;
				}
				else
				{
					calendar += '<td class = "clickable"> ';
					calendar += i;
					calendar += '</td> ';
					calNewLine++;
				}
				
			}
			calendar +='</tr>';
			calendar += '</table>';

			$("#demo").html(calendar);

			function PreviousMonth(month, year)
			{
				var allMonths = ["January", "February", "March", "April", "May", "June", "July", "August","	September", "October", "November", "December"];
				var daysOfWeek = ["Sat", "Sun", "Mon", "Tue", "Wed", "Thu", "Fri"];
				var daysOfEachMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

				dateInformation.setMonth(dateInformation.getMonth()-1);
				monthPre = dateInformation.getMonth();
				yearPre = dateInformation.getFullYear();

				if((yearPre%400)==0 || ( yearPre%4==0 && yearPre%100!=0))
					daysOfEachMonth[1]=29;
				
				var day = dateInformation.getDay();
				var numberOfDaysOfWeek = 6;
				var calNewLine = 0;
				dateInfoForSpace.setDate(1);
				dateInfoForSpace.setMonth(dateInfoForSpace.getMonth()-1);

				var calendar = "";
				calendar ='<table>';
				calendar += '<tr>';
				//calendar += '<td>' + '<b>';
				calendar += '<TH COLSPAN=2>';
				calendar += allMonths[monthPre] +'\' ' + yearPre ;
				//calendar += '<b>' + '</td>';
				calendar += '</TH> ';
				calendar += '</tr>';

				calendar += '<tr>';
					for (var i = 0; i < daysOfWeek.length; i++) 
					{
						calendar += '<td> ' + '<b>';
						calendar +=daysOfWeek[i];
						calendar +=   '</b>' + '</td> ';
					}
				calendar += '<tr>';
				for (var i = 0; i < dateInfoForSpace.getDay() + 1; i++) 
				{
					calendar += '<td>';
					calendar +=' ';
					calendar += '</td>';

					calNewLine++;
				}
				for (var i = 1; i <= daysOfEachMonth[monthPre]; i++) 
				{
					if(calNewLine == 7 || calNewLine == 14 || calNewLine == 21 || calNewLine == 28 || calNewLine == 35)
					{
						calendar += '<tr>';
					}
					calendar += '<td class="clickable"> ';
					calendar += i;
					calendar += '</td> ';
					calNewLine++;
				}
				calendar +='</tr>';
				calendar += '</table>';

				$("#demo").html(calendar);
			}

			function NextMonth(month, year)
			{
				var allMonths = ["January", "February", "March", "April", "May", "June", "July", "August","	September", "October", "November", "December"];
				var daysOfWeek = ["Sat", "Sun", "Mon", "Tue", "Wed", "Thu", "Fri"];
				var daysOfEachMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

				
				dateInformation.setMonth(1+dateInformation.getMonth());
				monthNext = dateInformation.getMonth();
				yearNext = dateInformation.getFullYear();

				if((yearNext%400)==0 || ( yearNext%4==0 && yearNext%100!=0))
					daysOfEachMonth[1]=29;
				
				var day = dateInformation.getDay();
				var numberOfDaysOfWeek = 6;
				var calNewLine = 0;
				
				dateInfoForSpace.setDate(1);
				dateInfoForSpace.setMonth(1+dateInfoForSpace.getMonth());

				var calendar = "";
				calendar ='<table>';
				calendar += '<tr>';
				calendar += '<TH COLSPAN=2>';
				calendar += allMonths[monthNext] +'\' ' + yearNext ;
				calendar += '</TH> ';
				calendar += '</tr>';

				calendar += '<tr>';
					for (var i = 0; i < daysOfWeek.length; i++) 
					{
						calendar += '<td> ' + '<b>';
						calendar +=daysOfWeek[i];
						calendar +=   '</b>' + '</td> ';
					}
				calendar += '<tr>';
				for (var i = 0; i < dateInfoForSpace.getDay() + 1; i++) 
				{
					calendar += '<td>';
					calendar +=' ';
					calendar += '</td>';

					calNewLine++;
				}

				for (var i = 1; i <= daysOfEachMonth[monthNext]; i++) 
				{
					if(calNewLine == 7 || calNewLine == 14 || calNewLine == 21 || calNewLine == 28 || calNewLine == 35)
					{
						calendar += '<tr>';
					}
					calendar += '<td class="clickable"> ';
					calendar += i;
					calendar += '</td> ' ;
					calNewLine++;
				}
				calendar +='</tr>';
				calendar += '</table>';

				$("#demo").html(calendar);
			}
	
			$(document).ready(function()
			{
				$("#demo").html(calendar);
				//$("#demo").center();

				$("#previousButton").click(function()
				{
					PreviousMonth(month, year);

					$(".clickable").click(function(){

    	   				$(".clickable").removeClass("intro");
    	   				$(this).addClass("intro");
    	   				var str = "";
    	   				str += $(this).text()+ "-" + monthPre + "-" + yearPre;
    	   				$("#showDate").html(str);
    	   				$("#mytestform input[name=datepic]").val(str);

    				});

				});

				$("#nextButton").click(function()
				{
					NextMonth(month, year);

					$(".clickable").click(function(){

    	   				$(".clickable").removeClass("intro");
    	   				$(this).addClass("intro");
    	   				var str = "";
    	   				str += $(this).text()+"-" + monthNext + "-" + yearNext;
    	   				$("#showDate").html(str);
    	   				$("#mytestform input[name=datepic]").val(str);

    				});

				});

				$(".clickable").click(function(){

    	   			$(".clickable").removeClass("intro");
    	   			$(this).addClass("intro");
    	   			//$("#showDate").html(date + " " + month + " " +year);
    	   			var str = "";
    	   			str += $(this).text()+ "-" + month + "-" + year;
    	   			$("#showDate").html(str);
    	   			//$('#form_id').submit();
    	   			$("#mytestform input[name=datepic]").val(str);


    	   			//$("#mytestform input[name = datepic]").val('$(this).getDate()');
    	   			//var datepic = $(this).datepicker();
    	   			//<form id="mytestform" method="post" action="">
    	   				//<input id=$(this) name="datepic" />
    	   			//</form> 

    			});
 
			});
	
		</script>
	

		<script>
			$(document).ready(function(){ 
				$(function(){
					$( "#mytestform" ).validate({
        			   	rules: 
        			   	{
        			        userName: 
        			        {
        			                required: true,
        			                minlength: 3
        			                //customvalidation: true             
        			        },
        			        firstName: 
        			        {
        			                required: true,
        			                minlength: 2
        			                //customvalidation: true             
        			        },
        			        lastName: 
        			        {
        			                required: true,
        			                minlength: 2
        			                //customvalidation: true             
        			        },
        			        lastName: 
        			        {
        			                required: true,
        			                minlength: 2
        			                //customvalidation: true             
        			        },
        			        email:
        			        {
        			                required: true            
        			        }
			
        			   	},
			
        			   	messages:
						{
							userName: "Please enter atleast three characters",
							firstName: "Please enter atleast two characters",
							lastName: "Please enter atleast two characters",
							email: " Please enter your email"
							//confirm_password: "Enter same as above password"
						}
   					});
				});
			}); 
		</script> 
	
	</head>

	<body>
		<p id="demo"></p>
		<p id="showDate"></p>

		<button id="previousButton" >Previous Month</button>
		<button id="nextButton" >Next Month</button>

		<form id="mytestform" method="post" action=""> 
	
				<input type="hidden" id="datepicker" name="datepic">
			<p> 
				<label for="name">User Name: </label> <em></em>
				<input id="name" name="userName"  /> 
			</p> 
			<p> 
				<label for="fname">First Name: </label> <em></em>
				<input id="fname" name="firstName"  /> 
			</p> 
			<p> 
				<label for="lname">Last Name: </label> <em></em>
				<input id="lname" name="lastName"  /> 
			</p> 
			<p>
				<label for="reason">Reason: </label>
				<textarea id="reason" name="reason" required></textarea>
			</p>
			<p>
				<label for="email">Email: </label>
				<input id="email" name="email" >
			</p>
			
			<p> 
				<input class="submit" type="submit" value="Submit"/> 
			</p> 

		</form>
	</body>

</html>