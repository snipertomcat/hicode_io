<?php
session_start();
include 'config.php';
include 'class.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>JobFinder Admin</title>
    <meta name="description" content="Admin">
    <link href="../themes/pulse/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../fontawesome/css/fontawesome.css" rel="stylesheet">
	<link href="../fontawesome/css/fa-solid.css" rel="stylesheet">
	<link href="../style.css" rel="stylesheet" type="text/css">
	<link href="../favicon.ico" rel="shortcut icon" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
<div class="container">
	
  <a class="navbar-brand" href=""><i class="fas fa-search mr-1"></i> JobFinder</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav ml-auto">
	<li class="nav-item">
	<a class="nav-link" href="p"><span class="fas fa-user" aria-hidden="true"></span> Admin</a>
	</li>
	<li class="nav-item">
	<a class="nav-link" href="../Files"><span class="fas fa-eye" aria-hidden="true"></span> View Site</a>
	</li>
	<?php if(isset($_SESSION['username'])){	?>
		<li class="nav-item">
		<a class="nav-link" href="index.php?logout"><span class="fas fa-sign-out-alt" aria-hidden="true"></span> Logout</a></li>
		<?php } ?>
  
    </ul>
   
  </div>

</div>
</nav>


   

    <div class="container" style="padding:50px 0px;">
    <div class="col-md-12">
  	  	<div class="card">
<div class="card-body">
	  	  	<?php //if(isset($_SESSION['username'])&&$_SESSION['username']==='admin'){
