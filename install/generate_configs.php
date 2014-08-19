<?php
/**
* Generate Configs
* 
* This script generates the basic configs.
*
* @author	Marcel Radzio <info@nordgedanken.de>
* @version	0.2 18/08/2014 18:48
*/

//###################
//# MySQL           #
//###################
//#Serverpfad

$filename = '../core/inc/db_connect.inc.php';

// Sichergehen, dass die Datei existiert und beschreibbar ist
if (is_writable($filename)) {

    // Wir öffnen $filename im "Anhänge" - Modus.
    // Der Dateizeiger befindet sich am Ende der Datei, und
    // dort wird $somecontent später mit fwrite() geschrieben.
    if (!$handle = fopen($filename, "a")) {
         print "Kann die Datei $filename nicht öffnen";
         exit;
    }

//	#Serverpfad
	$serverpfad = $_POST["serverpfad"];
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
	$username = $_POST["username"];
	$var_str_u = var_export($username, true);
	$var_u = "\n\n\$db_username = $var_str_u;\n";
    
    		if (!fwrite($handle, $var_u)) {
     		   print "Kann in die Datei $filename nicht schreiben";
    		   exit;
    		}


    		print "Fertig, in Datei $filename wurde $var_str_u geschrieben";
		print "</br>";
//	#Passwort
	$password = $_POST["password"];
	$var_str_pw = var_export($password, true);
	$var_pw = "\n\n\$db_password = $var_str_pw;\n";
		if (!fwrite($handle, $var_pw)) {
       			print "Kann in die Datei $filename nicht schreiben";
        		exit;
    		}

    		print "Fertig, in Datei $filename wurde $var_str_pw geschrieben";
		print "</br>";
//	#DB Name
	$db_name = $_POST["db_name"];
	$var_str_dbn = var_export($db_name, true);
	$var_dbn = "\n\n\$db_name = $var_str_dbn;\n\n";

    		if (!fwrite($handle, $var_dbn)) {
        		print "Kann in die Datei $filename nicht schreiben";
        		exit;
    		}

    		print "Fertig, in Datei $filename wurde $var_str_dbn geschrieben";
		print "</br>";
//	#Funktion der Datenbank
    		if (!fwrite($handle, '$connection = mysqli_connect($db_servername, $db_username, $db_password) or die ("Verbindung war nicht m&ouml;glich");')) {
        		print "Kann in die Datei $filename nicht schreiben";
        		exit;
    		}
		print "</br>";
    fclose($handle);

} else {
    print "Die Datei $filename ist nicht schreibbar";
}

//###################
//# Basics          #
//###################
//#Blog Name
$filename = '../core/config/variables.config.php';
$blog_name = $_POST["blog_name"];
$var_str_bn = var_export($blog_name, true);
$var_bn = "<?php\n\$blog_name = $var_str_bn;\n\n";

// Sichergehen, dass die Datei existiert und beschreibbar ist
if (is_writable($filename)) {

    // Wir öffnen $filename im "Anhänge" - Modus.
    // Der Dateizeiger befindet sich am Ende der Datei, und
    // dort wird $somecontent später mit fwrite() geschrieben.
    if (!$handle = fopen($filename, "a")) {
         print "Kann die Datei $filename nicht öffnen";
         exit;
    }

    // Schreibe $somecontent in die geöffnete Datei.
    if (!fwrite($handle, $var_bn)) {
        print "Kann in die Datei $filename nicht schreiben";
        exit;
    }

    print "Fertig, in Datei $filename wurde $var_str_bn geschrieben";
		print "</br>";
    fclose($handle);

} else {
    print "Die Datei $filename ist nicht schreibbar";
}

?>
<form action="add_database.php" method="post">
	<table cellpadding="1" cellspacing="4">
		<tr>
			<td colspan="2"><input type="submit" name="send" value="Weiter" /></td>
		</tr>
	</table>
</form>


