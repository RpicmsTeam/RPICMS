<?php
	include('../../core/config/variables.config.php');
?>	
	<body>
		<header class="main-header">
			<div class="container">
				<div id="header">
					<h1 id="logo">
						<?php 
							echo "<a href='#' title='$blog_name'>$blog_name</a>";
						?>
					</h1><!-- END #logo -->
					<div class="widget-area widget-header">
						<ul>
							<div class="textwidget">
							</div>
						</ul>
					</div>				
				</div><!--#header-->
			</div><!--.container-->
		</header>
		
		<div class="container">
			<div class="secondary-navigation">
				<nav id="navigation">
					<ul class="menu">
						<li class="menu-item"><a href="index.php">Home</a></li>
						<?php echo "<li class='menu-item'><a href='#'>$name_contact</a></li>"; ?>
					</ul>									
					<select>
						<option value="" selected="selected">Go to...</option>
						<option value="#">Home</option>
						<?php echo "<option value='#'>$name_contact</option>"; ?>
					</select>
				</nav>
			</div>
		</div>
		

