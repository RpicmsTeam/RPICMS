<?php
#######################
# flush browser cache #
#######################
header("Cache-Control: no-cache, must-revalidate, no-store");
?>
<!DOCTYPE html>
<html>
<head>
    <script src="../../core/libs/theme_engine/jquery/jquery-1.11.2.min.js"></script>

<script type="text/javascript">
	function showhide(id){
        if (document.getElementById) {
          var divid = document.getElementById(id);
          var divs = document.getElementsByClassName("hide");
          for(var i=0;i<divs.length;i++) {
            divs[i].style.display = "none";
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
.hide {
    display:none;
}
</style>
</head>
<body>
<div onclick="showhide('bill');" class="bio_image"><div class="name">Bill Murray</div></div>
<div onclick="showhide('bill2');" class="bio_image"><div class="name">Bill Murray</div></div>
<div onclick="showhide('bill3');" class="bio_image"><div class="name">Bill Murray</div></div>
<div class="hide" id="bill">BILL</div>
<div class="hide" id="bill2">BILL2</div>
<div class="hide" id="bill3">BILL3</div>
</body>
</html>