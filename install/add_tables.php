<?php
/**
* Add Tables
*
* This script configure the the database tables for the CMS
*
* @author	Marcel Radzio <info@nordgedanken.de>
* @version	0.2 18/08/2014 18:49
*/

//Posts erstellen
	require_once ('../core/config/connect.db.inc.php');
	$sql = "
		 CREATE TABLE `posts` (
			`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
			`text` TEXT NOT NULL ,
			`title` TEXT NOT NULL ,
			`author` TEXT NOT NULL ,
			`date` DATETIME NOT NULL ,
			`category` TEXT NOT NULL
		) ENGINE = MYISAM ;
	";
	$result = mysqli_query($connection, $sql)
	or die("Anfrage fehlgeschlagen: " . mysql_error());
	echo 'Erstellen erfolgreich';
//User erstellen

	require_once ('../core/config/connect.db.inc.php');
	$sql = "
	CREATE TABLE IF NOT EXISTS `users` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`name` varchar(250) DEFAULT NULL,
		`email` varchar(255) NOT NULL,
		`password_hash` text NOT NULL,
		`api_key` varchar(32) NOT NULL,
		`status` int(1) NOT NULL DEFAULT '1',
		`created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
		PRIMARY KEY (`id`),
		UNIQUE KEY `email` (`email`)
	)ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;
	";
	$result = mysqli_query($connection, $sql)
	or die("Anfrage fehlgeschlagen: " . mysql_error());
	echo 'Erstellen erfolgreich';

//cookiedata
	require_once ('../core/config/connect.db.inc.php');
	$sql = "
		CREATE TABLE IF NOT EXISTS `cookiedata` (
  			`id` int(11) NOT NULL AUTO_INCREMENT,
  			`hash` varchar(140) NOT NULL,
  			`vaildtime` int(11) NOT NULL,
  			`createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  			`userid` int(11) NOT NULL,
  			`cookie_hash` varchar(140) NOT NULL,
  			PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;
	";
	$result = mysqli_query($connection, $sql)
	or die("Anfrage fehlgeschlagen: " . mysql_error());
	echo 'Erstellen erfolgreich';

//hashzoken
	require_once ('../core/config/connect.db.inc.php');
	$sql = "
		CREATE TABLE IF NOT EXISTS `hashtoken` (
  			`id` int(11) NOT NULL AUTO_INCREMENT,
  			`token` varchar(140) NOT NULL,
  			`time` int(11) NOT NULL,
  			`vaild_sec` int(11) NOT NULL DEFAULT '300',
  			PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;
	";
	$result = mysqli_query($connection, $sql)
	or die("Anfrage fehlgeschlagen: " . mysql_error());
	echo 'Erstellen erfolgreich';


	header("HTTP/1.1 301 Moved Permanently");
	header("Location:../");
	exit;
?>
