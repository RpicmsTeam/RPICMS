<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" ></script>
<script type="text/javascript">
	function loadquery(){
		var login_module = "modul_g-plus-login";
    	$('#DisplayDiv').load("../../modules/" + login_module + "/login.php");
    }
</script>
</head>
<body onload="loadquery();">
<div id="DisplayDiv"></div>
</body>