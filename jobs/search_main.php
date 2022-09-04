<?php
require_once('admin/config.php');
require_once('includes/url_slug.php');
require_once('includes/custom.php');
// get job
if (!empty($_GET['j'])) {
    $search_term = urlencode($_GET['j']);
    $save_search = cano($_GET['j']);
    $search_title = str_replace("-", " ", $save_search);
    $search_title = ucwords($search_title);
} else {
    $search_term = '';
    $save_search = '';
}
// get location
if (!empty($_GET['l'])) {
    $search_loc = urlencode($_GET['l']);
    $save_search_loc = cano($_GET['l']);
    $search_title_loc = str_replace("-", " ", $save_search_loc);
    $search_title_loc = ucwords($search_title_loc);
} else {
    $search_loc = '';
    $save_search = '';
}
// get sorting
if (isset($_GET['s'])) {
    $sortby = urlencode($_GET['s']);
} else {
    $sortby = 'relevance';
}
// get page
if (isset($_GET['p'])) {
    $page = urlencode($_GET['p']);
    $seo_page = ' - ' . $searchp_page_text . ' ' . $page;
} else {
    $page = '1';
    $seo_page = '';
}
// get search page title
if (empty($_GET['l'])) {
    $search_page_title = $search_title . ' ' . $searchp_job_text . $seo_page;
} elseif (empty($_GET['j'])) {
    $search_page_title = $searchp_job_text . ' ' . $searchp_in_text . ' ' . $search_title_loc . $seo_page;
} else {
    $search_page_title = $search_title . ' ' . $searchp_job_text . ' ' . $searchp_in_text . ' ' . $search_title_loc . $seo_page;
}
?>
    <!DOCTYPE html>
    <html>
    <head>
        <!-- Meta -->
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title><?php echo $search_page_title; ?> - <?php echo $search_seo_title; ?> - <?php echo $site_title; ?></title>
        <meta name="description"
              content="<?php echo $search_page_title; ?> - <?php echo $search_seo_title; ?> - <?php echo $site_title; ?>"/>
        <meta property="og:title"
              content="<?php echo $search_page_title; ?> - <?php echo $search_seo_title; ?> - <?php echo $site_title; ?>"/>
        <meta property="og:description"
              content="<?php echo $search_page_title; ?> - <?php echo $search_seo_title; ?> - <?php echo $site_title; ?>"/>
        <meta property="og:type" content="article"/>
        <meta property="og:site_name" content="<?php echo $site_title; ?>"/>
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
                    <form action="<?php echo $site_url; ?>/search_main.php">
                        <div class="form-row align-items-center mb-3">
                            <div class="col job-search">
                                <input name="j" type="text" class="form-control form-control-lg"
                                       value="<?php if (!empty($_GET['j'])) {
                                           echo $search_title;
                                       }; ?>" placeholder="<?php echo $searchf_text; ?>">
                            </div>
                            <div class="col loc-search">
                                <input name="l" type="text" class="form-control form-control-lg"
                                       value="<?php if (!empty($_GET['l'])) {
                                           echo $search_title_loc;
                                       }; ?>" placeholder="<?php echo $searchloc_text; ?>">
                            </div>
                            <div class="col-auto but-search">
                                <button class="btn btn-primary btn-lg" type="submit"><i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>

                        <?php if (isset($show_sortoptions) and !empty($show_sortoptions)): ?>
                            <div class="form-group form-inline text-white">
                                <div style="margin-right: 10px;margin-top: -4px;"><?php echo $searchfsort_text; ?></div>
                                <div class="custom-control custom-radio mr-2">
                                    <input id="relevance" name="s" value="relevance"
                                           class="custom-control-input" <?php if ($sortby == 'relevance') {
                                        echo 'checked=""';
                                    } ?> type="radio">
                                    <label class="custom-control-label"
                                           for="relevance"><?php echo $searchfrel_text; ?></label>
                                </div>
                                <div class="custom-control custom-radio mr-2">
                                    <input id="date" name="s" value="date"
                                           class="custom-control-input" <?php if ($sortby == 'date') {
                                        echo 'checked=""';
                                    } ?> type="radio">
                                    <label class="custom-control-label"
                                           for="date"><?php echo $searchfdat_text; ?></label>
                                </div>
                                <div class="custom-control custom-radio mr-2">
                                    <input id="salary" name="s" value="salary"
                                           class="custom-control-input" <?php if ($sortby == 'salary') {
                                        echo 'checked=""';
                                    } ?> type="radio">
                                    <label class="custom-control-label"
                                           for="salary"><?php echo $searchfsal_text; ?></label>
                                </div>
                            </div>
                        <?php endif; ?>

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
                <?php
                $postad_top = file_get_contents("ads/searchpage_ad_top.php");
                if (isset($postad_top) and !empty($postad_top)): ?>
                    <div style="margin:30px 0px 30px 0px;">
                        <?php echo $postad_top; ?>
                    </div>
                <?php endif; ?>
                <h2><?php echo $search_page_title; ?></h2>
                <hr>
                <?php
                $urlString = 'http://public.api.careerjet.net/search?locale_code=' . $cj_local . '&keywords=' . $search_term . '&location=' . $search_loc . '&sort=' . $sortby . '&pagesize=100' . '&affid=' . $youtube_key . '&page=' . $page . '&user_ip=66.249.65.79&user_agent=Mozilla';
                //$string = cache_search($urlString);
                $string = file_get_contents($urlString);
                //cache_search_save($urlString, $string);
                $json = json_decode($string);

                if ($json->hits > 1) {
                    if ($json->type == 'JOBS') {
                        foreach ($json->jobs as $item) {
                            echo '<div class="card"><div class="card-body"><h3><a rel="nofollow" target="_blank" href="' . $item->url . '">' . $item->title . '</a></h3>
<p class="text-muted float-right">' . $item->salary . '</p>
<p class="text-muted">' . $item->company . ' - ' . $item->locations . '</p>
<p>' . $item->description . '</p>
<span class="badge badge-secondary">' . $item->site . '</span>
<span class="text-muted float-right">' . substr($item->date, 0, -13) . '</span>

</div></div><br>';
                        }
                    }
                } else {
                    echo $search_noresults_title;
                }
                ?>
                <?php
                if (!empty($zip_key)) {
                    $string = file_get_contents('https://api.ziprecruiter.com/jobs/v1?search=' . $search_term . '&location=' . $search_loc . '&jobs_per_page=' . $zipnr_search_result . '&page=' . $page . '&api_key=' . $zip_key . '');
                    $json_zip = json_decode($string);
//echo $json_zip->total_jobs;
//echo '<br>';
//echo $json_zip->num_paginable_jobs;

                    if (!empty($json_zip->jobs)) {
                        foreach ($json_zip->jobs as $item_zip) {
                            echo '<div class="card"><div class="card-body"><h3><a rel="nofollow" target="_blank" href="' . $item_zip->url . '">' . $item_zip->name . '</a></h3>
<p class="text-muted float-right">' . $item_zip->salary_min . '</p>
<p class="text-muted">' . $item_zip->hiring_company->name . ' - ' . $item_zip->location . '</p>
<p>' . $item_zip->snippet . '</p>
<span class="badge badge-secondary">' . $item_zip->source . '</span>
<span class="text-muted float-right">' . $item_zip->posted_time_friendly . '</span>

</div></div><br>';
                        }
                    }
                }
                ?>
                <?php
                $postad_bottom = file_get_contents("ads/searchpage_ad_bottom.php");
                if (isset($postad_bottom) and !empty($postad_bottom)): ?>
                    <div style="margin:30px 0px 30px 0px;">
                        <?php echo $postad_bottom; ?>
                    </div>
                <?php endif; ?>
                <?php if ($json->pages > 1): ?>
                    <div class="pagenavbar">
                        <ul class="pagination justify-content-center">

                            <?php
                            if ($page == 1):
                                echo '<li class="page-item disabled"><a class="page-link" href="javascript:void(0);">&laquo;</a></li>';
                            elseif ($page == 2):
                                echo '<li class="page-item"><a class="page-link" rel="prev" href="' . $site_url . '/search_main.php?j=' . $save_search . '&l=' . $search_loc . '&s=' . $sortby . '">&laquo;</a></li>';
                            else:
                                echo '<li class="page-item"><a class="page-link" rel="prev" href="' . $site_url . '/search_main.php?j=' . $save_search . '&l=' . $search_loc . '&s=' . $sortby . '&p=' . ($page - 1) . '">&laquo;</a></li>';
                            endif;

                            for ($i = 1; $i <= $json->pages; $i++):
                                $active = null;
                                if ($page == $i):
                                    $active = 'class="page-item active"';
                                endif;
                                if ($i == 1 or ($i > ($page - 5) and $i < ($page + 5)) or $i == $json->pages):
                                    if ($i == $json->pages and ($page < ($json->pages - 5))):
                                        echo '<li class="page-item disabled"><a class="page-link" href="javascript:void(0);">.....</a></li>';
                                    endif;
                                    if ($i == 1):
                                        echo '<li ' . $active . '><a class="page-link" href="' . $site_url . '/search_main.php?j=' . $save_search . '&l=' . $search_loc . '&s=' . $sortby . '">' . $i . '</a></li>';
                                    else:
                                        echo '<li ' . $active . '><a class="page-link" href="' . $site_url . '/search_main.php?j=' . $save_search . '&l=' . $search_loc . '&s=' . $sortby . '&p=' . $i . '">' . $i . '</a></li>';
                                    endif;
                                    if ($i == 1 and ($page > ($i + 5))):
                                        echo '<li class="page-item disabled"><a class="page-link" href="javascript:void(0);">.....</a></li>';
                                    endif;
                                endif;
                            endfor;
                            if ($page >= $json->pages):
                                echo '<li class="page-item disabled"><a class="page-link" href="javascript:void(0);">&laquo;</a></li>';
                            else:
                                echo '<li class="page-item"><a class="page-link" rel="next" href="' . $site_url . '/search_main.php?j=' . $save_search . '&l=' . $search_loc . '&s=' . $sortby . '&p=' . ($page + 1) . '">&raquo;</a></li>';
                            endif;
                            ?>

                        </ul>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

<?php include 'includes/footer.php'; ?>