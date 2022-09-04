<div class="bg-dark mt-5">
<div class="container">
	<div class="row">
		<div class="col-md-12">
					<footer>
<p class="float-left">
&copy; <?php echo date('Y'); ?> <a href="<?php echo $site_url;?>" title="<?php echo $site_title;?>"><?php echo $site_title;?></a>
</p>
<p class="float-right">
<a href="<?php echo $site_url;?>"><?php echo $footnav_home; ?></a> | <a rel="nofollow" href="<?php echo $site_url;?>/privacy-policy"><?php echo $footnav_privacy; ?></a> | <a rel="nofollow" href="<?php echo $site_url;?>/contact"><?php echo $footnav_contact; ?></a>
</p>
</footer>
		</div>
	</div>
	<br><br>
</div>
</div>
<script src="<?php echo $site_url;?>/js/jquery.min.js"></script>
<script src="<?php echo $site_url;?>/js/popper.min.js"></script>
<script src="<?php echo $site_url;?>/js/bootstrap.min.js"></script>
<script src="<?php echo $site_url;?>/js/custom.js"></script>
<?php if (!empty($addthis_id)): ?>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=<?php echo $addthis_id; ?>"></script>
<?php endif; ?>
<p id="back-top"><a class="btn-primary" href="#top"><i class="fas fa-chevron-up fa-lg"></i></a></p>
</body>
</html>