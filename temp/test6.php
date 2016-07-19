<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="">
	First name: <input type="text" id="txt1" onkeyup="showHint(this.value)">
</form>
<p> Suggestion: <span id="txtHint"></span></p>
<script>
	function showHint(str){
		var xhttp;
		if (str.length ==0) {
			document.getElementById("txtHint").innerHTML = "";
			return;
		}
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (xhttp.readyState == 4 && xhttp.status == 200) {
				document.getElementById("txtHint").innerHTML = xhttp.responseText;
			}
		};
		xhttp.open("GET", "gethint.php?q="+str, true);
		xhttp.send();
	}

</script>
</body>
</html>