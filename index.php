<?php
include('header.php');

?>


		<!-- /hero_single -->

		<div class="features clearfix">
			<div class="container" style="margin-top: 100px">
				<ul>
					<li><i class="pe-7s-study"></i>
						<h4>185,000+ courses</h4><span>Explore a variety of fresh topics</span>
					</li>
					<li><i class="pe-7s-cup"></i>
						<h4>Expert teachers</h4><span>Find the right instructor for you</span>
					</li>
					<li><i class="pe-7s-target"></i>
						<h4>Focus on target</h4><span>Increase your personal expertise</span>
					</li>
				</ul>
			</div>
		</div>
		<!-- /features -->

		
<?php
// category listing
include('category.php');
// pouplar courses
include('pcourse.php');
// News and event
include('news.php');
// advertiement
include('advertiement.php');
// footer
?>

	
<?php
include('footer.php');
?>
	<?php
		if ($json['affsetting']['substype'] == 'no') {
			// code...
		
	?>
	<div class="modal" tabindex="-1" role="dialog" id="subscribe_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background:#57488A;">
                    <h5 class="modal-title" style="color:white;">Sign Up For Newsletter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="data.php" method="POST">
                <div class="modal-body">
                    
                        <div class="row">
                            <div class="col-sm-12 col-sm-offset-6 col-xs-6 col-xs-offset-6">
    
                                
                                    <div class="form-group">
                                        
                                        <input name="email" type="email" class="form-control input-lg" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email here">

                                    </div>
                                    <input type="hidden" name="webid" value="<?php echo $json['frontend']['id'];?>">
                                    <input type="hidden" name="uid" value="<?php echo $json['frontend']['uid'];?>">


                                
                            </div>
                            <div class="col-sm-12 col-sm-offset-6 col-xs-6 col-xs-offset-6">
                                <small class=" text-muted"><strong>Privacy Policy:</strong> We hate SPAM and promise to keep your email address safe.</small>
                            </div>
                        </div>
                    
                </div>
                <div class="modal-footer"  style="background:#57488A;color:white;">
                    <button type="submit" id="submitApprove" class="btn btn-success btn-block btn-lg" >Subscribe</button>
                    
                    <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                    <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
                </div>
                </form>
            </div>
        </div>
    </div>
	<script type="text/javascript">
	   
	    window.addEventListener('load', function(event) {
	            if (typeof sessionStorage['dljbOptin'] == 'undefined') {
	                setTimeout(dljbShowOptin, 3000);
	            }
	        });


	        function dljbShowOptin() {
	            $("#subscribe_modal").modal();
	            sessionStorage['dljbOptin'] = 'shown';
	        }

	   
	</script>
	<?php } ?>
		
	