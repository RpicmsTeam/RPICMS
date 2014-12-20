<html>
<head>
    <!-- Bootstrap core CSS -->
    <link href="../../core/libs/theme_engine/BootStrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <script src="../../core/libs/theme_engine/BootStrap/js/bootstrap.min.js"></script>
    <script src="../../core/libs/theme_engine/jquery/jquery-1.11.2.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript">
	function hideElementByVisible(obj) {
		document.getElementById(obj).style.visibility = "hidden";
	}

	function showElementByVisible(obj) {
		document.getElementById(obj).style.visibility = "visible";
	}

	function hideElementByDisplay(obj) {
		document.getElementById(obj).style.display = "none";
	}

	function showElementDisplay(obj) {
		document.getElementById(obj).style.display = "inline";
	}

	function showElementByDisplay(obj,prop) {
		if(prop == "block") {
			document.getElementById(obj).style.display = "block";
		}
		else if(prop == "inline") {
			document.getElementById(obj).style.display = "inline";
		}
	}


</script>
</head>
<body>
<div id="a" style="display:none">1</div>
<div id="b" style="display:none">2</div>
<div id="c" style="display:none">3</div>
<div id="d" style="display:none" >4</div>

<input type="button" value="1" id="w">
<input type="button" value="2" id="x">
<input type="button" value="3" id="y">
<input type="button" value="4" id="z">
</body>
</html>