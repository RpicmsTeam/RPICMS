<?php
/**
* Get posts from Database
* 
* This script will the post variables with the database data.
*
* @author		Marcel Radzio <info@nordgedanken.de>
* @version	0.2 17/08/2014 19:39
*/
	include('../../core/config/connect.db.inc.php');
	//Check if Database connection established
	if (mysqli_connect_errno()) {
		printf("Verbindung fehlgeschlagen: %s\n", mysqli_connect_error());
		exit();
	}
	if (empty($_GET["post_id"])){
		//Check if Data in it
		if ($resultat = $connection->query('SELECT * FROM posts')) {
			//Put database data in variables
 			while($daten = $resultat->fetch_object() ){
 			 		$post_id_clean = $daten->id;
					$post_title_clean = $daten->title;
					$post_text_clean = $daten->text;
					$post_author_clean = $daten->author;
					$post_date_clean = $daten->date;
					$post_categrory_clean = $daten->category;

					$post_id = [
						"$post_id_clean" => "$post_id_clean"
						];


  				}  
  			$resultat->close();
		} else {
  			//If no data in Database give error
  			echo "Es konnten keine Daten aus der Datenbank ausgelesen werden";
		}
	}else{
		//Check if Data in it
		if ($resultat = $connection->query('SELECT * FROM posts WHERE id LIKE $post_id')) {
			//Put database data in variables
 			while($daten = $resultat->fetch_object() ){
 			 		$post_id = $daten->id;
					$post_title = $daten->title;
					$post_text = $daten->text;
					$post_author = $daten->author;
					$post_date = $daten->date;
					$post_categrory = $daten->category;
  				}  
  			$resultat->close();
		} else {
  			//If no data in Database give error
  			echo "Es konnten keine Daten aus der Datenbank ausgelesen werden";
		}


	}





// Close database connection
$connection->close();

