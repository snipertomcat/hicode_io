<?php
//error_reporting('E_All');
ini_set('display_errors', 1);
// error_reporting(0);
// ini_set('display_errors', 0);
?>
<link id="bootstrapTheme" href="jobs/themes/<?php echo $site_theme; ?>/bootstrap.min.css" rel="stylesheet">
<link href="../fontawesome/css/fontawesome.css" rel="stylesheet">
<link href="../fontawesome/css/fa-solid.css" rel="stylesheet">
<link href="../style.css" rel="stylesheet" type="text/css">
<link href="../favicon.ico" rel="shortcut icon" type="image/x-icon">
<?php 
$head_code = include("ads/head_code.php");
if(isset($head_code) and !empty($head_code) && $head_code !== 1){
echo $head_code; 
} ?>
