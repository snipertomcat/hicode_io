<?php
$url = 'https://'.$_SERVER['HTTP_HOST'];

define("DIR_PATH", $_SERVER['DOCUMENT_ROOT']);
define("URL_PATH", $url);

include('header.php');
?>

<?php  
$CBname = $json['affsetting']['clbusername'];

$title = str_replace('+',' ',$_GET['title']);
$link = $_GET['lnk'];
$descs = str_replace('+',' ',$_GET['desc']);

$offer_title = $title;
$offer_url = $link;

// $CBname = "softstrem";


			$offer_url_parts = explode('.', $offer_url);
          	$offer_id = strtolower( $offer_url_parts[1] );

          	// clickbank username
          	$cbname = $CBname;

          	$offer_url = str_replace ( 'zzzzz', $cbname, $offer_url );
          	$offer_desc = $descs;

          	
          	$downloader_link = URL_PATH."/clickbankdown.php?wp_automatic=download";

          	//$downloader_link = "http://localhost/sitecourse/clickbankdown.php?wp_automatic=download";

          	curl_setopt ( $ch, CURLOPT_HTTPGET, 1 );
          	curl_setopt ( $ch, CURLOPT_URL, trim ( $downloader_link . '&link=' . str_replace ( 'http:', 'httpz:', $offer_url ) ) );
          	$exec = curl_exec ( $ch );
          	$json = json_decode ( $exec );

          	//print_r($json);

          	$original_link = $json->link;
          	$original_title = $json->title;
          	$ps = $json->text;
          
          	if(is_array($ps))
          	{
            	$offer_desc = '<p>'.implode('</p><p>', $ps).'</p>';
          	}

          	$original_link = str_replace ( "?hop=$cbname", '', $original_link );

          	if (trim ( $original_link ) == '' || trim ( $original_title ) == '') 
          	{
	            //echo '<br>Could not extract original url from hop link, using hop instead';

	            $original_title = $offer_title;

            	if (trim ( $original_link ) == '') {
              		$original_link = $offer_url;
            	}
          	} 
          	else 
          	{

            	$offer_title = $original_title;
          	}

          	$tempo = str_replace ( "http://$cbname", 'zzzz', $original_link );
          	$tempo = str_replace ( "https://$cbname", 'zzzz', $original_link );
          	$tempo = str_replace ( 'http://', '', $tempo );
          	$tempo = str_replace ( 'https://', '', $tempo );
          	$tempo = str_replace ( "?hop=$cbname", '', $tempo );
          
          	$tempo = urlencode ( trim ( $tempo ) );
          	//$wp_amazonpin_tw = get_option ( 'wp_amazonpin_tw', 400 );
            
          	$img = '<img class="img-fluid"  src="https://www.cbtrends.com/images/vendor-pages/'. $offer_id .'-x400-thumb.jpg" />';

          	$title = $offer_title;
		$description = $offer_desc;
		$image = "https://www.cbtrends.com/images/vendor-pages/".$offer_id."-x400-thumb.jpg";
		//$image = $img;
		$buyurl = $offer_url;

		$imgurl = $image;
            	$rand = rand(0,99999);
            	//$img = DIR_PATH.'/images/img'.$rand.'.jpg';
            	$img = DIR_PATH.'/images/img'.$rand.'.jpg';

            	// Save image
            	$ch = curl_init($imgurl);
            	$fp = fopen($img, 'wb');
            	curl_setopt($ch, CURLOPT_FILE, $fp);
            	curl_setopt($ch, CURLOPT_HEADER, 0);
            	curl_exec($ch);
            	curl_close($ch);
            	fclose($fp);

            	//$image_url = URL_PATH.'/images/img'.$rand.'.jpg';

            	$image_url = URL_PATH.'/images/img'.$rand.'.jpg';


            	$content = '<div class="Clickbank">
                                            
                      <p style="text-align:center">
                        <strong>Product Name:</strong> '.$title.'
                      </p>
                      <!--  [ad_1]-->
                      <p style="text-align: center; font-size: 150%;">
                        <strong>
                          <a href="'.$buyurl.'" target="_blank">Click here to get '.$title.' at discounted price while its still available...</a>
                        </strong>
                      </p>

                      <p style="text-align: center; ">
                        <a href="'.$buyurl.'" target="_blank"><img style="display:inline" data-src="ordernow.jpg"></a>
                      </p>

                      <p style="text-align: center; ">
                        <em>All orders are protected by SSL encryption – the highest industry standard for online security from trusted vendors.<br>
                          <img data-src="sg.png" src="sg.png"><br>
                          '.$title.' is backed with a 60 Day No Questions Asked Money Back Guarantee. If within the first 60 days of receipt you are not satisfied with Wake Up Lean™, you can request a refund by sending an email to the address given inside the product and we will immediately refund your entire purchase price, with no questions asked.
                        </em>
                      </p>

                      <!--more-->

                      <p>
                        <strong>Description:</strong>'.$description.'
                      </p>

                      <!--[ad_2] -->
                     
                      <p style="text-align: center; font-size: 150%;">
                        <strong>
                          <a href="'.$buyurl.'" target="_blank">Click here to get '.$title.' at discounted price while its still available...</a>
                        </strong>
                      </p>

                      <p style="text-align: center; ">
                        <a href="'.$buyurl.'" target="_blank"><img style="display:inline" data-src="ordernow.jpg" src="ordernow.jpg"></a>
                      </p>

                      <p style="text-align: center; ">
                        <em>All orders are protected by SSL encryption – the highest industry standard for online security from trusted vendors.<br>
                          <img data-src="sg.png" src="sg.png"><br>
                          '.$title.' is backed with a 60 Day No Questions Asked Money Back Guarantee. If within the first 60 days of receipt you are not satisfied with Wake Up Lean™, you can request a refund by sending an email to the address given inside the product and we will immediately refund your entire purchase price, with no questions asked.
                        </em>
                      </p>
                    </div>';

// *************************************************************************


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
							<h2>Description</h2>
							 <p><?php echo $content ;?></p>
						</section>					
					</div>
					<!-- /col -->
					
					<aside class="col-lg-4" id="sidebar">
						<div class="box_detail">
							<figure>
								<img src="<?php echo $image_url;?>" alt="" class="img-fluid"> 
							</figure>
							<div class="price">
								<?php //echo $price;?>
							</div>

							 <!-- <ul class="list-unstyled">
                                <li>Release Date: <a href="#" class="list-value font-weight-bold"> <?php //echo $release[0];?></a></li>
                                <li>User Rating Count: <span class="list-value"><?php //echo $userating;?></span></li>
                                <li>Availability: <span class="list-value"> <?php //echo $status_label;?></span></li>
                                
                            </ul> -->

							 <div class="rating-widget">
                                <div class="rating-block">
                                       
                                        <?php //for($i=0;$i<$rating;$i++) {?>
                                        <span class="fas fa-star star_on"></span>
                                        <?php //} ?>
                                </div>
                            </div><br />


							<a href="<?php echo $buyurl;?>" class="btn_1 full-width" target="_blank">Purchase</a>
							
						
						</div>
					</aside>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->
         

<?php
    
  include('cpcourse.php');

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
//$domain = 'book';
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
curl_setopt($handle, CURLOPT_POSTFIELDS, 'domain_name='.$domain.'&cat_id='.$cat__id.'&sname='.$sname.'&spage='.$spage.'&cpage='.$cpage.'&bpage='.$bpage.'&skyword='.$skyd2.'&skypage='.$skypage.'');
$output = curl_exec($handle);
curl_close($handle);

$json = json_decode($output, true);

include('footer.php');
?>