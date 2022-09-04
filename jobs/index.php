<?php 
require_once('admin/config.php');
require_once('includes/url_slug.php'); 

?>
<!DOCTYPE html>
<html>
	<head>
	<!-- Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?php echo $homepage_title; ?></title>
	<meta name="description" content="<?php echo $homepage_desc; ?>" />
	<meta name="robots" content="noodp"/>
	<meta property="og:site_name" content="<?php echo $site_title; ?>"/>
	<meta property="og:type" content="website"/>
	<meta property="og:title" content="<?php echo $homepage_title; ?>"/>
	<meta property="og:description" content="<?php echo $homepage_desc; ?>"/>
	<!-- CSS and Scripts -->
	<?php include 'includes/headscripts.php'; ?>
	</head>
<body>
<?php include 'includes/header.php'; ?>
<!-- Search Container -->
<div class="search-container">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			
			<center><h1 class="text-white mb-5"><?php echo $searchftitle_text; ?></h1></center>
			
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
	
<!-- Search Form -->		
		<form action="jobs/search_main.php">
  <div class="form-row align-items-center mb-3">
    <div class="col job-search">
      <input name="j" type="text" class="form-control form-control-lg" placeholder="<?php echo $searchf_text; ?>">
    </div>
    <div class="col loc-search">
      <input name="l" type="text" class="form-control form-control-lg" placeholder="<?php echo $searchloc_text; ?>">
    </div>
	<div class="col-auto but-search">
	<button class="btn btn-primary btn-lg" type="submit"><i class="fas fa-search"></i></button>
	</div>
  </div>
  
  
  <div class="form-group form-inline text-white">
  <div style="margin-right: 10px;margin-top: -4px;"><?php echo $searchfsort_text; ?></div>
      <div class="custom-control custom-radio mr-2">
	  <input id="relevance" name="s" value="relevance" class="custom-control-input" checked="" type="radio">
      <label class="custom-control-label" for="relevance"><?php echo $searchfrel_text; ?></label>
    </div>
    <div class="custom-control custom-radio mr-2">
      <input id="date" name="s" value="date" class="custom-control-input" type="radio">
      <label class="custom-control-label" for="date"><?php echo $searchfdat_text; ?></label>
    </div>
    <div class="custom-control custom-radio mr-2">
      <input id="salary" name="s" value="salary" class="custom-control-input" type="radio">
      <label class="custom-control-label" for="salary"><?php echo $searchfsal_text; ?></label>
    </div>
  </div>
</form>
<!-- /Search Form -->
		</div>
	</div>
</div>
</div>
<!-- /Search Container -->

<div class="container">
	<div class="row">
		<div class="col-md-12">
<br>
<br>	
<h3>Welcome to the best job search engine!</h3>
<hr>
<p>JobFinder is a job search engine that connects you to your ideal job. It connects you to various job advertisements on the internet by referencing job listings from job boards, recruitment company websites, and large specialist recruitment companies. The JobFinder website provides fast and straightforward searching for positions. Users can look for jobs on this website and get straight to the point instead of visiting each site individually. JobFinder does not host the job offerings and directs users to the original job listing. In one search, you can find millions of jobs posted on thousands of websites around the world. JobFinder has the only job you will ever need to find your next position. Millions of jobs are available on JobFinder, so you don't have to look anyplace else.
</p>
<?php 
$postad = include("ads/homepage_ad.php");
if(isset($postad) and !empty($postad) && $postad !== 1): ?>
<div style="margin:30px 0px 30px 0px;">
<?php echo $postad; ?>
</div>
<?php endif; ?>
<h3>Jobs by Industry</h3>
<hr>
<div class="row multi-columns-row">

