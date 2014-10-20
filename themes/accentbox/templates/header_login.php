<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<?php
			include('../../core/config/variables.config.php');	
			echo "<title>$blog_name | $page</title>";
		?>

		<!--iOS/android/handheld specific -->	
		<meta name="viewport" content="width=device-width, initial-scale=1.0">						
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">

		<link rel="stylesheet" type="text/css" media="all" href="css/style.css">

		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<script src="js/modernizr.min.js"></script>
		<script src="js/customscript.js" type="text/javascript"></script>
	
		<style type="text/css">
			#header h1, #header h2 {
				text-indent: -999em;
				min-width:200px; margin-top: 0;
			}
			#header h1 a, #header h2 a{
				background: url(images/logo.png) no-repeat;
				min-width: 200px;
				display: block;
				min-height: 80px;
				line-height: 28px;
			}
			.more a, .bubble a:hover, #commentform input#submit {
				background-color: #79ACCD;
			}
			a, .title a:hover, #navigation ul ul li a:hover, #navigation > ul > li > a:hover {
				color:#79ACCD;
			}
		</style>
<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>!-->
<script type="text/javascript" src="./sha.js"></script>
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
var shaObj = new jsSHA(passwd+username, "TEXT");
var hash = shaObj.getHash("SHA-512", "HEX");
//document.write(hash);
var shaObj1 = new jsSHA(hash+token, "TEXT");
var hash = shaObj1.getHash("SHA-512", "HEX");
//document.write('<br/>');
//document.write(hash);
var anfragestr = './login_handling.php?username='+username+'&token='+token+'&hash='+hash;
self.location.href=anfragestr;
}

</script>
	</head>
