<?php
#######################
# flush browser cache #
#######################
header("Cache-Control: no-cache, must-revalidate, no-store");
?>
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
	$('div.buttons').on('click', 'input', function() {
    	var divs = $('div.showThese').children();

    	divs.eq($(this).index()).show().siblings().hide();
	});
</script>
</head>
<body>
<div class="showThese">
    <div id="a" style="display:none">1</div>
    <div id="b" style="display:none">2</div>
    <div id="c" style="display:none">3</div>
    <div id="d" style="display:none" >4</div>
</div>

<div class="buttons">
    <input type="button" value="1" id="w">
    <input type="button" value="2" id="x">
    <input type="button" value="3" id="y">
    <input type="button" value="4" id="z">
</div>
</body>
</html>