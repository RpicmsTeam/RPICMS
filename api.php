<?php
header("Cache-Control: no-cache, must-revalidate, no-store");
###############################
# include files from root dir #
###############################
$root_1 = realpath($_SERVER["DOCUMENT_ROOT"]);
$currentdir = getcwd();
$root_2 = str_replace($root_1, '', $currentdir);
$root_3 = explode("/", $root_2);
if ($root_3[1] == 'core') {
  echo $root_3[1];
  $root = realpath($_SERVER["DOCUMENT_ROOT"]);
}else{
  $root = $root_1 . '/' . $root_3[1];
}
$check = !file_exists('core/config/connect.db.inc.php');
echo $check;
if (!file_exists('core/config/connect.db.inc.php')) {
	header("HTTP/1.1 301 Moved Permanently");
	header("Location:".$root."install/index.php");
	}else{
		//$request = $_SERVER['REQUEST_URI'];
		//$Api = substr($request, strrpos($request, 'v1/') + 3);
		$Api = func_get_args();
		echo "$Api";
		//header("HTTP/1.1 301 Moved Permanently");
		//header("Location:api/v1/api.php/$Api");
	}

?>