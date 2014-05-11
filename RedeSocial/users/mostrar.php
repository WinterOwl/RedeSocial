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
  <input type="text" onKeyUp="validate(this.value)" />
  <table id="foo">
  </table>
</form>
