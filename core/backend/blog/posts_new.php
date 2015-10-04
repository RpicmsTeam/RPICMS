<?php
/**
* Get posts from Database
*
* This script will the post variables with the database data.
*
* @author	Marcel Radzio <info@nordgedanken.de>
* @version	2.0dev 1/12/2014 17:16
*/
class posts{
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

  ########################
  # check if mysqli work #
  ########################
  if (mysqli_connect_errno()) {
		printf("Connectin failed: %s\n", mysqli_connect_error());
		exit();
	}

  ##################
  # text shortener #
  ##################
  function shortText($string,$lenght) {
      if(strlen($string) > $lenght) {
          $string = substr($string,0,$lenght)."[...]";
          $string_ende = strrchr($string, " ");
          $string = str_replace($string_ende," [...]", $string);
      }
      return $string;
  }

  #####################################
  # get needed vars for getting posts #
  #####################################
  function preparePostAll(){
    if ($resultat = $connection->query('SELECT id FROM posts')) {
			while($daten = $resultat->fetch_object() ){
 				$post_id_clean = $daten->id;
			}
		}
  }
  function preparePostCategory(){
		if ($resultat = $connection->query("SELECT id FROM posts WHERE category LIKE '$category'")) {
			while($daten = $resultat->fetch_object() ){
 				$category_id_clean = $daten->id;
			}
		}
  }
  function preparePostAuthor(){
		if ($resultat = $connection->query("SELECT id FROM posts WHERE author LIKE '$author'")) {
			while($daten = $resultat->fetch_object() ){
 				$author_id_clean = $daten->id;
			}
		}
  }

  ###################
  # get posts by id #
  ###################
  function read_only(){
		global $id, $connection, $read, $post_id_clean;
		global $post_id, $post_title, $post_text, $post_author, $post_date, $post_category, $post_text_short;
		if ($resultat = $connection->query("SELECT id,title,text,author,category,date FROM posts WHERE id LIKE '$id'")) {
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
		}else{
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
			$post_text_short =  "Database error!";
		}
	}

  ########################
  # get post by category #
  ########################
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
		}else{
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
			$post_text_short =  "Database error!";
		}
	}

  ######################
  # get post by author #
  ######################
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
			$post_text_short =  "Database error!";
		}
	}
}

###########################
# manuall loop workaround #
###########################
function next_id_category(){
  preparePostCategory();
  read_category();
}
function next_id_author(){
  preparePostAuthor();
  read_author();
}
function next_id_only(){
  preparePostAll();
  read_only();
}

next_id_only();
next_id_category();
next_id_author();

?>
