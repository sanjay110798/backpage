<?php 
// session_start();
error_reporting(0);
// ob_start();

?>
<!DOCTYPE html>
<html lang="en">
<?php 
$url=$this->uri->segment(1);
$url2=$this->uri->segment(2);

$this->db->select('id,user_id,country,ad_title,location,contact_number,ad_description');
$ad=$this->db->get_where('ad_master',array('id'=>$this->uri->segment(3)))->row();
$user_qry=$this->db->get_where('user_master',array('id'=>$ad->user_id))->row();
// $country=$this->db->get_where('countries_new',array('id'=>$ad->country_id))->row();
// $city=$this->db->get_where('cities',array('country_id'=>$ad->country_id))->row();

?>
    
   
   
    
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=utf8_decode($ad->ad_title)?>-<?=$ad->location?></title>
    <meta name = "keywords" content = "<?=$ad->contact_number;?>" /> 
    <meta name = "description" content = '<?=($ad->ad_description);?>' /> 
    <meta name="robots" content="index,follow"/>
    <meta property="og:title" content="Backpage Classifieds - Free Classifieds Advertising Worldwide"/>
    <meta property="og:type" content="Backpage Classifieds Advertising services worldwide. Now You can view your business ads from all over the world on Backpage & Cracker Classifieds."/>
    <meta property="og:image" content="https://backpageclassifieds.com/style/assets/images/fav1.jpeg"/>
    <meta property="og:url" content="https://backpageclassifieds.com/"/>
    <link rel="canonical" href="https://backpageclassifieds.com/"/>
    
    <meta name="google-signin-client_id" content="533133317728-roq55jf3hf47u5lf33fmrv22o6b8jh5k.apps.googleusercontent.com">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>style/assets/images/fav1.jpeg">
    <!-- bootstrap-links -->
    <link href="<?php echo base_url();?>fontassets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- fonts-link -->
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@400;700&display=swap" rel="stylesheet">
    <!-- css-link -->
    <link href="<?php echo base_url();?>fontassets/css/header.css" rel="stylesheet">
    <link href="<?php echo base_url();?>fontassets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>fontassets/css/footer.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
   <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f9676a2b30a760012e6f376&product=sop' async='async'></script>
   
   
</head>

<body class="page-id-2">

    <header class="header-style">
        <div class="fixed-header">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>fontassets/img/logo.png" alt="Our Logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav header-category mr-3">
                            <?php 
                            
                            $i=1;
                            $this->db->select('category_name,category_icon');
                            $category_qry=$this->db->get('category_master')->result_array();
                            foreach ($category_qry as $cat) 
                            {
                            ?>
                            <li>

                                <a class="circle" href="<?php echo base_url();?>ad/category/<?=strtolower(str_replace(" ", "_",$cat['category_name']));?>">
                                <img src="<?=$cat['category_icon']?>" alt="Category Image"></a>
                            </li>
                            <?php } ?>
                        </ul>
                        <ul class="navbar-nav header-info mr-3">
                            <li class="star-icon">
                                <a href="#"><i class="fa fa-star star"></i></a>
                            </li>
                            <li class="post-ad">
                               <?php if($this->session->userdata('login_id')==''){?>
                               <a href="<?php echo base_url();?>authentication?loginfirst==1"><?php } if($this->session->userdata('login_id')!=''){?><a href="<?php echo base_url();?>postad"><?php } ?>
                                <i class="fa fa-plus-circle"></i> Post A Free Ad</a>
                            </li>
                            <?php if($this->session->userdata('login_id')==''){?>
                            <li class="login-register">
                                <a href="<?php echo base_url();?>authentication"><i class="fa fa-user"></i> Login/Register</a>
                            </li>
                            <?php } if($this->session->userdata('login_id')!=''){?>
                            <li class="login-register dropdown">
                                <a href="#"><i class="fa fa-user"></i> Profile</a>
                                <div class="dropdown-content mt-1">
                                <a href="<?php echo base_url();?>profile">My Profile</a>
                                <a href="<?php echo base_url();?>myads">My Ads</a>
                                <a href="<?php echo base_url('authentication/logout')?>" onclick="signOut();">Sign Out</a>

                                </div>
                            </li>
                           
                            <?php } ?>
                            <li class="select-language">
                                <i class="fa fa-language"></i>
                                <select class="custom-select" onchange="doGTranslate(this);">
                                    <option >Language</option>
                                    <option value="en|en">English</option>
                                    <option value="en|zh-CN">Chinese</option>
                                    <option value="en|hi">Hindi</option>
                                    <option value="en|es">Spanish</option>
                                    <option value="en|fr">French</option>
                                    <option value="en|ar">Arabic</option>
                                    <option value="en|ms">Malay</option>
                                    <option value="en|bn">Bengali</option>
                                    <option value="en|ru">Russian</option>
                                    <option value="en|pt">Portuguese</option>
                                    <option value="en|id">Indonesian</option>
                                    <option value="en|ur">Urdu</option>
                                    <option value="en|de">German</option>
                                    <option value="en|ja">Japanese</option>
                                    <option value="en|sw">Swahili</option>
                                    <option value="en|mr">Marathi</option>
                                    <option value="en|te">Telugu</option>
                                    <option value="en|pa">Punjabi</option>
                                    <option value="en|zh">Wu Chinese</option>
                                    <option value="en|ta">Tamil</option>
                                    <option value="en|tr">Turkish</option>
                                </select>
                            </li>
                            <li class="select-country">
                                <i class="fa fa-globe"></i>
                                <select class="custom-select" name="session_country" id="session_country" style="width: 125px;">
                                    <option >Country</option>
                                    <?php 
                                    $country_qry=$this->db->get('countries_new',50)->result();
                                    foreach ($country_qry as $country) {

                                    ?>
                                    <option value="<?=$country->country_name;?>"<?php if($this->session->userdata('country')==$country->country_name){echo"selected";}?>><?=$country->country_name;?></option>
                                    <?php } ?>
                                    <option value="all">Show All</option>
                                </select>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>

