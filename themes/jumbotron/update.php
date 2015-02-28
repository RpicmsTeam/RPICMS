<?php
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

require($root . '/core/config/variables.config.php');
require($root . '/core/update/update/vendor/autoload.php');
require($root . '/core/update/update/update.php');
use \VisualAppeal\AutoUpdate;
#######################
# flush browser cache #
#######################
header("Cache-Control: no-cache, must-revalidate, no-store");

if(isset($_GET['update']) && function_exists($_GET['update'])){
	call_user_func($_GET['update']);
}else{
	echo "Function not found or wrong input";
}

function update(){
global $root, $root_1, $root_2, $root_3;
$update = new AutoUpdate($root . '/temp/', $root . '/', 60);
$update->setCurrentVersion('1.0.0');
$update->setUpdateUrl('http://media.nordgedanken.de/rpicms/server');
$update->setUpdateFile('update.json');
$update->setBranch('stable');

// Optional:
$update->addLogHandler(new Monolog\Handler\StreamHandler($root . '/core/update/update.log'));


include($root . '/core/config/variables.config.php');
include($root . '/core/config/connect.db.inc.php');

if (mysqli_connect_errno()) {
	printf("Verbindung fehlgeschlagen: %s\n", mysqli_connect_error());
	exit();
}
$user = "test";
if ($resultat = $connection->query("SELECT * FROM allowed_user WHERE email LIKE '$user'")) {
	while($daten = $resultat->fetch_object() ){
 		$allowed_user = $daten->email;
	}
}
#if (empty($allowed_user)) {
#	echo "You not logged in!";
#}else{
if($allowed_user == $user){

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
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="../../core/libs/theme_engine/BootStrap/favicon.ico">
    <?php
    echo "<title>$blog_name | Admin</title>";
    ?>

    <!-- Bootstrap core CSS -->
    <link href="../../core/libs/theme_engine/BootStrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="jumbotron.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../core/libs/theme_engine/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../core/libs/theme_engine/bootstrap-social/bootstrap-social.min.css">
    <link href="../../core/libs/theme_engine/BootStrap/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <!--<script src="../../core/libs/theme_engine/jquery/jquery-1.11.2.min.js"></script>-->

    <?php include($root . '/core/backend/admin/modules/html_header.php'); ?>
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->

    <!--[if lt IE 9]><script src="../../core/libs/theme_engine/BootStrap/js/ie8-responsive-file-warning.js"></script><![endif]-->

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
    		if(window.location.hash) {
      			var hash = window.location.hash.substring(1); //Puts hash in variable, and removes the # character
      			var divid1 = document.getElementById(hash);
    			divid1.style.display = "block";
  			} else {
     			var divid1 = document.getElementById("update");
    			divid1.style.display = "block";
  			}
		}
		onload = foo;
	</script>
	<script type="text/javascript" src="../../core/libs/theme_engine/tinymce/tinymce.min.js"></script>
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
        		<li class="dropdown">
        			<a href="admin.php#settings" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Settings</a>
					<ul class="dropdown-menu" role="menu">
        				<li><a href="admin.php#update" class="active">Update <span class="sr-only">(current)</span></a></li>
        			</ul>
        		<li class="dropdown">
        			<a href="admin.php#posts" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Posts <span class="caret"></span></a>
        			<ul class="dropdown-menu" role="menu">
        				<li><a href="admin.php#newpost">New Post</a></li>
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

  			<div class="hide_" id="update">
  				<h2>Updates</h2>
          <?php
          //Check for a new update
          if ($update->checkUpdate() === false)
            die('Could not check for updates! See log file for details.');
          if ($update->newVersionAvailable()) {
            //Install new update
            echo 'New Version: ' . $update->getLatestVersion() . '<br>';
            echo 'Installing Updates: <br>';
            echo '<pre>';
            var_dump(array_map(function($version) {
              return (string) $version;
            }, $update->getVersionsToUpdate()));
            echo '</pre>';
            $result = $update->update();
            if ($result === true) {
              echo 'Update successful<br>';
            } else {
              echo 'Update failed: ' . $result . '!<br>';
              if ($result = AutoUpdate::ERROR_SIMULATE) {
                echo '<pre>';
                var_dump($update->getSimulationResults());
                echo '</pre>';
              }
            }
          } else {
            echo 'Current Version is up to date<br>';
          }
          ?>
          <form action="admin.php">
              <button type="submit" value="Zurück" class="btn btn-danger">Zurück</button>
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
                <p><select size="1" name="Auswahl" onchange="Go(this);" width="100%" class="form-control">
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
        <p>&copy; RpicmsTeam 2014 &amp; 2015</p>
        <?php include($root . '/core/backend/admin/modules/footer.php'); ?>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="../../core/libs/theme_engine/BootStrap/js/bootstrap.min.js"></script>
    <?php include($root . '/core/backend/admin/modules/script_footer.php'); ?>
  </body>
</html>
<?php
}else{
	echo "You not logged in!";
	header('HTTP/1.1 401 Unauthorized', true, 401);
}

}
?>
