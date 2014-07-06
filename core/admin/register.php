<?php
	$DatabaseHost = "localhost";
	$DatabaseUser = "root";
	$DatabasePassword = "1199Mtr3#";
	$Database = "blog";
	$TableAktivierung = "users";
	$Absender = "info@nordgedanken.de";
	if($_REQUEST['Send']){
    		$DatabasePointer = mysql_connect($DatabaseHost, $DatabaseUser, $DatabasePassword);
    		mysql_select_db($Database, $DatabasePointer);
		$_REQUEST['Email'] = mysql_real_escape_string($_REQUEST['Email']);
		$_REQUEST['Name'] = mysql_real_escape_string($_REQUEST['Name']);
		$_REQUEST['pw'] = mysql_real_escape_string($_REQUEST['pw']);

		$text = "PHP-Einfach";
		$md5 = md5($_REQUEST['pw']);
										
		$Erstellt = date("Y-m-d H:i:s");
		$Aktivierungscode = rand(1, 9999);

		mysql_query("INSERT INTO $TableAktivierung (Aktivierungscode, Erstellt, EMail, Aktiviert, name, password) VALUES ('$Aktivierungscode', '$Erstellt', '".$_REQUEST['EMail']."', '0', '".$_REQUEST['Name']."', '$md5')", $DatabasePointer);

		$ID = mysql_insert_id();
		mail($_REQUEST['EMail'], "Registrierung abschließen", "Hallo,\n\num die Registrierung abzuschließen, klicken Sie bitte auf den folgenden Link:\n\nhttp://rpimarcel1.fritz.box/register_activation.php?ID=$ID&Aktivierungscode=$Aktivierungscode", "FROM: $Absender");
    		echo"Um die Registrierung abzuschließen, rufen Sie Ihr E-Mail-Postfach ab und klicken Sie auf den Aktivierungslink in der soeben an Sie versandten E-Mail.";
	}
	else{
		echo'<form action="" method="post">';
		echo'Benutzername: <input maxlength="255" name="Name" type="text"><br>';
		echo'eMail: <input maxlength="255" name="EMail" type="text"><br>';
		echo'W&auml;hle dein Passwort: <input maxlength="255" name="pw" type="password"><br>';
		echo'<input name="Send" type="submit" value="Absenden">';
		echo'</form>';
	}
?>
