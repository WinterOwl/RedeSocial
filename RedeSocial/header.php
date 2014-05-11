<?php 
if(isset($_GET['funcao']))
	$funcao = $_GET['funcao'];
else
	$funcao = '';	
if(isset($_GET['msg']))
	$msg = $_GET['msg'];
else
	$msg = '';	

?>

<div class="content-top-navigator" style="padding-top:8px;color:#00A0EB">

<form id="form-log" action="" method="">

  <table cellspacing="0" border="0" width="1024">
  	<tr>
    	<td width="600">
  		</td>
        <td width="60">
  			<a>Email</a> 
  		</td>
        <td width="60" >
       		<a>Password</a>
        </td>
    </tr>
    <tr>
        <td width="600">
        <div style="text-align:center;"><?php if($msg=='1') echo "Email Enviado com sucesso!"; else if($msg=='2')echo "Registo submetido com sucesso!";?></div>
  		</td>
        <td width="60">
  			<input type="text" id="txt-log-email" name="txt-log-email"/> 
  		</td>
        <td width="60" >
       		<input type="password" id="txt-log-pwd" name="txt-log-pwd"/>
        </td>
        <td>
       
        		<input id="btn-log" type="button" value="Entrar" onclick="login();"/>
        	
        </td>
    </tr>
    <tr>
    	<td width="600">
  		</td>
        <td id="login-err" style="color:red;text-align:center" width="60">
        <?php if($msg == '3')echo "Dados incorrectos."?>
  		</td>
        <td width="60">	
        	<a href="?funcao=2" style="font-size:12px;color:#999;margin-left:5px;">Esqueci-me da password</a>
  		</td>
    </tr>
  </table>
  </form>
</div>
<!--
<div class="Content_total">
<h1 style="text-align:center; color:#00A0EB">
	Esqueci-me da Password
</h1>
<a style="color:white;margin-left:210px;font-size:24px">Insira o seu email</a><br/><br/>
<input type="text" style="margin-left:210px;"/><br/><br/>
<input type="button" value="Submeter" style="width:140px;margin-left:200px;	color:#0c1111;
	font:bold;
	width:100px;height:30px;
	border-radius:6px;
	border:1px solid #415353;
	background-color:#ededed;
	box-shadow: 0 0 2px 1px #999;
}" /><br/><br/>
<a style="color:red;margin-left:220px;font-size:24px">Email Invalido</a><br/>
</div>-->


<?php 
if($funcao==1 && isset($_POST['txt-log-email']))
{
	include "users/config.php";
	$email = $_POST['txt-log-email'];
	$pwd = $_POST['txt-log-pwd'];
	
	$sql = mysql_query("SELECT id_user, nome FROM users WHERE email = '$email' AND password = '$pwd'");
	
	$row = mysql_fetch_array($sql);

	if($row['id_user'] != '')
	{
		session_start();
		$_SESSION['id_user'] = $row['id_user'];
		$_SESSION['Email'] = $email;
		$_SESSION['Nome'] = $row['nome'];
		
		echo "<meta http-equiv=refresh content='0; url=users/index.php'>";
	
	}
	else
		echo "<meta http-equiv=refresh content='0; url=index.php?msg=3'>";
}


?>