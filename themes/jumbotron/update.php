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

require($root . '/core/update/update/update.php');

$update = new AutoUpdate(true);
$update->currentVersion = 1; //Must be an integer - you can't compare strings
$update->updateUrl = 'http://media.nordgedanken.de/rpicms/server'; //Replace with your server update directory

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
// dauerhafte PHP-Weiterleitung (Statuscode 301)
header("HTTP/1.1 301 Moved Permanently");
// Weiterleitungsziel. Wohin soll eine permanente Weiterleitung erfolgen?
header("Location:admin.php");
// zur Sicherheit ein exit-Aufruf, falls Probleme aufgetreten sind
exit;
}
?>