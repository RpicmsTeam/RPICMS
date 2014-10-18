<?php
/**
* Administration
* 
* This script is a navigation to all things that you can configurate.
*
* @author	Marcel Radzio <info@nordgedanken.de>
* @version	0.2 17/08/2014 19:57
*/

	//Check if the User loged in
	if (!isset($_COOKIE["user"])){
		echo $_COOKIE["user"];
  		echo "Please <a href=\"login.php\">login</a> first.";
  		exit;
  	}else{
  		echo "Welcome " . $_COOKIE["user"] . "!<br>";
  		echo "<a href=\"logout.php\">Logout</a>";
  		###########################################
  		#										  #
  		#										  #
  		#   				INHALT				  #
  		#										  #
  		#										  #
  		#				    INHALT				  #
  		#										  #
  		#										  #
  		#   				INHALT				  #
  		#										  #
  		#										  #
  		#   				INHALT				  #
  		#										  #
  		#										  #
  		#   				INHALT				  #
  		#										  #
  		#										  #
  		#		   			INHALT				  #
  		#										  #
  		#										  #
  		###########################################

  	}
?> 
