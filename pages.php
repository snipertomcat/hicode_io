<?php
include('header.php');

$page_id = $_GET['page_id'];
$handle3 = curl_init();
$url = "https://app.sitecoursepro.com/site/page.php";
curl_setopt($handle3, CURLOPT_URL, $url);
curl_setopt($handle3, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle3, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($handle3, CURLOPT_SSL_VERIFYPEER, false );
curl_setopt($handle3, CURLOPT_POSTFIELDS, 'page_id='.$page_id.'');
$output3 = curl_exec($handle3);
curl_close($handle3);

$json3 = json_decode($output3, true);

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// Random 
$str_jsonAry_decoded_rand = $json['total_postlist3'];


$afflink = '';
?>


<section id="hero_in" class="general">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span><?php echo $json3['pages']['pagename'];?></h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->

		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-9">
					<div class="bloglist singlepost">
						<?php
                            if($json3['pages']['pageimg'] != '') {                                                    
                        ?>
						<p><img alt="" class="img-fluid" src="<?php echo $json3['pages']['pageimg'];?>"></p>
						<?php } ?>
						<h1><?php echo $json3['pages']['pagename'];?></h1>
						<div class="postmeta">
							<ul>
								<!-- <li><a href="#"><i class="icon_folder-alt"></i> Collections</a></li> -->
								<!-- <li><a href="#"><i class="icon_clock_alt"></i> <?php //echo $json3['post']['artdate'];?></a></li> -->
								<!-- <li><a href="#"><i class="icon_pencil-edit"></i> Admin</a></li>
								<li><a href="#"><i class="icon_comment_alt"></i> (14) Comments</a></li> -->
							</ul>
						</div>
						<!-- /post meta -->
						<div class="post-content">
							<p><?php echo $json3['pages']['pagecontent'];?></p>
							<?php
                                if($insidebobybanner != '') {                                                    
                            ?>
                                <p>
                                    <?php echo $insidebobybanner;?>
                                </p>
                            <?php } ?>
                            <p>
                            	<div class="social-links  justify-content-center  mt--10">
		                            <div class="social">
		                            <div class="a2a_kit a2a_kit_size_32 a2a_default_style "  data-a2a-url="<?php echo $actual_link; ?>" data-a2a-title="<?php echo $json3['pages']['pagename'];?>">
		                            <a class="a2a_button_facebook"></a>
		                            <a class="a2a_button_twitter"></a>
		                            <a class="a2a_button_pinterest"></a>
		                            <a class="a2a_button_email"></a>
		                            <a class="a2a_button_linkedin"></a>
		                            <a class="a2a_button_whatsapp"></a>
		                            <a class="a2a_button_google_gmail"></a>
		                            <a class="a2a_button_facebook_messenger"></a>
		                            <a class="a2a_button_skype"></a>
		                            <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
		                            </div>

		                            <script async src="https://static.addtoany.com/menu/page.js"></script>
		                            
		                            </div>
		                        </div>
                            </p>
						</div>
						<!-- /post -->
					</div>
					<!-- /single-post -->

					
					<?php
                    	if($fb_comment_code != '') {                                                    
                    ?>
                    	<div id="comments">
                            <p>
                                <?php echo $fb_comment_code;?>
                            </p>
                        </div>
                    <?php } ?>
					

					<hr>

					
				</div>
				<!-- /col -->

				<aside class="col-lg-3">
					<!-- <div class="widget">
						<form>
							<div class="form-group">
								<input type="text" name="search" id="search" class="form-control" placeholder="Search...">
							</div>
							<button type="submit" id="submit" class="btn_1 rounded"> Search</button>
						</form>
					</div> -->
					<!-- /widget -->
					<div class="widget">
						<div class="widget-title">
							<h4>Recent Posts</h4>
						</div>
						<ul class="comments-list">
							<?php
                        
                                for ($i=0 ; $i < 10; $i++ ) 
                                {   
                                    if($str_jsonAry_decoded_rand[$i]['id'] != '')
                                    {
                            ?>		
                            		<li>
										<div class="alignleft">
											<a href="post.php?post_id=<?php echo $str_jsonAry_decoded_rand[$i]['id'];?>"><img src="<?php echo $str_jsonAry_decoded_rand[$i]['artimg'];?>" alt=""></a>
										</div>
										<small><?php echo $str_jsonAry_decoded_rand[$i]['artdate'];?></small>
										<h3><a href="post.php?post_id=<?php echo $str_jsonAry_decoded_rand[$i]['id'];?>" title=""><?php echo $str_jsonAry_decoded_rand[$i]['arttitle'];?></a></h3>
									</li>
                            		
                            <?php  
                                    }
                                }   

                             ?>
						</ul>
					</div>
					<!-- /widget -->
					<?php
                        if($sidebanner != '') {                                                    
                    ?>
                    <div class="widget">
						<div class="widget-title">
							<!-- <h4>Side Banner</h4> -->
						</div>
                         <?php echo $sidebanner;?>
                    </div>
                    <?php } ?>

                    <?php
                        if($json['frontend']['optin_code'] != '') {                                                    
                    ?>
                    <div class="widget">
						<div class="widget-title">
							<h4>News Lettrer</h4>
						</div>
                         <?php echo $json['frontend']['optin_code'];?>
                    </div>
                    <?php } ?>
					<!-- <div class="widget">
						<div class="widget-title">
							<h4>Blog Categories</h4>
						</div>
						<ul class="cats">
							<li><a href="#">Admissions <span>(12)</span></a></li>
							<li><a href="#">News <span>(21)</span></a></li>
							<li><a href="#">Events <span>(44)</span></a></li>
							<li><a href="#">Focus in the lab <span>(31)</span></a></li>
						</ul>
					</div> -->
					<!-- /widget -->
					<!-- <div class="widget">
						<div class="widget-title">
							<h4>Popular Tags</h4>
						</div>
						<div class="tags">
							<a href="#">Information tecnology</a>
							<a href="#">Students</a>
							<a href="#">Community</a>
							<a href="#">Carreers</a>
							<a href="#">Literature</a>
							<a href="#">Seminars</a>
						</div>
					</div> -->
					<!-- /widget -->
				</aside>
				<!-- /aside -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->


<?php 
include('footer.php');
?>