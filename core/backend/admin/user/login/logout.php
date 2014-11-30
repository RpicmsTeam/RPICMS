<?php
	include('./navi.php');
	$cookie = $_COOKIE["acess"];
	include('../../../../config/connect.db.inc.php');
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