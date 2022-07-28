<?php
                            
                $str_jsonAry_decoded = $json['searchkeyword'];
				$search_total = $json['searchkeyword2'];


				$searchword= $json['searchword'];

?>
<div class="container-fluid margin_120_0">
			<div class="main_title_2">
				<span><em></em></span>
				<h2>Popular Gig Jobs For You</h2>
				<!-- <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p> -->
			</div>
			<div id="reccomended" class="owl-carousel owl-theme">
				<?php 
					// echo "<pre>";
					//print_r($json['homefiverr']);
					for ($i=0 ; $i < count($str_jsonAry_decoded); $i++ ) { 
					
				?>
				<div class="item">
					<div class="box_grid">
						<figure>
							<a href="#0" class="wish_bt"></a>
							<a href="fgcourse-detail.php?id=<?php echo $str_jsonAry_decoded[$i]['id'];?>&skyd=<?php echo str_replace(' ','+',$searchword);?>">
								<div class="preview"><span>Preview course</span></div><img src="<?php echo $str_jsonAry_decoded[$i]['imgeurl'];?>" class="img-fluid" alt="" style="height: 250px;"></a>
							<div class="price">
                			<?php $currencyid = $json['affsetting']['currency'];?> 
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
                                                $usd = $pd;
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

						</figure>
						<div class="wrapper">
							<small><?php echo $str_jsonAry_decoded[$i]['catname'];?></small>
							<h3><?php echo $str_jsonAry_decoded[$i]['titles'];?> </h3>
							<p><?php echo substr($str_jsonAry_decoded[$i]['shortcontent'], '0', '60');?>...</p>
						</div>
						<ul style="height: 60px;">
							<li><a href="fgcourse-detail.php?id=<?php echo $str_jsonAry_decoded[$i]['id'];?>&skyd=<?php echo str_replace(' ','+',$searchword);?>">Enroll now</a></li>
						</ul>
					</div>
				</div>
				<?php 
					}
				?>
				
			</div>
			<!-- /carousel -->
			<!-- <div class="container">
				<p class="btn_home_align"><a href="courses-grid.html" class="btn_1 rounded">View all courses</a></p>
			</div> -->
			<!-- /container -->
			<hr>
		</div>
		<!-- /container -->