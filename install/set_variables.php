<!--/**
* Set Variable
*
* This script sets the requierd Variables.
*
* @author	Marcel Radzio <info@nordgedanken.de>
* @version	0.2 18/08/2014 18:45
*/-->
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
?>
<html>
<head>
  <title>Installer | Set Variables</title>
	<!-- Bootstrap core CSS -->
	<link href="../core/libs/theme_engine/BootStrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="../themes/jumbotron/jumbotron.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../core/libs/theme_engine/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../core/libs/theme_engine/bootstrap-social/bootstrap-social.min.css">
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
        <a class="navbar-brand" href="index.php">Installer</a>
      </div>
    </div>
  </nav>

  <div class="jumbotron">
    <div class="container">
      <h1>Set Variables</h1>
      <!-- Form to give data to config-generator -->
      <form action="generate_configs.php" method="post" class="form-horizontal">
        <div class="form-group">
          <h3>MySQL</h3>
            <label for="db_address" class="col-sm-2 control-label">Datenbank Adresse:</label>
            <div class="col-sm-10">
              <input type="name" name="db_address" required="required" placeholder="Datenbank Adresse" maxlength="255" class="form-control" id="db_address">
            </div>

            <label for="db_username" class="col-sm-2 control-label">Datenbank Nutzername:</label>
            <div class="col-sm-10">
              <input type="name" name="db_username" required="required" placeholder="Datenbank Nutzername" maxlength="255" class="form-control" id="db_username">
            </div>

            <label for="db_password" class="col-sm-2 control-label">Datenbank Passwort:</label>
            <div class="col-sm-10">
              <input type="password" name="db_password" required="required" placeholder="Datenbank Passwort" maxlength="50" class="form-control" id="db_username">
            </div>

            <label for="db_name" class="col-sm-2 control-label">Datenbank Name:</label>
            <div class="col-sm-10">
              <input type="name" name="db_name" required="required" placeholder="Datenbank Name" maxlength="255" class="form-control" id="db_username">
            </div>
        </div>
        <div class="form-group">
          <h3>Basics</h3>
            <label for="blog_name" class="col-sm-2 control-label">Website Name:</label>
            <div class="col-sm-10">
              <input type="name" name="blog_name" required="required" placeholder="Website Name" maxlength="255" class="form-control" id="blog_name">
            </div>

            <label for="undertitle" class="col-sm-2 control-label">Untertitel:</label>
            <div class="col-sm-10">
              <input type="name" name="undertitle" required="required" placeholder="Untertitel" maxlength="255" class="form-control" id="undertitle">
            </div>

            <label for="keywords" class="col-sm-2 control-label">Schlagw&ouml;rter:</label>
            <div class="col-sm-10">
              <input type="name" name="keywords" placeholder="Schlagw&ouml;rter" maxlength="50" class="form-control" id="keywords">
            </div>

            <label for="admin_username" class="col-sm-2 control-label">Admin Username:</label>
            <div class="col-sm-10">
              <input type="name" name="admin_username" required="required" placeholder="Admin Username" maxlength="255" class="form-control" id="admin_username">
            </div>

            <label for="admin_password" class="col-sm-2 control-label">Admin Password:</label>
            <div class="col-sm-10">
              <input type="password" name="admin_password" required="required" placeholder="Admin Password" maxlength="50" class="form-control" id="admin_password">
            </div>
        </div>
        <div class="form-group">
          <h3>Design</h3>
            <label for="theme" class="col-sm-2 control-label">Theme</label>
            <div class="col-sm-10">
              <select name="theme" class="form-control" id="theme">
                <option>accentbox</option>
                <option>jumbotron</option>
                <option>parkzone</option>
                <option>zResponsive</option>
              </select>
            </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="send" class="btn btn-success">Go On!</button>
          </div>
        </div>
      </form>
    </div>
	</div>
	<div class="container">
		<hr>
		<footer>
			<p>&copy; RpicmsTeam 2014 &amp; 2015</p>
			<?php include($root . '/core/backend/admin/modules/footer.php'); ?>
		</footer>
	</div>
	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="../core/libs/theme_engine/BootStrap/js/bootstrap.min.js"></script>
</body>
</html>
