<?php
	//<body onload="document.getElementById('qr_code').style.visibility='hidden'; document.getElementById('secret').style.visibility='hidden';">

	include_once('./navi.php');
	if (isset($_POST['go'])) {
		include_once('./GoogleAuthenticator.php');
		$g = new GoogleAuthenticator();
		$ga_secret = $g->generateSecret();
		$username = $_POST['username'];
		$passwdhash = hash('sha512',$_POST['passwd'].$username);
		$verbindung = mysql_connect ("localhost","db_acess", "raspberry") or die ("keine Verbindung möglich. Benutzername oder Passwort sind falsch");
		mysql_select_db("login_sec") or die("db geht nicht");
 		$eintrag = "INSERT INTO user(name, passwdhash, ga_secret)VALUES('$username', '$passwdhash', '$ga_secret')";
		$eintragen = mysql_query($eintrag);
		print("registiert<br/>");
		//*
		print "this is your secret for the GoogleAuthenticator: <div id='secret' style='visibility:hidden'>$ga_secret</div> \n";
		print("keep it secret!!!!<br/>");
		//*/
		//include('./secret.php');
?>
		<a href="#" onmousedown="document.getElementById('qr_code').style.visibility='visible'; document.getElementById('secret').style.visibility='visible';" onmouseup="document.getElementById('qr_code').style.visibility='hidden'; document.getElementById('secret').style.visibility='hidden';" onmouseout="document.getElementById('qr_code').style.visibility='hidden'; document.getElementById('secret').style.visibility='hidden';">show QR Code and secret</a><br> 
		<br/>
<?php
		//*
		print('<img id="qr_code" src="');
		print $g->getURL($username,'loginsec',$ga_secret);
		print('" style="visibility:hidden"> ');
		//print('" alt="" visibility="hidden"> ');
		//*/
	}
?>
