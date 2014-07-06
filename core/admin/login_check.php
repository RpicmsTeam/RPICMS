<?php


	$username = $_POST["username"];
	$string = $_REQUEST['password'];

	if(empty($string)){
		echo"B&auml;&auml;&auml;hhh!!!";
		exit;
	}

	$verbindung = mysql_connect("localhost", "root" , "1199Mtr3#")
	or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
	mysql_select_db("blog") or die ("Datenbank konnte nicht ausgewaelt werden");
	
	$abfrage = "SELECT EMail, password FROM users WHERE EMail LIKE '$username' LIMIT 1";
	$ergebnis = mysql_query($abfrage);
	$row = mysql_fetch_object($ergebnis);


	//secure
	include '../secure/aes.php';

	$inputKey = '1554831687984849746489478';

	$inputText = $row->password;

	$blockSize = 256;
	$aes = new AES($inputText, $inputKey, $blockSize);
	$dec=$aes->decrypt();
//	$string = $_REQUEST['pw'];





	if($dec == $_POST['password']){
    		ob_start();
    		$expire=time()+60*60*24*30;
		setcookie('user', $username, $expire, '/', 'rpimarcel1.fritz.box', false, false);
		setcookie('user', $username, $expire, '/', '192.168.178.40', false, false);
		ob_end_flush();
    		echo "Login erfolgreich. <br> <a href=\"admin.php\">Gesch&uuml;tzer Bereich</a>";
    	}
	else{
    		echo "Benutzername und/oder Passwort waren falsch.";
    	} 
/*
DEBUG
----
echo $username;
echo $verbindung;
echo $ergebnis;

echo "<br/>";
echo "-----------------------------";
echo "<br/>";
//echo $row[1];
echo "<br/>";
echo "-----------------------------";
echo "<br/>";
echo "Back aus include";
echo $inputKey;
echo "<br/>";
echo $inputText;
echo "<br/>";
echo "<br/>";
echo "-----------------------------";
echo "<br/>";
	echo "After decryption: ".$dec."<br/>";

echo "<br/>";
echo $_POST['password'];
echo "<br/>";
	echo $row->password;
	echo "<br/>";
	echo $encrypted_string;
*/
?>
