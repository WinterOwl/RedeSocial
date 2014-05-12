<?php if(isset($_GET['msg']))
$msg=$_GET['msg'];
else
$msg='';
?>
<form action="?pg=home&pg_m=noticias&funcao=inserir" method="post">
<table>
<?php if($msg=='1'){ ?><tr><td>Noticia Inserida</td></tr><?php } ?>
	<tr>
    <td valign="top">Noticia:</td>
   <td><textarea name="noticia" placeholder="O que esta a pensar?" style="width:400px; height:60px; resize:none;"></textarea></td>
    </tr>
    <tr><td>Anexo:</td><td><input type="text" size="64" placeholder="Anexo" name="canal"></td></tr>
    <tr><td><input type="submit" value="inserir"></td></tr>
</table>
</form>
    <div style="border-bottom:1px solid #CCC; padding:20px;" ></div>



<?php 
$id_user=$_SESSION['id_user'];
$sql=mysql_query("select u.nome, n.id_pessoa, n.noticia, n.canal from noticias n, amigos a, users u where n.id_pessoa=u.id_user and n.id_pessoa = a.id_pessoa and (n.id_pessoa = $id_user or a.id_amigo = $id_user) order by n.id_noticia desc");
while($linha=mysql_fetch_array($sql)){
	$nome=$linha['nome'];
	$id_pessoa=$linha['id_pessoa'];
	$id_noticia=$linha['noticia'];
	$noticia=$linha['noticia'];
	$canal=$linha['canal'];
	?>
    <table>
    	<tr>
    		<td><a href="?pg=home&pg_m=amigos&funcao=pessoas&id="<?php echo $id_pessoa; ?>><?php echo $nome; ?></a></td>
       	</tr>
    	<tr>
        	<td><?php echo $noticia; ?></td>
        </tr>
        <tr>
            <td><?php echo $canal; ?></td>
        </tr>
    </table>
    <div style="border-bottom:1px solid #CCC;"></div>
    <?php
} ?>



<?php if($funcao=='inserir'){
	$noticia=$_POST['noticia'];
	$canal=$_POST['canal'];
	$id_user=$_SESSION['id_user'];
	$sql=mysql_query("insert into noticias values('', '$noticia', '$canal', '$id_user')");
	echo"
		<meta http-equiv=refresh content='0; url=index.php?pg=home&pg_m=noticias&msg=1'>
					";	
}

?>