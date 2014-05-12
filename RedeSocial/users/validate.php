<?php
include "config.php";
session_start();
function validate($name) {
$id_user2=$_SESSION['id_user'];
$sql=mysql_query("SELECT nome, id_user FROM users WHERE nome LIKE \"%$name%\" and id_user!='$id_user2'");

while($row = mysql_fetch_array($sql))
{
	$id_user=$row['id_user'];
	?>
	<tr><td><a href="?pg=home&pg_m=amigos&funcao=pessoas&id=<?php echo $id_user; ?>"><?php echo $row['nome']; ?></a></td>
    <td align="right">
    <?php $sql1=mysql_query("SELECT u.nome, u.id_user FROM amigos a, users u WHERE a.id_pessoa = $id_user2 AND a.id_amigo = u.id_user");
			$cont=mysql_num_rows($sql1);
			
			if($cont == 0){
				?>
                <a href="?pg=homes&pg_m=amigos&funcao=enviar_pedido&id=<?php echo $id_user; ?>"><img src="../img/adicionar_amigos.png" /></a>
                <?php
			}
			while($linha2=mysql_fetch_array($sql1))
			{
				
			if($linha2['id_user'] != $id_user){
				?>
                <a href="?pg=homes&pg_m=amigos&funcao=enviar_pedido&id=<?php echo $id_user; ?>"><img src="../img/adicionar_amigos.png" /></a>
                <?php
			}
			}?></td></tr>
<?php 
}
}

echo validate($_REQUEST['pesquisa']);

?>