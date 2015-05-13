<?php
header("Cache-Control: no-cache, must-revalidate, no-store");

$check = !file_exists('core/config/connect.db.inc.php');
echo $check;
if (!file_exists('core/config/connect.db.inc.php')) {
	header("HTTP/1.1 301 Moved Permanently");
	header("Location:".$root."install/index.php");
	}else{
		if (!empty($_GET["theme"])) {
			$theme = $_GET["theme"];
			header("HTTP/1.1 301 Moved Permanently");
			header("Location:themes/$theme");
		}else{
			if (!empty($_GET["file"])) {
				$file = $_GET["file"];
				header("HTTP/1.1 301 Moved Permanently");
				header("Location:themes/$theme/$file");
			}else{
				require_once('core/config/variables.config.php');
				header("HTTP/1.1 301 Moved Permanently");
				header("Location:themes/$theme");
			}
		}

	}

?>
