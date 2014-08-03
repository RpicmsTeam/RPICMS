<?php
	require_once ('../core/inc/db_connect.inc.php');
	$sql = 'CREATE DATABASE '.$db_name;
 
	$result = mysqli_query($connection, $sql);

	echo 'Erstellen erfolgreich';


?>
<form action="add_tables.php" method="post">
	<table cellpadding="1" cellspacing="4">
		<tr>
			<td colspan="2"><input type="submit" name="send" value="Weiter" /></td>
		</tr>
	</table>
</form>
