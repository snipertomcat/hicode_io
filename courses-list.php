<?php
error_reporting(0);
include('header.php');

?>

		<section class="hero_single version_2">
			<div class="wrapper">
				<div class="container">
					<h3>ONLINE COURSE</h3>
					<p>Increase your expertise in Software, Personal Development and Affiliate Marketing Courses </p>
					<form method="GET" action="courses-list.php">
						<div id="custom-search-input">
							<div class="input-group">
								<input type="text" name="searchkey" class=" search-query" placeholder="Ex. Affiliate Marketing" value="<?php echo $_GET['searchkey'];?>">
								<input type="submit" class="btn_search" value="Search">
							</div>
						</div>
					</form>
					<br>
					<span><b>Note :-</b> Only Limited Courses/Gigs/Digital Products Shown On This Page. <br>Kindly Use Our Smart Search Box To Find Any Items You Want</span>
				</div>
			</div>
		</section>
		<!--/hero_in-->

<?php
include('listing-filter.php');
?>

<?php


$cat_type = str_replace(' ', '+', $_GET['searchkey']);


if($cat_type ==""){
	$cat_type ="Affiliate+Marketing";
}
else{
	$cat_type = $cat_type;
}

//echo $currencyid;
$currencyid = $json['affsetting']['currency'];
//echo "<pre>"; print_r($json);
if($_GET['page']){
    $url = "https://www.udemy.com/api-2.0/courses/?search=".$cat_type."&page=".$_GET['page']."&page_size=10";
}
else{
    $url = "https://www.udemy.com/api-2.0/courses/?search=".$cat_type."&page=1&page_size=30";
}


        $ch =   curl_init();
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_URL,$url);
		
		if($json['affsetting']['udy_client_id'] != '')
        {
        	$clientID = $json['affsetting']['udy_client_id'];
	    	$clientSecret = $json['affsetting']['udy_secret_id'];
        }
		else
        {
	    	$clientID = '1T69TiUXm5gEVciaGGZUrEkz9oSV6BOK33PTt952'; //$json['affsetting']['udy_client_id'];
	    	$clientSecret = '2F3uFtJE7olM3hHnXSpx0n3TOqKDzLUQJODTgUeB6vmSiAKDLOJTVXFkWZaVSMxIVAv5U8sToaWBSyIso0MGN1NH8nCDRWdzeSbTNEm6qVP4FbyCyGkrfiQS4eXEywDa'; //$json['affsetting']['udy_secret_id'];
        }
	    $headers = array(
	    'Content-Type: application/json',
	    'Authorization: Basic '. base64_encode("$clientID:$clientSecret")
			);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
	    $result=curl_exec($ch);

	    curl_close($ch);

	    $json = json_decode($result, true);

	    echo "<pre />";
	    //print_r($json);
?>



		<div class="container margin_60_35">
			<div class="row">

<?php
foreach($json['results'] as $results) {

?>  

				<div class="col-xl-4 col-lg-6 col-md-6">
					<div class="box_grid wow">
						<figure class="block-reveal">
							<div class="block-horizzontal"></div>
							<a href="#0" class="wish_bt"></a>
							<a href="course-detail.php?trackId=<?php echo $results['id'];?>&cat_type=<?php echo $cat_type;?>&searchkey=<?php echo str_replace(' ','+',$_GET['searchkey']);?>"><img src="<?php echo $results['image_480x270']; ?>" class="img-fluid" alt=""></a>
							<div class="price">
							
                            <?php 
								if($currencyid != 'USD')
                                {
									$response = json_decode(file_get_contents('https://api.exchangerate-api.com/v4/latest/USD'),true);
											        
									    $inr = explode('$',$results['price']);
                                		$pd = str_replace(",","",$inr['1']);
                                		//$pd = str_replace( ',', '', $str_jsonAry_decoded[$i]['price'] );
                                			// if($currencyid == 'USD')
                                            // {
                                            //     $usd = $pd*$response['rates']['USD'];
                                            // }
                                            if($currencyid == 'CHF')
                                            {
                                                $usd = $pd*$response['rates']['CHF'];
                                            }
                                            if($currencyid == 'EUR')
                                            {
                                                $usd = $pd*$response['rates']['EUR'];
                                            }
                                            if($currencyid == 'KYD')
                                            {
                                                $usd = $pd*$response['rates']['KYD'];
                                            }
                                            if($currencyid == 'GIP')
                                            {
                                                $usd = $pd*$response['rates']['GIP'];
                                            }
                                            if($currencyid == 'GBP')
                                            {
                                                $usd = $pd*$response['rates']['GBP'];
                                            }
                                            if($currencyid == 'JOD')
                                            {
                                                $usd = $pd*$response['rates']['JOD'];
                                            }
                                            if($currencyid == 'OMR')
                                            {
                                                $usd = $pd*$response['rates']['OMR'];
                                            }
                                            if($currencyid == 'BHD')
                                            {
                                                $usd = $pd*$response['rates']['BHD'];
                                            }
                                            if($currencyid == 'KWD')
                                            {
                                                $usd = $pd*$response['rates']['KWD'];
                                            }
                                            if($currencyid == 'INR')
                                            {
                                                $usd = $pd*$response['rates']['INR'];
                                            }
                                		$prc = explode(".",$usd);
                                		echo $currencyid.' '.$prc[0];
                                }
								else
                                {
                                	//echo $json['affsetting']['currency'].' ';
                                    echo $results['price'];
                                }
									
						        ?>
							<?php //echo $results['price'];?></div>
							<div class="preview"><span>Preview course</span></div>
						</figure>
						<div class="wrapper" style="height: 244px;">
							<small><?php echo $cat_type;?></small>							
							<h3><?php echo $results['title'];?> </h3>
							<p><?php echo $results['headline'];?>..</p>
							
						</div>
						<ul style="height:60px;">
							<li><?php echo $str = substr($results['visible_instructors'][0]['display_name'], 0, 20);?></li>
							<li><a href="course-detail.php?trackId=<?php echo $results['id'];?>&cat_type=<?php echo $cat_type;?>&searchkey=<?php echo str_replace(' ','+',$_GET['searchkey']);?>">Enroll now</a></li>
						</ul>
						
					</div>
				</div>
<?php } ?>			
				
			</div>
			<!-- /row -->
