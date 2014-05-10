<?php
if(isset($_GET['funcao']))
$funcao=$_GET['funcao'];
else
$funcao='';
?>
<?php if($funcao!='alterar'){ ?>
Sobre

<br />

Informação Básica

<?php $sql=mysql_query("select * from users where id_user='1'");
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
<table cellpadding="5" cellspacing="5">
<tr><td>Nome:</td><td><?php echo $nome; ?></td></tr>
<tr><td>Email:</td><td><?php echo $email; ?></td></tr>
<tr><td>Morada:</td><td><?php echo $morada; ?></td></tr>
<tr><td>Contacto:</td><td><?php echo $contacto; ?></td></tr>
<tr><td>Sexo:</td><td><?php echo $sexo; ?></td></tr>
<tr><td>Data de Nascimento:</td><td><?php echo $data_nascimento; ?></td></tr>
<tr><td>Estado Civil:</td><td><?php echo $estado_civil; ?></td></tr>

</table>
<?php } ?>


