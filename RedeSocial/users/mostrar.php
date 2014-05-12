<?php
if(!$_SESSION['id_user'])
	echo "<meta http-equiv=refresh content='0; url=../index.php'>";
?>

<html>
<head>
  <script type="text/javascript">
    var http = false;

    if(navigator.appName == "Microsoft Internet Explorer") {
      http = new ActiveXObject("Microsoft.XMLHTTP");
    } else {
      http = new XMLHttpRequest();
    }

    function validate(user) {
      http.abort();
      http.open("GET", "validate.php?pesquisa=" + user, true);
      http.onreadystatechange=function() {
        if(http.readyState == 4) {
          document.getElementById('foo').innerHTML = http.responseText;
        }
      }
      http.send(null);
    }
  </script>
</head>
<body>

<form>
  <input style="margin-left:150px;" class="txt_log" type="text" onKeyUp="validate(this.value)" placeholder="Encontrar Pessoas"/>
  <table id="foo" width="100%" style="font-size:18px;margin-top:30px;">
  </table>
</form>
