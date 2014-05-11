<script type="text/javascript">
    function confirma(){
      return confirm("Pretende mesmo apagar este Album?");
    }
  </script>
  <script type="text/javascript">
    function confirma1(){
      return confirm("Pretende mesmo apagar esta imagem?");
    }
  </script>
<?php 
if(!$_SESSION['id_user'])
	echo "<meta http-equiv=refresh content='0; url=../index.php'>";
if(isset($_GET['msg']))
$msg=$_GET['msg'];
else
$msg='';
?>
<table>
<tr><td><a href="?pg=home&pg_m=albuns&funcao=albuns"><img src="../img/img_foto.png" /></a></td><td><a href="?pg=home&pg_m=albuns&funcao=criar_albuns"><img src="../img/criar_albuns.png" /></a></td></tr>
</table>

<?php if($funcao=='albuns'){ ?>
<div class="title">Àlbuns</div>
<?php  
$id_user=$_SESSION['id_user'];
$sql=mysql_query("select * from albuns where id_user='$id_user'");
	while($linha=mysql_fetch_array($sql)){
		$id_album=$linha['id_album'];
		$nome=$linha['nome'];
		?>
        <table border="0">
        <?php if($msg=='1'){ ?><tr><td><div class="warning">Àlbum Apagado</div></td></tr><?php } ?>
        	<tr>
            	<td colspan="2"><a href="?pg=home&pg_m=albuns&funcao=albuns&funcao=inserir_imagem&id_album=<?php echo $id_album; ?>"><img src="../img/1399832582_32.png" width="150" /></a></td>
            </tr>
           	<tr>
            	<td><a href="#"><?php echo $nome; ?></a></td>
                <td align="right"><a href="?pg=home&pg_m=albuns&funcao=albuns&funcao=delete_albuns&id_album=<?php echo $id_album; ?>" onClick='return confirma();'><img src="../img/1399833215_Gnome-Edit-Delete-64.png" width="30" /></a></td>
            </tr>
        </table>
	<?php } ?>
<?php } ?>
	
    
<?php if($funcao=='delete_albuns'){
	$id_album=$_GET['id_album'];
	
	
	$sql=mysql_query("delete from albuns where id_album=$id_album");
	echo "<meta http-equiv=refresh content='0; url=index.php?pg=home&pg_m=albuns&funcao=albuns&msg=1'>";	

} ?>

<?php if($funcao=='inserir_imagem'){ 
$id_album=$_GET['id_album'];
?>
<table><?php if($msg=='3'){ ?><tr><td><div class="warning">Imagem Apagada </div></td></tr><?php } ?></table>
<?php
$sql=mysql_query("select * from fotos where id_album='$id_album'");
while($linha=mysql_fetch_array($sql)){
	$id_foto=$linha['id_foto'];
	$foto=$linha['foto'];
?>
<table border="0">
	<tr>
    	<td colspan="2"><img src="../img_fotos/<?php echo $foto; ?>" width="155" /></td>
    </tr>
    <tr>
    	<td>Foto Perfil</td>
		<td><a href="?pg=home&pg_m=albuns&funcao=albuns&funcao=apagar_imagem&id_foto=<?php echo $id_foto; ?>&id_album=<?php echo $id_album; ?>" onClick='return confirma1();'><img src="../img/1399833215_Gnome-Edit-Delete-64.png" width="30" /></a></td>
	</tr>
</table>
<?php }?>

<div class="left_inserir_imagem"><img src="../img/inserirfotos.png" /></div>
        <?php if($msg=='1'){ ?><tr><td><div class="warning">Formato de Imagem Inválido</div></td></tr><?php } ?>
        <?php if($msg=='2'){ ?><tr><td><div class="warning">Imagem Inserida</div></td></tr><?php } ?>


<form action="?pg=home&pg_m=albuns&funcao=inser_fotos&id_album=<?php echo $id_album; ?>" method="post" enctype="multipart/form-data">
<table>
	<tr><td><input type="file" name="arquivo" /></td></tr>
    <tr><td><input type="submit" value="Inserir" /></td></tr>
</table>
</form>
<?php } ?>
<?php if($funcao=='apagar_imagem'){
	$id_foto=$_GET['id_foto'];
	$id_album=$_GET['id_album'];
	$sql=mysql_query("delete from fotos where id_foto=$id_foto");
	echo "<meta http-equiv=refresh content='0; url=index.php?pg=home&pg_m=albuns&funcao=albuns&funcao=inserir_imagem&id_album=$id_album&msg=3'>";	
}?>


