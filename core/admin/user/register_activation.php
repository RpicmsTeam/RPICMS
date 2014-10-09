<?php
/**
* Activate Users
* 
* This script activate the Users in the Database 
*
* @author		Marcel Radzio <info@nordgedanken.de>
* @version	0.2 17/08/2014 19:52
*/

	//Set global variables
	$DatabaseHost = "localhost";
	$DatabaseUser = "root";
	$DatabasePassword = "1199Mtr3#";
	$Database = "blog";
	$TableAktivierung = "users";
	
	//Check for the ID of the user and the Activationcode
	if($_REQUEST['ID'] && $_REQUEST['Aktivierungscode']){
		//Open Database connection
		$DatabasePointer = mysqli_connect($DatabaseHost, $DatabaseUser, $DatabasePassword);
		mysql_select_db($Database, $DatabasePointer);

		$_REQUEST['ID']               = mysql_real_escape_string($_REQUEST['ID']);
		$_REQUEST['Aktivierungscode'] = mysql_real_escape_string($_REQUEST['Aktivierungscode']);

		//Get variables from Database
		$ResultPointer = mysql_query("SELECT ID FROM $TableAktivierung WHERE ID = '".$_REQUEST['ID']."' AND Aktivierungscode = '".$_REQUEST['Aktivierungscode']."'", $DatabasePointer);

		//Check if $ResultPointer filled
		if(mysql_num_rows($ResultPointer) > 0){
			//Activate the User
        		@mysql_query("UPDATE $TableAktivierung SET Aktiviert = '1' WHERE ID = '".$_REQUEST['ID']."'", $DatabasePointer);
       			echo"Vielen Dank f&uuml;r Ihre Registrierung. Der Aktivierungsprozess ist nun abgeschlossen.";
    		}
	}
?>

