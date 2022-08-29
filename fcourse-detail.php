<?php
include('header.php');

$fiverr = 487042;



/*$post_id = $_GET['id'];
$handle3 = curl_init();
$url = "https://app.sitecoursepro.com/site/fullfiverr.php";
*/
curl_setopt($handle3, CURLOPT_URL, $url);
curl_setopt($handle3, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle3, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($handle3, CURLOPT_SSL_VERIFYPEER, false );
curl_setopt($handle3, CURLOPT_POSTFIELDS, 'id='.$post_id.'');
$output3 = curl_exec($handle3);
//print_r($output3);die;
curl_close($handle3);

$json3 = json_decode($output3, true);


$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//print_r($actual_link);die;
// Random 
//$str_jsonAry_decoded_rand = $json['total_postlist3'];


$afflink = '';
?>

<?php       

$title = $json3['post']['title'];
$description = $json3['post']['fullcontent'];
$image = $json3['post']['imgeurl'];
$price = str_replace( ',', '', $json3['post']['price'] );
$buyurl = $json3['post']['purchaseurl'];





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
							<h2>Description</h2>
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
							 <?php $currencyid = $json['affsetting']['currency'];?>	
                             
                             <?php 
                             	if($json3['post']['uflag'] != 'fe')
                                {
								$response = json_decode(file_get_contents('https://api.exchangerate-api.com/v4/latest/INR'),true);
											        
								// $inr = explode('₹',$results['price']);
                                                    		// $indianprice = str_replace(",","",$inr['1']);
                                			$pd = $price;
                                            if($currencyid == 'USD')
                                            {
                                                $usd = $pd*$response['rates']['USD'];
                                            }
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
                                                    		//echo $usd;
                                							$prc = explode(".",$usd);
                                							echo $currencyid.' '.$prc[0];
                                }
								else
                                {	
									// echo $json['affsetting']['currency'].' ';
									// echo $price;
                                
                                	$response = json_decode(file_get_contents('https://api.exchangerate-api.com/v4/latest/USD'),true);
                                		$pd = $price;
                                		if($currencyid == 'USD')
                                            {
                                                $usd = $pd;
                                            }
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
				
											        ?>
                             <?php //echo $price;?>
							</div>

							 <!-- <ul class="list-unstyled">
                                <li>Release Date: <a href="#" class="list-value font-weight-bold"> <?php echo $release[0];?></a></li>
                                <li>User Rating Count: <span class="list-value"><?php echo $userating;?></span></li>
                                <li>Availability: <span class="list-value"> <?php echo $status_label;?></span></li>
                                
                            </ul> -->

							 <!-- <div class="rating-widget">
                                <div class="rating-block">
                                       
                                        <?php for($i=0;$i<$rating;$i++) {?>
                                        <span class="fas fa-star star_on"></span>
                                        <?php } ?>
                                </div>
                            </div><br /> -->

							<?php if($json3['post']['uid'] == '0'){ ?>
							<a href="https://go.fiverr.com/visit/?bta=<?php echo $fiverr;?>&brand=fiverrcpa&landingPage=<?php echo urlencode($buyurl);?>" class="btn_1 full-width" target="_blank">Purchase</a>
							<?php }if($json3['post']['uid'] != '0'){ ?>
							<a href="<?php echo $buyurl;?>" class="btn_1 full-width" target="_blank">Purchase</a>
                            <?php }?>
						</div>
					</aside>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->
        <?php
		
				include('fpcourse.php');
			?>
<?php
include('footer.php');
?>