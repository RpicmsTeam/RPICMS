<?php
#######################
# flush browser cache #
#######################
header("Cache-Control: no-cache, must-revalidate, no-store");
?>
<!DOCTYPE html>
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
	function showhide(id){
        if (document.getElementById) {
          var divid = document.getElementById(id);
          var divs = document.getElementsByClassName("hide_");
          for(var i=0;i<divs.length;i++) {
            divs[i].style.display = "none";
            divs[1].style.display = "block";
          }
          divid.style.display = "block";
        } 
        return false;
 	}
</script>
<style type="text/css">
.bio_image {
    display:inline-block;
    height:250px;
    width:250px;
    background:url('http://www.fillmurray.com/250/250');
    cursor:pointer;
}
.hide_ {
    display:none;
}
</style>
</head>
<body>
<div onclick="showhide('bill');" class="bio_image"><div class="name">Bill Murray</div></div>
<div onclick="showhide('bill2');" class="bio_image"><div class="name">Bill Murray</div></div>
<div onclick="showhide('bill3');" class="bio_image"><div class="name">Bill Murray</div></div>
<div class="hide_" id="bill">BILL</div>
<div class="hide_" id="bill2">BILL2</div>
<div class="hide_" id="bill3">BILL3</div>
</body>
</html>