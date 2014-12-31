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
	$token = $_GET['token'];
	include($root . '/core/config/connect.db.inc.php');
	//Check if Database connection established
	if (mysqli_connect_errno()) {
		printf("Verbindung fehlgeschlagen: %s\n", mysqli_connect_error());
		exit();
	}
 	$loeschen = "DELETE FROM hashtoken WHERE token = '$token'";
	$loesch = mysqli_query($connection, $loeschen);
	header("Location: ./login.php"); 
?>
