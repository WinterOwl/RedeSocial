<?php
include "config.php";
function validate($name) {

$sql=mysql_query("SELECT nome FROM users WHERE nome LIKE \"%$name%\"");

while($row = mysql_fetch_array($sql))
{
	echo "<tr><td>" . $row['nome'] . "</td></tr>";
}
}

echo validate($_REQUEST['pesquisa']);

?>