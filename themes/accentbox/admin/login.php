<?php
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
	include('templates/header_login.php');
	include('templates/page_header.php');
?>
<div id="page">
	<div class="content">
		<article class="article">
			<div id="content_box">
			
			<?php
				include('../../../core/admin/user/login.php');	
			?>

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
