<?php
	$token = $_GET['token'];
	include('../../../../config/connect.db.inc.php');
	//Check if Database connection established
	if (mysqli_connect_errno()) {
		printf("Verbindung fehlgeschlagen: %s\n", mysqli_connect_error());
		exit();
	}
 	$loeschen = "DELETE FROM hashtoken WHERE token = '$token'";
	$loesch = mysqli_query($connection, $loeschen);
	header("Location: ./login.php"); 
?>
