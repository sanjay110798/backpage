<link href="<?php echo base_url();?>fontassets/css/user-profile.css" rel="stylesheet">
<style type="text/css">
	input
	{
	 text-transform:none!important;
	}
</style>
<?php
if($this->session->userdata('login_id')=='')
{
  redirect('authentication?loginerr==0');
}
 
    $u_id=$this->session->userdata('login_id');
    // $user=$this->db->get_where('user_master',array('id'=>$u_id))->row();
    $ad_id=$this->uri->segment(3);

    $this->db->select('pic_url,ad_image,id');
    $ad=$this->db->get_where('ad_master',array('id'=>$ad_id))->row();

?>
 <section class="user-profile-banner ">
        <div class="container ">
            <div class="banner-content">
                <div class="row"></div>
            </div>
        </div>
    </section>


    <section class="user-content-sec">
        <div class="container">
            <div class="row">
                <div class="user-profile-content mt-4">
                    <h2 class="profile-title"><i class="fa fa-user"></i>Verify Profile</h2>
                    <div class="user-profile-form">
                        <form action="<?php echo base_url();?>verifyphoto/add/<?=$ad_id;?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="notice"><i class="fa fa-bullhorn fa-1x"></i> Notice</div>
                               <marquee><p style="font-size: 15px;font-weight: 600;text-transform: uppercase;">To get your images verified on Cracker Classifieds please send two selfie photos wearing the same clothes as the images you are posting on your advert .</p></marquee>
                                <hr>
                            </div>
                            <div class="col-md-3">
                                 <label style="font-weight: 600;font-size: 18px;">Your Profile Photo</label>
                                <div class="profile-img">
                                <?php if($ad->pic_url==1){?>
                                <img src="<?=$ad->ad_image?>" class="form-control-file" alt="Backpage Classifieds Image">
                                <?php }if($ad->pic_url==2){?>
                                <img src="<?=$ad->ad_image;?>" class="form-control-file" alt="Backpage Classifieds Image">
                                <?php } ?>
                                   
                                </div>
                            </div>
                            
                             <div class="col">
                                <div class=" profile-info">
                                <div class="profile-img">
                                        <label>One Selfie With One Finger On Your Left Ear*</label>
                                        <input type="file" class="form-control-file" name="first_photo" required>
                                        <i class="fa fa-user-plus"></i>
                                        <label>Upload First Photo</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="profile-img profile-info">
                                        <label>Another Selfie Holding Up 3 Fingers*</label>
                                        <input type="file" class="form-control-file" name="second_photo" required>
                                        <i class="fa fa-user-plus"></i>
                                        <label>Upload Second Photo</label>
                                    
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <div class="profile-info ">
                                   
                                     
                                        <div class="row profile-btns">
                                            <div class="col">
                                               <button type="button" class="btn view-profile-btn" onClick="history.go(-1);">Back</button>
                                                <button type="submit" class="btn update-prfile-btn">Verify Profile</button>
                                            </div>
                                        </div>
                                   
                                </div>
                            </div>
                          
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <style type="text/css">
        .select2-container--default .select2-selection--single {
    height: 50px!important;
}
 .notice
    {
    background: #cb2027 !important;
    display: inline-block !important;
    padding: 5px !important;
    color: white !important;
    font-weight: 600 !important;
    position: absolute;
    z-index: 1;
    }
marquee
    {
    background: bisque;
    height: 34px;
    padding-top: 7px;

    }
    </style>