<?php
	include('../inc/db_connect.inc.php');
	$query = 'SELECT * FROM posts';	
	$db_command = mysql_query($query);

	while($row = mysql_fetch_object($db_command)){
		echo '</br>';
		echo '</br>';
		echo '<h4>' . $row->title . '</h4>';
		echo '</br>';
		echo '<p>' . $row->text . '</p>';
		echo '</br>';
		echo '</br>';
		echo '<p><i>Erstellt um: ' . $row->time . '</p></i>';
	}
						
	while($row = mysql_fetch_object($db_command)){
		echo '</br>';
		echo '</br>';
		echo '<p><i>Erstellt von: ' . $row->name . '</p></i>';
	}
	if($db_command == 0){
		print ("FEHLER");
	};
