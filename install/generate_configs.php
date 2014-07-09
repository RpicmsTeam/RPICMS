<?php
###################
# MySQL           #
###################
#Serverpfad
$filename = '../core/inc/db_connect.inc.php';
$serverpfad = $_POST["serverpfad"];
$var_str_sp = var_export($serverpfad, true);
$var_sp = "<?php\n\n\$db_servername = $var_str_sp;\n";

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
    if (!fwrite($handle, $var_sp)) {
        print "Kann in die Datei $filename nicht schreiben";
        exit;
    }

    print "Fertig, in Datei $filename wurde $var_sp geschrieben";

    fclose($handle);

} else {
    print "Die Datei $filename ist nicht schreibbar";
}

#Userame
$filename = '../core/inc/db_connect.inc.php';
$username = $_POST["username"];
$var_str_u = var_export($username, true);
$var_u = "\n\n\$db_username = $var_str_u;\n";

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
    if (!fwrite($handle, $var_u)) {
        print "Kann in die Datei $filename nicht schreiben";
        exit;
    }

    print "Fertig, in Datei $filename wurde $var_u geschrieben";

    fclose($handle);

} else {
    print "Die Datei $filename ist nicht schreibbar";
}

#Passwort
$filename = '../core/inc/db_connect.inc.php';
$password = $_POST["password"];
$var_str_pw = var_export($password, true);
$var_pw = "\n\n\$db_password = $var_str_pw;\n";

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
    if (!fwrite($handle, $var_pw)) {
        print "Kann in die Datei $filename nicht schreiben";
        exit;
    }

    print "Fertig, in Datei $filename wurde $var_pw geschrieben";

    fclose($handle);

} else {
    print "Die Datei $filename ist nicht schreibbar";
}

#DB Name
$filename = '../core/inc/db_connect.inc.php';
$db_name = $_POST["db_name"];
$var_str_dbn = var_export($db_name, true);
$var_dbn = "\n\n\$db_name = $var_str_dbn;\n\n";

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
    if (!fwrite($handle, $var_dbn)) {
        print "Kann in die Datei $filename nicht schreiben";
        exit;
    }

    print "Fertig, in Datei $filename wurde $var_dbn geschrieben";

    fclose($handle);

} else {
    print "Die Datei $filename ist nicht schreibbar";
}

#Funktion der Datenbank
$filename = '../core/inc/db_connect.inc.php';
$var_dbn = '$connection = mysql_connect($db_servername, $db_username, $db_password) or die ("<p>Verbindung war nicht m&ouml;glich</p>"); mysql_select_db($db_name) or die ("<p>Die Datenbank ist nicht vorhanden</p>");';

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
    if (!fwrite($handle, $var_dbn)) {
        print "Kann in die Datei $filename nicht schreiben";
        exit;
    }

    print "Fertig, in Datei $filename wurde $var_dbn geschrieben";

    fclose($handle);

} else {
    print "Die Datei $filename ist nicht schreibbar";
}
###################
# Basics          #
###################
#Blog Name
$filename = '../core/config/variables.config.php';
$db_name = $_POST["db_name"];
$var_str_dbn = var_export($db_name, true);
$var_dbn = "\n\n\$db_name = $var_str_dbn;\n\n";

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
    if (!fwrite($handle, $var_dbn)) {
        print "Kann in die Datei $filename nicht schreiben";
        exit;
    }

    print "Fertig, in Datei $filename wurde $var_dbn geschrieben";

    fclose($handle);

} else {
    print "Die Datei $filename ist nicht schreibbar";
}
?>

