<?php
include('include.php');
header("Cache-Control: no-cache, must-revalidate, no-store");
//$root = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
echo $root;
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
			require_once('core/config/variables.config.php');
			header("HTTP/1.1 301 Moved Permanently");
			header("Location:themes/$theme");
		}

	}

?>