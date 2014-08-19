<?php
/**
* Delete Cookies
*
* @author	Marcel Radzio <info@nordgedanken.de>
* @version	0.2 17/08/2014 19:46
*/	

	setcookie('user', '#', time() -1, '/', 'rpimarcel1.fritz.box', false, false);
	setcookie('user', '#', time() -1, '/', '192.168.178.40', false, false);
	echo"<p>Erfolgreich abgemeldet</p></br>"
	#header("refresh:5;url=http://rpimarcel1.fritz.box/PisIte_new");
?> 
