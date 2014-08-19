<?php
/**
* Administration
* 
* This script is a navigation to all things that you can configurate.
*
* @author		Marcel Radzio <info@nordgedanken.de>
* @version	0.2 17/08/2014 19:57
*/

	//Check if the User loged in
	if (!isset($_COOKIE["user"])){
		echo $_COOKIE["user"];
  		echo "Bitte erst <a href=\"login.php\">einloggen</a>.";
  		exit;
  	}else{
  		echo "Welcome " . $_COOKIE["user"] . "!<br>";
  		echo "<a href=\"logout.php\">Abmelden</a>";
  	}
?> 
