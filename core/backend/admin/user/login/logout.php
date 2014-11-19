<?php
	include('./navi.php');
	$cookie = $_COOKIE["acess"];
	$verbindung = mysql_connect ("localhost","db_acess", "raspberry") or die ("keine Verbindung möglich. Benutzername oder Passwort sind falsch");
 	mysql_select_db("login_sec") or die("db geht nicht");
 	include('./check_auth.php');
	if (!$authokay) {
		die('nobody to logout');
	}
 	$loeschen = "DELETE FROM cookiedata WHERE cookie_hash = '$cookie'";
	$loesch = mysql_query($loeschen);
	print('logged out');
?>