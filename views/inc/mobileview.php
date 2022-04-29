<section class="home-banner">
        <div class="container">
            <div class="banner-content">
                <div class="row">
                	<div class="col-md-4">
                		<div class="post-ad1">
                		 <?php if($this->session->userdata('login_id')==''){?>
                               <a href="<?php echo base_url();?>authentication?loginfirst==1"><?php } if($this->session->userdata('login_id')!=''){?><a href="<?php echo base_url();?>postad"><?php } ?>
                                <i class="fa fa-plus-circle"></i> Post Ad</a>	
                		</div>
                	</div>
                	<div class="col-md-4">
                		<?php if($this->session->userdata('login_id')==''){?>
                		<div class="login-register1">
                			 <a href="<?php echo base_url();?>authentication"><i class="fa fa-user"></i> Login/Register</a>
                		</div>
                		<?php } if($this->session->userdata('login_id')!=''){?>
                			<div class="login-register1 dropdown">
                			 <a href="#"><i class="fa fa-user"></i> Profile</a>
                                <div class="dropdown-content mt-1">
                                <a href="<?php echo base_url();?>profile">My Profile</a>
                                <a href="<?php echo base_url();?>myads">My Ads</a>
                                <a href="<?php echo base_url('authentication/logout')?>" onclick="signOut();">Sign Out</a>

                                </div>	
                			</div>
                		<?php } ?>	
                	</div>
                	<div class="col-md-4">
                		<div class="select-language1">
                		  <i class="fa fa-language"></i>
                                <select class="custom-select1" onchange="doGTranslate(this);">
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
                		</div>
                	</div>
                	
                </div>
            </div>
        </div>
 </section>
 <style type="text/css">
 	.post-ad1,.login-register1
 {
 	width: 107px!important;
    padding: 5px 5px 5px 5px!important;
    border-radius: 36px!important;
    background: white!important;
    color: #c00622!important;
 }
 .post-ad1 a,.login-register1 a
 {
 	font-size: 12px!important;
 	font-weight: 600!important;
 }
@media screen and (max-width: 767px) and (min-width: 200px)
{
  
}
@media screen and (max-width: 767px) and (min-width: 481px)
{
 .post-ad1
 {
 	width: 107px!important;
    padding: 5px 5px 5px 5px!important;
    border-radius: 36px!important;
    background: white!important;
    color: #c00622!important;
 }
 .post-ad1 a
 {
 	font-size: 12px!important;
 	font-weight: 600!important;
 }
}
@media screen and (max-width: 480px) and (min-width: 200px)
{
.post-ad1,.login-register1
 {
 	width: 107px!important;
    padding: 5px 5px 5px 5px!important;
    border-radius: 36px!important;
    background: white!important;
    color: #c00622!important;
 }
 .post-ad1 a,.login-register1 a
 {
 	font-size: 12px!important;
 	font-weight: 600!important;
 }
}
 </style>