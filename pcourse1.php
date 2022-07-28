<div class="container-fluid margin_120_0">
			<div class="main_title_2">
				<span><em></em></span>
				<h2>Best Courses For You</h2>
				<!-- <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p> -->
			</div>
			<div id="reccomended" class="owl-carousel owl-theme">
				<?php 
					// echo "<pre>";
					//print_r($json['homefiverr']);
					for ($i=0; $i < count($json['homefiverr']); $i++) 
					{ 
				?>
				<div class="item">
					<div class="box_grid">
						<figure>
							<a href="#0" class="wish_bt"></a>
							<a href="fcourse-detail.php?id=<?php echo $json['homefiverr'][$i]['id'];?>">
								<div class="preview"><span>Preview course</span></div><img src="<?php echo $json['homefiverr'][$i]['imgeurl'];?>" class="img-fluid" alt="" style="height: 250px;"></a>
							<div class="price">
                			<?php echo $json['affsetting']['currency'];?> 
                                <?php 
                                    //$response = json_decode(file_get_contents('https://api.exchangerate-api.com/v4/latest/INR'),true);

                                    // $inr = explode('₹',$results['price']);
                                        // $indianprice = str_replace(",","",$inr['1']);
                                      //  $usd = $json['homefiverr'][$i]['price']*$response['rates']['USD'];
                                      //  echo $usd;

                                ?>
                
                			<?php echo $json['homefiverr'][$i]['price'];?></div>

						</figure>
						<div class="wrapper">
							<small><?php echo $json['homefiverr'][$i]['catname'];?></small>
							<h3><?php echo $json['homefiverr'][$i]['title'];?></h3>
							<p><?php echo substr($json['homefiverr'][$i]['shortcontent'], '0', '60');?>...</p>
						</div>
						<ul style="height: 60px;">
							<li><a href="fcourse-detail.php?id=<?php echo $json['homefiverr'][$i]['id'];?>">Enroll now</a></li>
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