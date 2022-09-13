<?php
//error_reporting('E_All');
ini_set('display_errors', 1);
// error_reporting(0);
// ini_set('display_errors', 0);
?>

<?php 
$head_code = include("ads/head_code.php");
if(isset($head_code) and !empty($head_code) && $head_code !== 1){
echo $head_code; 
} ?>
