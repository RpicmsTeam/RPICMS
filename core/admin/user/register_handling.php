<?php
/**
* Handling the register progress
* 
* This script put the variables into the database 
*
* @author		Marcel Radzio <info@nordgedanken.de>
* @version	0.2 17/08/2014 19:48
*/	


	//Set variables
	$DatabaseHost = "localhost";
	$DatabaseUser = "root";
	$DatabasePassword = "1199Mtr3#";
	$Database = "blog";
	$TableAktivierung = "users";
	$Absender = "info@nordgedanken.de";
	
	//Check if the form is sended
	if($_POST['Send']){
		//Open Database connection
    		$DatabasePointer = mysql_connect($DatabaseHost, $DatabaseUser, $DatabasePassword);
    		mysql_select_db($Database, $DatabasePointer);
		$_POST['EMail'] = mysql_real_escape_string($_POST['EMail']);
		$_POST['Name'] = mysql_real_escape_string($_POST['Name']);
		$_POST['pw'] = mysql_real_escape_string($_POST['pw']);
		
		//Encrypt the password
		include '../../secure/aes.php';
		$imputKey = '1554831687984849746489478';
		$imputText = $_REQUEST['pw'];
		$blockSize = 256;
		$aes = new AES($imputText, $imputKey, $blockSize);
		$enc = $aes->encrypt();
		$aes->setData($enc);
		//echo "After encryption: ".$enc."<br/>";
		
		//Set first login Date and generate random Activatecode						
		$Erstellt = date("Y-m-d H:i:s");
		$Aktivierungscode = rand(1, 9999);
		
		//Push it to the Database
		mysql_query("INSERT INTO $TableAktivierung (Aktivierungscode, Erstellt, EMail, Aktiviert, name, password) VALUES ('$Aktivierungscode', '$Erstellt', '".$_REQUEST['EMail']."', '0', '".$_REQUEST['Name']."', '$enc')", $DatabasePointer);

		//Send Email for Registration
		$ID = mysql_insert_id();
		mail($_POST['EMail'], "Registrierung abschlie&szlig;en", "Hallo,\n\num die Registrierung abzuschließen, klicken Sie bitte auf den folgenden Link:\n\nhttp://192.168.178.40/cms_new/core/admin/register_activation.php?ID=$ID&Aktivierungscode=$Aktivierungscode", "FROM: $Absender");
    		echo"Um die Registrierung abzuschlie&szlig;en, rufen Sie Ihr E-Mail-Postfach ab und klicken Sie auf den Aktivierungslink in der soeben an Sie versandten E-Mail.";
	}
?>
