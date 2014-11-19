<body onload="document.getElementById('qr_code').style.visibility='hidden'; document.getElementById('secret').style.visibility='hidden';">
<?php
	if (empty($_SERVER['HTTPS'])) {
	    print('<body style="background-color:red;font-size:30px"><div style="color:white"><div style="font-size:240px">Stop</div><p>You wanted do view this site without an SSL encryption. The Secret can be stolen</p><br/><a href="https://raspberrypi/login_sec/secret.php">Here is the SSL Site</a></div></body>');
		die();
	}
	include('./navi.php');
	include('./check_auth.php');
	if (!$authokay) {
		die('not allowed');
	}
	include_once('./GoogleAuthenticator.php');
	$g = new GoogleAuthenticator();
	$verbindung = mysql_connect ("localhost","db_acess", "raspberry") or die ("keine Verbindung möglich. Benutzername oder Passwort sind falsch");
 	mysql_select_db("login_sec") or die("db geht nicht");
 	$user_exist = false;
	$abfrage = "SELECT name,ga_secret FROM user WHERE id = '$authinfo'"; 
	$ergebnis = mysql_query($abfrage);
	while($row = mysql_fetch_object($ergebnis)){
		$user_exist = true;
		$username = $row->name;
		$ga_secret = $row->ga_secret;
	}
	if (!$user_exist) {
		die('user $user not found!');
	}
 	print "this is your secret for the GoogleAuthenticator: <div id='secret' style='visibility:hidden'>$ga_secret</div> \n";
	print("keep it secret!!!!<br/>");
?>
<a href="#" onmousedown="document.getElementById('qr_code').style.visibility='visible'; document.getElementById('secret').style.visibility='visible';" onmouseup="document.getElementById('qr_code').style.visibility='hidden'; document.getElementById('secret').style.visibility='hidden';" onmouseout="document.getElementById('qr_code').style.visibility='hidden'; document.getElementById('secret').style.visibility='hidden';">show QR Code and secret</a><br> 
<br/>
<?php
	print('<img id="qr_code" src="');
	print $g->getURL($username,'loginsec',$ga_secret);
	print('" visibility="hidden" style="visibility:hidden"> ');
	//print('" alt="" visibility="hidden"> ');

?>
</body>