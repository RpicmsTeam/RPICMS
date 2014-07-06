
<form action="" method="post">
	<table cellpadding="1" cellspacing="4">
		<tr>
			<td><strong>E-Mail-Adresse:</strong></td>
			<td><input type="email" name="username" value="<?php echo $username; ?>" required="required" placeholder="E-Mail-Adresse" maxlength="255" /></td>
		</tr>
		<tr>
			<td><strong>Passwort:</strong></td>
			<td><input type="password" name="password" required="required" placeholder="Passwort" maxlength="50" /></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="send" value="Login" /></td>
		</tr>
	</table>
</form>

<a href="register.php" title="Registrierung">Registrier dich</a>

<?php
	$verbindung = mysql_connect("localhost", "root" , "1199Mtr3#")
	or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
	mysql_select_db("blog") or die ("Datenbank konnte nicht ausgewählt werden");

	$username = $_POST["username"];
	$passwort = md5($_POST["password"]);

	$abfrage = "SELECT EMail, password FROM users WHERE EMail LIKE '$username' LIMIT 1";
	$ergebnis = mysql_query($abfrage);
	$row = mysql_fetch_object($ergebnis);

	if($row->password == $passwort){
    		ob_start();
    		$expire=time()+60*60*24*30;
		setcookie('user', $username, $expire, '/', 'rpimarcel1.fritz.box', false, false);
		setcookie('user', $username, $expire, '/', '192.168.178.40', false, false);
		ob_end_flush();
    		echo "Login erfolgreich. <br> <a href=\"admin/admin.php\">Geschützer Bereich</a>";
    	}
	else{
    		echo "Benutzername und/oder Passwort waren falsch.";
    	} 

?>
							
							
				
				
