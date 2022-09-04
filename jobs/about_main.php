<?php
require_once('admin/config.php');
require_once('includes/url_slug.php'); 
require_once('includes/custom.php'); 
$page_title = $about_menu_link;
?>
<!DOCTYPE html>
<html>
	<head>
	<!-- Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?php echo $page_title; ?> - <?php echo $site_title; ?></title>
	<meta name="description" content="<?php echo $page_title; ?> - <?php echo $site_title; ?>" />
	
	<!-- CSS and Scripts -->
	<?php include 'includes/headscripts.php'; ?>
	</head>
<body>
<?php include 'includes/header.php'; ?>


<div class="container">
	<div class="row">
		<div class="col-md-12">
<br><br>
<h2><?php echo $page_title; ?></h2>
<hr>	
<p>Write an orignal text about your site here.

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum in efficitur odio, id laoreet mauris. Sed vestibulum dictum orci, a dignissim lectus tempus id. Nam eget nisl in ligula viverra egestas at eget nulla. Vestibulum rutrum tincidunt elit at consequat. Integer at viverra lacus, et consectetur dui. Donec dapibus risus purus, eget pharetra nisl lacinia a. Nunc nunc magna, ultrices ut risus sodales, tincidunt aliquam sem. Cras vel libero sed purus fermentum varius sed non lacus. Aliquam erat volutpat. Phasellus aliquam et justo scelerisque mollis.

Integer lacinia, purus id lacinia tempus, nisl neque lobortis nisi, quis aliquam nibh nibh auctor nulla. Praesent pretium, lectus et molestie pretium, nulla sapien luctus enim, eu cursus erat velit id mi. Donec fermentum tempor neque id consequat. Fusce imperdiet, augue quis rhoncus facilisis, metus sem malesuada dui, hendrerit ultricies nibh tellus ac odio. Aliquam at tristique orci. Vivamus ornare mauris eget mauris suscipit posuere. Morbi vehicula placerat augue, nec faucibus neque malesuada ut. Nunc semper sapien diam, tempus consectetur arcu ultricies in. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent egestas, ex vitae ullamcorper elementum, arcu erat pharetra velit, non consequat massa neque sed turpis. Suspendisse at lorem quis velit vehicula gravida. Nam ut tortor placerat, tincidunt metus quis, placerat quam. Aliquam sem ex, accumsan ut iaculis quis, bibendum a ligula. Curabitur quis tempor mauris, sit amet ornare erat. Donec laoreet pulvinar enim, et pellentesque felis posuere vel. Vestibulum vulputate neque sit amet metus gravida bibendum.

Suspendisse vitae luctus quam. Proin consequat nisl sit amet ligula vulputate pretium. Integer eros augue, condimentum eu lacus non, placerat elementum nunc. Vivamus accumsan eleifend eleifend. Etiam porta lobortis lorem, nec vulputate enim efficitur a. Quisque venenatis interdum ultricies. Sed vitae congue leo. 
</p>
		
		</div>
	</div>
</div>
<!-- end Main Content -->
<?php include 'includes/footer.php';?>