<?php
	require_once ('../core/inc/db_connect.inc.php');
	mysql_select_db($db_name) or die ('Die Datenbank ist nicht vorhanden');								
	$sql = "
		 CREATE TABLE `posts` (
		`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
		`text` TEXT NOT NULL ,
		`title` TEXT NOT NULL ,
		`name` TEXT NOT NULL ,
		`time` DATETIME NOT NULL
		) ENGINE = MYISAM ;
		";
	$result = mysqli_query($connection, $sql)
	or die("Anfrage fehlgeschlagen: " . mysql_error());
	echo 'Erstellen erfolgreich';
?>
