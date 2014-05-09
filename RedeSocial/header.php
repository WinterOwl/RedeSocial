
<div class="content-top-navigator" style="padding-top:8px;color:#00A0EB">
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
  		</td>
        <td width="60">
  			<input type="text" id="txt-log-email" name="txt-log-email"/> 
  		</td>
        <td width="60" >
       		<input type="text" name="txt-log-pwd"/>
        </td>
        <td>
        	<input type="button" value="Entrar" onclick="login();"/>
        </td>
    </tr>
    <tr>
    	<td width="600">
  		</td>
        <td id="login-err" style="color:red;text-align:center" width="60">
  			<script>
				function login()
				{
					var mail = document.getElementById("txt-log-email").value;
					if(mail.length <= 0 || )
					document.getElementById("login-err").innerHTML = "Email Invalido";
				}
			</script>
  		</td>
    </tr>
  </table>
  
</div>
