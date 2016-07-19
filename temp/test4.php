<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<button type="button" onclick="loadDoc()">Request</button>
<p id="demo"></p>

<script>
	function loadDoc(){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (xhttp.readyState == 4 && xhttp.status == 200) {
				document.getElementById("demo").innerHTML = xhttp.responseText;
			}
		};
		xhttp.open("GET", "testAjax.php", true);
		xhttp.send();
	}
</script>
</body>
</html>