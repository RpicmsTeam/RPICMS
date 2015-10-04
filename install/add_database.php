<?php
/**
* Add Database
* 
* This script add the Database
*
* @author	Marcel Radzio <info@nordgedanken.de>
* @version	0.2 18/08/2014 18:51
*/

	require_once ('../core/config/connect.db.inc.php');
	$sql = "CREATE DATABASE $db_name";
 
	$result = mysqli_query($connection, $sql);

	echo 'Datenbank erfolgreich erstellt';


	copy ('../core/config/connect.db.inc.php','../core/config/connect.db.inc.php.1');


//###################
//# MySQL           #
//###################

//#Serverpfad
require ('../core/config/connect.db.inc.php');
$filename = '../core/config/connect.db.inc.php';

if (!$handle = fopen($filename, "w")) {
         print "Kann die Datei $filename nicht öffnen";
         exit;
    }
fclose($handle);
    // dort wird $somecontent später mit fwrite() geschrieben.
    if (!$handle = fopen($filename, "a")) {
         print "Kann die Datei $filename nicht öffnen";
         exit;
    }

//	#Serverpfad
	$serverpfad = $db_servername;
	$var_str_sp = var_export($serverpfad, true);
	$var_sp = "<?php\n\n\$db_servername = $var_str_sp;\n";

    		// Schreibe $somecontent in die geöffnete Datei.
    		if (!fwrite($handle, $var_sp)) {
        		print "Kann in die Datei $filename nicht schreiben";
			print "</br>";
        		exit;
   		}

    		print "Fertig, in Datei $filename wurde $var_str_sp geschrieben";
		print "</br>";
//	#Userame
	$username = $db_username;
	$var_str_u = var_export($username, true);
	$var_u = "\n\n\$db_username = $var_str_u;\n";
    
    		if (!fwrite($handle, $var_u)) {
     		   print "Kann in die Datei $filename nicht schreiben";
    		   exit;
    		}


    		print "Fertig, in Datei $filename wurde $var_str_u geschrieben";
		print "</br>";
//	#Passwort
	$password = $db_password;
	$var_str_pw = var_export($password, true);
	$var_pw = "\n\n\$db_password = $var_str_pw;\n";
		if (!fwrite($handle, $var_pw)) {
       			print "Kann in die Datei $filename nicht schreiben";
        		exit;
    		}

    		print "Fertig, in Datei $filename wurde $var_str_pw geschrieben";
		print "</br>";
//	#DB Name
	$db_name = $db_name;
	$var_str_dbn = var_export($db_name, true);
	$var_dbn = "\n\n\$db_name = $var_str_dbn;\n\n";

    		if (!fwrite($handle, $var_dbn)) {
        		print "Kann in die Datei $filename nicht schreiben";
        		exit;
    		}

    		print "Fertig, in Datei $filename wurde $var_str_dbn geschrieben";
		print "</br>";
//	#Funktion der Datenbank
    		if (!fwrite($handle, '$connection = mysqli_connect($db_servername, $db_username, $db_password, $db_name) or die ("Verbindung war nicht m&ouml;glich");')) {
        		print "Kann in die Datei $filename nicht schreiben";
        		exit;
    		}
		print "</br>";
    fclose($handle);


unlink('../core/config/connect.db.inc.php.1')



?>
<form action="add_tables.php" method="post">
	<table cellpadding="1" cellspacing="4">
		<tr>
			<td colspan="2"><input type="submit" name="send" value="Weiter" /></td>
		</tr>
	</table>
</form>
