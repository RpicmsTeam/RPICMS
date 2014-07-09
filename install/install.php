<!Doctype html>
<html>
<head>
<title>Installieren</title>
</head>
<body>
<?php
	if (!extension_loaded('mysql')) {
		if (!dl('mysql.so')) {
			print ("MySQL is not installed! Please install this module!");
			exit;
		}else{print("MySQL has been successfully loaded");}
	}
?>
<h1>Installer</h1>
<h3>MySQL</h3>
<form action="generate_configs.php" method="post">
	<table cellpadding="1" cellspacing="4">
		<tr>
			<td><p>Datenbank Adresse: </p></td>
			<td><input type="name" name="serverpfad" required="required" placeholder="Datenbank Adresse" maxlength="255" /></td>
		</tr>
		<tr>
			<td><p>Nutzername: </p></td>
			<td><input type="name" name="username" required="required" placeholder="Nutzername" maxlength="255" /></td>
		</tr>
		<tr>
			<td><p>Passwort: </p></td>
			<td><input type="password" name="password" required="required" placeholder="Passwort" maxlength="50" /></td>
		</tr>
		<tr>
			<td><p>Datenbank Name:    </p></td>
			<td><input type="name" name="db_name" required="required" placeholder="Datenbank Name" maxlength="255" /></td>
		</tr>
	</table>
<h3>Basics</h3>
	<table cellpadding="1" cellspacing="4">
		<tr>
			<td><p>Website Name: </p></td>
			<td style="text-indent:40px;"><input type="name" name="blog_name" required="required" placeholder="Website Name" maxlength="255" /></td>
		</tr>
		<tr>
			<td><p>Untertitel: </p></td>
			<td style="text-indent:40px;"><input type="text" name="admin_username" required="required" placeholder="Untertitel" maxlength="255" /></td>
		</tr>
		<tr>
			<td><p>Schlagw&ouml;rter: </p></td>
			<td style="text-indent:40px;"><input type="text" name="admin_password" required="required" placeholder="Schlagw&ouml;rter" maxlength="50" /></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="send" value="Weiter" /></td>
		</tr>
	</table>
</form>
<strong>Sollte ein Fehler auftreten einfach zurück gehen und nochmal ausführen.</strong>
</body>
</html>
