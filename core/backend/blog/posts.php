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
		if ($resultat = $connection->query('SELECT * FROM posts')) {
			while($daten = $resultat->fetch_object() ){
 				$post_id_clean = $daten->id;
 				#var_dump($daten);
			}
  			#$resultat->close();
		}
	next_id();
	function next_id(){
		read();
		}
	function read(){
		global $id, $connection, $read, $post_id_clean;
		global $post_id, $post_title, $post_text, $post_author, $post_date, $post_categrory;
		if ($resultat = $connection->query("SELECT * FROM posts WHERE id LIKE '$id'")) {
			//echo 'SELECT * FROM posts WHERE id LIKE '.$id;
			//Put database data in variables
 			while($daten = $resultat->fetch_object() ){
 				//var_dump ($daten);
 			 	$post_id = $daten->id;
				$post_title = $daten->title;
				$post_text = $daten->text;
				$post_author = $daten->author;
				$post_date = $daten->date;
				$post_categrory = $daten->category;
				$post_text_short = shortText($post_text,70);
			}  
  			$resultat->close();
		} else {
			global $id, $connection, $read, $post_id_clean;
			global $post_id, $post_title, $post_text, $post_author, $post_date, $post_categrory;
  					global $error;
  					$error = "1";
  					echo "Nothing to read from Database!";
  					$post_id = "Database error!";
					$post_title = "Database error!";
					$post_text = "Database error!";
					$post_author = "Database error!";
					$post_date = "Database error!";
					$post_categrory = "Database error!";
		}
	}



function shortText($string,$lenght) {
    if(strlen($string) > $lenght) {
        $string = substr($string,0,$lenght)."...";
        $string_ende = strrchr($string, " ");
        $string = str_replace($string_ende," ...", $string);
    }
    return $string;
}
//$longtext = $post_text;








// Close database connection
$connection->close();