<style type="text/css">

a.gflag img {border:0;}

#goog-gt-tt {display:none !important;}
.goog-te-banner-frame {display:none !important;}
.goog-te-menu-value:hover {text-decoration:none !important;}
body {top:0 !important;}
#google_translate_element2 {display:none!important;}
.select2-container--default .select2-selection--single {
    height: 48px!important;
}
/*#g-recaptcha1 div{
  width: 100% !important;
  height: 78px !important;
}*/

.dropdown {
  position: relative;
  display: inline-block;
}
.dropdown-content {
  display: none;
  position: absolute;
  min-width: 100px;
  /*box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);*/
  z-index: 1;
 
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  border-radius: 0px;
  background: #ffffffbf!important;
}
.dropdown-content a:hover {
  background: #d93920!important;
}
.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

/*@media only screen and (max-width: 320px)
{
#g-recaptcha1 div{
    margin-left:-9px;
}*/
}
.select2-container--default .select2-selection--single {
    height: 50px!important;
}
.home-banner,.category-banner,.ad-banner{
    background-image: url('../../fontassets/images/pic2.jpg')!important;
}
.location{
position: relative;
}
.locationsearch{
     position: absolute;
    width: 100%;
    height: auto;
    /* margin-bottom: 10px; */
    background-color: #fff;
    padding: 10px 20px;
    border-bottom-left-radius: 4px;
    border-bottom-right-radius: 4px;
    top: 103%;
    left: 0;
    z-index: 9999;
    border: 1px solid #71c3c0d6;
    border-top: none;
}

.locationsearch li {
    list-style: none;
    border-bottom: 1px solid #ddd;
    padding: 2px 0;
    cursor: pointer;
}
/*@media screen and (min-width:200px) and (max-width:767px) {

    .ad-banner .serch-form
     {
        display: none;
     }
    .ad-banner .serch-form1
     {
        display: block!important;
     }
}*/
@media screen and (max-width: 767px) and (min-width: 200px)
{
.ad-banner .serch-form form .col .location, .ad-banner .serch-form form .col .distance, .ad-banner .serch-form form .col .find {
    display: none;
}

}
@media screen and (max-width: 767px) and (min-width: 481px)
{
  .fixed-header .header-info li a {
    font-size: 10px!important;
}  
.custom-select,.select-country
{
    width: 109px!important;
    font-size: 14px!important;
}
.fixed-header .header-info {
    justify-content: center;
}
.sticky .fixed-header .header-category {
    justify-content: center;
}
}
@media screen and (max-width: 480px) and (min-width: 200px)
{
.sticky .fixed-header .header-category {
  
    justify-content: center;
}
.fixed-header .header-info li a {
    font-size: 8px!important;
    padding: 6px 3px 5px 3px!important;

} 
.fixed-header .header-info {
    justify-content: center;
}
.fixed-header .header-category li {
    padding: 2px!important;
    margin: 3px 5px 0px 0!important;
    min-width: 32px!important;
    justify-content: center!important;
}
.fixed-header .header-category li a {
    height: 25px!important;
    width: 24px!important;
}
.star-icon 
{
    width: 19px!important;
} 
.fixed-header .star-icon a i {
    margin: 0px 0px 0 0;
    font-size: 13px;
}
.custom-select,.select-country
{
    padding: 0 0px 0 4px!important;
    width: 72px!important;
    font-size: 10px!important;
}
}
</style>