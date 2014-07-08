<?php
	require_once ('../inc/db_connect.inc.php');
	$sql = 'CREATE DATABASE blog ';
 
	$result = mysqli_query($connection, $sql)
	or die("Anfrage fehlgeschlagen: " . mysql_error());
									
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
?>

