<?php
error_reporting(0);
include('header.php');

$str_jsonAry_decoded = $json['fsearchkeyword'];
$search_total = $json['fsearchkeyword2'];
//echo "<pre>";
//print_r($json['searchkeyword']);

$searchword= $json['fsearchword'];
?>
	
		<section class="hero_single version_2">
			<div class="wrapper">
				<div class="container">
					<h3>Fiverr Course</h3>
					<p>Increase your expertise in Software, Personal Development and Affiliate Marketing Courses </p>
					<form method="GET" action="fcourses-list.php">
						<div id="custom-search-input">
							<div class="input-group">
								<input type="text" name="fskyd" class=" search-query" placeholder="Ex. Affiliate Marketing" value="<?php echo $searchword;?>">
								<input type="submit" class="btn_search" value="Search">
							</div>
						</div>
					</form><br>
					<span><b>Note :-</b> Only Limited Courses/Gigs/Digital Products Shown On This Page. <br>Kindly Use Our Smart Search Box To Find Any Items You Want</span>
				</div>
			</div>
		</section>
		<!--/hero_in-->

<?php		
include('listing-filter.php');
?>

<?php


// $searchkey = str_replace(' ', '+', $_GET['searchkey']);



?>



		<div class="container margin_60_35">
			<div class="row">

<?php
for ($i=0 ; $i < count($str_jsonAry_decoded); $i++ ) {   

?>  

				<div class="col-xl-4 col-lg-6 col-md-6">
					<div class="box_grid wow">
						<figure class="block-reveal">
							<div class="block-horizzontal"></div>
							<!-- <a href="#0" class="wish_bt"></a> -->
							<a href="fcourse-detail.php?id=<?php echo $str_jsonAry_decoded[$i]['id'];?>&fskyd=<?php echo str_replace(' ','+',$searchword);?>"><img src="<?php echo $str_jsonAry_decoded[$i]['imgeurl'];?>" class="img-fluid" alt="" style="height:235px;"></a>
							<div class="price">
							<?php 
								$currencyid = $json['affsetting']['currency'];

							?> 
							<?php 
								if($str_jsonAry_decoded[$i]['uflag'] != 'fe')
                                {
									$response = json_decode(file_get_contents('https://api.exchangerate-api.com/v4/latest/INR'),true);
											        
									// $inr = explode('₹',$results['price']);
                                		// $indianprice = str_replace(",","",$inr['1']);
                                		$pd = str_replace( ',', '', $str_jsonAry_decoded[$i]['price'] );
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
                                		$prc = explode(".",$usd);
                                		echo $currencyid.' '.$prc[0];
                                }
								else
                                {
                                	// echo $json['affsetting']['currency'].' ';
                                	// echo str_replace( ',', '', $str_jsonAry_decoded[$i]['price'] );
                                	$response = json_decode(file_get_contents('https://api.exchangerate-api.com/v4/latest/USD'),true);
                                		$pd = str_replace( ',', '', $str_jsonAry_decoded[$i]['price'] );
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
							<?php //echo $str_jsonAry_decoded[$i]['price'];?></div>
							<div class="preview"><span>Preview course</span></div>
						</figure>
						<div class="wrapper" style="height: 170px;">
							<small><?php //echo $cat_type;?></small>							
							<h3><?php echo $str_jsonAry_decoded[$i]['titles'];?> </h3>
							<p><?php echo substr($str_jsonAry_decoded[$i]['shortcontent'],0,150);?>..</p>
							
						</div>
						<ul style="height:60px;">
							<li><?php //echo $json['affsetting']['currency'];?> 
							
							<?php 
                                if($str_jsonAry_decoded[$i]['uflag'] != 'fe')
                                {
									$response = json_decode(file_get_contents('https://api.exchangerate-api.com/v4/latest/INR'),true);
											        
									// $inr = explode('₹',$results['price']);
                                		// $indianprice = str_replace(",","",$inr['1']);
                                		$pd = str_replace( ',', '', $str_jsonAry_decoded[$i]['price'] );
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
                                		$prc = explode(".",$usd);
                                		echo $currencyid.' '.$prc[0];
                                }
								else
                                {
                                	// echo $json['affsetting']['currency'].' ';
                                	// echo str_replace( ',', '', $str_jsonAry_decoded[$i]['price'] );
                                	$response = json_decode(file_get_contents('https://api.exchangerate-api.com/v4/latest/USD'),true);
                                		$pd = str_replace( ',', '', $str_jsonAry_decoded[$i]['price'] );
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

							?></li>
							<li><a href="fcourse-detail.php?id=<?php echo $str_jsonAry_decoded[$i]['id'];?>&fskyd=<?php echo str_replace(' ','+',$searchword);?>">Enroll now</a></li>
						</ul>
						
					</div>
				</div>
<?php } ?>			
				
			</div>
			<!-- /row -->
<?php                
                
    if($_GET['fskypage'])
                        $m=$_GET['fskypage']; 
                        else
                        $m=1;
?>			
			<nav aria-label="..." class="text-center">
						<ul class="pagination pagination-sm">

						
							<li class="page-item ">
								<a class="page-link" href="fcourses-list.php?fskyd=<?php echo str_replace(' ','+',$_GET['fskyd']);?>&fskypage=<?php echo $m-1;?>" tabindex="-1">Previous</a>
							</li>

							<li class="page-item">
								<a class="page-link" href="fcourses-list.php?fskypage=<?php echo $m;?>&fskyd=<?php echo str_replace(' ','+',$_GET['fskyd']);?>"><?php echo $m;?></a>
							</li>
													
							<li class="page-item">
								<a class="page-link" href="fcourses-list.php?fskyd=<?php echo str_replace(' ','+',$_GET['fskyd']);?>&fskypage=<?php echo $m+1;?>">Next</a>
							</li>
						</ul>
			</nav>

		</div>
		<!-- /container -->
<?php		
	// footer
include('footer.php');
?>