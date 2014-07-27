<?php
	$DatabaseHost = "localhost";
	$DatabaseUser = "root";
	$DatabasePassword = "1199Mtr3#";
	$Database = "blog";
	$TableAktivierung = "users";
	$Absender = "info@nordgedanken.de";
	if($_POST['Send']){
    		$DatabasePointer = mysql_connect($DatabaseHost, $DatabaseUser, $DatabasePassword);
    		mysql_select_db($Database, $DatabasePointer);
		$_POST['EMail'] = mysql_real_escape_string($_POST['EMail']);
		$_POST['Name'] = mysql_real_escape_string($_POST['Name']);
		$_POST['pw'] = mysql_real_escape_string($_POST['pw']);
		
		//secure
		include '../../secure/aes.php';
		$imputKey = '1554831687984849746489478';
		$imputText = $_REQUEST['pw'];
		$blockSize = 256;
		$aes = new AES($imputText, $imputKey, $blockSize);
		$enc = $aes->encrypt();
		$aes->setData($enc);
		echo "After encryption: ".$enc."<br/>";
								
		$Erstellt = date("Y-m-d H:i:s");
		$Aktivierungscode = rand(1, 9999);

		mysql_query("INSERT INTO $TableAktivierung (Aktivierungscode, Erstellt, EMail, Aktiviert, name, password) VALUES ('$Aktivierungscode', '$Erstellt', '".$_REQUEST['EMail']."', '0', '".$_REQUEST['Name']."', '$enc')", $DatabasePointer);

		$ID = mysql_insert_id();
		mail($_POST['EMail'], "Registrierung abschlie&szlig;en", "Hallo,\n\num die Registrierung abzuschließen, klicken Sie bitte auf den folgenden Link:\n\nhttp://192.168.178.40/cms_new/core/admin/register_activation.php?ID=$ID&Aktivierungscode=$Aktivierungscode", "FROM: $Absender");
    		echo"Um die Registrierung abzuschlie&szlig;en, rufen Sie Ihr E-Mail-Postfach ab und klicken Sie auf den Aktivierungslink in der soeben an Sie versandten E-Mail.";
	}
	//else{
	//	echo'<form action="" method="post">';
	//	echo'Benutzername: <input maxlength="255" name="Name" type="text"><br>';
	//	echo'eMail: <input maxlength="255" name="EMail" type="text"><br>';
	//	echo'W&auml;hle dein Passwort: <input maxlength="255" name="pw" type="password"><br>';
	//	echo'<input name="Send" type="submit" value="Absenden">';
	//	echo'</form>';
	//}
?>
