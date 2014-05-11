<?php 
if(!$_SESSION['id_user'])
	echo "<meta http-equiv=refresh content='0; url=../index.php'>";
?>
<div class="content-top-navigator" style="padding-top:8px;color:#00A0EB">
  <table cellspacing="0" border="0" width="1024">
  	<tr>
    	<td width="60">
        	<a href="?pg=home"><img src="../img/home.png" width="30" height="30" />
        	Home</a>
  		</td>
        <td width="60">
  			<a href="#"><img src="../img/group.png" width="30" height="30" />
  			Friends</a>
  		</td>
        <td width="60" >
        <a href="#"><img src="../img/menu.png" width="30" height="30" style="margin-left:15px;" />
        	Notifications</a>
        </td>
        <td width="900" border="1">
        </td>
        <td>
  			<a href="logout.php"><img src="../img/Shutdown.png" width="50" height="50" /></a>
  		</td>
    </tr>
  </table>
  
  <!--<ul class="ul_top-menu">
    <li><a href="#">Home</a></li>
    <li><a href="#">Inserir</a></li>
    <li class='active'><a href="#">Gerir</a></li>
    <li><a href="#">Listar</a></li>
    <li><a href="#">Apagar</a></li>
  </ul>-->
  
</div>
