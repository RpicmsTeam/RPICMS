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
		 CREATE TABLE IF NOT EXISTS `posts` (
			`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
			`text` TEXT NOT NULL ,
			`title` TEXT NOT NULL ,
			`author` TEXT NOT NULL ,
			`date` DATETIME NOT NULL ,
			`category` TEXT NOT NULL
		) ENGINE = MYISAM;
	";
	$result = mysqli_query($connection, $sql)
	or die("Anfrage fehlgeschlagen: " . mysql_error());
	echo 'Erstellen erfolgreich';

//Permissions Table erstellen
	require_once ('../core/config/connect.db.inc.php');
	$sql = "
		 CREATE TABLE IF NOT EXISTS `rpicms_permissions` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`name` varchar(150) NOT NULL,
		PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3;
	";
	$result = mysqli_query($connection, $sql)
	or die("Anfrage fehlgeschlagen: " . mysql_error());
	echo 'Erstellen erfolgreich';

	//Permissions Table füllen
		require_once ('../core/config/connect.db.inc.php');
		$sql = "
		INSERT INTO `rpicms_permissions` (`id`, `name`) VALUES
		(1, 'New Member'),
		(2, 'Administrator');
		";
		$result = mysqli_query($connection, $sql)
		or die("Anfrage fehlgeschlagen: " . mysql_error());
		echo 'Erstellen erfolgreich';

	//Users Table erstellen
		require_once ('../core/config/connect.db.inc.php');
		$sql = "
			 CREATE TABLE IF NOT EXISTS `rpicms_users` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`user_name` varchar(50) NOT NULL,
			`display_name` varchar(50) NOT NULL,
			`password` varchar(225) NOT NULL,
			`email` varchar(150) NOT NULL,
			`activation_token` varchar(225) NOT NULL,
			`last_activation_request` int(11) NOT NULL,
			`lost_password_request` tinyint(1) NOT NULL,
			`active` tinyint(1) NOT NULL,
			`title` varchar(150) NOT NULL,
			`sign_up_stamp` int(11) NOT NULL,
			`last_sign_in_stamp` int(11) NOT NULL,
			PRIMARY KEY (`id`)
			) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
		";
		$result = mysqli_query($connection, $sql)
		or die("Anfrage fehlgeschlagen: " . mysql_error());
		echo 'Erstellen erfolgreich';

	//user_permission_matches Table erstellen
		require_once ('../core/config/connect.db.inc.php');
		$sql = "
			 CREATE TABLE IF NOT EXISTS `rpicms_user_permission_matches` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`user_id` int(11) NOT NULL,
			`permission_id` int(11) NOT NULL,
			PRIMARY KEY (`id`)
			) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2;
		";
		$result = mysqli_query($connection, $sql)
		or die("Anfrage fehlgeschlagen: " . mysql_error());
		echo 'Erstellen erfolgreich';

	//user_permission_matches Table füllen
		require_once ('../core/config/connect.db.inc.php');
		$sql = "
		INSERT INTO `rpicms_user_permission_matches` (`id`, `user_id`, `permission_id`) VALUES
		(1, 1, 2);
		";
		$result = mysqli_query($connection, $sql)
		or die("Anfrage fehlgeschlagen: " . mysql_error());
		echo 'Erstellen erfolgreich';

	//configuration Table erstellen
		require_once ('../core/config/connect.db.inc.php');
		$sql = "
		CREATE TABLE IF NOT EXISTS `rpicms_configuration` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`name` varchar(150) NOT NULL,
		`value` varchar(150) NOT NULL,
		PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8;
		";
		$result = mysqli_query($connection, $sql)
		or die("Anfrage fehlgeschlagen: " . mysql_error());
		echo 'Erstellen erfolgreich';

	//configuration Table füllen
		require_once ('../core/config/connect.db.inc.php');
		$sql = "
		INSERT INTO `rpicms_configuration` (`id`, `name`, `value`) VALUES
		(1, 'website_name', '$blog_name'),
		(2, 'website_url', 'localhost/'),
		(3, 'email', '$blog_email'),
		(4, 'activation', 'true'),
		(5, 'resend_activation_threshold', '0'),
		(6, 'language', '$root/core/backend/admin/modules/module_normal_login/models/languages/en.php'),
		(7, 'template', '$root/core/backend/admin/modules/module_normal_loginmodels/site-templates/default.css');
		";
		$result = mysqli_query($connection, $sql)
		or die("Anfrage fehlgeschlagen: " . mysql_error());
		echo 'Erstellen erfolgreich';

	//pages Table erstellen
		require_once ('../core/config/connect.db.inc.php');
		$sql = "
		CREATE TABLE IF NOT EXISTS  `rpicms_pages` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`page` varchar(150) NOT NULL,
		`private` tinyint(1) NOT NULL DEFAULT '0',
		PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18;
		";
		$result = mysqli_query($connection, $sql)
		or die("Anfrage fehlgeschlagen: " . mysql_error());
		echo 'Erstellen erfolgreich';

	//pages Table füllen
		require_once ('../core/config/connect.db.inc.php');
		$sql = "
		INSERT INTO `rpicms_pages` (`id`, `page`, `private`) VALUES
		(1, '$theme/account.php', 1),
		(2, '$theme/activate-account.php', 0),
		(3, '$theme/admin_configuration.php', 1),
		(4, '$theme/admin_page.php', 1),
		(5, '$theme/admin_pages.php', 1),
		(6, '$theme/admin_permission.php', 1),
		(7, '$theme/admin_permissions.php', 1),
		(8, '$theme/admin_user.php', 1),
		(9, '$theme/admin_users.php', 1),
		(10, '$theme/forgot-password.php', 0),
		(11, '$theme/index.php', 0),
		(12, '$theme/left-nav.php', 0),
		(13, '$theme/login.php', 0),
		(14, '$theme/logout.php', 1),
		(15, '$theme/register.php', 0),
		(16, '$theme/resend-activation.php', 0),
		(17, '$theme/user_settings.php', 1);
		";
		$result = mysqli_query($connection, $sql)
		or die("Anfrage fehlgeschlagen: " . mysql_error());
		echo 'Erstellen erfolgreich';

	//permission_page_matches Table erstellen
		require_once ('../core/config/connect.db.inc.php');
		$sql = "
		CREATE TABLE IF NOT EXISTS  `rpicms_permission_page_matches` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`permission_id` int(11) NOT NULL,
		`page_id` int(11) NOT NULL,
		PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23;
		";
		$result = mysqli_query($connection, $sql)
		or die("Anfrage fehlgeschlagen: " . mysql_error());
		echo 'Erstellen erfolgreich';

	//permission_page_matches Table füllen
		require_once ('../core/config/connect.db.inc.php');
		$sql = "
		INSERT INTO `rpicms_permission_page_matches` (`id`, `permission_id`, `page_id`) VALUES
		(1, 1, 1),
		(2, 1, 14),
		(3, 1, 17),
		(4, 2, 1),
		(5, 2, 3),
		(6, 2, 4),
		(7, 2, 5),
		(8, 2, 6),
		(9, 2, 7),
		(10, 2, 8),
		(11, 2, 9),
		(12, 2, 14),
		(13, 2, 17);
		";
		$result = mysqli_query($connection, $sql)
		or die("Anfrage fehlgeschlagen: " . mysql_error());
		echo 'Erstellen erfolgreich';


	header("HTTP/1.1 301 Moved Permanently");
	header("Location:../");
	exit;
?>
