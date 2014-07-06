<?php

	echo $_POST['username'];
	echo "<br/>";
	echo $_POST['password'];
	echo "<br/>";
	
	$verbindung = mysql_connect("localhost", "root" , "1199Mtr3#")
	or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
	mysql_select_db("blog") or die ("Datenbank konnte nicht ausgewählt werden");

	$username = $_POST["username"];
	//secure
	include '../secure/aes.php';
	$key = '1554831687984849746489478';
	$string = $_REQUEST['pw'];
//	$old_key_size = GibberishAES::size();
//	GibberishAES::size(256);
	$encrypted_string = GibberishAES::enc($string, $key);


	$abfrage = "SELECT EMail, password FROM users WHERE EMail LIKE '$username' LIMIT 1";
	$ergebnis = mysql_query($abfrage);
	$row = mysql_fetch_object($ergebnis);

	echo $row->password;
	echo "<br/>";
	echo $encrypted_string;
        echo "<br/>";

	if($row->password == $encrypted_string){
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
							
							
				
				
