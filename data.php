<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-type");

ini_set('display_errors', 'off');
ini_set('display_startup_errors', 'off');
error_reporting(E_ALL);
//print_r($_POST['email'],$_POST['webid'],$_POST['uid']);


$email = $_POST['email'];
$webid = $_POST['webid'];
$uid = $_POST['uid'];

if($email != '')
{
	$handle = curl_init();
	$url = "https://app.sitecoursepro.com/site/subscribeuser.php";
	curl_setopt($handle, CURLOPT_URL, $url);
	curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'POST');
	curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false );
	curl_setopt($handle, CURLOPT_POSTFIELDS, 'email='.$email.'&webid='.$webid.'&uid='.$uid.'');
	$output = curl_exec($handle);
	curl_close($handle);
}


// $json = json_decode($output, true);
// print_r($json);exit();
// sleep(2);
//$base_url = $_SERVER['HTTP_HOST'];
header('Location: index.php');
// return "<script>$('button#submitApprove').on('click', function(event) {
   
//     event.preventDefault();
//     $('#subscribe_modal').modal( 'hide' );
//    }); </script>";
?>