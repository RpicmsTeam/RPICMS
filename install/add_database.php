<?php
	require_once ('../core/inc/db_connect.inc.php');
	$sql = 'CREATE DATABASE '.$db_name;
 
	$result = mysqli_query($connection, $sql)
	or die("Anfrage fehlgeschlagen: " . mysql_error());
									
	$sql = "
		 CREATE TABLE `posts` (
		`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
		`text` TEXT NOT NULL ,
		`title` TEXT NOT NULL ,
		`name` TEXT NOT NULL ,
		`time` DATETIME NOT NULL
		) ENGINE = MYISAM ;
		";
	$result = mysqli_query($connection, $sql)
	or die("Anfrage fehlgeschlagen: " . mysql_error());
	
	echo 'Erstellen erfolgreich';

#Dantenbank auswählbar machen
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

    // Schreibe $somecontent in die geöffnete Datei.
    if (!fwrite($handle, 'mysql_select_db($db_name) or die ("<p>Die Datenbank ist nicht vorhanden</p>");')) {
        print "Kann in die Datei $filename nicht schreiben";
        exit;
    }

    print "Fertig, in Datei $filename wurde $var_dbn geschrieben";

    fclose($handle);

} else {
    print "Die Datei $filename ist nicht schreibbar";
}
?>

