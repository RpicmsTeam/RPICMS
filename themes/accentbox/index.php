<?php
	$page = "Home";
	include('templates/header.php');
	include('templates/page_header.php');
?>
<div id="page">
	<div class="content">
		<article class="article">
			<div id="content_box">
			
				<div class="post excerpt ">
					<header>
					<div class="bubble"><a href="#">4</a></div>
						<h2 class="title">
							<a href="#" rel="bookmark">Porttitor Lectus Tincidunt Elementum Nascetur Montes</a>
						</h2>
						<div class="post-info">
							<span class="theauthor"><a href="#" rel="author">MTS</a></span>
							<time>March 26, 2012</time>
							<span class="thecategory"><a href="#" rel="category tag">Awesomeness</a></span>
						</div>
					</header><!--.header-->
					<div class="post-content image-caption-format-1">
						<a href="#" rel="nofollow" id="featured-thumbnail">
						 
						<div class="featured-thumbnail"><img src="images/2457315858_32ffd98aec_n-150x150.jpg" class="attachment-featured wp-post-image" height="150" width="150"><div>
						</a>
						<?php
							include('../../core/blog/posts.php');
						?>
					</div>
				</div><!--.post excerpt-->
												
				<div class="pnavigation2">
					<div class="nav-previous left"><a href="#"><span class="meta-nav">←</span> Older posts</a></div>
					<div class="nav-next right"></div>
				</div>

			</div>
		</article>
		
<?php
	include('templates/page_navigation.php');
?>
		
	</div><!--#page-->
</div><!--.container-->
<?php
	include('templates/page_footer.php');
?>

</body>
</html>

