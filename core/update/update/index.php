<?php 
#######################
# flush browser cache #
#######################
header("Cache-Control: no-cache, must-revalidate, no-store");

require('update.php');

use \VisualAppeal\AutoUpdate;

$update = new AutoUpdate($root . '/temp/', $root . '/', 60);
$update->setCurrentVersion('1.0.0');
$update->setUpdateUrl('http://media.nordgedanken.de/rpicms/server');

// Optional:
$update->addLogHandler(new Monolog\Handler\StreamHandler($root . 'core/update/update.log'));


//Check for a new update
if ($update->checkUpdate() === false)
	die('Could not check for updates! See log file for details.');
if ($update->newVersionAvailable()) {
	//Install new update
	echo 'New Version: ' . $update->getLatestVersion() . '<br>';
	echo 'Installing Updates: <br>';
	echo '<pre>';
	var_dump(array_map(function($version) {
		return (string) $version;
	}, $update->getVersionsToUpdate()));
	echo '</pre>';
	$result = $update->update();
	if ($result === true) {
		echo 'Update successful<br>';
	} else {
		echo 'Update failed: ' . $result . '!<br>';
		if ($result = AutoUpdate::ERROR_SIMULATE) {
			echo '<pre>';
			var_dump($update->getSimulationResults());
			echo '</pre>';
		}
	}
} else {
	echo 'Current Version is up to date<br>';
}

?>