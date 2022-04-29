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
                               
                                 <img src="<?=$user->image?>" alt="User Image">
                               
                                <?php }else{ ?>
                                <img src="<?php echo base_url();?>fontassets/img/user.png" alt="User Image">
                                <?php } ?>
                            </div>
                            <div class="profile-text">
                                <h4>Welcome, <?=$user->name?></h4>
                                <a href="<?php echo base_url();?>profile/edit"><i class="fa fa-user"></i> View my profile</a>
                            </div>
                        </div>
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                             <a class="nav-link " href="<?php echo base_url();?>profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">My Profile <i class="fa fa-angle-right"></i></a>
                            <a class="nav-link " href="<?php echo base_url();?>myads" role="tab" aria-controls="v-pills-ads" aria-selected="false ">My Ads <i class="fa fa-angle-right"></i></a>
                            <a class="nav-link " href="<?php echo base_url();?>buycredit" role="tab" aria-controls="v-pills-credits" aria-selected="false">Buy Credits <i class="fa fa-angle-right"></i></a>
                            <a class="nav-link" href="<?php echo base_url();?>postad">Post A New Ad <i class="fa fa-angle-right"></i></a>
                            <a class="nav-link active" href="<?php echo base_url();?>favourite" role="tab" aria-controls="v-pills-favourite" aria-selected="false">Favourite Ads <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="tab-content" id="v-pills-tabContent">
                                                    
                            <div class="tab-pane fade show active" id="v-pills-favourite" role="tabpanel" aria-labelledby="v-pills-favourite-tab">
                                <?php if(count($favourite)==0)
                                {
                                ?>
                                 <div class="message-box">
                                    <span class="message-icon">i</span>
                                    <h2>Favourite Ads</h2>
                                    <p>Your Favorite Ads help you keep track of the ads that you find interesting so you can access them again at a later time. You don’t have any favorite ads listed at the moment. Add your favorites to this list by clicking
                                        on the star icon next to the ad.
                                    </p>
                                </div>
                               <?php }else{?>
                                <div class="my-ads">
                                    <h2>Favourite Ads</h2>
                                    <div class="row">
                                        <?php 

                                        foreach ($favourite as $ad) {

                                        ?>
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="card my-ad-box mb-1">
                                                <div class="card-body">
                                                   
                                                    
                                                    <img src="<?=$ad->ad_image;?>" class="card-img-top" alt="React Image">
                                                    
                                                    <h5 class="my-ad-title"><?=substr(utf8_decode($ad->ad_title),0,10)?>..</h5>
                                                    <p class="avaliable">Avaliable</p>
                                                    <div class="edit-delete-option">
                                                        
                                                        <a href="<?php echo base_url();?>favourite/delete/<?=$ad->id;?>" class="delete-btn" onclick="return del()"><i class="fa fa-trash"></i></a>
                                                        <a href="<?php echo base_url();?>ad/details/<?=$ad->id;?>?pagefirst==0" class="edit-btn">View</a>
                                                    </div>
                                                    <div class="premium-crousel-option">
                                                      
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