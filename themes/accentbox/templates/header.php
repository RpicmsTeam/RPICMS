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

		<script src="js/modernizr.js"></script>
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

	</head>
