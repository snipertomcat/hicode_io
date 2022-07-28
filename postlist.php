<?php include("header.php");


$str_jsonAry_decoded = $json['total_postlist'];
$str_jsonAry_decoded_rand = $json['total_postlist3'];

$blog_total = $json['total_postlist2'];

$afflink = '';


?>

		<section id="hero_in" class="general">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>Blog Listing</h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->

		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-9">

					<?php
                        
                    for ($i=0 ; $i < count($str_jsonAry_decoded); $i++ ) 
                    {   

                        // if($str_jsonAry_decoded[$i]['arttitle'] != '')
                        // {         
                	?>
					<article class="blog wow fadeIn">
						<div class="row no-gutters">
							<div class="col-lg-7">
								<figure>
									<a href="post.php?post_id=<?php echo $str_jsonAry_decoded[$i]['id'];?>"><img src="<?php echo $str_jsonAry_decoded[$i]['artimg'];?>" alt="">
										<div class="preview"><span>Read more</span></div>
									</a>
								</figure>
							</div>
							<div class="col-lg-5">
								<div class="post_info">
									<small><?php echo $str_jsonAry_decoded[$i]['artdate'];?></small>
									<h3><a href="post.php?post_id=<?php echo $str_jsonAry_decoded[$i]['id'];?>"><?php echo $str_jsonAry_decoded[$i]['arttitle'];?></a></h3>
									<p><?php echo $str_jsonAry_decoded[$i]['artshortcontent'];?>...</p>
									<ul>
										<li>
											<a href="post.php?post_id=<?php echo $str_jsonAry_decoded[$i]['id'];?>"> Read More</a>
										</li>
										<!-- <li><i class="icon_comment_alt"></i> 20</li> -->
									</ul>
								</div>
							</div>
						</div>
					</article>
					<?php   
            			//} 

                    } 

                    if($_GET['bpage'])
                    $m=$_GET['bpage']; 
                    else
                    $m=1;
                	?>
					<!-- /article -->

					

					<nav aria-label="...">
						<ul class="pagination pagination-sm">
							<li class="page-item ">
								<a class="page-link" href="postlist.php?bpage=<?php echo $m-1;?>" tabindex="-1">Previous</a>
							</li>
							<?php 
                             	$blog_count = count($blog_total)/10;                               
                            	for ($i=1 ; $i < $blog_count; $i++ )
                            	{

                        	?>
							<li class="page-item <?php if($bpage == $i){?> active <?php } ?>"><a href="postlist.php?bpage=<?php echo $i;?>" class="page-link"><?php echo $i;?></a></li>
							<?php  } ?>
							<li class="page-item">
								<a class="page-link" href="postlist.php?bpage=<?php echo $m;?>">Next</a>
							</li>
						</ul>
					</nav>
					<!-- /pagination -->
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


<?php include("footer.php");?>