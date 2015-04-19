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
	<!-- Bootstrap core CSS -->
	<link href="../core/libs/theme_engine/BootStrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="../themes/jumbotron/jumbotron.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../core/libs/theme_engine/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../core/libs/theme_engine/bootstrap-social/bootstrap-social.min.css">
</head>
<body>
<div  class="container-fluid">
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
		echo "<p><span style=\"color:red;\">MySQLi</span> is not installed! Please install this module!</p></br>";
		$mysql = 0;
	}else{
		echo "<p><span style=\"color:green;\">MySQLi</span> has been successfully loaded</p></br>";
		$mysql = 1;
	}
}else{
	echo "<p><span style=\"color:green;\">MySQLi</span> has been successfully loaded</p></br>";
	$mysql = 1;
}

###################################
# Check if Directory is writeable #
###################################
if ( ! is_writable($root)) {
	echo "<p><span style=\"color:red;\">" . $root . '</span> must writable!!!</p></br>';
	$dir = 1;
} else {
	echo "<p><span style=\"color:green;\">" . $root . "</span> is writeable!</p></br>";
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
</div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../core/libs/theme_engine/BootStrap/js/bootstrap.min.js"></script>
</body>
</html>
