<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
<div class="container">
	
  <a class="navbar-brand" href="<?php echo $site_url;?>"><i class="fas fa-search mr-1"></i> <?php echo $site_title; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $site_url;?>"><?php echo $home_menu_link; ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $site_url;?>/features"><?php echo $feat_menu_link; ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $site_url;?>/about"><?php echo $about_menu_link; ?></a>
      </li>
      
    </ul>
   
  </div>

</div>
</nav>