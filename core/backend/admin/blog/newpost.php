<?php
#######################
# flush browser cache #
#######################
header("Cache-Control: no-cache, must-revalidate, no-store");
echo "test";

ob_start();

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
include($root . '/core/config/variables.config.php');
include($root . '/core/config/connect.db.inc.php');

while (ob_get_status()) {
	if ($resultat = $connection->query('SELECT id FROM posts')) {
		while($daten = $resultat->fetch_object() ){
 			$post_id_clean = $daten->id;
 			$ids = $post_id_clean+1;
 			var_dump($daten);
		}
  		#$resultat->close();
	}

	$author = $_POST["author"];
	$author = $_POST['author'];
	$title = $_POST['title'];
	$text = $_POST['content'];
	$category = $_POST['category'];

	echo $author;
	echo $title;
	echo $text;
	echo $category;
	echo "test";

	if (!empty($author) || !empty($title) || !empty($text) || !empty($category)) {
		if ($resultat = $connection->query("INSERT INTO posts (id,text,title,author,date,category) VALUES ('$ids', '$text', '$title', '$author', 'date('Y-m-d H:i:s')', '$category')")) {
  			$resultat->close();
		}
	}
	ob_end_clean();
}
//header( "Location: ../../../../" );
?>