<?php                
                
    if($_GET['page']){
                $m=$_GET['page'];
                $page=$_GET['page']; 
    }
    else{
                $m=1;
                $page=1;
    }
?>			
			<nav aria-label="..." class="text-center">
						<ul class="pagination pagination-sm">

						
							<li class="page-item ">
								<a class="page-link" href="courses-list.php?page=<?php echo $m-1;?>&searchkey=<?php echo $_GET['searchkey'];?>" tabindex="-1">Previous</a>
							</li>

							<li class="page-item">
								<a class="page-link" href="courses-list.php?page=<?php echo $m;?>&searchkey=<?php echo $_GET['searchkey'];?>"><?php echo $m;?></a>
							</li>
													
							<li class="page-item">
								<a class="page-link" href="courses-list.php?page=<?php echo $m+1;?>&searchkey=<?php echo $_GET['searchkey'];?>">Next</a>
							</li>
						</ul>
			</nav>

		</div>
		<!-- /container -->
<?php		
header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Headers: Content-type");

ini_set('display_errors', 'off');
ini_set('display_startup_errors', 'off');
error_reporting(E_ALL);

$protocol = isset($_SERVER["HTTPS"]) ? 'https://' : 'http://';
$mainurl = $protocol.$_SERVER['HTTP_HOST'];


$base_url = $_SERVER['HTTP_HOST'];
$domain = $base_url;

$subdomain = explode(".",$base_url);

$domain = $subdomain[0];
//$domain = 'course';
//$domain = 'book';

$cat__id="";
if($_GET['cat_id']) {
$cat__id = $_GET['cat_id'];
}

$sname="";
if($_GET['sname']) {
$sname = $_GET['sname'];
}

$spage="";
if($_GET['spage']) {
$spage = $_GET['spage'];
}

$cpage="";
if($_GET['cpage']) {
$cpage = $_GET['cpage'];
}

$skyd2="";
if($_GET['skyd']) {
$skyd2 = $_GET['skyd'];

}

$fcat ="";
if($_GET['fcat']) {
$fcat = $_GET['fcat'];

}

$skypage="";
if($_GET['skypage']) {
$skypage = $_GET['skypage'];
}

$bpage="";
if($_GET['bpage']) {
$bpage = $_GET['bpage'];
}

$handle = curl_init();
$url = "https://app.sitecoursepro.com/site/homepage1.php";
curl_setopt($handle, CURLOPT_URL, $url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, true );
curl_setopt($handle, CURLOPT_POSTFIELDS, 'domain_name='.$domain.'&cat_id='.$cat__id.'&sname='.$sname.'&spage='.$spage.'&cpage='.$cpage.'&bpage='.$bpage.'&skyword='.$skyd2.'&skypage='.$skypage.'&fcat='.$fcat.'');
$output = curl_exec($handle);
curl_close($handle);

$json = json_decode($output, true);

include('footer.php');
?>