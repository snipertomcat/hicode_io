<?php
if(isset($_SESSION['username'])){


	class OverWrite{
/* 1 */
		private $username;
		private $password;
		private $site_url;
		private $site_title;
		private $youtube_key;
		private $zip_key;
		private $addthis_id;
		private $contact_email;
		private $site_theme;
		private $cj_local;
		private $nr_search_result;
		private $zipnr_search_result;
		private $show_sortoptions;
		
		
		
		
		private $homepage_title;
		private $homepage_desc;
		private $search_seo_title;

	
		
		private $home_menu_link;
		
		private $feat_menu_link;
		private $about_menu_link;
		private $searchftitle_text;
		private $searchf_text;
		private $searchloc_text;
		private $searchfsort_text;
		private $searchfrel_text;
		private $searchfdat_text;
		private $searchfsal_text;
		private $searchp_job_text;
		private $searchp_in_text;
		private $searchp_page_text;
		
		private $footnav_home;
		private $footnav_privacy;
		
		private $footnav_contact;
		
/* 2 */
		function Write($username,$password,$site_url,$site_title,$youtube_key,$zip_key,$addthis_id,$contact_email,$site_theme,$cj_local,
		$nr_search_result,$zipnr_search_result,$show_sortoptions,$homepage_title,$homepage_desc,$search_seo_title,
		$home_menu_link,$feat_menu_link,$about_menu_link,$searchftitle_text,$searchf_text,$searchloc_text,$searchfsort_text,$searchfrel_text,$searchfdat_text,$searchfsal_text,$searchp_job_text,$searchp_in_text,$searchp_page_text,
		$footnav_home,$footnav_privacy,
		$footnav_contact){

			$this->username=$username;
			$this->password=$password;
			$this->site_url=$site_url;
			$this->site_title=$site_title;
			//$this->youtube_key=$youtube_key;
			//$this->addthis_id=$addthis_id;
			//$this->contact_email=$contact_email;
			$this->site_theme=$site_theme;
			$this->cj_local=$cj_local;
			$this->nr_search_result=$nr_search_result;
			$this->zipnr_search_result=$zipnr_search_result;
			$this->show_sortoptions=$show_sortoptions;
			
			
			
			
			$this->homepage_title=$homepage_title;
			$this->homepage_desc=$homepage_desc;
			//$this->search_seo_title=$search_seo_title;
			//$this->videopage_title=$videopage_title;
			//$this->chart_pre_title=$chart_pre_title;
			//$this->chart_aft_title=$chart_aft_title;
			//$this->head_code=$head_code;
			//$this->home_ad_728 =$home_ad_728;
			//$this->chart_ad_728=$chart_ad_728;
			//$this->search_ad_728=$search_ad_728;
			//$this->down_ad_728=$down_ad_728;
			//$this->downmod_ad_300=$downmod_ad_300;
			
			
		
			
			$this->home_menu_link=$home_menu_link;
			$this->feat_menu_link=$feat_menu_link;
			$this->about_menu_link=$about_menu_link;
			$this->searchftitle_text=$searchftitle_text;
			$this->searchf_text=$searchf_text;
			$this->searchloc_text=$searchloc_text;
			$this->searchfsort_text=$searchfsort_text;
			$this->searchfrel_text=$searchfrel_text;
			$this->searchfdat_text=$searchfdat_text;
			$this->searchfsal_text=$searchfsal_text;
			$this->searchp_job_text=$searchp_job_text;
			$this->searchp_in_text=$searchp_in_text;
			$this->searchp_page_text=$searchp_page_text;
			
			$this->footnav_home=$footnav_home;
			$this->footnav_privacy=$footnav_privacy;
			
			$this->footnav_contact=$footnav_contact;
			
/* 3 */
			if(!empty($_POST['username'])){
			$this->username=$_POST['username'];
			}
			if(!empty($_POST['newpassword'])){
			$this->password=$_POST['newpassword'];
			}
			if(!empty($_POST['site_url'])){
			$this->site_url=$_POST['site_url'];
			}
			if(!empty($_POST['site_title'])){
			$this->site_title=$_POST['site_title'];
			}
			
			$this->youtube_key=$_POST['youtube_key'];
			$this->zip_key=$_POST['zip_key'];
			
			$this->addthis_id=$_POST['addthis_id'];
			
			
			$this->contact_email=$_POST['contact_email'];
			
			if(!empty($_POST['site_theme'])){
			$this->site_theme=$_POST['site_theme'];
			}
			$this->cj_local = $_POST['cj_local'];
			if(!empty($_POST['nr_search_result'])){
			$this->nr_search_result=$_POST['nr_search_result'];
			}
			if(!empty($_POST['zipnr_search_result'])){
			$this->zipnr_search_result=$_POST['zipnr_search_result'];
			}
			if(!empty($_POST['show_sortoptions'])){
			$this->show_sortoptions='1';
			} else {
			$this->show_sortoptions='0';
			}
			
			
			
			
			if(!empty($_POST['homepage_title'])){
			$this->homepage_title=$_POST['homepage_title'];
			}
			if(!empty($_POST['homepage_desc'])){
			$this->homepage_desc=$_POST['homepage_desc'];
			}
			
			$this->search_seo_title=$_POST['search_seo_title'];
			
			
		
		
			if(!empty($_POST['home_menu_link'])){
			$this->home_menu_link=$_POST['home_menu_link'];
			}
			
			if(!empty($_POST['feat_menu_link'])){
			$this->feat_menu_link=$_POST['feat_menu_link'];
			}
			if(!empty($_POST['about_menu_link'])){
			$this->about_menu_link=$_POST['about_menu_link'];
			}
			if(!empty($_POST['searchftitle_text'])){
			$this->searchftitle_text=$_POST['searchftitle_text'];
			}
			if(!empty($_POST['searchf_text'])){
			$this->searchf_text=$_POST['searchf_text'];
			}
			if(!empty($_POST['searchloc_text'])){
			$this->searchloc_text=$_POST['searchloc_text'];
			}
			if(!empty($_POST['searchfsort_text'])){
			$this->searchfsort_text=$_POST['searchfsort_text'];
			}
			if(!empty($_POST['searchfrel_text'])){
			$this->searchfrel_text=$_POST['searchfrel_text'];
			}
			if(!empty($_POST['searchfdat_text'])){
			$this->searchfdat_text=$_POST['searchfdat_text'];
			}
			if(!empty($_POST['searchfsal_text'])){
			$this->searchfsal_text=$_POST['searchfsal_text'];
			}
			if(!empty($_POST['searchp_job_text'])){
			$this->searchp_job_text=$_POST['searchp_job_text'];
			}
			if(!empty($_POST['searchp_in_text'])){
			$this->searchp_in_text=$_POST['searchp_in_text'];
			}
			if(!empty($_POST['searchp_page_text'])){
			$this->searchp_page_text=$_POST['searchp_page_text'];
			}
			
			if(!empty($_POST['footnav_home'])){
			$this->footnav_home=$_POST['footnav_home'];
			}
			if(!empty($_POST['footnav_privacy'])){
			$this->footnav_privacy=$_POST['footnav_privacy'];
			}
		
			if(!empty($_POST['footnav_contact'])){
			$this->footnav_contact=$_POST['footnav_contact'];
			}
			
/* 4 */
			$data = '<?php  
			$username="'.$this->username.'"; 
			$password="'.$this->password.'"; 
			$site_url="'.$this->site_url.'"; 
			$site_title="'.$this->site_title.'"; 
			$youtube_key="'.$this->youtube_key.'";
			$zip_key="'.$this->zip_key.'";
			$addthis_id="'.$this->addthis_id.'"; 
			$contact_email="'.$this->contact_email.'";
			$site_theme="'.$this->site_theme.'";			
			$cj_local="'.$this->cj_local.'"; 
			$nr_search_result="'.$this->nr_search_result.'"; 
			$zipnr_search_result="'.$this->zipnr_search_result.'";
			$show_sortoptions="'.$this->show_sortoptions.'";
			$homepage_title="'.$this->homepage_title.'";
			$homepage_desc="'.$this->homepage_desc.'";
			$search_seo_title="'.$this->search_seo_title.'";
			$home_menu_link="'.$this->home_menu_link.'";
			$feat_menu_link="'.$this->feat_menu_link.'";
			$about_menu_link="'.$this->about_menu_link.'";
			$searchftitle_text="'.$this->searchftitle_text.'";
			$searchf_text="'.$this->searchf_text.'";
			$searchloc_text="'.$this->searchloc_text.'";
			$searchfsort_text="'.$this->searchfsort_text.'";
			$searchfrel_text="'.$this->searchfrel_text.'";
			$searchfdat_text="'.$this->searchfdat_text.'";
			$searchfsal_text="'.$this->searchfsal_text.'";
			$searchp_job_text="'.$this->searchp_job_text.'";
			$searchp_in_text="'.$this->searchp_in_text.'";
			$searchp_page_text="'.$this->searchp_page_text.'";
			$footnav_home="'.$this->footnav_home.'";
			$footnav_privacy="'.$this->footnav_privacy.'";
			$footnav_contact="'.$this->footnav_contact.'";
			
			?>';

			file_put_contents('config.php', $data);


		}

	}

}


if(!empty($_POST['username'])&&!empty($_POST['password']))
{
	if($_POST['username']===$username&&$_POST['password']===$password){
		$_SESSION['username']=$username;

	}else{

		header('Location:index.php?error');
	}

}
if(isset($_GET['logout'])){
	unset($_SESSION['username']);
	header('Location:index.php');
	exit;
}

if(isset($_POST['update'])){

	if (is_writable('config.php')) {

			$object=new OverWrite;
			$object->Write($username,$password,$site_url,$site_title,$youtube_key,$zip_key,$addthis_id,$contact_email,$site_theme,$cj_local,
		$nr_search_result,$zipnr_search_result,$show_sortoptions,$homepage_title,$homepage_desc,$search_seo_title,
		$home_menu_link,$feat_menu_link,$about_menu_link,$searchftitle_text,$searchf_text,$searchloc_text,$searchfsort_text,$searchfrel_text,$searchfdat_text,$searchfsal_text,$searchp_job_text,$searchp_in_text,$searchp_page_text,
		$footnav_home,$footnav_privacy,
		$footnav_contact);
			header("Location:index.php?updated");

			} else {
				header('Location:index.php?file-error');
			}
}


?>