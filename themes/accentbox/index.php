<?php
#######################
# flush browser cache #
#######################
header("Cache-Control: no-cache, must-revalidate, no-store");

$error = "0";
$empty = empty($_GET["id"]);
if (!$empty){
  $id = $_GET["id"];
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

	$page = "Home";
	include('templates/header.php');
	include('templates/page_header.php');
?>
<div id="page">
	<div class="content">
		
      		<?php
        		$x = 1;
        		if ($empty){
          			$id = 1;
          			include('../../core/backend/blog/posts.php');
          			while ($x < $post_id_clean+1){
            			include('../../core/config/connect.db.inc.php');
            			echo "
            				<article class='article'>
								<div id='content_box'>
									<div class='post excerpt'>
              							<header>
										<div class='bubble'><a href='#'>4</a></div>
											<h2 class='title'>
           										<a href='index.php?id=$id' rel='bookmark'> $post_title </a>
        									</h2>
											<div class='post-info'>
            									<span class='theauthor'><a href='#' rel='author'>$post_author</a></span>
            									<time>$post_date</time>
            									<span class='thecategory'><a href='#' rel='category tag'>$post_categrory</a></span></br>
            								</div>
										</header>
										<div class='post-content image-caption-format-1'>
											<a href='#' rel='nofollow' id='featured-thumbnail'>
											<div class='featured-thumbnail'><img src='images/2457315858_32ffd98aec_n-150x150.jpg' class='attachment-featured wp-post-image' height='150' width='150'><div>
											</a>
               								$post_text_short
               							</div>
									</div>
           				";
            			$x = $x+1;
            			$id = $id+1;
            			next_id();
          			}
        		}else{
            		include('../../core/backend/blog/posts.php');
        			echo "
        				<article class='article'>
        					<div id='content_box'>
								<div class='post excerpt'>
              						<header>
									<div class='bubble'><a href='#'>4</a></div>
										<h2 class='title'>
                							<a href='index.php?id=$id' rel='bookmark'> $post_title </a>
              							</h2>
										<div class='post-info'>
                							<span class='theauthor'><a href='#' rel='author'>$post_author</a></span>
                  							<time>$post_date</time>
                  							<span class='thecategory'><a href='#' rel='category tag'>$post_categrory</a></span></br>
                						</div>
									</header>
									<div class='post-content image-caption-format-1'>
										<a href='#' rel='nofollow' id='featured-thumbnail'>
										<div class='featured-thumbnail'><img src='images/2457315858_32ffd98aec_n-150x150.jpg' class='attachment-featured wp-post-image' height='150' width='150'><div>
										</a>
                  						$post_text_short
                						</div>
									</div>
           			";
        		}
			?>						
				<div class='pnavigation2'>
					<div class='nav-previous left'><a href='#'><span class='meta-nav'>←</span> Older posts</a></div>
					<div class='nav-next right'></div>
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

