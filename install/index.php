<!--/**
* Module Check
*
* This script checks for requiered modules.
*
* @author	Marcel Radzio <info@nordgedanken.de>
* @version	0.2 18/08/2014 18:45
*/-->
<?php
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

################################
# Check if mysqli is installed #
################################
if (!extension_loaded('mysqli')) {
	if (!dl('mysqli.so')) {
		echo "MySQLi is not installed! Please install this module!";
		exit;
	}else{
		echo "MySQLi has been successfully loaded";
	}
}else{
	echo "MySQLi has been successfully loaded";
}

###################################
# Check if Directory is writeable #
###################################
if ( ! is_writable($root)) {
	echo $root . ' must writable!!!';
} else {
	echo $root . "Is writeable!";
}

if ($mysql == 1 && $dir == 1){
	echo "
	<form action=\"set_variables.php\" method=\"post\">
		<input type=\"submit\" name=\"send\" value=\"Go on!\" />
	</form>";
}else{
	echo "Can't proceed!"
}
?>
