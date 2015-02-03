<?php
header("Cache-Control: no-cache, must-revalidate, no-store");

$check = !file_exists('core/config/connect.db.inc.php');
echo $check;
if (!file_exists('core/config/connect.db.inc.php')) {
	header("HTTP/1.1 301 Moved Permanently");
	header("Location:".$root."install/index.php");
	}else{
			$request = $_SERVER['REQUEST_URI'];
			if (($pos = strpos($request, "api/v1/")) !== FALSE) { 
    			$Api = substr($request, $pos+1); 
			}
			echo $request;
			echo "</br>";
			echo $pos;
			echo "</br>";
			echo $Api;
			//header("HTTP/1.1 301 Moved Permanently");
			//header("Location:api/v1/api.php/$Api");
	}

?>