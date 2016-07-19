<!DOCTYPE html>
<html>
<body>

<div id="demo"></div>

<button type="button" onclick="loadDoc()">Change Content</button>

<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("demo").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("POST", "testAjax.php?month=5&year=2016", true);
  xhttp.send();
}
</script>

</body>
</html>

