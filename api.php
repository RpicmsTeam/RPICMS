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
	header("Location:install/index.php");
	}else{
		//$request = $_SERVER['REQUEST_URI'];
		//$Api = substr($request, strrpos($request, 'v1/') + 3);

		$scriptName = $_SERVER['SCRIPT_NAME'];
		$requestUri = $_SERVER['REQUEST_URI'];
		$queryString = isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : '';

		// Physical path
        if (strpos($requestUri, $scriptName) !== false) {
            $physicalPath = $scriptName; // <-- Without rewriting
        } else {
            $physicalPath = str_replace('\\', '', dirname($scriptName)); // <-- With rewriting
        }

		$requestUri = $_SERVER['REQUEST_URI'];
		$Api['PATH_INFO'] = substr_replace($requestUri, '', 0, strlen($physicalPath)); // <-- Remove physical path
        $Api['PATH_INFO'] = str_replace('?' . $queryString, '', $Api['PATH_INFO']); // <-- Remove query string
        $Api['PATH_INFO'] = '/' . ltrim($Api['PATH_INFO'], '/'); // <-- Ensure leading slash
		print_r($Api);


		//header("HTTP/1.1 301 Moved Permanently");
		//header("Location:api/v1/api.php" . $Api['PATH_INFO']);
	}

?>