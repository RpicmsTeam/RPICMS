<html>
	<head>
		<title>login</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>!-->
		<script type="text/javascript" src="../../../../libs/secure/sha.js"></script>
		<script type="text/javascript">
			window.setTimeout("reload_timeout()", 295000);
			function reload_timeout() {
				var token = document.getElementById('token').innerHTML;
				self.location.href='./del_token.php?token='+token;
			}
			function go() {
				var token = document.getElementById('token').innerHTML;
				var username = document.getElementById('username').value;
				var passwd = document.getElementById('passwd').value;
				var ga_token = document.getElementById('ga_token').value;
				var shaObj = new jsSHA(passwd+username, "TEXT");
				var hash = shaObj.getHash("SHA-512", "HEX");
				//document.write(hash);
				var shaObj1 = new jsSHA(hash+token, "TEXT");
				var hash = shaObj1.getHash("SHA-512", "HEX");
				//document.write('<br/>');
				//document.write(hash);
				var anfragestr = './login_handling.php?username='+username+'&token='+token+'&hash='+hash+'&ga_token='+ga_token;
				self.location.href=anfragestr;
			}
		</script>
	</head>
	<body>
		<div id='token' style="display:none">
			<?php
				include('../../../../config/connect.db.inc.php');
				//Check if Database connection established
				if (mysqli_connect_errno()) {
					printf("Verbindung fehlgeschlagen: %s\n", mysqli_connect_error());
					exit();
				}
				$token = hash('sha512',rand().time());
 				$time = time();
 				$eintrag = "INSERT INTO hashtoken(token, time)VALUES('$token', '$time')";
				$eintragen = mysqli_query($connection, $eintrag);
				print($token);
			?>
		</div>
		<?php
			include_once('./navi.php');
		?>
		<h1>Login ohne Klartext-Passwort übertragung</h1>
		Username:
		<br/>
		<input type='text' id='username' name='username'/>
		<br/>
		Passwort:
		<br/>
		<input type="password" id='passwd' name="passwd"/>
		<br/>
		Token:
		<br/>
		<input type="text" id='ga_token' name="ga_token"/>
		<br/>
		<input type='submit' name="go" value="go" onClick='go()'/>
	</body>
</html>