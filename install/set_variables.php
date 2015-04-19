<!--/**
* Set Variable
*
* This script sets the requierd Variables.
*
* @author	Marcel Radzio <info@nordgedanken.de>
* @version	0.2 18/08/2014 18:45
*/-->
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
      <form action="generate_configs.php" method="post">
        <table cellpadding="1" cellspacing="4">
          <h3>MySQL</h3>
          <tr>
            <td><p>Datenbank Adresse: </p></td>
            <td><input type="name" name="db_address" required="required" placeholder="Datenbank Adresse" maxlength="255" /></td>
          </tr>
          <tr>
            <td><p>Nutzername: </p></td>
            <td><input type="name" name="db_username" required="required" placeholder="Nutzername" maxlength="255" /></td>
          </tr>
          <tr>
            <td><p>Passwort: </p></td>
            <td><input type="password" name="db_password" required="required" placeholder="Passwort" maxlength="50" /></td>
          </tr>
          <tr>
            <td><p>Datenbank Name:    </p></td>
            <td><input type="name" name="db_name" required="required" placeholder="Datenbank Name" maxlength="255" /></td>
          </tr>
        </table>

        <h3>Basics</h3>
        <table cellpadding="1" cellspacing="4">
          <tr>
            <td><p>Website Name: </p></td>
            <td style="text-indent:40px;"><input type="name" name="blog_name" required="required" placeholder="Website Name" maxlength="255" /></td>
          </tr>
          <tr>
            <td><p>Untertitel: </p></td>
            <td style="text-indent:40px;"><input type="name" name="undertitle" required="required" placeholder="Untertitel" maxlength="255" /></td>
          </tr>
          <tr>
            <td><p>Schlagw&ouml;rter: </p></td>
            <td style="text-indent:40px;"><input type="name" name="keywords" placeholder="Schlagw&ouml;rter" maxlength="50" /></td>
          </tr>
          <tr>
            <td><p>Admin Username: </p></td>
            <td style="text-indent:40px;"><input type="name" name="admin_username" required="required" placeholder="Admin Username" maxlength="255" /></td>
          </tr>
          <tr>
            <td><p>Admin Password: </p></td>
            <td style="text-indent:40px;"><input type="password" name="admin_password" required="required" placeholder="Admin Password" maxlength="50" /></td>
          </tr>
        </table>

        <h3>Design</h3>
        <table cellpadding="1" cellspacing="4">
          <tr>
            <td><p>Theme</p></td>
            <td style="text-indent:40px;">
              <select name="theme" size="3">
                <option>accentbox</option>
                <option>jumbotron</option>
                <option>parkzone</option>
                <option>zResponsive</option>
              </select>
            </td>
          </tr>
          <tr>
            <td colspan="2"><button type=\"submit\" name=\"send\" class=\"btn btn-success\">Go On!</button></td>
          </tr>
        </table>
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
