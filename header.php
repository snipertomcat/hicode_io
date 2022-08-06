<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-type");

ini_set('display_errors', 'off');
ini_set('display_startup_errors', 'off');
error_reporting(0);

$protocol = isset($_SERVER["HTTPS"]) ? 'https://' : 'http://';
$mainurl = $protocol.$_SERVER['HTTP_HOST'];

//phpinfo();

$base_url = $_SERVER['HTTP_HOST'];
$domain = $base_url;
//echo "<pre>"  . print_r($protocol) .print_r($mainurl). print_r($base_url) . print_r($domain);die;
// $subdomain = explode(".",$base_url);

// $domain = $subdomain[0];
//$domain = 'book';
//$domain = 'book';

$cat__id="";
if($_GET['cat_id']) {
$cat__id = $_GET['cat_id'];
}

$sname="";
if($_GET['sname']) {
$sname = $_GET['sname'];
}

$spage="";
if($_GET['spage']) {
$spage = $_GET['spage'];
}

$cpage="";
if($_GET['cpage']) {
$cpage = $_GET['cpage'];
}

$skyd2="";
if($_GET['skyd']) {
$skyd2 = $_GET['skyd'];

}

$fskyd ="";
if($_GET['fskyd']) {
$fskyd = $_GET['fskyd'];
}

$fcat ="";
if($_GET['fcat']) {
$fcat = $_GET['fcat'];

}

$skypage="";
if($_GET['skypage']) {
$skypage = $_GET['skypage'];
}

$fskypage="";
if($_GET['fskypage']) {
$fskypage = $_GET['fskypage'];
}

$bpage="";
if($_GET['bpage']) {
$bpage = $_GET['bpage'];
}

$handle = curl_init();
$url = "https://app.sitecoursepro.com/site/homepage1.php";
curl_setopt($handle, CURLOPT_URL, $url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false );
curl_setopt($handle, CURLOPT_POSTFIELDS, 'domain_name='.$domain.'&cat_id='.$cat__id.'&sname='.$sname.'&spage='.$spage.'&cpage='.$cpage.'&bpage='.$bpage.'&fskyd='.$fskyd.'&skyword='.$skyd2.'&skypage='.$skypage.'&fskypage='.$fskypage.'&fcat='.$fcat.'');
$output = curl_exec($handle);
curl_close($handle);

$json = json_decode($output, true);

//print_r($json);die;

//print_r($json);exit();

