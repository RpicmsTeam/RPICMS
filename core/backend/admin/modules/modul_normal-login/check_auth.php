<?php
	/*
	* useable var
	* authokay boolean
	* authinfo Integer/String if (authokay) { the userid } else { the reason because the auth faild}
	*/
	###############################
	# include files from root dir #
	###############################
	$root_1 = realpath($_SERVER["DOCUMENT_ROOT"]);
	$currentdir = getcwd();
	$root_2 = str_replace($root_1, '', $currentdir);
	$root_3 = explode("/", $root_2);
	if ($root_3[1] == 'core') {
	  $root = realpath($_SERVER["DOCUMENT_ROOT"]);
	}else{
	  $root = $root_1 . '/' . $root_3[1];
	}
	$authokay = false;
	include($root . '/core/config/connect.db.inc.php');
	//Check if Database connection established
	if (mysqli_connect_errno()) {
		printf("Verbindung fehlgeschlagen: %s\n", mysqli_connect_error());
		exit();
	}

 	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    	$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
    	$ip = $_SERVER['REMOTE_ADDR'];
	}
	$hash=hash('sha512',$_SERVER['HTTP_USER_AGENT'].$ip);
	$abfrage = "SELECT id, hash,vaildtime,userid FROM cookiedata WHERE hash = '$hash'";
	$ergebnis = mysqli_query($connection, $abfrage);
	while($row = mysqli_fetch_object($ergebnis)){
		if ($row->hash == $hash){
			$id_db = $row->id;	
			$expirtaion_time=$row->vaildtime;
			$userid = $row->userid;
		}
   }
	$cookie = hash('sha512',$hash.$userid.$expirtaion_time);
	if ($expirtaion_time< time()) {
		$loeschen = "DELETE FROM acess_data WHERE id = '$id_db'";
		$loesch = mysqli_query($connection, $loeschen);
		$authinfo = 'cookie timeout';
	}else{
		if ($_COOKIE["acess"] == $cookie) {
			$authokay = true;
			$authinfo = $userid;
		} else {
			$authinfo = 'wrong cookie';
		}
	}
?>