if(isset($_SESSION['username'])){
			?>

<h2>Admin Panel</h2>
<hr>
<br>

	  	  			<?php if(isset($_GET['updated'])){ echo '<div class="alert alert-success"><h5><center>Settings Updated Successfully!</center></h5></div>'; }

	  	  			if(isset($_GET['file-error'])){ echo '<div class="alert alert-danger"><h5><center>Error :
	  	  			 Config.php is not writable. Please Change its file Permission to 777.</center></h5></div>'; }


	  	  			?>

<form class="form-horizontal" action="index.php" method="post" class="admin" >
<div class="form-group">
	<div>
	<input type="hidden" name="update">
	<input type="submit"  class="btn btn-primary" value="Update">
	</div>
</div>	
<br>
<legend>Login Settings</legend>
<div class="form-group">
	<label class=" control-label">Username</label>
	<div>
	<input type="text" class="form-control" value="<?php echo $username; ?>" name="username">
	</div>
</div>
<div class="form-group">
	<label class=" control-label">Password</label>
	<div>
	<input type="text" class="form-control" value="<?php echo $password; ?>" name="newpassword">
	</div>
</div>
<br>
<legend>Main Site Settings</legend>
<div class="form-group">
	<label class=" control-label">Website URL</label>
	<div>
	<input type="text" class="form-control" value="<?php echo $site_url; ?>" name="site_url">
	<span class="help-block">Start with 'http://' and without 'www' and do not end with '/'</span>
	</div>
</div>
<div class="form-group">
	<label class=" control-label">Website Title</label>
	<div>
	<input type="text" class="form-control" value="<?php echo $site_title; ?>" name="site_title">
	</div>
</div>
<div class="form-group">
	<label class=" control-label">AddThis ID</label>
	<div>
	<input type="text" class="form-control" value="<?php echo $addthis_id; ?>" name="addthis_id">
	</div>
</div>
<div class="form-group">
	<label class=" control-label">Contact Form Email</label>
	<div>
	<input type="text" class="form-control" value="<?php echo $contact_email; ?>" name="contact_email">
	</div>
</div>
<div class="form-group">
      <label for="select" class=" control-label">Website Theme</label>
      <div>
        <select class="form-control" name="site_theme">
		<?php if(!empty($site_theme)){
				echo '<option selected="" value="'.$site_theme.'">'.$site_theme.'</option>';
			} ?>
          <option value="bootstrap">bootstrap</option>
          <option value="cerulean">cerulean</option>
          <option value="cosmo">cosmo</option>
          <option value="cyborg">cyborg</option>
          <option value="darkly">darkly</option>
		  <option value="flatly">flatly</option>
		  <option value="journal">journal</option>
		  <option value="litera">litera</option>
		  <option value="lumen">lumen</option>
		  <option value="lux">lux</option>
		  <option value="materia">materia</option>
		  <option value="minty">minty</option>
		  <option value="pulse">pulse</option>
		  <option value="sandstone">sandstone</option>
		  <option value="simplex">simplex</option>
		  <option value="sketchy">sketchy</option>
		  <option value="slate">slate</option>
		  <option value="solar">solar</option>
		  <option value="spacelab">spacelab</option>
		  <option value="superhero">superhero</option>
		  <option value="united">united</option>
		  <option value="yeti">yeti</option>
        </select>
       
      </div>
</div>
<div class="form-group" style="display:none;">
	<label class=" control-label">ZipRecruiter API Key</label>
	<div>
	<input type="text" class="form-control" value="<?php echo $zip_key; ?>" name="zip_key">
	</div>
</div>
<div class="form-group">
	<label class=" control-label">Careerjet Affiliate ID</label>
	<div>
	<input type="text" class="form-control" value="<?php echo $youtube_key; ?>" name="youtube_key">
	</div>
</div>
<div class="form-group">
	<label class=" control-label">Careerjet Default Local</label>
	<div>
	<input type="text" class="form-control" value="<?php echo $cj_local; ?>" name="cj_local">
	</div>
</div>
<div class="form-group">
      <label class=" control-label">Search results per page Careerjet</label>
      <div>
	   <?php if (10 == $nr_search_result){
				echo '<div class="radio">
          <label>
            <input name="nr_search_result" value="10" checked="" type="radio">
            10
          </label>
        </div>
        <div class="radio">
          <label>
            <input name="nr_search_result" value="20" type="radio">
            20
          </label>
        </div>';
			} else {
				echo '<div class="radio">
          <label>
            <input name="nr_search_result" value="10" type="radio">
            10
          </label>
        </div>
        <div class="radio">
          <label>
            <input name="nr_search_result" value="20" checked="" type="radio">
            20
          </label>
        </div>';
			} ?>
      </div>
</div>
<div class="form-group" style="display:none;">
      <label class=" control-label">Search results per page ZipRecruiter</label>
      <div>
	   <?php if (10 == $zipnr_search_result){
				echo '<div class="radio">
          <label>
            <input name="zipnr_search_result" value="10" checked="" type="radio">
            10
          </label>
        </div>
        <div class="radio">
          <label>
            <input name="zipnr_search_result" value="20" type="radio">
            20
          </label>
        </div>';
			} else {
				echo '<div class="radio">
          <label>
            <input name="zipnr_search_result" value="10" type="radio">
            10
          </label>
        </div>
        <div class="radio">
          <label>
            <input name="zipnr_search_result" value="20" checked="" type="radio">
            20
          </label>
        </div>';
			} ?>
      </div>
</div>
<div class="form-group">
	<label class=" control-label">Show job search sorting options</label>
	<div>
	 <div class="checkbox">
          <label>
		  <?php if(!empty($show_sortoptions)){
				echo '<input type="checkbox" checked="" name="show_sortoptions"> Enable';
			} else {
				echo '<input type="checkbox" name="show_sortoptions"> Enable';
			} ?>
          </label>
        </div>
	</div>
</div>
<br>
<legend>SEO Meta Settings</legend>
<div class="form-group">
	<label class=" control-label">Homepage title</label>
	<div>
	<input type="text" class="form-control" value="<?php echo $homepage_title; ?>" name="homepage_title">
	</div>
</div>
<div class="form-group">
	<label class=" control-label">Homepage description</label>
	<div>
	<input type="text" class="form-control" value="<?php echo $homepage_desc; ?>" name="homepage_desc">
	</div>
</div>
<div class="form-group">
	<label class=" control-label">Search page title</label>
	<div>
	<input type="text" class="form-control" value="<?php echo $search_seo_title; ?>" name="search_seo_title">
	<span class="help-block">(Comes between search term and site title)</span>
	</div>
</div>
<br>
<legend>Translation Settings</legend>
<b>Header Menu</b>
<br><br>
<div class="form-group">
	<div>
	<input type="text" class="form-control" value="<?php echo $home_menu_link; ?>" name="home_menu_link">
	</div>
</div>
<div class="form-group">
	<div>
	<input type="text" class="form-control" value="<?php echo $feat_menu_link; ?>" name="feat_menu_link">
	</div>
</div>
<div class="form-group">
	<div>
	<input type="text" class="form-control" value="<?php echo $about_menu_link; ?>" name="about_menu_link">
	</div>
</div>
<br>
<b>Search Form</b>
<br><br>
<div class="form-group">
	<div>
	<input type="text" class="form-control" value="<?php echo $searchftitle_text; ?>" name="searchftitle_text">
	</div>
</div>
<div class="form-group">
	<div>
	<input type="text" class="form-control" value="<?php echo $searchf_text; ?>" name="searchf_text">
	</div>
</div>
<div class="form-group">
	<div>
	<input type="text" class="form-control" value="<?php echo $searchloc_text; ?>" name="searchloc_text">
	</div>
</div>
<div class="form-group">
	<div>
	<input type="text" class="form-control" value="<?php echo $searchfsort_text; ?>" name="searchfsort_text">
	</div>
</div>
<div class="form-group">
	<div>
	<input type="text" class="form-control" value="<?php echo $searchfrel_text; ?>" name="searchfrel_text">
	</div>
</div>
<div class="form-group">
	<div>
	<input type="text" class="form-control" value="<?php echo $searchfdat_text; ?>" name="searchfdat_text">
	</div>
</div>
<div class="form-group">
	<div>
	<input type="text" class="form-control" value="<?php echo $searchfsal_text; ?>" name="searchfsal_text">
	</div>
</div>
<br>
<b>Search Page</b>
<br><br>
<div class="form-group">
	<div>
	<input type="text" class="form-control" value="<?php echo $searchp_job_text; ?>" name="searchp_job_text">
	</div>
</div>
<div class="form-group">
	<div>
	<input type="text" class="form-control" value="<?php echo $searchp_in_text; ?>" name="searchp_in_text">
	</div>
</div>
<div class="form-group">
	<div>
	<input type="text" class="form-control" value="<?php echo $searchp_page_text; ?>" name="searchp_page_text">
	</div>
</div>
<br>
<b>Footer Links</b>
<br><br>
<div class="form-group">
	<div>
	<input type="text" class="form-control" value="<?php echo $footnav_home; ?>" name="footnav_home">
	</div>
</div>
<div class="form-group">
	<div>
	<input type="text" class="form-control" value="<?php echo $footnav_privacy; ?>" name="footnav_privacy">
	</div>
</div>
<div class="form-group">
	<div>
	<input type="text" class="form-control" value="<?php echo $footnav_contact; ?>" name="footnav_contact">
	</div>
</div>


<br>	
<div class="form-group">
	<div>
	<input type="hidden" name="update">
	<input type="submit"  class="btn btn-primary" value="Update">
	</div>
</div>		
	  	  		

	  	  			</form>
					

	 	<?php }else{

		  	  	if(isset($_GET['error'])){ echo '<div class="alert alert-danger"><h5><center>Wrong Username and Password combination</center></h5></div>'; }

	  	  	 ?>
<div style="width: 300px;margin: 0px auto;">
<h3>Admin Login</h3>
<br>
<form method="post" action="index.php" >
			        
<div class="form-group">
	<label class="control-label" for="focusedInput">Username</label>
	<input class="form-control" type="text" placeholder="Username" name="username">
</div>
<div class="form-group">
	<label class="control-label" for="focusedInput">Password</label>
	<input class="form-control" type="password" placeholder="Password" name="password">
</div>
<div class="form-group">
	<button type="submit" class="btn btn-primary login"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Login</button>
</div>
					
</form>
</div>
	  	  	<?php } ?>
</div>
	  	  </div>
		  </div>
  </div>

  
    </div><script src="../js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>
