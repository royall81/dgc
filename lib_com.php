<?php

# Declare URIVARS
$uriVars = explode("/", $_SERVER['REQUEST_URI']);
// print_r($uriVars);

# Check url 'PAGE', return 404 in case of no existing page
$aExistingUrls[] = ''; # Home
//$aExistingUrls[] = '404.html';
# Excisting URL'S
$aExistingUrls[] = 'mycorrhiza-mix';
$aExistingUrls[] = 'rhizobac-mix';
$aExistingUrls[] = 'npk-fertilizer';
$aExistingUrls[] = 'contact';
$aExistingUrls[] = 'thanks';
$aExistingUrls[] = 'soil-is-a-living-organism';
$aExistingUrls[] = 'about-us';
$aExistingUrls[] = 'usage';
$aExistingUrls[] = 'user-guide-mycorrhiza-mix';
$aExistingUrls[] = 'user-guide-rhizobac-mix';
$aExistingUrls[] = 'user-guide-rhizobac-caps';
$aExistingUrls[] = 'user-guide-rhizobac-sachets';


if (!empty($uriVars[1]) && !in_array($uriVars[1], $aExistingUrls))   {
     $uriVars[1] = '404';
     header("HTTP/1.0 404 Not Found");
     //header('HTTP/1.0 404 Not Found', true, 404); exit;
}

$page = trim($uriVars[1]);

if (!$page)    {

     $page = 'home';
}
// exit($page);

# Language file
require('./define/define_en.php');



# Afhandeling contact Contactformulier
//include('includes/handle-contact-form.php');
?>
