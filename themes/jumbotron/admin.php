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
require_once($root."/core/backend/admin/modules/modul_normal-login/models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
#######################
# flush browser cache #
#######################
#header("Cache-Control: no-cache, must-revalidate, no-store");

##########################
# include required files #
##########################
include($root . '/core/config/variables.config.php');
include($root . '/core/config/connect.db.inc.php');

if (mysqli_connect_errno()) {
	printf("Verbindung fehlgeschlagen: %s\n", mysqli_connect_error());
	exit();
}

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
<?php
if(!empty($_GET['function'])){
  echo "1";
  if(!empty($_GET['id'])){
    echo "2";
      include($root . '/core/backend/blog/posts.php');
      $get_function = $_GET['function'];
      $get_id = $_GET['id'];
      if($get_function="edit"){
        #header("HTTP/1.1 301 Moved Permanently", true, 301);
        #header( "Location: ../../?file=admin.php#posts" );
      }else{
        echo "function: $get_function";
        echo "id: $get_id";
        deletePost($get_id);
        echo "3";
        #header("HTTP/1.1 301 Moved Permanently", true, 301);
        #header( "Location: ../../?file=admin.php#posts" );
      }
  }
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
    <script src="../../core/libs/theme_engine/jquery/jquery2.1.3.min.js"></script>
    <link href="../../core/libs/theme_engine/BootStrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="jumbotron.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../core/libs/theme_engine/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../core/libs/theme_engine/bootstrap-social/bootstrap-social.min.css">
    <link href="../../core/libs/theme_engine/BootStrap/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">

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
     			var divid1 = document.getElementById("settings");
    			divid1.style.display = "block";
  			}
		}
		onload = foo;
	</script>
  </head>
  <body>
    <nav id="navbar" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header" style="float:left;">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php
          echo '<a class="navbar-brand" href="admin.php" style="float:left;">'.$blog_name.'</a> ';
          ?>
            <ul class="nav navbar-nav" style="float:left;font-size:18px;line-height: 20px;height:50px; padding-top:4px;">
              <li class="dropdown">
                <a href="#settings" class="dropdown-toggle active disabled" data-toggle="dropdown" role="button" aria-expanded="false" onclick="showhide('settings');">Settings <span class="sr-only">(current)</span></a>
                <ul class="dropdown-menu" role="menu">
                  <li onclick="showhide('update');"><a href="#update">Update</a></li>
                </ul>
              </li>
            <li class="dropdown">
              <a href="#modules" class="dropdown-toggle disabled" data-toggle="dropdown" role="button" aria-expanded="false" onclick="showhide('modules');">Modules <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li onclick="showhide('user_configuration');"><a href="#user_configuration">User-Configuration</a></li>
                <!--<li onclick="showhide('usercenter');"><a href="#usercenter">User-Center</a></li>-->
                <li onclick="showhide('user_permissions');"><a href="#user_permissions">User-Permissions</a></li>
                <li onclick="showhide('user_pages');"><a href="#user_pages">User-Pages</a></li>
              </ul>
            </li>
              <li class="dropdown">
                <a href="#posts" class="dropdown-toggle disabled" data-toggle="dropdown" role="button" aria-expanded="false" onclick="showhide('posts');">Posts <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li onclick="showhide('newpost');"><a href="#newpost">New Post</a></li>
                </ul>
              </li>
            </ul>
        </div>
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
  				<?php
          include($root."/themes/jumbotron/admin_pages/settings.php");
          ?>
        </div>

  			<div class="hide_" id="update">
          <?php
          include($root."/themes/jumbotron/admin_pages/updates.php");
          ?>
  			</div>

        <div class="hide_" id="modules">
          <?php
          include($root."/themes/jumbotron/admin_pages/modules.php");
          ?>
        </div>

        <div class="hide_" id="user_configuration">
          <?php
          include($root."/themes/jumbotron/admin_pages/user_configuration.php");
          ?>
        </div>

        <div class="hide_" id="usercenter">
          <?php
          $page_id = $_GET['page_id'];
          if (!empty($page_id)){
            include($root."/themes/jumbotron/admin_pages/usercenter.php");
          }
          ?>
  			</div>

        <div class="hide_" id="user_permissions">
          <?php
          include($root."/themes/jumbotron/admin_pages/user_permissions.php");
          ?>
        </div>

        <div class="hide_" id="user_pages">
          <?php
          include($root."/themes/jumbotron/admin_pages/user_pages.php");
          ?>
        </div>

    		<div class="hide_" id="posts">
          <?php
          include($root."/themes/jumbotron/admin_pages/posts.php");
          ?>
			  </div>

    		<div class="hide_" id="newpost">
          <?php
          include($root."/themes/jumbotron/admin_pages/newpost.php");
          ?>
        </div>
        <div class="hide_" id="newpost2">
          <?php
          echo "<div class=\"alert alert-success\" role=\"alert\">Post successfully created!<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button></div>";
          include($root."/themes/jumbotron/admin_pages/newpost.php");
          ?>
        </div>
  		</div>
      </div>
    </div>
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <?php
        $dirs = scandir($root . "/themes");
        $ausnahmen["1"] = ".htaccess";
        $ausnahmen["2"] = ".";
        $ausnahmen["3"] = "..";
        $dirs = array_diff($dirs, $ausnahmen);
        #var_dump($dirs);
        echo '
          <div class="col-md-4">
            <h2>'.$name_themes.'</h2>
            <form action=".">
              <p><select size="1" name="Auswahl" onchange="Go(this);" width="100%" class="form-control">
                <option value="leer" selected="selected">[ bitte auswählen! ]</option>
                <option value="leer">------------------------</option>';
                foreach($dirs as $dir){
                $dir_name = ucwords($dir);
                echo "
                <option value=\"../$dir\">$dir_name</option>
                ";
                #<option value="../accentbox">Accentbox</option>
                #<option value="../parkzone">ParkZone</option>
                #<option value="../zResponsiv">zResponsiv</option>
              }
            echo '
                <option value="leer">------------------------</option>
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
    <script src="../../core/libs/theme_engine/BootStrap/js/bootstrap.min.js"></script>
    <?php include($root . '/core/backend/admin/modules/script_footer.php'); ?>
  </body>
</html>
