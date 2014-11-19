<?php
	/*
	* useable var
	* authokay boolean
	* authinfo Integer/String if (authokay) { the userid } else { the reason because the auth faild}
	*/
	$authokay = false;
	$verbindung = mysql_connect ("localhost","db_acess", "raspberry") or die ("keine Verbindung möglich. Benutzername oder Passwort sind falsch");
	mysql_select_db("login_sec") or die("db geht nicht");
 	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    	$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
    	$ip = $_SERVER['REMOTE_ADDR'];
	}
	$hash=hash('sha512',$_SERVER['HTTP_USER_AGENT'].$ip);
	$abfrage = "SELECT id, hash,vaildtime,userid FROM cookiedata WHERE hash = '$hash'";
	$ergebnis = mysql_query($abfrage);
	while($row = mysql_fetch_object($ergebnis)){
		if ($row->hash == $hash){
			$id_db = $row->id;	
			$expirtaion_time=$row->vaildtime;
			$userid = $row->userid;
		}
   }
	$cookie = hash('sha512',$hash.$userid.$expirtaion_time);
	if ($expirtaion_time< time()) {
		$loeschen = "DELETE FROM acess_data WHERE id = '$id_db'";
		$loesch = mysql_query($loeschen);
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