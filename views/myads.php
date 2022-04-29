<link href="<?php echo base_url();?>fontassets/css/user-dashboard.css" rel=" stylesheet ">
<?php
if($this->session->userdata('login_id')=='')
{
  redirect('authentication?loginerr==0');
}
?>
 <?php 
$banner=$this->db->get_where('banner',array('id'=>1))->row();
?>
<section class="user-dashboard-banner " style="background-image: url(<?=$banner->image?>)!important;">
        <div class="container ">
            <div class="banner-content ">
                <div class="row "></div>
            </div>
        </div>
    </section>
    <?php 
    $u_id=$this->session->userdata('login_id');

    $this->db->select('image,name');
    $user=$this->db->get_where('user_master',array('id'=>$u_id))->row();

    ?>
    <section class="dashboard-content">
        <div class="container">
            <div class="dashboard-tabs">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="user-profile">
                            <div class="profile-img">
                                
                                <?php 
                                if($user->image !='')
                                {
                                ?>
                                
                                 <img src="<?=$user->image?>" alt="User Main Image">
                              
                                <?php }else{ ?>
                                <img src="<?php echo base_url();?>fontassets/img/user.png" alt="User Main Image">
                                <?php } ?>
                            </div>
                            <div class="profile-text">
                                <h4>Welcome, <?=$user->name?></h4>
                                <a href="<?php echo base_url();?>profile/edit"><i class="fa fa-user"></i> View my profile</a>
                            </div>
                        </div>
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link " href="<?php echo base_url();?>profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">My Profile <i class="fa fa-angle-right"></i></a>
                            <a class="nav-link active" href="<?php echo base_url();?>myads" role="tab" aria-controls="v-pills-ads" aria-selected="false ">My Ads <i class="fa fa-angle-right"></i></a>
                            <a class="nav-link " href="<?php echo base_url();?>buycredit" role="tab" aria-controls="v-pills-credits" aria-selected="false">Buy Credits <i class="fa fa-angle-right"></i></a>
                            <a class="nav-link" href="<?php echo base_url();?>postad">Post A New Ad <i class="fa fa-angle-right"></i></a>
                            <a class="nav-link" href="<?php echo base_url();?>favourite" role="tab" aria-controls="v-pills-favourite" aria-selected="false">Favourite Ads <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="tab-content" id="v-pills-tabContent">
                           
                             <div class="tab-pane fade show active" id="v-pills-ads" role="tabpanel" aria-labelledby="v-pills-ads-tab">
                                <?php if(count($myads)==0)
                                {
                                ?>
                                 <div class="message-box">
                                    <span class="message-icon">i</span>
                                    <h2>My Ads</h2>
                                    <p>Your Favorite Ads help you keep track of the ads that you find interesting so you can access them again at a later time. You don’t have any favorite ads listed at the moment. Add your favorites to this list by clicking
                                        on the star icon next to the ad.
                                    </p>
                                </div>
                               <?php }else{?>
                                <div class="my-ads">
                                    <h2>My Ads</h2>
                                    <div class="row">
                                        <?php 

                                        foreach ($myads as $ad) {

                                        ?>
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="card my-ad-box mb-1">
                                                <div class="card-body">
                                                   <a href="<?php echo base_url();?>ad/details/<?=$ad->id?>">
                                                    
                                                    <img src="<?=$ad->ad_image;?>" class="card-img-top adimage" alt="Ads Main Image">
                                                   
                                                 
                                                    </a>
                                                    <h5 class="my-ad-title"><?=substr(utf8_decode($ad->ad_title),0,10)?>..</h5>
                                                    <?php if($ad->category_id==10 && $ad->photo_varified =="H" && $ad->status=="Active"){
                                                    $check=$this->db->get_where('verified_table',array('ad_id'=>$ad->id))->num_rows();
                                                    if($check==0)
                                                    {
                                                    ?>

                                                    <a href="<?php echo base_url();?>verifyphoto/index/<?=$ad->id?>"><p class="avaliable"><i class="fa fa-external-link"></i> Verify Your Photo</p></a>

                                                    <?php } if($check!=0){?>

                                                    <p class="avaliable"><i class="fa fa-clock-o"></i> Wait For Verify</p>

                                                    <?php }} if($ad->category_id==10 && $ad->photo_varified =="N" && $ad->status=="Active"){?>

                                                    <p class="avaliable"><i class="fa fa-check-circle" style="color: #25d366;"></i> Verified</p>

                                                    <?php } ?>
                                                    <div class="edit-delete-option">
                                                        <a href="<?php echo base_url();?>postad/redirect/Adedit/<?=$ad->id?>" class="edit-btn">Edit</a>
                                                        <a href="<?php echo base_url();?>myads/delete/<?=$ad->id;?>" class="delete-btn" onclick="return del()"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                    <div class="premium-crousel-option">
                                                        <?php 
                                                        $time=date('h:i:s');
                                                        $date=date('Y-m-d');

                                                        $this->db->select('days');        
                                                        $feature=$this->db->get_where('featured_ad_details',array('ad_id'=>$ad->id));
                                                        $feature_ad=$feature->row();

                                                        $this->db->select('days');
                                                        $premium=$this->db->get_where('premium_ad_details',array('ad_id'=>$ad->id));
                                                        $premium_ad=$premium->row();
                                                        
                                                        $this->db->select('last_date');
                                                        $topad=$this->db->get_where('topad_table',array('ad_id'=>$ad->id));
                                                        $top_ad=$topad->row();
                                                        
                                                        $datetime=date('Y-m-d H:i:s');
                                                        $this->db->select('last_datetime,from_datetime');
                                                        $availablead=$this->db->get_where('available_table',array('ad_id'=>$ad->id,'last_datetime >=' =>$datetime));
                                                        $available_ad=$availablead->row();
                                                        ?>
                                                        <?php if($premium->num_rows()==0){?>
                                                        <a href="<?php echo base_url();?>postad/redirect/Premium/<?=$ad->id;?>" class="premium-btn mb-1">Premium</a>
                                                        <?php }if($premium->num_rows()!=0 && $premium_ad->days<$date){ ?>
                                                        <a href="<?php echo base_url();?>postad/redirect/Premium/<?=$ad->id;?>" class="premium-btn mb-1">Premium</a>
                                                        <?php } if($premium->num_rows()!=0 && $premium_ad->days>=$date){?>
                                                        <a href="#0" class="premium-btn mb-1" style="padding: 2px 6px;"><marquee>Premium Option Expire On <?=$premium_ad->days;?></marquee></a>  
                                                        <?php } ?>
                                                        
                                                        <?php if($feature->num_rows()==0){?>
                                                        <a href="<?php echo base_url();?>postad/redirect/Feature/<?=$ad->id;?>" class="premium-btn mb-1">Feature</a>
                                                        <?php }if($feature->num_rows()!=0 && $feature_ad->days<$date){ ?>
                                                        <a href="<?php echo base_url();?>postad/redirect/Feature/<?=$ad->id;?>" class="premium-btn mb-1">Feature</a>
                                                        <?php } if($feature->num_rows()!=0 && $feature_ad->days>=$date){?>
                                                        <a href="#0" class="premium-btn mb-1" style="padding: 2px 6px;"><marquee>Feature Option Expire On <?=$feature_ad->days;?></marquee></a>  
                                                        <?php } ?>
                                                        
                                                        <?php if($topad->num_rows()==0){?>
                                                        <a href="<?php echo base_url();?>postad/redirect/Topad/<?=$ad->id;?>" class="carousel-btn">Carousel</a>
                                                        <?php }if($topad->num_rows()!=0 && $top_ad->last_date<$date){ ?>
                                                        <a href="<?php echo base_url();?>postad/redirect/Topad/<?=$ad->id;?>" class="carousel-btn">Carousel</a>
                                                        <?php } if($topad->num_rows()!=0 && $top_ad->last_date>=$date){?>
                                                        <a href="#0" class="carousel-btn" style="padding: 2px 6px;"><marquee>Top Ad Option Expire On <?=$top_ad->last_date;?></marquee></a>  
                                                        <?php } ?>

                                                        
                                                        <?php if($ad->category_id==10){
                                                        $t1=new DateTime($datetime);
                                                        $t2=new DateTime($available_ad->last_datetime);
                                                        $dif=$t2->diff($t1);
                                                        ?>
                                                        
                                                        <?php if($availablead->num_rows()==0){?>
                                                        <a href="<?php echo base_url();?>postad/redirect/Available/<?=$ad->id;?>" class="carousel-btn" style="background: aqua;">Available</a>
                                                        <?php }if($availablead->num_rows()!=0 && $datetime > $available_ad->last_datetime){ ?>
                                                        <a href="<?php echo base_url();?>postad/redirect/Available/<?=$ad->id;?>" class="carousel-btn" style="background: aqua;">Available</a>
                                                        <?php } if($availablead->num_rows()!=0  && $datetime > $available_ad->from_datetime && $datetime < $available_ad->last_datetime){?>
                                                        <a href="#0" class="carousel-btn" style="padding: 2px 6px;background: aqua;"><marquee>Avaliable For <?=$dif->format("%H");?>h <?=$dif->format("%i");?>m</marquee></a>  
                                                        <?php } ?>

                                                        <?php } ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<style type="text/css">
    .card-img-top
    {
            height: 244px;
    }
</style>
