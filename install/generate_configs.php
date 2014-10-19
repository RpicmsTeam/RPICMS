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
	$db_address = $_POST["db_address"];
	$var_str_sp = var_export($db_address, true);
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
	$db_username = $_POST["db_username"];
	$var_str_u = var_export($db_username, true);
	$var_u = "\n\n\$db_username = $var_str_u;\n";
    
    		if (!fwrite($handle, $var_u)) {
     		   print "Kann in die Datei $filename nicht schreiben";
    		   exit;
    		}


    		print "Fertig, in Datei $filename wurde $var_str_u geschrieben";
		print "</br>";
//	#Passwort
	$db_password = $_POST["db_password"];
	$var_str_pw = var_export($db_password, true);
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


// Sichergehen, dass die Datei existiert und beschreibbar ist
if (is_writable($filename)) {

    // Wir öffnen $filename im "Anhänge" - Modus.
    // Der Dateizeiger befindet sich am Ende der Datei, und
    // dort wird $somecontent später mit fwrite() geschrieben.
    if (!$handle = fopen($filename, "a")) {
         print "Kann die Datei $filename nicht öffnen";
         exit;
    }

    // Blogname
    $blog_name = $_POST["blog_name"];
    $var_str_bn = var_export($blog_name, true);
    $var_bn = "<?php\n\$blog_name = $var_str_bn;\n\n";
    if (!fwrite($handle, $var_bn)) {
        print "Kann in die Datei $filename nicht schreiben";
        exit;
    }

    //undertitle
    $undertitle = $_POST["undertitle"];
    $var_str_ut = var_export($undertitle, true);
    $var_ut = "<?php\n\$undertitle = $var_str_ut;\n\n";
    if (!fwrite($handle, $var_ut)) {
        print "Kann in die Datei $filename nicht schreiben";
        exit;
    }

    $keywords = $_POST["keywords"];
    $var_str_kw = var_export($keywords, true);
    $var_kw = "<?php\n\$keywords = $var_str_kw;\n\n";
    if (!fwrite($handle, $var_kw)) {
        print "Kann in die Datei $filename nicht schreiben";
        exit;
    }

    print "Fertig, in Datei $filename wurde $var_str_bn geschrieben";
		print "</br>";
    fclose($handle);

} else {
    print "Die Datei $filename ist nicht schreibbar";
}

//############################
//# Pass zwischenspeicherung #
//############################

$filename = '../core/config/pass.tmp.php';


// Sichergehen, dass die Datei existiert und beschreibbar ist
if (is_writable($filename)) {

    // Wir öffnen $filename im "Anhänge" - Modus.
    // Der Dateizeiger befindet sich am Ende der Datei, und
    // dort wird $somecontent später mit fwrite() geschrieben.
    if (!$handle = fopen($filename, "a")) {
         print "Kann die Datei $filename nicht öffnen";
         exit;
    }

    // admin_username
    $admin_username = $_POST["admin_username"];
    $var_str_au = var_export($admin_username, true);
    $var_au = "<?php\n\$admin_username = $var_str_au;\n\n";
    if (!fwrite($handle, $var_au)) {
        print "Kann in die Datei $filename nicht schreiben";
        exit;
    }

    //admin_password
    $admin_password = $_POST["admin_password"];
    $var_str_ap = var_export($admin_password, true);
    $var_ap = "<?php\n\$admin_password = $var_str_ap;\n\n";
    if (!fwrite($handle, $var_ap)) {
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


