<?php
include('header.php');
?>
<style>
p {
  margin-bottom: 0px !important;
}
</style>
<?php       
$trackId = $_GET['trackId'];

$currencyid = $json['affsetting']['currency'];

$url = "https://www.udemy.com/api-2.0/courses/".$trackId."/?fields[course]=title,headline,description,image_480x270,rating,price,url,visible_instructors,created,avg_rating,is_paid,is_private,num_reviews,status_label,image_200_H";


$ch = curl_init();
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
 // $clientID = '1T69TiUXm5gEVciaGGZUrEkz9oSV6BOK33PTt952'; //$json['affsetting']['udy_client_id'];
 // $clientSecret = '2F3uFtJE7olM3hHnXSpx0n3TOqKDzLUQJODTgUeB6vmSiAKDLOJTVXFkWZaVSMxIVAv5U8sToaWBSyIso0MGN1NH8nCDRWdzeSbTNEm6qVP4FbyCyGkrfiQS4eXEywDa'; //$json['affsetting']['udy_secret_id'];
	// $clientID = $json['affsetting']['udy_client_id'];
	// $clientSecret = $json['affsetting']['udy_secret_id'];
 	
$headers = array(
    'Content-Type: application/json',
    'Authorization: Basic '. base64_encode("$clientID:$clientSecret")
    );
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
$result=curl_exec($ch);

curl_close($ch);

$json = json_decode($result, true);
print_r($json);die;
$title = $json['title'];
$description = $json['description'];
$image = $json['image_480x270'];
$price = $json['price'];
$author = $json['visible_instructors'][0]['display_name'];
$rating = $json['rating'];
$userating = $json['num_reviews'];
$status_label = $json['status_label'];
$releasedate = $json['created'];
$release = explode("T", $releasedate);
$buyurl = $json['url'];
$num_reviews = $json['num_reviews'];

$json1 = json_decode($result, true);
// echo "<pre />";
// print_r($json1);
?>

	
	
		<section id="hero_in" class="courses">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span><?php echo $title;?></h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->

<?php		
include('listing-filter.php');
?>

		<div class="bg_color_1">
			
			<div class="container margin_60_35">
				<div class="row">
					<div class="col-lg-8">						
						<section id="description">
							<h2>Description</h2><br />
							 <p><?php echo $description;?></p>
						</section>					
					</div>
					<!-- /col -->
					
					<aside class="col-lg-4" id="sidebar">
						<div class="box_detail">
							<figure>
								<img src="<?php echo $image;?>" alt="" class="img-fluid">
							</figure>
							<div class="price">
                             	<?php 
								if($currencyid != 'USD')
                                {
									$response = json_decode(file_get_contents('https://api.exchangerate-api.com/v4/latest/USD'),true);
											        
									    $inr = explode('$',$price);
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
                                    echo $price;
                                }
									
						        ?>
								<?php// echo $price;?>
							</div>

							 <ul class="list-unstyled">
                                <li>Release Date: <a href="#" class="list-value font-weight-bold"> <?php echo $release[0];?></a></li>
                                <li>User Rating Count: <span class="list-value"><?php echo $userating;?></span></li>
                                <li>Availability: <span class="list-value"> <?php echo $status_label;?></span></li>
                                
                            </ul>

							 <div class="rating-widget">
                                <div class="rating-block">
                                       
                                        <?php for($i=0;$i<$rating;$i++) {?>
                                       <img src="img/star.png" width="20px" height="20px" alt="" class="img-fluid">
                                        <?php } ?>
                                </div>
                            </div><br />


							<a href="https://www.udemy.com<?php echo $buyurl;?>" class="btn_1 full-width" target="_blank">Purchase</a>
							
						
						</div>
					</aside>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->
<?php
//echo $currencyid;
include('onpcourse.php');
                                        
                                        
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-type");

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
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false );
curl_setopt($handle, CURLOPT_POSTFIELDS, 'domain_name='.$domain.'&cat_id='.$cat__id.'&sname='.$sname.'&spage='.$spage.'&cpage='.$cpage.'&bpage='.$bpage.'&skyword='.$skyd2.'&skypage='.$skypage.'&fcat='.$fcat.'');
$output = curl_exec($handle);
curl_close($handle);

$json = json_decode($output, true);                                        
                                        
include('footer.php');
?>