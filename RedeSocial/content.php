
<?php
if(isset($_GET['funcao']))
	$funcao = $_GET['funcao'];
else
	$funcao = '';
?>
<div style="margin-top:<?php if($funcao != '2') echo "140px"; else echo "40px";?>;margin-bottom:60px; float:left">
	<img src="img/Social.jpg"/>
</div>

<div style="margin-top:40px;margin-bottom:60px; float:left; border:1px solid red;width:600px;text-align:center">
<?php 
if($funcao != '2')
{
?>
<h1>Registe-se</h1>
<form>
	<input type="text" placeholder="Nome" class="txt_log"/><br/><br/>
    <input type="date" placeholder="Data de Nascimento" class="txt_log"/><br/><br/>
    <input type="text" placeholder="Sexo" class="txt_log"/><br/><br/>
    <input type="text" placeholder="Estado Civil" class="txt_log"/><br/><br/>
    <input type="text" placeholder="Morada" class="txt_log"/><br/><br/>
    <input type="text" placeholder="Email" class="txt_log"/><br/><br/>
    <input type="password" placeholder="Password" class="txt_log"/><br/><br/>
	<input type="password" placeholder="Repita a Password" class="txt_log"/><br/><br/>
    <input class="btn" type="button" value="Registar" style="margin-left:170px"/><br/>
</form>

<?php }
else
{
?>
<h1>Esqueci-me da Password</h1>Ao submeter este pedido será-lhe enviado um email com a sua password.<br/><br/>
<form>
	<input type="text" placeholder="Email" class="txt_log"/><br/><br/>
    <input class="btn" type="button" value="Recuperar" style="margin-left:170px"/><br/>
</form>
<?php
}
?>
</div>
