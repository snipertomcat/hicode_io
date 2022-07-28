</main>
	<!-- /main -->

	<footer>
		<div class="container margin_120_95">
			<div class="row">
				<div class="col-lg-5 col-md-12 p-r-5">
					<p><img src="<?php if($json['frontend']['webimg'] != ''){echo $json['frontend']['webimg'];}else{ echo 'https://app.sitecoursepro.com/images/logo.png';}?>" width="149" height="60" data-retina="true" alt="" style="width:60%;"></p>
					<p><?php echo $json['frontend']['about_content'];?></p>
					<div class="follow_us">
						<ul>
							<li>Follow us</li>
							<li><a href="<?php echo $json['frontend']['fbpro_url'];?>"><i class="ti-facebook"></i></a></li>
							<li><a href="<?php echo $json['frontend']['twitter_url'];?>"><i class="ti-twitter-alt"></i></a></li>
							<li><a href="<?php echo $json['frontend']['instapro_url'];?>"><i class="ti-instagram"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 ml-lg-auto">
					<h5>Useful links</h5>
					<ul class="links">
						<li><a href="index.php">Home</a></li>
						<li><a href="courses-list.php">Online Course</a></li>
						<li><a href="ccourses-list.php">Hot Digital Products</a></li>
						<!-- <li><a href="fgcourses-list.php">Best Gig Jobs</a></li> -->
						<?php
		                    if ($json['affsetting']['blgtype'] == 'no') {
		                ?>
						<li><a href="postlist.php">Blog</a></li>
		                <?php } ?>

					</ul>
				</div>
				<div class="col-lg-3 col-md-6">
					<?php
                        if($json['frontend']['contactemail'] != '') {                                                    
                    ?>
					<h5>Contact with Us</h5>
					<ul class="contacts">
						<li><a href="mailto:<?php echo $json['frontend']['contactemail'];?>"><i class="ti-email"></i> <?php echo $json['frontend']['contactemail'];?></a></li>
					</ul>
					<?php } ?>
					<?php
                        if($json['frontend']['optin_code'] != '') {                                                    
                    ?>
					<div id="newsletter">
					<h6>Newsletter</h6>
					<div id="message-newsletter"></div>
					<?php echo $json['frontend']['optin_code'];?>
					</div>
					<?php } ?> 
				</div>
			</div>
			<!--/row-->
			<hr>
			<div class="row">
				<div class="col-md-8">
					<ul id="additional_links">
						<?php
                         for ($i=0 ; $i < count($json['pageslist']); $i++ ) {                                                    
                        ?>
                        <li><a href="pages.php?page_id=<?php echo $json['pageslist'][$i]['id'];?>"><?php echo ucfirst($json['pageslist'][$i]['pagename']);?></a></li>
                        <?php } ?>
					</ul>
				</div>
				<div class="col-md-4">
					<div id="copy">© <?php echo date('Y');?> <?php echo $json['frontend']['subdomainname'];?></div>
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->
	</div>
	<!-- page -->
	
	<!-- COMMON SCRIPTS -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/common_scripts.js"></script>
    <script src="js/main.js"></script>
	<script src="assets/validate.js"></script>
	
</body>
</html>