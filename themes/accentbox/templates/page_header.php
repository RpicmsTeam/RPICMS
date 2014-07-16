<?php
	include('../../../core/config/variables.config.php');
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
					<ul class="menu"><li class="menu-item"><a href="#">Home</a></li>
						<li class="menu-item"><a href="#">About</a></li>
						<li class="menu-item"><a href="#">Contact Us</a></li>
						<li class="menu-item"><a href="#">Awesomeness</a></li>
						<li class="menu-item"><a href="#">featured</a></li>
						<li class="menu-item"><a href="#">Brochure</a></li>
						<li class="menu-item"><a href="#">Design</a></li>
						<li class="menu-item"><a href="#">Inspiration</a></li>
					</ul>									
					<select>
						<option value="" selected="selected">Go to...</option>
						<option value="#">Home</option>
						<option value="#">About</option>
						<option value="#">Contact Us</option>
						<option value="#">Awesomeness</option>
						<option value="#">featured</option>
						<option value="#">Brochure</option>
						<option value="#">Design</option>
						<option value="#">Inspiration</option>
					</select>
				</nav>
			</div>
		</div>
		

