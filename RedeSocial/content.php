
<?php
if(isset($_GET['funcao']))
	$funcao = $_GET['funcao'];
else
	$funcao = '';
	
if(isset($_GET['enviar']))
	$enviar = $_GET['enviar'];
else
	$enviar = '';
?>
<div style="margin-top:<?php if($funcao != '2') echo "140px"; else echo "40px";?>;margin-bottom:60px; float:left">
	<img src="img/Social.jpg"/>
</div>

<div style="margin-top:40px;margin-bottom:60px; float:left;width:600px;text-align:center">
<?php 
if($funcao != '2')
{
?>
<h1>Registe-se</h1>
<form id="reg_form">
	<div>
    	<input type="text" id="reg_nome" name="reg_nome" placeholder="Nome" class="txt_log"/>
    	<a style="color:red" id="reg_err_nome"></a>
    </div><br/>
    <div>
    	<input type="text" id="reg_data" name="reg_data" placeholder="Data de Nascimento(yyyy-mm-dd)" class="tcal"/>
        <a style="color:red" id="reg_err_data"></a>
    </div><br/>
    <div>
    <select name="genero" class="txt_log" style="height:36px;width:278px;">
    	<option name="genero" value="M">Masculino</option>
  		<option name="genero" value="F">Feminino</option>
	</select>
        <a style="color:red" id="reg_err_sexo"></a>
    </div><br/>
    <div>	
    <select name="estado" class="txt_log" style="height:36px;width:278px;">
    	<option name="estado" value="Solteiro">Solteiro/a</option>
  		<option name="estado" value="Casado">Casado/a</option>
        <option name="estado" value="Numa Relacao">Numa Relação</option>
	</select>
    </div><br/>
    <div>
    	<input type="text" id="reg_mora" name="reg_mora" placeholder="Morada" class="txt_log"/>
        <a style="color:red" id="reg_err_mora"></a>
    </div><br/>
    <div>
    	<input type="text" id="reg_email" name="reg_email" placeholder="Email" class="txt_log" onChange="val_email2(this.value);"/>
    	<a style="color:red" id="reg_err_email"></a>
    </div><br/>
    <div>
    	<input type="password" id="reg_pwd" name="reg_pwd" placeholder="Password" class="txt_log"/>
    	<a style="color:red" id="reg_err_pwd"></a>
    </div><br/>
    <div>
		<input type="password" id="reg_rpwd" name="reg_rpwd" placeholder="Repita a Password" class="txt_log"/>
    	<a style="color:red" id="reg_err_rpwd"></a>
    </div><br/>
    <input id="reg_btn" class="btn" type="button" value="Registar" onclick="registo();" style="margin-left:170px"/><br/>
</form>

<?php }
else
{
?>
<h1>Esqueci-me da Password</h1>Ao submeter este pedido será-lhe enviado um email com a sua password.<br/><br/>
<form id="forget-form">
	<input type="text" placeholder="Email" id="forget-email" name="forget-email" class="txt_log"/><br/>
    <div id="forget_err_email" style="color:red;"></div><br/>
    <input id="forget-btn" class="btn" type="button" value="Recuperar" style="margin-left:170px" onclick="forget();"/><br/>
</form>
<?php
}
?>
</div>

<?php
if($enviar=='email')
{
	include "users/config.php";
	$Femail = $_POST['forget-email'];
	
	$sql = mysql_query("SELECT password FROM users WHERE email = '$Femail'");
	$row = mysql_fetch_array($sql);
	$pass = $row['password'];
	$corpo="Foi submetido um pedidio para recuperar a password.<br/>A sua Password actual é: '$pass'<br/><br/>Cumps.Administração";
	mail($Femail,"Recuperar Password",$corpo);
	
	echo"<meta http-equiv=refresh content='0; url=index.php?msg=1'>";	
}

if($enviar=='registo')
{
	include "users/config.php";
	$nome = $_POST['reg_nome'];
	$data = $_POST['reg_data'];
	$genr = $_POST['genero'];
	$estado = $_POST['estado'];
	$morada = $_POST['reg_mora'];
	$email = $_POST['reg_email'];
	$password = $_POST['reg_pwd'];
	
	$sql2=mysql_query("INSERT INTO users VALUES('', '$nome', '$data', '$email', '$password', '$genr', '$morada', '', '$estado')");
	
	echo"<meta http-equiv=refresh content='0; url=index.php?msg=2'>";	
}
?>