<?php
set_include_path(".:/usr/share/php:/usr/share/pear");
#ini_restore('include_path');
#if (get_include_path() = ini_restore('include_path') . getcwd()) {
#	ini_restore('include_path');
#}else{
	set_include_path(get_include_path() . PATH_SEPARATOR . getcwd());
	echo get_include_path();
#}
?>