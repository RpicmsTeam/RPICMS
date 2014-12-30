<?php
	###############################
	# include files from root dir #
	###############################
	$root_1 = realpath($_SERVER["DOCUMENT_ROOT"]);
	$currentdir = getcwd();
	$root_2 = str_replace($root_1, '', $currentdir);
	$root_3 = explode("/", $root_2);
	if ($root_3[1] == 'core') {
	  $root = realpath($_SERVER["DOCUMENT_ROOT"]);
	}else{
	  $root = $root_1 . '/' . $root_3[1];
	}
	include('./navi.php');
	$cookie = $_COOKIE["acess"];
	include($root . '/core/config/connect.db.inc.php');
	//Check if Database connection established
	if (mysqli_connect_errno()) {
		printf("Verbindung fehlgeschlagen: %s\n", mysqli_connect_error());
		exit();
	}
 	include('./check_auth.php');
	if (!$authokay) {
		die('nobody to logout');
	}
 	$loeschen = "DELETE FROM cookiedata WHERE cookie_hash = '$cookie'";
	$loesch = mysql_query($connection, $loeschen);
	print('logged out');
?>