<div class="col-6 col-sm-4 col-lg-3">
<ul class="list-group">
<a href="jobs/search_main.php?j=Accounting&l=&s=relevance">Accounting</a>
<a href="jobs/search_main.php?j=Advertising&l=&s=relevance">Advertising</a>
<a href="jobs/search_main.php?j=Aerospace&l=&s=relevance">Aerospace</a>
<a href="jobs/search_main.php?j=Agriculture&l=&s=relevance">Agriculture</a>
<a href="jobs/search_main.php?j=Apparel&l=&s=relevance">Apparel</a>
<a href="jobs/search_main.php?j=Architecture&l=&s=relevance">Architecture</a>
<a href="jobs/search_main.php?j=Arts&l=&s=relevance">Arts</a>
<a href="jobs/search_main.php?j=Automotive&l=&s=relevance">Automotive</a>
<a href="jobs/search_main.php?j=Banking&l=&s=relevance">Banking</a>
<a href="jobs/search_main.php?j=Charities&l=&s=relevance">Charities</a>
<a href="jobs/search_main.php?j=Consultancy&l=&s=relevance">Consultancy</a>
<a href="jobs/search_main.php?j=Customer+Service&l=&s=relevance">Customer Service</a>
</ul>
</div>

<div class="col-6 col-sm-4 col-lg-3">
<ul class="list-group">
<a href="jobs/search_main.php?j=Education&l=&s=relevance">Education</a>
<a href="jobs/search_main.php?j=Electronics&l=&s=relevance">Electronics</a>
<a href="jobs/search_main.php?j=Engineering&l=&s=relevance">Engineering</a>
<a href="jobs/search_main.php?j=Food+Processing&l=&s=relevance">Food Processing</a>
<a href="jobs/search_main.php?j=Health+Care&l=&s=relevance">Health Care</a>
<a href="jobs/search_main.php?j=Human+Resources&l=&s=relevance">Human Resources</a>
<a href="jobs/search_main.php?j=Information+Technology&l=&s=relevance">Information Technology</a>
<a href="jobs/search_main.php?j=Insurance&l=&s=relevance">Insurance</a>
<a href="jobs/search_main.php?j=Law+Enforcement&l=&s=relevance">Law Enforcement</a>
<a href="jobs/search_main.php?j=Legal&l=&s=relevance">Legal</a>
<a href="jobs/search_main.php?j=Management&l=&s=relevance">Management</a>
<a href="jobs/search_main.php?j=Manufacturing&l=&s=relevance">Manufacturing</a>
</ul>
</div>

<div class="col-6 col-sm-4 col-lg-3">
<ul class="list-group">
<a href="jobs/search_main.php?j=Maritime&l=&s=relevance">Maritime</a>
<a href="jobs/search_main.php?j=Marketing&l=&s=relevance">Marketing</a>
<a href="jobs/search_main.php?j=Media&l=&s=relevance">Media</a>
<a href="jobs/search_main.php?j=Oil&l=&s=relevance">Oil</a>
<a href="jobs/search_main.php?j=Personal+Care&l=&s=relevance">Personal Care</a>
<a href="jobs/search_main.php?j=Public+Sector&l=&s=relevance">Public Sector</a>
<a href="jobs/search_main.php?j=Publishing&l=&s=relevance">Publishing</a>
<a href="jobs/search_main.php?j=Purchasing&l=&s=relevance">Purchasing</a>
<a href="jobs/search_main.php?j=Quality Assurance&l=&s=relevance">Quality Assurance</a>
<a href="jobs/search_main.php?j=Real Estate&l=&s=relevance">Real Estate</a>
<a href="jobs/search_main.php?j=Restaurants&l=&s=relevance">Restaurants</a>
<a href="jobs/search_main.php?j=Retail&l=&s=relevance">Retail</a>
</ul>
</div>

<div class="col-6 col-sm-4 col-lg-3">
<ul class="list-group">
<a href="jobs/search_main.php?j=Sales&l=&s=relevance">Sales</a>
<a href="jobs/search_main.php?j=Science&l=&s=relevance">Science</a>
<a href="jobs/search_main.php?j=Secretarial&l=&s=relevance">Secretarial</a>
<a href="jobs/search_main.php?j=Social Care&l=&s=relevance">Social Care</a>
<a href="jobs/search_main.php?j=Social Media&l=&s=relevance">Social Media</a>
<a href="jobs/search_main.php?j=Sports&l=&s=relevance">Sports</a>
<a href="jobs/search_main.php?j=Steels&l=&s=relevance">Steels</a>
<a href="jobs/search_main.php?j=Tourism&l=&s=relevance">Tourism</a>
<a href="jobs/search_main.php?j=Translations&l=&s=relevance">Translations</a>
<a href="jobs/search_main.php?j=Transportation&l=&s=relevance">Transportation</a>
<a href="jobs/search_main.php?j=Web+Design&l=&s=relevance">Web Design</a>
<a href="jobs/search_main.php?j=Wood&l=&s=relevance">Wood</a>
</ul>
</div>

