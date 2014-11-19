<?php
	$token = $_GET['token'];
	$verbindung = mysql_connect ("localhost","db_acess", "raspberry") or die ("keine Verbindung möglich. Benutzername oder Passwort sind falsch");
 	mysql_select_db("login_sec") or die("db geht nicht");
 	$loeschen = "DELETE FROM hashtoken WHERE token = '$token'";
	$loesch = mysql_query($loeschen);
	header("Location: ./login.php"); 
?>
