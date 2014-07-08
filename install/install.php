<?php
	if (!extension_loaded('mysql')) {
		if (!dl('mysql.so')) {
			print ("MySQL is not installed! Please install this module!");
			exit;
		}else{print("MySQL has been successfully loaded");}
	}
?>
<form action="install_mysql.php" method="post">
	<table cellpadding="1" cellspacing="4">
		<tr>
			<td><strong>Datenbank Adresse:</strong></td>
			<td><input type="name" name="serverpfad" required="required" placeholder="Datenbank Adresse" maxlength="255" /></td>
		</tr>
		<tr>
			<td><strong>Nutzername:</strong></td>
			<td><input type="name" name="username" required="required" placeholder="Nutzername" maxlength="255" /></td>
		</tr>
		<tr>
			<td><strong>Passwort:</strong></td>
			<td><input type="password" name="password" required="required" placeholder="Passwort" maxlength="50" /></td>
		</tr>
		<tr>
			<td><strong>Datenbank Name:</strong></td>
			<td><input type="name" name="db_name" required="required" placeholder="Datenbank Name" maxlength="255" /></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="send" value="Weiter" /></td>
		</tr>
	</table>
</form>
