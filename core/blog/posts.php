<?php
/**
* Get posts from Database
* 
* This script will the post variables with the database data.
*
* @author		Marcel Radzio <info@nordgedanken.de>
* @version	0.2 17/08/2014 19:39
*/
	//Check if Database connection established
	if (mysqli_connect_errno()) {
		printf("Verbindung fehlgeschlagen: %s\n", mysqli_connect_error());
		exit();
	}

	//Check if Data in it
	if ($resultat = $db_connection->query('SELECT * FROM posts')) {
		 //Put database data in variables
 		 while($daten = $resultat->fetch_object() ){
				$post_title = $daten->title;
				$post_text = $daten->text;
				$post_author = $daten->name;
				$post_date = $daten->time;
				$post_categrory = $daten->category;
  			}  
  		$resultat->close();
	} else {
  		//If no data in Database give error
  		echo "Es konnten keine Daten aus der Datenbank ausgelesen werden";
	}

// Close database connection
$db_connection->close();

