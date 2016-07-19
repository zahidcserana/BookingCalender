<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<p id="demo">this is zahid</p>
<button type="button" onclick="loadDoc('zahid.txt', myFunction)">Change
</button>
<script>
	function loadDoc(url, cfunc){
		var xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if (xhttp.readyState == 4 && xhttp.status == 200) {
				cfunc(xhttp);
			}
		};
		xhttp.open("GET", url, true);
		xhttp.send();
	}
	function myFunction(xhttp){
		document.getElementById("demo").innerHTML = xhttp.responseText;
	}
</script>
</body>
</html>