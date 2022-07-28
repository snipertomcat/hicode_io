<?php  $str_jsonAry_decoded_rand = $json['total_postlist3']; ?>
		<div class="bg_color_1">
			<div class="container margin_120_95">
				<div class="main_title_2">
					<span><em></em></span>
					<h2>Blogs</h2>
					<!-- <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p> -->
				</div>
				<div class="row">
					<?php
                        
                        for ($i=0 ; $i < 4; $i++ ) 
                        {   
                            if($str_jsonAry_decoded_rand[$i]['id'] != '')
                            {
                    ?>
					<div class="col-lg-6">
						<a class="box_news" href="post.php?post_id=<?php echo $str_jsonAry_decoded_rand[$i]['id'];?>">
							<figure><img src="<?php echo $str_jsonAry_decoded_rand[$i]['artimg'];?>" alt="">
								
							</figure>
							<ul>
								
								<li><?php echo $str_jsonAry_decoded_rand[$i]['artdate'];?></li>
							</ul>
							<h4><?php echo substr($str_jsonAry_decoded_rand[$i]['arttitle'],0,40);?>...</h4>
							<p><?php echo substr($str_jsonAry_decoded_rand[$i]['artshortcontent'],0,80);?>..</p>

						</a>
					</div>
					<?php  
                            }
                        }   

                     ?>
				</div>
				<!-- /row -->
				<p class="btn_home_align"><a href="postlist.php" class="btn_1 rounded">View all Blogs</a></p>
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->