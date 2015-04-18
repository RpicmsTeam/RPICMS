<!--/**
* Module Check
*
* This script checks for requiered modules.
*
* @author	Marcel Radzio <info@nordgedanken.de>
* @version	0.2 18/08/2014 18:45
*/-->
<html>
<head>
	<title>Installer | Check for requirements</title>
</head>
<body>
<h1>Check for requirements</h1>
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
		echo "<span style=\"color:red;\">MySQLi</span> is not installed! Please install this module!</br>";
		$mysql = 0;
	}else{
		echo "<span style=\"color:red;\">MySQLi</span> has been successfully loaded</br>";
		$mysql = 1;
	}
}else{
	echo "<span style=\"color:red;\">MySQLi</span> has been successfully loaded</br>";
	$mysql = 1;
}

###################################
# Check if Directory is writeable #
###################################
if ( ! is_writable($root)) {
	echo "<p> style=\"color:red;\"" . $root . '</p><p> must writable!!!</br>';
	$dir = 1;
} else {
	echo "<p style=\"color:red;\">" . $root . "</p><p> is writeable!</p></br>";
	$dir = 1;
}

if ($mysql == 1 && $dir == 1){
	echo "
	<form action=\"set_variables.php\" method=\"post\">
		<input type=\"submit\" name=\"send\" value=\"Go on!\" />
	</form>";
}else{
	echo "Can't proceed!</br>";
}
?>
</body>
</html>
