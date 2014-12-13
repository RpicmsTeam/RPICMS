<?php
#######################
# flush browser cache #
#######################
header("Cache-Control: no-cache, must-revalidate, no-store");
$root_1 = realpath($_SERVER["DOCUMENT_ROOT"]);
$currentdir = getcwd();
$root_2 = str_replace($root_1, '', $currentdir);
echo $root_2;
#$root_3 = preg_match('~/(.*?)]/~', $root_2, $root);
preg_match_all("//(?:/)*)/s", $root_2, $root); 
echo " x ";
print_r($root);
include('/core/config/variables.config.php');

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