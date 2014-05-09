<?php if(isset($_GET['funcao']))
$funcao=$_GET['funcao'];
else
$funcao='';
?>
<div class="home_left">
<img src="../img/foto_perfil.png" width="200" />

<ul class="ul_left_menu">
	<li><a href="?pg=home&pg_m=informacoes">Informações</a></li>
    <li><a href="?pg=home&pg_m=amigos">Amigos</a></li>
	<li><a href="?pg=home&pg_m=albuns">Albuns</a></li>
    <li><a href="?pg=home&pg_m=interesses">Interesses</a></li>
    
</ul>
</div>
<div class="home_right">
	<?php include "pages_menu.php" ?>
</div>