</div>

<br><br>			
<h3>Jobs by Company</h3>
<hr>
<div class="row multi-columns-row">

<div class="col-6 col-sm-4 col-lg-3">
<ul class="list-group">
<a href="jobs/search_main.php?j=Adobe&l=&s=relevance">Adobe</a>
<a href="jobs/search_main.php?j=Airbnb&l=&s=relevance">Airbnb</a>
<a href="jobs/search_main.php?j=Amazon&l=&s=relevance">Amazon</a>
<a href="jobs/search_main.php?j=Apple&l=&s=relevance">Apple</a>
<a href="jobs/search_main.php?j=Argos&l=&s=relevance">Argos</a>
<a href="jobs/search_main.php?j=Bestbuy&l=&s=relevance">Bestbuy</a>
<a href="jobs/search_main.php?j=Capitol+One&l=&s=relevance">Capitol One</a>
<a href="jobs/search_main.php?j=Chegg&l=&s=relevance">Chegg</a>
<a href="jobs/search_main.php?j=Cisco&l=&s=relevance">Cisco</a>
<a href="jobs/search_main.php?j=Costco&l=&s=relevance">Costco</a>
<a href="jobs/search_main.php?j=Dominos&l=&s=relevance">Dominos</a>
<a href="jobs/search_main.php?j=eBay&l=&s=relevance">eBay</a>
</ul>
</div>

<div class="col-6 col-sm-4 col-lg-3">
<ul class="list-group">
<a href="jobs/search_main.php?j=ESPN&l=&s=relevance">ESPN</a>
<a href="jobs/search_main.php?j=Facebook&l=&s=relevance">Facebook</a>
<a href="jobs/search_main.php?j=Facess&l=&s=relevance">Facess</a>
<a href="jobs/search_main.php?j=Google&l=&s=relevance">GoDaddy</a>
<a href="jobs/search_main.php?j=Google&l=&s=relevance">Google</a>
<a href="jobs/search_main.php?j=HubSpot&l=&s=relevance">HubSpot</a>
<a href="jobs/search_main.php?j=Ikea&l=&s=relevance">Ikea</a>
<a href="jobs/search_main.php?j=Instagram&l=&s=relevance">Instagram</a>
<a href="jobs/search_main.php?j=Intuit&l=&s=relevance">Intuit</a>
<a href="jobs/search_main.php?j=LinkedIn&l=&s=relevance">LinkedIn</a>
<a href="jobs/search_main.php?j=Microsoft&l=&s=relevance">Microsoft</a>
<a href="jobs/search_main.php?j=Nike&l=&s=relevance">Nike</a>

</ul>
</div>

<div class="col-6 col-sm-4 col-lg-3">
<ul class="list-group">
<a href="jobs/search_main.php?j=Netflix&l=&s=relevance">Netflix</a>
<a href="jobs/search_main.php?j=Nvidia&l=&s=relevance">Nvidia</a>
<a href="jobs/search_main.php?j=Pandora&l=&s=relevance">Pandora</a>
<a href="jobs/search_main.php?j=PayPal&l=&s=relevance">PayPal</a>
<a href="jobs/search_main.php?j=Petco&l=&s=relevance">Petco</a>
<a href="jobs/search_main.php?j=Pinterest&l=&s=relevance">Pinterest</a>
<a href="jobs/search_main.php?j=Pizza+Hut&l=&s=relevance">Pizza Hut</a>
<a href="jobs/search_main.php?j=Riot+Games&l=&s=relevance">Riot Games</a>
<a href="jobs/search_main.php?j=Roblox&l=&s=relevance">Roblox</a>
<a href="jobs/search_main.php?j=Salesforce&l=&s=relevance">Salesforce</a>
<a href="jobs/search_main.php?j=Santander&l=&s=relevance">Santander</a>
<a href="jobs/search_main.php?j=Spotify&l=&s=relevance">Spotify</a>

