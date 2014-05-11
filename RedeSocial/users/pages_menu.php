<?php
if(isset($_GET['pg_m']))
$pg_m=$_GET['pg_m'];
else
$pg_m='';
switch($pg_m){
case 'informacoes': include "informacoes.php"; break;
case 'amigos': include "amigos.php"; break;
case 'albuns': include "albuns.php"; break;
case 'interesses': include "interesses.php"; break;
case 'mostrar': include "mostrar.php"; break;

default: include "informacoes.php";break;
}
?>