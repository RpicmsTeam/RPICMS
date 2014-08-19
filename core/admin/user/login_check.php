<?php

/**
* Check the User Datas
* 
* This script check if the data o the form is equal the data of the database. 
*
* @author		Marcel Radzio <info@nordgedanken.de>
* @version	0.2 17/08/2014 19:39
*/

	//Fill variables
	$username = $_POST["username"];
	$pw = $_REQUEST['password'];
	
	//Check if the variables are empty
	if(empty($pw)){
		echo"B&auml;&auml;&auml;hhh!!!";
		exit;
	}
	if(empty($username)){
		echo"B&auml;&auml;&auml;hhh!!!";
		exit;
	}

	//Open DatabaseConnection
	$verbindung = mysql_connect("localhost", "root" , "1199Mtr3#")
	or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
	mysql_select_db("blog") or die ("Datenbank konnte nicht ausgewaelt werden");
	
	//Request User Data from Database
	$abfrage = "SELECT EMail, password FROM users WHERE EMail LIKE '$username' LIMIT 1";
	$ergebnis = mysql_query($abfrage);
	$row = mysql_fetch_object($ergebnis);


	//Decrypt database password variable
	include '../secure/aes.php';

	$inputKey = '1554831687984849746489478';

	$inputText = $row->password;

	$blockSize = 256;
	$aes = new AES($inputText, $inputKey, $blockSize);
	$dec=$aes->decrypt();
//	$string = $_REQUEST['pw'];




	//Check if Database password equal Form Password
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

?>
