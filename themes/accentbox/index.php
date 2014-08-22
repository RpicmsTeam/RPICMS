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
					<?php
						include('../core/inc/db_connect.inc.php');
						include('../core/blog/posts.php');
					?>
					<header>
					<div class="bubble"><a href="#">4</a></div>
						<h2 class="title">
							<?php
								echo "<a href='#' rel='bookmark'> $post_title </a>";
							?>
						</h2>
						<div class="post-info">
							<?php
								echo "<span class='theauthor'><a href='#' rel='author'>$post_author</a></span>";
								echo "<time>$post_date</time>";
								echo "<span class='thecategory'><a href='#' rel='category tag'>$post_categrory</a></span>";
							?>
						</div>
					</header><!--.header-->
					<div class="post-content image-caption-format-1">
						<a href="#" rel="nofollow" id="featured-thumbnail">
						 
						<div class="featured-thumbnail"><img src="images/2457315858_32ffd98aec_n-150x150.jpg" class="attachment-featured wp-post-image" height="150" width="150"><div>
						</a>
						<?php
							echo "$post_text";
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

