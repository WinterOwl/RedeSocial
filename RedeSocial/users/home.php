<?php if(isset($_GET['funcao']))
$funcao=$_GET['funcao'];
else
$funcao='';
?>
<div class="home_left">
<?php 
$id_user=$_SESSION['id_user'];
$sql=mysql_query("select * from fotos where id_user='$id_user' and foto_perfil='1'");
$cont=mysql_num_rows($sql);
if($cont!='0'){
	while($linha=mysql_fetch_array($sql)){
		$foto=$linha['foto'];
?>
<img src="../img_fotos/<?php echo $foto; ?>" width="200" />
<?php
}
}
else{ 
?>

<img src="../img/foto_perfil.png" width="200" />
<?php } ?>
<ul class="ul_left_menu">
	<li><a href="?pg=home&pg_m=informacoes">Informações</a></li>
    <li><a href="?pg=home&pg_m=mostrar">Encontrar Pessoas</a></li>
    <li><a href="?pg=home&pg_m=amigos">Amigos</a></li>
	<li><a href="?pg=home&pg_m=albuns&funcao=albuns">Albuns</a></li>
    <li><a href="?pg=home&pg_m=interesses">Interesses</a></li>
    
</ul>
</div>
<div class="home_right">
	<?php include "pages_menu.php" ?>
</div>