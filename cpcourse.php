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
<div class="container-fluid margin_120_0">
			<div class="main_title_2">
				<span><em></em></span>
				<h2>Clickbank Popular Courses</h2>
				<!-- <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p> -->
			</div>
			<div id="reccomended" class="owl-carousel owl-theme">
				<?php 
					for ($i=0; $i < count($results) ; $i++) 
					{
				?>
				<div class="item">
					<div class="box_grid">
						<figure>
							<a href="#0" class="wish_bt"></a>
							<a href="ccourse-detail.php?id=<?php echo $results[$i]['id'];?>&searchkey=<?php echo $_GET['searchkey'];?>">
								<div class="preview"><span>Preview course</span></div><img src="<?php echo $results[$i]['imgurl'];?>" class="img-fluid" alt="" style="height: 250px;width: 100%;"></a>
							<!-- <div class="price">
                			</div> -->

						</figure>
						<div class="wrapper">
							<small><?php echo $results[$i]['catname'];?></small>
							<h3><?php echo $results[$i]['title'];?></h3>
							<p><?php echo substr($results[$i]['description'],0,100,);?>..</p>
						</div>
						<ul style="height: 60px;">
							<li><a href="ccourse-detail.php?id=<?php echo $results[$i]['id'];?>&searchkey=<?php echo $_GET['searchkey'];?>">Enroll now</a></li>
						</ul>
					</div>
				</div>
				<?php 
				$i++; if($i==20){ break;}	}
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