<?php
error_reporting(0);
include('header.php');

?>
	
		<section class="hero_single version_2">
			<div class="wrapper">
				<div class="container">
					<h3>HOT DIGITAL PRODUCTS</h3>
					<p>Increase your expertise in Software, Personal Development and Affiliate Marketing Courses </p>
					<form method="GET" action="ccourses-list.php">
						<div id="custom-search-input">
							<div class="input-group">
								<input type="text" name="searchkey" class=" search-query" placeholder="Ex. Affiliate Marketing" value="<?php echo $_GET['searchkey'];?>">
								<input type="submit" class="btn_search" value="Search">
							</div>
						</div>
					</form>
					<br>
					<span><b>Note :-</b> Only Limited Courses/Gigs/Digital Products Shown On This Page. <br>Kindly Use Our Smart Search Box To Find Any Items You Want</span>
				</div>
			</div>
		</section>
		<!--/hero_in-->

<?php		
include('listing-filter.php');
?>

<?php


$searchkey = str_replace(' ', '+', $_GET['searchkey']);

if($searchkey ==""){
	$searchkey ="";
}
else{
	$searchkey = $_GET['searchkey'];
}


$handle4 = curl_init();
$url4 = "https://app.sitecoursepro.com/site/clickbanklist.php";
curl_setopt($handle4, CURLOPT_URL, $url4);
curl_setopt($handle4, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle4, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($handle4, CURLOPT_SSL_VERIFYPEER, false );
curl_setopt($handle4, CURLOPT_POSTFIELDS, 'clskyd='.$searchkey.'');
$output = curl_exec($handle4);
curl_close($handle4);

$json4 = json_decode($output, true);


// echo "<Pre>";
// print_r($json4);

$results = $json4['clsearchkeyword2'];

?>



		<div class="container margin_60_35">
			<div class="row">

<?php

for ($i=0; $i < count($results) ; $i++) 
{

?>  

				<div class="col-xl-4 col-lg-6 col-md-6">
					<div class="box_grid wow">
						<figure class="block-reveal">
							<div class="block-horizzontal"></div>
							<!-- <a href="#0" class="wish_bt"></a> -->
							<a href="ccourse-detail.php?id=<?php echo $results[$i]['id'];?>&searchkey=<?php echo $_GET['searchkey'];?>"><img src="<?php echo $results[$i]['imgurl'];?>" class="img-fluid" alt="" style="height: 250px;width: 100%;"></a>
							<!-- <div class="price"><?php //echo $results[$i]['price'];?></div> -->
							<div class="preview"><span>Preview course</span></div>
						</figure>
						<div class="wrapper" style="height: 244px;">
							<small><?php echo $results[$i]['catname'];?></small>							
							<h3><?php echo $results[$i]['title'];?> </h3>
							<p><?php echo substr($results[$i]['description'],0,100,);?>..</p>
							
						</div>
						<ul style="height:60px;">
							<li><?php echo $str = substr($results['visible_instructors'][0]['display_name'], 0, 20);?></li>
							<li><a href="ccourse-detail.php?id=<?php echo $results[$i]['id'];?>&searchkey=<?php echo $_GET['searchkey'];?>">Enroll now</a></li>
						</ul>
						
					</div>
				</div>
<?php } ?>			
				
			</div>
			<!-- /row -->
<?php                
                
    // if($_GET['page']){
    //             $m=$_GET['page'];
    //             $page=$_GET['page']; 
    // }
    // else{
    //             $m=1;
    //             $page=1;
    // }
?>			
			<!-- <nav aria-label="..." class="text-center">
						<ul class="pagination pagination-sm">

						
							<li class="page-item ">
								<a class="page-link" href="courses-list.php?page=<?php //echo $m-1;?>&searchkey=<?php echo $_GET['searchkey'];?>" tabindex="-1">Previous</a>
							</li>

							<li class="page-item">
								<a class="page-link" href="courses-list.php?page=<?php //echo $m;?>&searchkey=<?php echo $_GET['searchkey'];?>"><?php echo $m;?></a>
							</li>
													
							<li class="page-item">
								<a class="page-link" href="courses-list.php?page=<?php //echo $m+1;?>&searchkey=<?php echo $_GET['searchkey'];?>">Next</a>
							</li>
						</ul>
			</nav> -->

		</div>
		<!-- /container -->
<?php		
	
                                
include('footer.php');
?>