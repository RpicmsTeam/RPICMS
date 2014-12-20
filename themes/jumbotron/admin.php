<?php 
/**
* Jumbotron Theme for RPICMS
*
* @author Marcel Radzio <info@nordgedanken.de>
* @version  1.0dev 1/12/2014 17:16
*/
###############################
# include files from root dir #
###############################
$root_1 = realpath($_SERVER["DOCUMENT_ROOT"]);
$currentdir = getcwd();
$root_2 = str_replace($root_1, '', $currentdir);
$root_3 = explode("/", $root_2);
if ($root_3[1] == 'core') {
  echo $root_3[1];
  $root = realpath($_SERVER["DOCUMENT_ROOT"]);
}else{
  $root = $root_1 . '/' . $root_3[1];
}
#######################
# flush browser cache #
#######################
header("Cache-Control: no-cache, must-revalidate, no-store");

##########################
# include required files #
##########################
include($root . '/core/config/variables.config.php');

################
# lang support #
################
function getBrowserLangs() {  
  $langs[0] = $langs[1] = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);  
  $langs[0] = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);  
  foreach($langs[0] as $l) {  
    $q = explode(';', $l);  
    $lang = substr($q[0], 0, 2);  
    $q = (isset($q[1])) ? (float)substr($q[1], 2) : 1;  
    $result[$lang] = $q;   
  }  
  if(isset($result) && is_array($result)) {  
    arsort($result, SORT_NUMERIC);    
    return $result;  
  }   
  return $result[$langs[1]] = 1;    
}  
$langs = getBrowserLangs();  
foreach($langs as $prio => $lang) {  
  if($lang = 'de') {  
    include('lang/de-DE.php');  
    break;  
  } elseif($lang = 'en') {  
    include('lang/en-US.php');  
    break;   
  }   
  // AND SO ON .................  
}  
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="icon" href="../../core/libs/theme_engine/BootStrap/favicon.ico">
    <?php
    echo "<title>$blog_name</title>";
    ?>

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
      function Go (select) {
        var wert = select.options[select.options.selectedIndex].value;
        if (wert == "leer") {
          select.form.reset();
          parent.frames["unten"].focus();
          return;
        } else {
          if (wert == "ende") {
            top.location.href = location.href;
          } else {
            location.href = wert;

          } 
        }
      }
    </script>
    <script type="text/javascript">
		function showhide(id) {
    		if (document.getElementById) {
        		var divid = document.getElementById(id);
        		var divs = document.getElementsByClassName("hide_");
        		for (var i = 0; i < divs.length; i++) {
           			divs[i].style.display = "none";
        		}
        		divid.style.display = "block";
    		}
    	return false;
		}
		function foo() {
    		var divid1 = document.getElementById("settings");
    		divid1.style.display = "block";
		}
		onload = foo;
	</script>
	<script type="text/javascript" src="../../core/libs/theme_engine/tinymce/tinymce.min.js"></script>
	<script type="text/javascript">
	tinymce.init({
    	selector: "textarea",
    	plugins: [
        	"advlist autolink lists link image charmap print preview anchor",
        	"searchreplace visualblocks code fullscreen",
        	"insertdatetime media table contextmenu paste"
    	],
    	toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	});
	</script>
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php
          echo '<a class="navbar-brand" href="index.php">'.$blog_name.'</a>';
          ?>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        	<ul class="nav navbar-nav">
        		<li class="active" onclick="showhide('settings');"><a href="#">Settings <span class="sr-only">(current)</span></a></li>
        		<li class="dropdown">
        			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" onclick="showhide('posts');">Posts <span class="caret"></span></a>
        			<ul class="dropdown-menu" role="menu">
        				<li onclick="showhide('newpost');"><a href="#">New Post</a></li>
        			</ul>
        		</li>
        	</ul>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
      	<h1>Administration</h1>
      	<hr class="one">
  		<!-- Tab panes -->
  		<div class="tab-content">
  			<div class="hide_" id="settings">
  				<h2>Settings</h2>
  			</div>

    		<div class="hide_" id="posts">
				<h2>Posts</h2>
			</div>

    		<div class="hide_" id="newpost">
				<h2>New Post</h2>
					<form method="post">
    					<textarea name="content" style="width:100%"></textarea>
					</form>
			</div>
  		</div>
      </div>
    </div>
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <?php
          echo '
            <div class="col-md-4">
              <h2>'.$name_themes.'</h2>
              <form action=".">
                <p><select size="1" name="Auswahl" onchange="Go(this);" width="100%"">
                  <option value="leer" selected="selected">[ bitte auswählen! ]</option>
                  <option value="leer">------------------------</option>
                  <option value="../jumbotron">Jumbotron</option>
                  <option value="../accentbox">Accentbox</option>
                  <option value="../parkzone">ParkZone</option>
                  <option value="../zResponsiv">zResponsiv</option>
                  <option value="ende">Beenden</option>
                </select></p>
              </form>
              <p><a class="btn btn-default" href="#" role="button">'.$name_details.' &raquo;</a></p>
            </div>
            <div class="col-md-4">
              <h2>'.$name_archiv.'</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">'.$name_details.' &raquo;</a></p>
            </div>
            <div class="col-md-4">
              <h2>'.$name_meta.'</h2>
              <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
              <p><a class="btn btn-default" href="#" role="button">'.$name_details.' &raquo;</a></p>
          ';
          ?>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; RpicmsTeam 2014</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../../core/libs/theme_engine/BootStrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../core/libs/theme_engine/BootStrap/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>