</ul>
</div>

<div class="col-6 col-sm-4 col-lg-3">
<ul class="list-group">
<a href="jobs/search_main.php?j=Starbucks&l=&s=relevance">Starbucks</a>
<a href="jobs/search_main.php?j=Stream&l=&s=relevance">Stream</a>
<a href="jobs/search_main.php?j=Target&l=&s=relevance">Target</a>
<a href="jobs/search_main.php?j=The+Home+Depot&l=&s=relevance">The Home Depot</a>
<a href="jobs/search_main.php?j=TripAdvisor&l=&s=relevance">TripAdvisor</a>
<a href="jobs/search_main.php?j=Walmart&l=&s=relevance">Walmart</a>
<a href="jobs/search_main.php?j=Wells+Fargo&l=&s=relevance">Wells Fargo</a>
<a href="jobs/search_main.php?j=Yahoo&l=&s=relevance">Yahoo</a>
<a href="jobs/search_main.php?j=Zendesk&l=&s=relevance">Zendesk</a>
<a href="jobs/search_main.php?j=Zillow&l=&s=relevance">Zillow</a>
</ul>
</div>

</div>

<br>
<br>
<h3>Jobs by Location</h3>
<hr>
<div class="row multi-columns-row">

<div class="col-6 col-sm-4 col-lg-3">
<ul class="list-group">
<b>Europe</b>
<a href="jobs/search_main.php?j=&l=Austria&s=relevance">Austria</a>
<a href="jobs/search_main.php?j=&l=Belgium&s=relevance">Belgium</a>
<a href="jobs/search_main.php?j=&l=Czech+Republic&s=relevance">Czech Republic</a>
<a href="jobs/search_main.php?j=&l=Denmark&s=relevance">Denmark</a>
<a href="jobs/search_main.php?j=&l=Finland&s=relevance">Finland</a>
<a href="jobs/search_main.php?j=&l=France&s=relevance">France</a>
<a href="jobs/search_main.php?j=&l=Germany&s=relevance">Germany</a>
<a href="jobs/search_main.php?j=&l=Hungary&s=relevance">Hungary</a>
<a href="jobs/search_main.php?j=&l=Ireland&s=relevance">Ireland</a>
<a href="jobs/search_main.php?j=&l=Italy&s=relevance">Italy</a>
<a href="jobs/search_main.php?j=&l=Luxembourg&s=relevance">Luxembourg</a>
<a href="jobs/search_main.php?j=&l=Malta&s=relevance">Malta</a>
<a href="jobs/search_main.php?j=&l=Netherlands&s=relevance">Netherlands</a>
<a href="jobs/search_main.php?j=&l=Norway&s=relevance">Norway</a>
<a href="jobs/search_main.php?j=&l=Poland&s=relevance">Poland</a>
<a href="jobs/search_main.php?j=&l=Portugal&s=relevance">Portugal</a>
<a href="jobs/search_main.php?j=&l=Romania&s=relevance">Romania</a>
<a href="jobs/search_main.php?j=&l=Russia&s=relevance">Russia</a>
<a href="jobs/search_main.php?j=&l=Slovakia&s=relevance">Slovakia</a>
<a href="jobs/search_main.php?j=&l=Spain&s=relevance">Spain</a>
<a href="jobs/search_main.php?j=&l=Sweden&s=relevance">Sweden</a>
<a href="jobs/search_main.php?j=&l=Switzerland&s=relevance">Switzerland</a>
<a href="jobs/search_main.php?j=&l=United+Kingdom&s=relevance">United Kingdom</a>
</ul>
</div>

