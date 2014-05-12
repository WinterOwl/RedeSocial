<?php if(isset($_GET['msg']))
$msg=$_GET['msg'];
else
$msg='';
?>
<?php if($msg=='2'){ ?> <div class="warning">Pedido Aceite</div><?php } ?>
<?php 
$id_user=$_SESSION['id_user'];
$sql=mysql_query("select * from notificacoes n, users u where n.id_user_p=$id_user and n.id_user_u=u.id_user and n.estado='0'");
while($linha=mysql_fetch_array($sql)){
		$id_notificacao=$linha['id_notificacao'];
		$nome=$linha['nome']; 
		$id_user_pedido=$linha['id_user_u'];
		$notificacao=$linha['notificacao'];
		?>
        <table>
        <tr><td><?php echo $notificacao; ?>:</td><td><?php echo $nome; ?></td><td><a href="?pg=home&pg_m=notificacoes&funcao=aceitar&id=<?php echo $id_notificacao; ?>&id_pedido=<?php echo $id_user_pedido; ?>"><img width="70" src="../img/aceitar.png"></a></td></tr>
        </table>
        <?php
}
?>
<?php if($funcao=='aceitar'){
	$id=$_GET['id'];
	$id_pedido=$_GET['id_pedido'];
	$id_user=$_SESSION['id_user'];
	
	$sql=mysql_query("update notificacoes set estado='1' where id_notificacao=$id");
	$sql1=mysql_query("insert into amigos values('$id_user', '$id_pedido')");
	$sql2=mysql_query("insert into amigos values('$id_pedido', '$id_user')");

	echo"<meta http-equiv=refresh content='0; url=index.php?pg=home&pg_m=notificacoes&msg=2'>";	
}?>