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
			<td style="text-indent:25px;"><input type="name" name="name" required="required" placeholder="Datenbank Adresse" maxlength="255" /></td>
		</tr>
		<tr>
			<td><p>Admin Name: </p></td>
			<td style="text-indent:25px;"><input type="name" name="admin_username" required="required" placeholder="Nutzername" maxlength="255" /></td>
		</tr>
		<tr>
			<td><p>Admin Passwort: </p></td>
			<td style="text-indent:25px;"><input type="password" name="admin_password" required="required" placeholder="Passwort" maxlength="50" /></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="send" value="Weiter" /></td>
		</tr>
	</table>
</form>
</body>
</html>
