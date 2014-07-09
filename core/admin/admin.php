<?php
	if (!isset($_COOKIE["user"])){
		echo $_COOKIE["user"];
  		echo "Bitte erst <a href=\"login.php\">einloggen</a>.";
  		exit;
  	}else{
  		echo "Welcome " . $_COOKIE["user"] . "!<br>";
  		echo "<a href=\"logout.php\">Abmelden</a>";
  	}
?> 
