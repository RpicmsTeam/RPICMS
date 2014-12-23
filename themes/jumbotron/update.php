<?php
#######################
# flush browser cache #
#######################
header("Cache-Control: no-cache, must-revalidate, no-store");

if(isset($_GET['update']) && function_exists($_GET['update']))
call_user_func($_GET['update']);
else
echo "Function not found or wrong input";

function update(){
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
include($root . '/core/config/variables.config.php');
require($root . '/core/update/update/update.php');
$update = new AutoUpdate(true);
$update->branch = $updatebranch;
$update->currentVersion = 1; //Must be an integer - you can't compare strings
$update->updateUrl = 'http://media.nordgedanken.de/rpicms/server/'; //Replace with your server update directory
$update->updateIni = 'update.ini.'.$update->branch;

//Check for a new update
$latest = $update->checkUpdate();
if ($latest !== false) {
	if ($latest > $update->currentVersion) {
		//Install new update
		echo "New Version: ".$update->latestVersionName."<br>";
		echo "Installing Update...<br>";
		if ($update->update()) {
			echo "Update successful!";
		}
		else {
			echo "Update failed!";
		}
		
	}
	else {
		echo "Current Version is up to date";
	}
}
else {
	echo $update->getLastError();
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
    
		<link rel="icon" href="../../core/libs/theme_engine/BootStrap/favicon.ico">

		<!-- Bootstrap core CSS -->
		<link href="../../core/libs/theme_engine/BootStrap/css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom styles for this template -->
		<link href="jumbotron.css" rel="stylesheet">

		<script src="../../core/libs/theme_engine/BootStrap/js/bootstrap.min.js"></script>
		<script src="../../core/libs/theme_engine/jquery/jquery-1.11.2.min.js"></script>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<form action="admin.php">
    		<button type="submit" value="Zurück" class="btn btn-danger">Zurück</button>
		</form>
	</body>
</html>
<?php
}
?>