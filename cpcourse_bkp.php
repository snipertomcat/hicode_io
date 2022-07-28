<?php
$searchkey = $_GET['searchkey'];

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
<div class="container-fluid margin_120_0">
			<div class="main_title_2">
				<span><em></em></span>
				<h2>Clickbank Popular Courses</h2>
				<!-- <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p> -->
			</div>
			<div id="reccomended" class="owl-carousel owl-theme">
				<?php 
					// echo "<pre>";
					//print_r($json['homefiverr']);
					$i = 0;
					foreach($output as $results) 
					{ 
                    	$i;
				?>
				<div class="item">
					<div class="box_grid">
						<figure>
							<a href="#0" class="wish_bt"></a>
							<a href="ccourse-detail.php?title=<?php echo str_replace(' ','+',$results['titles']);?>&lnk=<?php echo $results['link'];?>&desc=<?php echo str_replace(' ','+',$results['descs']);?>&searchkey=<?php echo str_replace(' ','+',$_GET['searchkey']);?>">
								<div class="preview"><span>Preview course</span></div><img src="clickbank2.jpg" class="img-fluid" alt="" style="height: 250px;"></a>
							<!-- <div class="price">
                			</div> -->

						</figure>
						<div class="wrapper">
							<small><?php echo $str = substr($results['visible_instructors'][0]['display_name'], 0, 20);?></small>
							<h3><?php echo $results['titles'];?></h3>
							<p><?php echo substr($results['descs'], '0', '60');?>...</p>
						</div>
						<ul style="height: 60px;">
							<li><a href="ccourse-detail.php?title=<?php echo str_replace(' ','+',$results['titles']);?>&lnk=<?php echo $results['link'];?>&desc=<?php echo str_replace(' ','+',$results['descs']);?>&searchkey=<?php echo str_replace(' ','+',$_GET['searchkey']);?>">Enroll now</a></li>
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