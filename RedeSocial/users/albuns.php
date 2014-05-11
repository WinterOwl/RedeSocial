
<table>
<tr><td><a href="?pg=home&pg_m=albuns&funcao=albuns"><img src="../img/img_foto.png" /></a></td><td><a href="?pg=home&pg_m=albuns&funcao=criar_albuns"><img src="../img/criar_albuns.png" /></a></td></tr>
</table>

<?php if($funcao=='albuns'){ ?>
<div class="title">Àlbuns</div>
<?php } ?>
	
    
<?php if($funcao=='criar_albuns'){ ?>
<div class="title">Criar Àlbuns</div>
    <form action="?pg=home&pg_m=albuns&funcao=inser_albuns" method="post">
    	<tr><td>Nome:</td><td><input type="text" name="nome" /></td></tr>
        <tr><td><input type="submit" value="Criar Àlbuns"</td></tr>
    </form>
<?php } ?>
<?php if($funcao=='inser_albuns'){
	
	$nome=$_POST['nome'];
	
	$sql=mysql_query("insert into eventos values('', '$data', '$local', '$image1', '$inscricao', '$total', '$image', '')");
					echo "<meta http-equiv=refresh content='0; url=index.php?pg=eventos'>";	
}?>