<?php if($funcao=='inser_fotos'){ 
$id_user=$_SESSION['id_user'];
$id_album=$_GET['id_album'];
//Define o tamanho máximo da imagem
define ("MAX_SIZE","100");
//Define a largura máxima que a imagem pode ter
define ("LARGURA","800");	
 
 // Função que permite saber qual a extensão da imagem
function getExtension($str){
    $i = strrpos($str,".");
    if (!$i) return ""; 
    $l = strlen($str) - $i;
    $ext = substr($str,$i+1,$l);
    return $ext;
}
//Verifica se o botão de upload foi pressionado

	//Guarda na variavél $image o nome completo da imagem (nome+extensão)
	$image = $_FILES['arquivo']['name'];
 	
	//Verifica se existe alguma imagem para ser importada
	if($image){//Existe uma imagem para ser importada
		//Retira os elementos "/"
		$filename = stripslashes($_FILES['arquivo']['name']);
 	
		//Verifica qual a extensão do ficheiro
		$extension = getExtension($filename);
 		
		//Coloca todos os caracteres da extensão com letra minuscula
		$extension = strtolower($extension);
 		
		//Verifica os formatos de imagem que podem ser importados
		if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "gif") && ($extension != "png")){//Formato diferente dos permitidos 
			//mostra uma mensagem de erro
				echo"
		<meta http-equiv=refresh content='0; url=index.php?pg=home&pg_m=albuns&funcao=inserir_imagem&id_album=$id_album&msg=1'>
					<script type=\"text/javascript\">
					alert(\"Utilize o formato jpg ou gif ou png!!\");
					</script>
					";
 		}
			else 
                        {//tamanho inferior
				//Gera um nome para a imagem
				$image_name=time().'.'.$extension;
			//Directoria para a qual a imagem será enviada
				$newname="../img_fotos/".$image_name;
 				//Efectua o upload da imagem para a directoria
				$copied = copy($_FILES['arquivo']['tmp_name'], $newname);
 				//Verifica se o upload foi efectuado com sucesso
				if ($copied){ //Upload bem sucessido
				
				$sql=mysql_query("insert into fotos values('', '$image_name', '$id_user', '$id_album', '0')"); 
						echo"
		<meta http-equiv=refresh content='0; url=index.php?pg=home&pg_m=albuns&funcao=inserir_imagem&id_album=$id_album&msg=2'>
					";	
					}	
		}
 	}
					

} ?>

<?php if($funcao=='criar_albuns'){ ?>
<div class="title">Criar Àlbuns</div>
    <form action="?pg=home&pg_m=albuns&funcao=inser_albuns" method="post">
    <table>
    	<?php if($msg=='1'){ ?><tr><td><div class="warning">Àlbum Criado</div></td></tr><?php } ?>
    	<tr><td>Nome:</td><td><input type="text" name="nome" /></td></tr>
        <tr><td><input type="submit" value="Criar Àlbuns" /></td></tr>
        </td>
    </form>
<?php } ?>
<?php if($funcao=='inser_albuns'){
	$nome=$_POST['nome'];
	$id_user=$_SESSION['id_user'];
	$sql=mysql_query("insert into albuns values('', '$nome', '$id_user')");
					echo "<meta http-equiv=refresh content='0; url=index.php?pg=home&pg_m=albuns&funcao=criar_albuns&msg=1'>";	
}?>