<?php

$cat_type = str_replace(' ', '+', $_GET['searchkey']);


if($cat_type ==""){
	$cat_type ="Affiliate+Marketing";
}
else{
	$cat_type = $cat_type;
}

//echo $currencyid = $json['affsetting']['currency'];

if($_GET['page']){
    $url = "https://www.udemy.com/api-2.0/courses/?search=".$cat_type."&page=".$_GET['page']."&page_size=10";
}
else{
    $url = "https://www.udemy.com/api-2.0/courses/?search=".$cat_type."&page=1&page_size=50";
}

//$currencyid = $json['affsetting']['currency'];
$ch =   curl_init();
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_URL,$url);
		
		if($json['affsetting']['udy_client_id'] != '')
        {
        	$clientID = $json['affsetting']['udy_client_id'];
	    	$clientSecret = $json['affsetting']['udy_secret_id'];
        
        }
		else
        {
	    	$clientID = '1T69TiUXm5gEVciaGGZUrEkz9oSV6BOK33PTt952'; //$json['affsetting']['udy_client_id'];
	    	$clientSecret = '2F3uFtJE7olM3hHnXSpx0n3TOqKDzLUQJODTgUeB6vmSiAKDLOJTVXFkWZaVSMxIVAv5U8sToaWBSyIso0MGN1NH8nCDRWdzeSbTNEm6qVP4FbyCyGkrfiQS4eXEywDa'; //$json['affsetting']['udy_secret_id'];
        }
	    $headers = array(
	    'Content-Type: application/json',
	    'Authorization: Basic '. base64_encode("$clientID:$clientSecret")
			);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
	    $result=curl_exec($ch);

	    curl_close($ch);

	    $json = json_decode($result, true);


?>

<div class="container-fluid margin_120_0">
			<div class="main_title_2">
				<span><em></em></span>
				<h2>Popular Online Courses</h2>
				<!-- <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p> -->
			</div>
			<div id="reccomended" class="owl-carousel owl-theme">
				<?php 
					// echo "<pre>";
					//print_r($json['homefiverr']);
					$i = 0;
					foreach($json['results'] as $results)
					{ 
				?>
				<div class="item">
					<div class="box_grid">
						<figure>
							<a href="#0" class="wish_bt"></a>
							<a href="course-detail.php?trackId=<?php echo $results['id'];?>&cat_type=<?php echo $cat_type;?>&searchkey=<?php echo str_replace(' ','+',$_GET['searchkey']);?>">
								<div class="preview"><span>Preview course</span></div><img src="<?php echo $results['image_480x270'];?>" class="img-fluid" alt="" style="height: 250px;"></a>
							<div class="price">
                			<?php 
								if($currencyid != 'USD')
                                {
									$response = json_decode(file_get_contents('https://api.exchangerate-api.com/v4/latest/USD'),true);
											        
									    $inr = explode('$',$results['price']);
                                		$pd = str_replace(",","",$inr['1']);
                                		//$pd = str_replace( ',', '', $str_jsonAry_decoded[$i]['price'] );
                                			// if($currencyid == 'USD')
                                            // {
                                            //     $usd = $pd*$response['rates']['USD'];
                                            // }
                                            if($currencyid == 'CHF')
                                            {
                                                $usd = $pd*$response['rates']['CHF'];
                                            }
                                            if($currencyid == 'EUR')
                                            {
                                                $usd = $pd*$response['rates']['EUR'];
                                            }
                                            if($currencyid == 'KYD')
                                            {
                                                $usd = $pd*$response['rates']['KYD'];
                                            }
                                            if($currencyid == 'GIP')
                                            {
                                                $usd = $pd*$response['rates']['GIP'];
                                            }
                                            if($currencyid == 'GBP')
                                            {
                                                $usd = $pd*$response['rates']['GBP'];
                                            }
                                            if($currencyid == 'JOD')
                                            {
                                                $usd = $pd*$response['rates']['JOD'];
                                            }
                                            if($currencyid == 'OMR')
                                            {
                                                $usd = $pd*$response['rates']['OMR'];
                                            }
                                            if($currencyid == 'BHD')
                                            {
                                                $usd = $pd*$response['rates']['BHD'];
                                            }
                                            if($currencyid == 'KWD')
                                            {
                                                $usd = $pd*$response['rates']['KWD'];
                                            }
                                            if($currencyid == 'INR')
                                            {
                                                $usd = $pd*$response['rates']['INR'];
                                            }
                                		$prc = explode(".",$usd);
                                		echo $currencyid.' '.$prc[0];
                                }
								else
                                {
                                	//echo $json['affsetting']['currency'].' ';
                                    echo $results['price'];
                                }
									
						        ?>
                
                			<?php //echo $results['price'];?></div>

						</figure>
						<div class="wrapper">
							<small><?php echo $cat_type;?></small>
							<h3><?php echo $results['title'];?></h3>
							<p><?php echo substr($results['headline'], '0', '60');?>...</p>
						</div>
						<ul style="height: 60px;">
							<li><a href="course-detail.php?trackId=<?php echo $results['id'];?>&cat_type=<?php echo $cat_type;?>&searchkey=<?php echo str_replace(' ','+',$_GET['searchkey']);?>">Enroll now</a></li>
						</ul>
					</div>
				</div>
				<?php 
				$i++; if($i == 20){ break; }	}
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