<div class="col-6 col-sm-4 col-lg-3">
<ul class="list-group">
<b>North America</b>
<a href="jobs/search_main.php?j=&l=Canada&s=relevance">Canada</a>
<a href="jobs/search_main.php?j=&l=Mexico&s=relevance">Mexico</a>
<a href="jobs/search_main.php?j=&l=United+States&s=relevance">United States</a>
<div><br></div>
<b>Central America</b>
<a href="jobs/search_main.php?j=&l=Costa+Rica&s=relevance">Costa Rica</a>
<a href="jobs/search_main.php?j=&l=Guatemala&s=relevance">Guatemala</a>
<a href="jobs/search_main.php?j=&l=Panama&s=relevance">Panama</a>
<div><br></div>
<b>South America</b>
<a href="jobs/search_main.php?j=&l=Argentina&s=relevance">Argentina</a>
<a href="jobs/search_main.php?j=&l=Bolivia&s=relevance">Bolivia</a>
<a href="jobs/search_main.php?j=&l=Brazil&s=relevance">Brazil</a>
<a href="jobs/search_main.php?j=&l=Chile&s=relevance">Chile</a>
<a href="jobs/search_main.php?j=&l=Colombia&s=relevance">Colombia</a>
<a href="jobs/search_main.php?j=&l=Ecuador&s=relevance">Ecuador</a>
<a href="jobs/search_main.php?j=&l=Paraguay&s=relevance">Paraguay</a>
<a href="jobs/search_main.php?j=&l=Peru&s=relevance">Peru</a>
<a href="jobs/search_main.php?j=&l=Uruguay&s=relevance">Uruguay</a>
<a href="jobs/search_main.php?j=&l=Venezuela&s=relevance">Venezuela</a>
</ul></div>

<div class="col-6 col-sm-4 col-lg-3">
<ul class="list-group">
<b>Asia</b>
<a href="jobs/search_main.php?j=&l=China&s=relevance">China</a>
<a href="jobs/search_main.php?j=&l=Hong+Kong&s=relevance">Hong Kong</a>
<a href="jobs/search_main.php?j=&l=India&s=relevance">India</a>
<a href="jobs/search_main.php?j=&l=Japan&s=relevance">Japan</a>
<a href="jobs/search_main.php?j=&l=Korea&s=relevance">Korea</a>
<a href="jobs/search_main.php?j=&l=Malaysia&s=relevance">Malaysia</a>
<a href="jobs/search_main.php?j=&l=Pakistan&s=relevance">Pakistan</a>
<a href="jobs/search_main.php?j=&l=Philippines&s=relevance">Philippines</a>
<a href="jobs/search_main.php?j=&l=Singapore&s=relevance">Singapore</a>
<a href="jobs/search_main.php?j=&l=Taiwan&s=relevance">Taiwan</a>
<a href="jobs/search_main.php?j=&l=Thailand&s=relevance">Thailand</a>
<a href="jobs/search_main.php?j=&l=Vietnam&s=relevance">Vietnam</a>
<div><br></div>
<b>Middle East</b>
<a href="jobs/search_main.php?j=&l=Kuwait&s=relevance">Kuwait</a>
<a href="jobs/search_main.php?j=&l=Oman&s=relevance">Oman</a>
<a href="jobs/search_main.php?j=&l=Qatar&s=relevance">Qatar</a>
<a href="jobs/search_main.php?j=&l=Turkey&s=relevance">Turkey</a>
<a href="jobs/search_main.php?j=&l=United+Arab+Emirates&s=relevance">United Arab Emirates</a>
</ul>
</div>

<div class="col-6 col-sm-4 col-lg-3">
<ul class="list-group">
<b>Africa</b>
<a href="jobs/search_main.php?j=&l=Morocco&s=relevance">Morocco</a>
<a href="jobs/search_main.php?j=&l=South+Africa&s=relevance">South Africa</a>
<div><br></div>
<b>Caribbean</b>
<a href="jobs/search_main.php?j=&l=Dominican+Republic&s=relevance">Dominican Republic</a>
<a href="jobs/search_main.php?j=&l=Puerto+Rico&s=relevance">Puerto Rico</a>
<div><br></div>
<b>Pacific</b>
<a href="jobs/search_main.php?j=&l=Australia&s=relevance">Australia</a>
<a href="jobs/search_main.php?j=&l=New+Zealand&s=relevance">New Zealand</a>
</ul>
</div>


</div>
		</div>
	</div>
</div>

<?php include 'includes/footer.php';?>
