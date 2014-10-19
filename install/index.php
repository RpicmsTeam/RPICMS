<!--/**
* Module Check
* 
* This script checks for requiered modules.
*
* @author	Marcel Radzio <info@nordgedanken.de>
* @version	0.2 18/08/2014 18:45
*/-->
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
		}else{
			print("MySQL has been successfully loaded");
		}
	}
?>
<h1>Installer</h1>
<!-- Reset Configs -->
<?php
#################
#Database Config#
#################
unlink('../core/inc/db_connect.inc.php');
######################
#Blog Basics Config  #
######################
unlink('../core/config/variables.config.php');
######################
#temp pass           #
######################
unlink('../core/config/pass.tmp.php')
?>
<!-- Form to give data to config-generator -->
<form action="generate_configs.php" method="post">
	<table cellpadding="1" cellspacing="4">
	<h3>MySQL</h3>
		<tr>
			<td><p>Datenbank Adresse: </p></td>
			<td><input type="name" name="db_address" required="required" placeholder="Datenbank Adresse" maxlength="255" /></td>
		</tr>
		<tr>
			<td><p>Nutzername: </p></td>
			<td><input type="name" name="db_username" required="required" placeholder="Nutzername" maxlength="255" /></td>
		</tr>
		<tr>
			<td><p>Passwort: </p></td>
			<td><input type="password" name="db_password" required="required" placeholder="Passwort" maxlength="50" /></td>
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
			<td style="text-indent:40px;"><input type="text" name="undertitle" required="required" placeholder="Untertitel" maxlength="255" /></td>
		</tr>
		<tr>
			<td><p>Schlagw&ouml;rter: </p></td>
			<td style="text-indent:40px;"><input type="text" name="keywords" placeholder="Schlagw&ouml;rter" maxlength="50" /></td>
		</tr>
		<tr>
			<td><p>Admin Username: </p></td>
			<td style="text-indent:40px;"><input type="text" name="admin_username" required="required" placeholder="Untertitel" maxlength="255" /></td>
		</tr>
		<tr>
			<td><p>Admin Password: </p></td>
			<td style="text-indent:40px;"><input type="text" name="admin_password" required="required" placeholder="Schlagw&ouml;rter" maxlength="50" /></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="send" value="Weiter" /></td>
		</tr>
	</table>
</form>
</body>
</html>
