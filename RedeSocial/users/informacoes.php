<?php
if(!$_SESSION['id_user'])
	echo "<meta http-equiv=refresh content='0; url=../index.php'>";
if(isset($_GET['funcao']))
$funcao=$_GET['funcao'];
else
$funcao='';
?>
<?php if($funcao!='alterar'){ ?>


<div class="title">Informação Básica</div>
<?php 
$id_user=$_SESSION['id_user'];
$sql=mysql_query("select * from users where id_user='$id_user'");
while($linha=mysql_fetch_array($sql)){
	$id_user=$linha['id_user'];
	$nome=$linha['nome'];
	$data_nascimento=$linha['data_nascimento'];
	$email=$linha['email'];
	$sexo=$linha['sexo'];
	$morada=$linha['morada'];
	$contacto=$linha['contacto'];
	$estado_civil=$linha['estado_civil'];

}
?>
<table cellpadding="5" cellspacing="5" border="0">
<tr><td><strong>Nome:</strong></td><td><?php echo $nome; ?></td></tr>
<tr><td><strong>Email:</strong></td><td><?php echo $email; ?></td></tr>
<tr><td><strong>Morada:</strong></td><td><?php echo $morada; ?></td></tr>
<tr><td><strong>Contacto:</strong></td><td><?php echo $contacto; ?></td></tr>
<tr><td><strong>Sexo:</strong></td><td><?php echo $sexo; ?></td></tr>
<tr><td><strong>Data de Nascimento:</strong></td><td><?php echo $data_nascimento; ?></td></tr>
<tr><td><strong>Estado Civil:</strong></td><td><?php echo $estado_civil; ?></td></tr>
<tr><td><a href="?pg=home&pg_m=informacoes&funcao=alterar&id=<?php echo $id_user; ?>">Alterar</a></td></tr>
</table>
<?php } ?>
<?php if($funcao=='alterar'){
	$id_user=$_GET['id'];
	
	$sql=mysql_query("select * from users where id_user='$id_user'");
while($linha=mysql_fetch_array($sql)){
	$id_user=$linha['id_user'];
	$nome=$linha['nome'];
	$data_nascimento=$linha['data_nascimento'];
	$email=$linha['email'];
	$sexo=$linha['sexo'];
	$morada=$linha['morada'];
	$contacto=$linha['contacto'];
	$estado_civil=$linha['estado_civil'];

}
?>
<form action="?pg=home&pg_m=informacoes&funcao=alter&id=<?php echo $id_user; ?>" method="post">
<div class="title">Alterar Informações</div>
<table cellpadding="5" cellspacing="5" border="0">
<tr><td><strong>Nome:</strong></td><td><input type="text" name="nome" value="<?php echo $nome; ?>" size="60" /></td></tr>
<tr><td><strong>Morada:</strong></td><td><input type="text" name="morada" value="<?php echo $morada; ?>" size="30" /> </td></tr>
<tr><td><strong>Contacto:</strong></td><td><input type="text" name="contacto" value="<?php echo $contacto; ?>" size="10" /></td></tr>
<tr><td><strong>Sexo:</strong></td><td><select name="sexo">
											<option value="<?php echo $sexo; ?>"><?php echo $sexo; ?></option>
                                            <option value=""></option>
                                            <option value="M">M</option>
                                            <option value="F">F</option>
                                            </select></td></tr>
<tr><td><strong>Data de Nascimento:</strong></td><td><input type="text" name="data_nascimento" value="<?php echo $data_nascimento; ?>" /></td></tr>
<tr><td><strong>Estado Civil:</strong></td><td><input type="text" name="estado_civil" value="<?php echo $estado_civil; ?>" /></td></tr>
<tr><td><input type="submit" value="Alterar" /></td><td><a href="?pg=home&pg_m=informacoes">Voltar</a></tr>
</table>
</form>
<?php } ?>
<?php if($funcao=='alter'){
	$id=$_GET['id'];
	$nome=$_POST['nome'];
	$morada=$_POST['morada'];
	$sexo=$_POST['sexo'];
	$data_nascimento=$_POST['data_nascimento'];
	$estado=$_POST['estado_civil'];
	$contacto=$_POST['contacto'];
	
	$sql=mysql_query("update users set nome='$nome', data_nascimento='$data_nascimento', sexo='$sexo', morada='$morada', contacto='$contacto', estado_civil='$estado' where id_user='$id'");
		echo"
					<meta http-equiv=refresh content='0; url=index.php?pg=home&pg_m=informacoes&funcao=alterar&id=$id'>
					
					";
	
} ?>
