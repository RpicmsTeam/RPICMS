<?php
/**
* Get posts from Database
* 
* This script will the post variables with the database data.
*
* @author	Marcel Radzio <info@nordgedanken.de>
* @version	1.0dev 1/12/2014 17:16
*/
	include('../../core/config/connect.db.inc.php');
	//Check if Database connection established
	if (mysqli_connect_errno()) {
		printf("Verbindung fehlgeschlagen: %s\n", mysqli_connect_error());
		exit();
	}
		if ($resultat = $connection->query('SELECT id FROM posts')) {
			while($daten = $resultat->fetch_object() ){
 				$post_id_clean = $daten->id;
 				#var_dump($daten);
			}
  			#$resultat->close();
		}
		if ($resultat = $connection->query("SELECT id FROM posts WHERE category LIKE '$category'")) {
			while($daten = $resultat->fetch_object() ){
 				$category_id_clean = $daten->id;
 				#var_dump($daten);
			}
  			#$resultat->close();
		}
		if ($resultat = $connection->query("SELECT id FROM posts WHERE author LIKE '$author'")) {
			while($daten = $resultat->fetch_object() ){
 				$author_id_clean = $daten->id;
 				#var_dump($daten);
			}
		}
	next_id_only();
	next_id_category();
	next_id_author();
	function next_id_category(){
		read_category();
	}
	function next_id_author(){
		read_author();
	}
	function next_id_only(){
		read_only();
	}
	function read_only(){
		global $id, $connection, $read, $post_id_clean;
		global $post_id, $post_title, $post_text, $post_author, $post_date, $post_category, $post_text_short;
		if ($resultat = $connection->query("SELECT id,title,text,author,category,date FROM posts WHERE id LIKE '$id'")) {
			//echo 'SELECT * FROM posts WHERE id LIKE '.$id;
			//Put database data in variables
 			while($daten = $resultat->fetch_object() ){
 				//var_dump ($daten);
 			 	$post_id = $daten->id;
				$post_title = $daten->title;
				$post_text = $daten->text;
				$post_author = $daten->author;
				$post_date = $daten->date;
				$post_category = $daten->category;
				$post_text_short = shortText($post_text,300);
			}  
  			$resultat->close();
		} else {
			global $id, $connection, $read, $post_id_clean;
			global $post_id, $post_title, $post_text, $post_author, $post_date, $post_category;
  					global $error;
  					$error = "1";
  					echo "Nothing to read from Database!";
  					$post_id = "Database error!";
					$post_title = "Database error!";
					$post_text = "Database error!";
					$post_author = "Database error!";
					$post_date = "Database error!";
					$post_category = "Database error!";
		}
	}


	function read_category(){
		global $id, $category, $connection, $read, $category_id_clean;
		global $post_id, $post_title, $post_text, $post_author, $post_date, $post_category, $post_text_short;
		if ($resultat = $connection->query("SELECT id,title,text,author,category,date FROM posts WHERE category LIKE '$category' AND id LIKE '$id'")) {
			//echo 'SELECT * FROM posts WHERE id LIKE '.$id;
			//Put database data in variables
 			while($daten = $resultat->fetch_object() ){
 				//var_dump ($daten);
 			 	$post_id = $daten->id;
				$post_title = $daten->title;
				$post_text = $daten->text;
				$post_author = $daten->author;
				$post_date = $daten->date;
				$post_category = $daten->category;
				$post_text_short = shortText($post_text,300);
			}  
  			$resultat->close();
		} else {
			global $id, $category, $connection, $read, $category_id_clean;
			global $post_id, $post_title, $post_text, $post_author, $post_date, $post_category;
  					global $error;
  					$error = "1";
  					echo "Nothing to read from Database!";
  					$post_id = "Database error!";
					$post_title = "Database error!";
					$post_text = "Database error!";
					$post_author = "Database error!";
					$post_date = "Database error!";
					$post_category = "Database error!";
		}
	}

function read_author(){
		global $id, $author, $connection, $read, $author_id_clean;
		global $post_id, $post_title, $post_text, $post_author, $post_date, $post_category, $post_text_short;
		if ($resultat = $connection->query("SELECT id,title,text,author,category,date FROM posts WHERE author LIKE '$author' AND id LIKE '$id'")) {
			//echo 'SELECT * FROM posts WHERE id LIKE '.$id;
			//Put database data in variables
 			while($daten = $resultat->fetch_object() ){
 				//var_dump ($daten);
 			 	$post_id = $daten->id;
				$post_title = $daten->title;
				$post_text = $daten->text;
				$post_author = $daten->author;
				$post_date = $daten->date;
				$post_category = $daten->category;
				$post_text_short = shortText($post_text,300);
			}  
  			$resultat->close();
		} else {
			global $id, $author, $connection, $read, $author_id_clean;
			global $post_id, $post_title, $post_text, $post_author, $post_date, $post_category;
  					global $error;
  					$error = "1";
  					echo "Nothing to read from Database!";
  					$post_id = "Database error!";
					$post_title = "Database error!";
					$post_text = "Database error!";
					$post_author = "Database error!";
					$post_date = "Database error!";
					$post_category = "Database error!";
		}
	}



function shortText($string,$lenght) {
    if(strlen($string) > $lenght) {
        $string = substr($string,0,$lenght)."[...]";
        $string_ende = strrchr($string, " ");
        $string = str_replace($string_ende," [...]", $string);
    }
    return $string;
}
//$longtext = $post_text;








// Close database connection
$connection->close();