$quiz_id = $_GET['quiz_id'];
$handle1 = curl_init();
$url = "https://app.sitecoursepro.com/site/cat_prod_list.php";
curl_setopt($handle1, CURLOPT_URL, $url);
curl_setopt($handle1, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle1, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($handle1, CURLOPT_SSL_VERIFYPEER, false );
curl_setopt($handle1, CURLOPT_POSTFIELDS, 'quiz_id='.$quiz_id.'');
$output2 = curl_exec($handle1);
curl_close($handle1);

$json2 = json_decode($output2, true);

$base_url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .  $_SERVER['HTTP_HOST'];
 $url = $base_url . $_SERVER["REQUEST_URI"];

//print_r($json);die;
if($json['frontend']['fb_comment_code'] != '')
{
    $fb_comment_code = $json['frontend']['fb_comment_code'];
}

for ($i=0 ; $i < count($json['ads']); $i++ ) 
{
    if($json['ads'][$i]['ads_position'] == 'Next_to_Logo_Inside_Header')
    {
        if($json['ads'][$i]['adtype'] == 'ads1')
        {
            $headerbanner = $json['ads'][$i]['ads_code'];
        }
        if($json['ads'][$i]['adtype'] == 'ads2')
        {
            $headerbanner = '<a href="'.$json['ads'][$i]['bannerlink'].'" target="_blank"><img alt="" src="'.$json['ads'][$i]['bannerimg'].'"></a>';
        }
        
        
    }

    if($json['ads'][$i]['ads_position'] == 'Home_Page_Banner')
    {
        //$homepagebanner = $json['ads'][$i]['ads_code'];
        if($json['ads'][$i]['adtype'] == 'ads1')
        {
            $homepagebanner = $json['ads'][$i]['ads_code'];
        }
        if($json['ads'][$i]['adtype'] == 'ads2')
        {
            //$a = explode('https://app.sitecoursepro.com/images/bannerimages/',$json['ads'][$i]['bannerimg']);
            //$img = '../app.sitecoursepro.com/images/bannerimages/'.$a[1];
            
            //echo '<img src="'.$json['ads'][$i]['bannerimg'].'">';
            //$homepagebanner = '<a href="'.$json['ads'][$i]['bannerlink'].'" class="promo-image promo-overlay bg-image"  target="_blank"><img alt="" src="'.$json['ads'][$i]['bannerimg'].'"></a>';

            if($json['ads'][$i]['bannerimg'] != '')
            {
                $homepagebanner = $json['ads'][$i]['bannerimg'];
            }
            else
            {
                $homepagebanner = 'home1.jpg';
            }

            if($json['ads'][$i]['bannerlink'] != '')
            {
                $homepageurl = $json['ads'][$i]['bannerlink'];
            }
            else
            {
                $homepageurl = 'https://www.amazon.com/';
            }
            
        }

    }

    if($json['ads'][$i]['ads_position'] == 'Home_Page_Banner1')
    {
        //$homepagebanner = $json['ads'][$i]['ads_code'];
        if($json['ads'][$i]['adtype'] == 'ads1')
        {
            $homepagebanner1 = $json['ads'][$i]['ads_code'];
        }
        if($json['ads'][$i]['adtype'] == 'ads2')
        {
            $homepagebanner1 = '<a href="'.$json['ads'][$i]['bannerlink'].'" class="promo-image promo-overlay" target="_blank"><img alt="" src="'.$json['ads'][$i]['bannerimg'].'" style="width:570px;height:169px;"></a>';
            
        }

    }

    if($json['ads'][$i]['ads_position'] == 'Home_Page_Banner2')
    {
        //$homepagebanner = $json['ads'][$i]['ads_code'];
        if($json['ads'][$i]['adtype'] == 'ads1')
        {
            $homepagebanner2 = $json['ads'][$i]['ads_code'];
        }
        if($json['ads'][$i]['adtype'] == 'ads2')
        {
            $homepagebanner2 = '<a href="'.$json['ads'][$i]['bannerlink'].'"  class="promo-image promo-overlay"  target="_blank"><img alt="" src="'.$json['ads'][$i]['bannerimg'].'" style="width:570px;height:169px;"></a>';
            
        }

    }

    if($json['ads'][$i]['ads_position'] == 'Home_Page_Banner3')
    {
        //$homepagebanner = $json['ads'][$i]['ads_code'];
        if($json['ads'][$i]['adtype'] == 'ads1')
        {
            $homepagebanner3 = $json['ads'][$i]['ads_code'];
        }
        if($json['ads'][$i]['adtype'] == 'ads2')
        {
            $homepagebanner3 = '<a href="'.$json['ads'][$i]['bannerlink'].'" target="_blank"><img alt="" src="'.$json['ads'][$i]['bannerimg'].'" style="width:340px;height:388px;"></a>';
            
        }

    }

    if($json['ads'][$i]['ads_position'] == 'Home_Page_Banner4')
    {
        //$homepagebanner = $json['ads'][$i]['ads_code'];
        if($json['ads'][$i]['adtype'] == 'ads1')
        {
            $homepagebanner4 = $json['ads'][$i]['ads_code'];
        }
        if($json['ads'][$i]['adtype'] == 'ads2')
        {
            $homepagebanner4 = '<a href="'.$json['ads'][$i]['bannerlink'].'" class="promo-image  promo-overlay bg-image"
                                 target="_blank"><img alt="" src="'.$json['ads'][$i]['bannerimg'].'"  class="promo-image  promo-overlay bg-image"></a>';
            
        }

    }

    if($json['ads'][$i]['ads_position'] == 'Home_Page_Banner5')
    {
        //$homepagebanner = $json['ads'][$i]['ads_code'];
        if($json['ads'][$i]['adtype'] == 'ads1')
        {
            $homepagebanner5 = $json['ads'][$i]['ads_code'];
        }
        if($json['ads'][$i]['adtype'] == 'ads2')
        {
            $homepagebanner5 = '<a href="'.$json['ads'][$i]['bannerlink'].'" class="promo-image  promo-overlay" target="_blank"><img alt="" src="'.$json['ads'][$i]['bannerimg'].'"></a>';
            
        }

    }

    if($json['ads'][$i]['ads_position'] == 'Sidebar')
    {
        //$sidebanner = $json['ads'][$i]['ads_code'];
        if($json['ads'][$i]['adtype'] == 'ads1')
        {
            $sidebanner = $json['ads'][$i]['ads_code'];
        }
        if($json['ads'][$i]['adtype'] == 'ads2')
        {
            $sidebanner = '<a href="'.$json['ads'][$i]['bannerlink'].'" target="_blank"><img alt="" src="'.$json['ads'][$i]['bannerimg'].'"></a>';
            
        }
    }

    if($json['ads'][$i]['ads_position'] == 'Inside_Content_Body')
    {
        //$insidebobybanner = $json['ads'][$i]['ads_code'];
        if($json['ads'][$i]['adtype'] == 'ads1')
        {
            $insidebobybanner = $json['ads'][$i]['ads_code'];
        }
        if($json['ads'][$i]['adtype'] == 'ads2')
        {
            $insidebobybanner = '<a href="'.$json['ads'][$i]['bannerlink'].'" target="_blank"><img alt="" src="'.$json['ads'][$i]['bannerimg'].'"></a>';
            
            
        }
    }

    if($json['ads'][$i]['ads_position'] == 'Facebook_Pixel_Code')
    {
        $fbpixelcode = $json['ads'][$i]['ads_code'];
    }

    if($json['ads'][$i]['ads_position'] == 'Google_Analytics_Code')
    {
        $googlecode = $json['ads'][$i]['ads_code'];
    }

    if($json['ads'][$i]['ads_position'] == 'Push_Notification')
    {
        $PushNotification = $json['ads'][$i]['ads_code'];
    }

    if($json['ads'][$i]['ads_position'] == 'Google_Pixel')
    {
        $googlepixel = $json['ads'][$i]['ads_code'];
    }

    if($json['ads'][$i]['ads_position'] == 'Custom_Code')
    {
        $customcode = $json['ads'][$i]['ads_code'];
    }
}


$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//echo $url ;die;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="og:title" content="<?php echo $json['frontend']['sitetitle'];?>">
    <meta property="og:description" content="<?php echo $json['frontend']['sitedescription'];?>">
    <meta name="author" content="Ansonika">
    <title><?php echo $json['frontend']['sitetitle'];?></title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="<?php echo  $json['frontend']['sitefavicon']; ?>" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- BASE CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/vendors.css" rel="stylesheet">
	<link href="css/icon_fonts/css/all_icons.min.css" rel="stylesheet">

	<link href="css/blog.css" rel="stylesheet">
    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">
     <?php
          if($fbpixelcode != '') 
          {  
            echo $fbpixelcode;
          }
          
          if($googlecode != '') 
          {  
            echo $googlecode;
          }

          if($customcode != '') 
          {  
            echo $customcode;
          }

          if($PushNotification != '') 
          {  
            echo $PushNotification;
          }

          if($googlepixel != '') 
          {  
            echo $googlepixel;
          }
            
          if($json['frontend']['live_chat_code'] != '') 
          {  
            echo $json['frontend']['live_chat_code'];
          }
    ?>
</head>

<body>
	
	<div id="page">

	<header class="header menu_2">
		<div id="preloader"><div data-loader="circle-side"></div></div><!-- /Preload -->
		<div id="logo">
			<a href="index.php"><img src="images/hicode-logo.png" width="150px" height="150px" data-retina="true" alt=""></a>
		</div>
		
		<!-- /top_menu -->
		<a href="#menu" class="btn_mobile">
			<div class="hamburger hamburger--spin" id="hamburger">
				<div class="hamburger-box">
					<div class="hamburger-inner"></div>
				</div>
			</div>
		</a>

		<nav id="menu" class="main-menu">
			<ul>
				<li><span><a href="index.php">Home</a></span></li>
				
				<li><span><a href="courses-list.php">Online Course</a></span>
    				<ul>
    					<li><a href="fcourses-list.php">Fiverr Online Course</a></li>
                        <li><a href="fcourses-list.php?fskyd=Graphics and Design">Graphics & Design</a></li>
						<li><a href="fcourses-list.php?fskyd=Digital+Marketing">Digital Marketing</a></li>
                        <li><a href="fcourses-list.php?fskyd=Writing+and+Translation">Writing & Translation</a></li>
                        <li><a href="fcourses-list.php?fskyd=Affiliate+Marketing">Affiliate Marketing</a></li>
                        <li><a href="fcourses-list.php?fskyd=Cryptocurrency">Cryptocurrency</a></li>
                        <li><a href="fcourses-list.php?fskyd=Leadership">Leadership</a></li>
                        <li><a href="fcourses-list.php?fskyd=Programming">Programming</a></li>
                        <li><a href="fcourses-list.php?fskyd=Weight+Loss">Weight Loss</a></li>
					</ul>
    			</li>
    			<?php

                ?>
				<li><span><a href="ccourses-list.php">Hot Digital Products</a></span>
    				<ul>
                        <li><a href="ccourses-list.php?searchkey=Cooking">Cooking</a></li>
                        <li><a href="ccourses-list.php?searchkey=Dating">Dating</a></li>
                        <!-- <li><a href="ccourses-list.php?searchkey=Economics">Economics</a></li> -->
                        <li><a href="ccourses-list.php?searchkey=Hair">Hair</a></li>
                        <!-- <li><a href="ccourses-list.php?searchkey=Interior+Designer">Interior Designer</a></li> -->
                        <li><a href="ccourses-list.php?searchkey=Judo">Judo</a></li>
    					<li><a href="ccourses-list.php?searchkey=Music">Music</a></li>
                        <li><a href="ccourses-list.php?searchkey=Pet">Pet</a></li>
                        <li><a href="ccourses-list.php?searchkey=Photography">Photography</a></li>
					</ul>
    			</li>
    			<li><span><a href="fgcourses-list.php">Best Gig Jobs</a></span></li>
                <?php  ?>
				<li><span><a href="#">Pages</a></span>
					<ul>
						<?php
                         for ($i=0 ; $i < count($json['pageslist']); $i++ ) {                                                    
                        ?>
                        <li><a href="pages.php?page_id=<?php echo $json['pageslist'][$i]['id'];?>"><?php echo ucfirst($json['pageslist'][$i]['pagename']);?></a></li>
                        <?php } ?>
					</ul>
				</li>
                <?php
                    if ($json['affsetting']['blgtype'] == 'no') {
                ?>
				<li><span><a href="postlist.php">Blog</a></span></li>
                <?php } ?>
			</ul>
		</nav>
		<!-- Search Menu -->
	
	</header>
	<!-- /header -->
	
	<main>
		