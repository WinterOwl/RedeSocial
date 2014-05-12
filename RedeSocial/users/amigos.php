<?php if(isset($_GET['msg']))
$msg=$_GET['msg'];
else
$msg='';

?>
<?php 
if(!$_SESSION['id_user'])
	echo "<meta http-equiv=refresh content='0; url=../index.php'>";
?>
<?php if($funcao!='pessoas'){ ?>
<?php if($msg=='2'){  ?><div class="warning">Pedido Enviado</div><?php }?>
<?php
$id_user2=$_SESSION['id_user'];
$sql=mysql_query("SELECT u.nome, u.id_user FROM amigos a, users u WHERE a.id_pessoa = $id_user2 AND a.id_amigo = u.id_user");
while($linha=mysql_fetch_array($sql)){
	$id_user=$linha['id_user'];
	$nome=$linha['nome'];
	?>
    <table width="100%" border="0">
    	<tr>
        	<td><a href="?pg=home&pg_m=amigos&funcao=pessoas&id=<?php echo $id_user; ?>"><?php echo $nome;?></a></td>
            
        </tr>
    </table>
    
<?php	
} 
?>
<?php }?>

<?php if($funcao=='pessoas'){
	$id_pessoas=$_GET['id'];
	
	$sql=mysql_query("select * from users where id_user='$id_pessoas'");
	while($linha=mysql_fetch_array($sql)){
			$nome=$linha['nome'];
	$data_nascimento=$linha['data_nascimento'];
	$email=$linha['email'];
	$sexo=$linha['sexo'];
	$morada=$linha['morada'];
	$contacto=$linha['contacto'];
	$estado_civil=$linha['estado_civil'];

}
?>
<?php $sql1=mysql_query("select * from fotos where id_user='$id_pessoas' and foto_perfil='1'");
$cont=mysql_num_rows($sql1);

if($cont!='0'){
	
	while($linha1=mysql_fetch_array($sql1)){
		$foto=$linha1['foto'];
?>
<img src="../img_fotos/<?php echo $foto; ?>" width="200" />
<?php
}
}
else{ 
?>

<img src="../img/foto_perfil.png" width="200" />
<?php } ?>
<table cellpadding="5" cellspacing="5" border="0">
<tr><td><strong>Nome:</strong></td><td><?php echo $nome; ?></td></tr>
<tr><td><strong>Email:</strong></td><td><?php echo $email; ?></td></tr>
<tr><td><strong>Morada:</strong></td><td><?php echo $morada; ?></td></tr>
<tr><td><strong>Contacto:</strong></td><td><?php echo $contacto; ?></td></tr>
<tr><td><strong>Sexo:</strong></td><td><?php echo $sexo; ?></td></tr>
<tr><td><strong>Data de Nascimento:</strong></td><td><?php echo $data_nascimento; ?></td></tr>
<tr><td><strong>Estado Civil:</strong></td><td><?php echo $estado_civil; ?></td></tr>
</table>
	
<?php } ?>

<?php if($funcao=='enviar_pedido'){ 
	$id_user=$_GET['id'];
	$id_user2=$_SESSION['id_user'];
	$sql=mysql_query("insert into notificacoes values('', 'Pedido de Amizade', '0', '$id_user2', '$id_user')");
	echo"
		<meta http-equiv=refresh content='0; url=index.php?pg=home&pg_m=amigos&msg=2'>
					";	
}
?>
