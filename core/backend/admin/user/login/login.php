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
	$login_module = "module_google-plus-login";
	$content = file($root."/core/backend/admin/module/".$login_module."login.php");
	echo $content;
?>