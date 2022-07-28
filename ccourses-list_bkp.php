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
	$searchkey ="Affiliate+Marketing";
}
else{
	$searchkey = $_GET['searchkey'];
}

$clbsortby = "";
$keyword=preg_replace('/\s+/', '+', $searchkey);
$maxResults = '50';


$clickbank = 'https://accounts.clickbank.com/mkplSearchResult.htm?includeKeywords='.$keyword.'&resultsPerPage=50&firstResult=1&sortField='.$clbsortby;

 $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 10 );
        curl_setopt ( $ch, CURLOPT_TIMEOUT, 200 );
        curl_setopt ( $ch, CURLOPT_REFERER, 'http://www.bing.com/' );
        curl_setopt ( $ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36' );
        // curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.8) Gecko/2009032609 Firefox/3.0.8');
        
        curl_setopt ( $ch, CURLOPT_MAXREDIRS, 20 ); // Good leeway for redirections.
        @curl_setopt ( $ch, CURLOPT_FOLLOWLOCATION, 1 );

        $url = $clickbank;
        curl_setopt ( $ch, CURLOPT_HTTPGET, 1 );
        curl_setopt ( $ch, CURLOPT_URL, trim ( $url ) );
          
        $cont = curl_exec ( $ch );
        curl_close($ch);

        preg_match_all ( '/details">.*?(http:\/\/zzzzz\..*?net).*?>(.*?)<\/a>/s', $cont, $matches, PREG_PATTERN_ORDER );
        // echo "<pre>";
        // print_r($matches);

        $links = $matches [1];
        $titles = $matches [2];

        preg_match_all ( '{description">(.*?)</div>}', $cont, $matches, PREG_PATTERN_ORDER );
        $descs = $matches [1];

        $output = array();
        
        for($i = 0; $i < $maxResults; $i ++) 
        {
          $title = addslashes ( $titles [$i] );

          $output[$i]['link'] = $links [$i];
          $output[$i]['titles'] = $titles [$i];
          $output[$i]['descs'] = addslashes ($descs [$i]);

          $desc = addslashes ( $descs [$i] );
          
        }



?>



		<div class="container margin_60_35">
			<div class="row">

<?php
foreach($output as $results) {

?>  

				<div class="col-xl-4 col-lg-6 col-md-6">
					<div class="box_grid wow">
						<figure class="block-reveal">
							<div class="block-horizzontal"></div>
							<!-- <a href="#0" class="wish_bt"></a> -->
							<a href="ccourse-detail.php?title=<?php echo str_replace(' ','+',$results['titles']);?>&lnk=<?php echo $results['link'];?>&desc=<?php echo str_replace(' ','+',$results['descs']);?>&searchkey=<?php echo str_replace(' ','+',$_GET['searchkey']);?>"><img src="clickbank2.jpg" class="img-fluid" alt=""></a>
							<!-- <div class="price"><?php //echo $results['price'];?></div>-->
							<div class="preview"><span>Preview course</span></div>
						</figure>
						<div class="wrapper" style="height: 244px;">
							<small><?php echo $cat_type;?></small>							
							<h3><?php echo $results['titles'];?> </h3>
							<p><?php echo $results['descs'];?>..</p>
							
						</div>
						<ul style="height:60px;">
							<li><?php echo $str = substr($results['visible_instructors'][0]['display_name'], 0, 20);?></li>
							<li><a href="ccourse-detail.php?title=<?php echo str_replace(' ','+',$results['titles']);?>&lnk=<?php echo $results['link'];?>&desc=<?php echo str_replace(' ','+',$results['descs']);?>&searchkey=<?php echo str_replace(' ','+',$_GET['searchkey']);?>">Enroll now</a></li>
						</ul>
						
					</div>
				</div>
<?php } ?>			
				
			</div>
			<!-- /row -->
<?php                
                
    if($_GET['page']){
                $m=$_GET['page'];
                $page=$_GET['page']; 
    }
    else{
                $m=1;
                $page=1;
    }
?>			
			<nav aria-label="..." class="text-center">
						<ul class="pagination pagination-sm">

						
							<li class="page-item ">
								<a class="page-link" href="courses-list.php?page=<?php echo $m-1;?>&searchkey=<?php echo $_GET['searchkey'];?>" tabindex="-1">Previous</a>
							</li>

							<li class="page-item">
								<a class="page-link" href="courses-list.php?page=<?php echo $m;?>&searchkey=<?php echo $_GET['searchkey'];?>"><?php echo $m;?></a>
							</li>
													
							<li class="page-item">
								<a class="page-link" href="courses-list.php?page=<?php echo $m+1;?>&searchkey=<?php echo $_GET['searchkey'];?>">Next</a>
							</li>
						</ul>
			</nav>

		</div>
		<!-- /container -->
<?php		
	
                                
include('footer.php');
?>