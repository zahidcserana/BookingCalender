<!DOCTYPE html>
<html>
<body>

<h3>Start typing a name in the input field below:</h3>

<button type="button" onclick="showHint()">click</button>


<p id="txtHint">zahid</p>

<script>
function showHint() {
  var xhttp;
  
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("txtHint").innerHTML = xhttp.responseText;
    }
  };
  
  var m = 5;
  var y =2016;
  xhttp.open("GET", "testAjax.php?month=5&year=2016", true);
  xhttp.send();
}
</script>

</body>
</html>

