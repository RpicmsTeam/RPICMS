<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/
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
require_once($root."/core/config/connect.db.inc.php");
//Database Information
$db_host = $db_servername; //Host address (most likely localhost)
$db_name = $db_name; //Name of Database
$db_user = $db_username; //Name of database user
$db_pass = $db_password; //Password for database user
$db_table_prefix = "rpicms_";

GLOBAL $errors;
GLOBAL $successes;

$errors = array();
$successes = array();

/* Create a new mysqli object with database connection parameters */
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
GLOBAL $mysqli;

if(mysqli_connect_errno()) {
	echo "Connection Failed: " . mysqli_connect_errno();
	exit();
}


?>
