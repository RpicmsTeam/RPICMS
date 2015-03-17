<?php
/**
 * Database configuration
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
require $root . "/core/config/connect.db.inc.php";
define('DB_USERNAME', $db_username);
define('DB_PASSWORD', $db_password);
define('DB_HOST', $db_servername);
define('DB_NAME', $db_name);
 
define('USER_CREATED_SUCCESSFULLY', 0);
define('USER_CREATE_FAILED', 1);
define('USER_ALREADY_EXISTED', 2);
?>