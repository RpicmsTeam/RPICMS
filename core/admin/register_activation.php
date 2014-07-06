<?php
	$DatabaseHost = "localhost";
	$DatabaseUser = "root";
	$DatabasePassword = "1199Mtr3#";
	$Database = "blog";
	$TableAktivierung = "users";

	if($_REQUEST['ID'] && $_REQUEST['Aktivierungscode']){
		$DatabasePointer = mysql_connect($DatabaseHost, $DatabaseUser, $DatabasePassword);
		mysql_select_db($Database, $DatabasePointer);

		$_REQUEST['ID']               = mysql_real_escape_string($_REQUEST['ID']);
		$_REQUEST['Aktivierungscode'] = mysql_real_escape_string($_REQUEST['Aktivierungscode']);

		$ResultPointer = mysql_query("SELECT ID FROM $TableAktivierung WHERE ID = '".$_REQUEST['ID']."' AND Aktivierungscode = '".$_REQUEST['Aktivierungscode']."'", $DatabasePointer);

		if(mysql_num_rows($ResultPointer) > 0){
        		@mysql_query("UPDATE $TableAktivierung SET Aktiviert = '1' WHERE ID = '".$_REQUEST['ID']."'", $DatabasePointer);
       			echo"Vielen Dank f&uuml;r Ihre Registrierung. Der Aktivierungsprozess ist nun abgeschlossen.";
    		}
	}
?>

