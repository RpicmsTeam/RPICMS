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
	#if ($empty){
	#	$post_id = "bug?";
	#	$post_title = "bug?";
	#	$post_text = "bug?";
	#	$post_author = "bug?";
	#	$post_date = "bug?";
	#	$post_categrory = "bug?";
	#}else{
		//Check if Data in it
	read();
	function read(){
		global $id, $connection, $read;
		if ($resultat = $connection->query('SELECT * FROM posts WHERE id LIKE '.$id)) {
			echo 'SELECT * FROM posts WHERE id LIKE '.$id;
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
  			echo "Nothing to read from Database!";
  			$post_id = "Database error!";
			$post_title = "Database error!";
			$post_text = "Database error!";
			$post_author = "Database error!";
			$post_date = "Database error!";
			$post_categrory = "Database error!";
		}
		if ($read != 0){
			read();
		}
	}

	#}





// Close database connection
$connection->close();

