<?php
if(!$_SESSION['id_user'])
	echo "<meta http-equiv=refresh content='0; url=../index.php'>";

if(isset($_GET['pg']))
$pg=$_GET['pg'];
else
$pg='';
switch($pg){
case 'home': include "home.php"; break;


default: include "home.php";break;
}
?>