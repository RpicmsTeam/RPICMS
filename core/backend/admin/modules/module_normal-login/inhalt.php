<?php
	include('./navi.php');
	include('./check_auth.php');
	if ($authokay) {
		print("hallo Benutzer mit der ID ".$authinfo);
	} else {
		die($authinfo);
	}
?>