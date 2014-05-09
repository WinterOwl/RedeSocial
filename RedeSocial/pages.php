<?php
if(isset($_GET['pg']))
$pg=$_GET['pg'];
else
$pg='';
switch($pg){
case 'home': include "home.php"; break;

default: include "home.php";break;
}
?>