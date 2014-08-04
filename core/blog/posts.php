<?php
	include('../inc/db_connect.inc.php');
	#$query = 'SELECT * FROM posts';	
	#$db_command = mysqli_query($query);

	/*while($row = mysqli_fetch_object($db_command)){
		echo '</br>';
		echo '</br>';
		echo '<h4>' . $row->title . '</h4>';
		echo '</br>';
		echo '<p>' . $row->text . '</p>';
		echo '</br>';
		echo '</br>';
		echo '<p><i>Erstellt um: ' . $row->time . '</p></i>';
	}
						
	while($row = mysqli_fetch_object($db_command)){
		echo '</br>';
		echo '</br>';
		echo '<p><i>Erstellt von: ' . $row->name . '</p></i>';
	}*/



	if ($resultat = $db->query('SELECT * FROM posts')) {
  		// Antwort der Datenbank in ein Objekt übergeben und
  		// mithilfe der while-Schleife durchlaufen
 		 while($daten = $resultat->fetch_object() ){
    				echo '</br>';
				echo '</br>';
				echo '<h4>' . $daten->title . '</h4>';
				echo '</br>';
				echo '<p>' . $daten->text . '</p>';
				echo '</br>';
				echo '</br>';
				echo '<p><i>Erstellt um: ' . $daten->time . '</p></i>';
  			}  
  		// Speicher freigeben
  		$resultat->close();
	} else {
  		// Sollten keine Datensätze enthalten sein, diese Meldung ausgeben
  		echo "Es konnten keine Daten aus der Datenbank ausgelesen werden";
	}

// Verbindung zum Datenbankserver beenden
$db->close();

	if($db_command == 0){
		print ("FEHLER");
	};
