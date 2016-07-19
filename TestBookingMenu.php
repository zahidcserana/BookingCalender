
<!DOCTYPE html>
<html>
<head>
	<title>Booking Menu</title>
	
</head>
						
<body>
<div id="main">
<form class="bkform" id="bookingForm" method="post" action="calender.php">
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
	<span id="result"></span>
</div>

</body>
</html>