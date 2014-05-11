<?php
session_start();
unset($_SESSION['id_user']);
unset($_SESSION['Email']);
unset($_SESSION['Nome']);
session_destroy();

echo "<meta http-equiv=refresh content='0; url=../index.php'>";
?>