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
    <section class="select-location-sec2 spl-padding-section px-sm-0 px-3 mx-0 ">
        <div class="container">
            <div class="row ">
                <div class="col-lg-6">
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-11">
                            <div class="base"><a href="https://bestdrifting.com/" target="_blank">

                                    <div>

                                        <img src="https://scorts.com.au/assets/images/banner6.jpg" class="long" alt="run">
                                        <!--  -->

                                        <img src="https://scorts.com.au/assets/images/logo-text.png" class="ea" alt="ea" style="width: 200px;height: 50px;">
                                        
                                        <div class="spin2">
                                            <div class="spinner"></div>
                                        </div>
                                        <div class="slid1"></div>
                                        <div class="butd">
                                             <span class="but" style="    width: 100%; display: contents;color: #fdfdfd;font-size: 14px!important;text-shadow: -5px 5px 3px black;">Scorts it’s Australian for escorts. See all the Australian escorts on Scorts now</span>
                                            <button class="but">Advertise now for Free!!</button>
                                        </div>
                                        <div class="h2">
                                            <!-- <h class="h1">Available <br> now</h> -->
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-11">
                            <div class="base2"><a href="https://escortsandbodyrubs.com/" target="_blank">

                                    <div>
                                        <img src="https://crackerclassifieds.com/style/1614501149_1596025982_Camilla 2.jpg" class="long" alt="run">
                                        <img src="https://escortsandbodyrubs.com/images/ic.ico" class="title" alt="nfs-payback">
                                        <img src="https://escortsandbodyrubs.com/images/logo1.png" class="ea" alt="ea" style="width: 200px;height: 40px; top: 26px;">
                                        
                                        <div class="spin2">
                                            <div class="spinner"></div>
                                        </div>
                                        <div class="slid1"></div>
                                        <div class="butd">
                                            <button class="but">Visit Now</button>
                                        </div>
                                         <div class="butd2">
                                            <button class="but2">Advertise now for Free!</button>
                                        </div>
                                        <div class="h2">
                                            <!-- <h class="h1">Available <br> now</h> -->
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

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
                                
                                 <img src="<?=$user->image?>" alt="Backpage Classifieds Image">
                              
                                <?php }else{ ?>
                                <img src="<?php echo base_url();?>fontassets/img/user.png" alt="Backpage Classifieds Image">
                                <?php } ?>
                            </div>
                            <div class="profile-text">
                                <h4>Welcome, <?=$user->name?></h4>
                                <a href="<?php echo base_url();?>profile/edit"><i class="fa fa-user"></i> View my profile</a>
                            </div>
                        </div>
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" href="<?php echo base_url();?>profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">My Profile <i class="fa fa-angle-right"></i></a>
                            <a class="nav-link" href="<?php echo base_url();?>myads" role="tab" aria-controls="v-pills-ads" aria-selected="false ">My Ads <i class="fa fa-angle-right"></i></a>
                            <a class="nav-link" href="<?php echo base_url();?>buycredit" role="tab" aria-controls="v-pills-credits" aria-selected="false">Buy Credits <i class="fa fa-angle-right"></i></a>
                            <a class="nav-link" href="<?php echo base_url();?>postad">Post A New Ad <i class="fa fa-angle-right"></i></a>
                            <a class="nav-link" href="<?php echo base_url();?>favourite" role="tab" aria-controls="v-pills-favourite" aria-selected="false">Favourite Ads <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8">

                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <div class="profile-tab-content">
                                    <h2><i class="fa fa-credit-card-alt"></i> Credit Balance:<?=$user->credit_value;?></h2>
                                </div>
                                <a href="<?php echo base_url();?>profile/deleteaccount" class="btn btn-sm btn-primary mt-2" onclick="return confirm('Are you sure you wish to delete your account ..You will lose any unused credits if you choose to proceed')">Delete Account</a>
                                <div class="profile-info-box">
                                    <div class="my-ads-box">
                                        <h4 class="box-title">My Ads</h4>
                                        <?php
                                        $this->db->select('id');
                                        $ad_qry=$this->db->get_where('ad_master',array('user_id'=>$u_id));
                                        $count=$ad_qry->num_rows();
                                        ?>
                                        <p class="box-circle"><?=$count;?></p>
                                        <a class="box-btn" href="<?php echo base_url();?>myads">Manage my ads</a>
                                    </div>
                                    <div class="own-credits-box">
                                        <h4 class="box-title">Own Credits</h4>
                                        <p class="box-circle"><i class="fa fa-credit-card-alt"></i></p>
                                        <a class="box-btn" href="<?php echo base_url('buycredit');?>">Buy Credits</a>
                                    </div>
                                    <div class="favourite-ads-box">
                                        <h4 class="box-title">Favourite Ads</h4>
                                        <p class="box-circle"><i class="fa fa-star-o"></i></p>
                                        <a class="box-btn" href="<?php echo base_url('favourite');?>">See all ads</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<style type="text/css">
    .select-location-sec2
    {
        padding: 90px 0!important;
    }
     .but2 {
            color: white;
            position: absolute;
            top: 40px;
            left: 80px;
            height: 35px;
            width: 180px;
            border: none;
            border-radius: 6px;
            outline: none;
            background: linear-gradient(45deg, #004580, #1e8ce8, #89c9ff);
            box-shadow: 0px 0px 20px 0.5px #000;
            cursor: pointer;
            font-family: "Raleway", sans-serif;
            font-size: 15px;
            animation: b 2s linear infinite;
            z-index: 1;
        }

        .butd2 {
            position: absolute;
            animation: butd2 10s ease-in-out infinite;
        }
        @keyframes butd2 {
            0% {
                top: 500px;
            }

            20% {
                top: 0px;
            }
        }
    @media only screen and (max-width:1199px) and (min-width:992px) {
            .but {
                color: white;
                left: 280px;
                top: 36px;
            }

            .but2 {
                top: 35px;
                left: 85px;
                width: 150px;
                font-size: 13px;
            }
        }
  
     @media only screen and (max-width: 991px) and (min-width: 768px) {
            .but2 {
                top: 29px;
                left: 120px;
                font-size: 15px;
            }
            .spl-padding-section.select-location-sec2 {
            margin-top: 10px!important;
            margin-bottom: 130px!important;
            }
        }
   
    @media only screen and (max-width:767px) {
            .but2 {
                top: 6px;
                left: 130px;
                height: 35px;
                width: 180px;
                font-size: 14px;
            }

            .but {
                left: 130px !important;
                top: 47px!important;
            }
            .spl-padding-section.select-location-sec2 {
    margin-bottom: 120px!important;
    margin-top: 0px!important;
}
        }
        @media only screen and (max-width: 767px) {
        .select-location-sec2{
        height: 150px;
        margin-top: 115px;
        padding: 0;
        }
        .but{
        left: 188px!important;
        }
        .ea{
        width: 150px!important;
        height: 38px!important;
        animation: s1 10s ease-out infinite!important;

        }
        .base
        {

        left: 0px;
        width: 100%;
        }
        .base2{
        top: 240px;
        right: 0px!important;
        width: 100%;
        }
        }
     @media only screen and (max-width:575px) {
            .but {
                left: 5px !important;
                top: 55px!important;
                width: 130px!important;
                font-size: 15px!important;
                height: 30px!important;
            }

            .but2 {
                top: 55px;
                left: 145px;
                height: 30px;
                width: 135px;
                font-size: 11px;
                z-index: 50;
            }

            .ea {
                width: 120px !important;
                left: 160px !important;
                top: 10px!important;
            }
          
        }


</style>