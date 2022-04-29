<link href="<?php echo base_url();?>fontassets/css/login.css" rel="stylesheet">
<!-- **************** -->
<?php 
$banner=$this->db->get_where('banner',array('id'=>1))->row();
?>
<section class="login-banner" style="background-image: url(<?=$banner->image?>)!important;">
        <div class="container">
            <div class="banner-content">
                <div class="row"></div>
            </div>
        </div>
    </section>


    <section class="login-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="login-form">
                        <h6>Login</h6>
                        <form action="<?php echo base_url();?>authentication/login" method="post">
                            <div class="form-group username">
                                <input type="text" name="name" class="form-control" placeholder="User Name / Email" style="text-transform: none;" required>
                            </div>
                            <div class="form-group password">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" style="text-transform: none;" required>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" onclick="showpass()"></span>
                            </div>
                            <!-- <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Stay Logged In</label>
                              
                            </div> -->
                            <div class="form-group form-check" style="padding-left: 0;">
                               
                                <span data-toggle="modal" data-target="#lostpassword" style="cursor: pointer;"><i class="fa fa-unlock-alt"></i> Can't access your account?</span>
                            </div>
                            <small class="form-text text-muted">( if you are logging in for the first time on our new website and your email address is registered, you will need to reset your password .First try to log in if that fails , Select cant access your account )</small>
                            <button type="submit" class="login-btn">Log in</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="first-time-coming">
                        <h6>First Time on Backpage</h6>
                        <div class="info-first-time-vistor">
                            <div class="info-list first">
                                <i class="fa fa-pencil"></i>
                                <span>Manage and edit ads easily</span>
                            </div>
                            <div class="info-list">
                                <i class="fa fa-picture-o"></i>
                                <span>Put your ads in the carousel easily</span>
                            </div>
                            <div class="info-list">
                                <i class="fa fa-star-o"></i>
                                <span>Access your favorite ads anytime, anywhere</span>
                            </div>
                            <div class="info-list">
                                <!-- <i class="fa fa-eur"></i>
                                <span style="font-size: 18px;">If You Are Already Registered On <a href="https://escortsandbodyrubs.com/" style="color: #4267b2;">Escortsandbodyrubs.com</a> Just Use Your Same Details To Login</span> -->
                                <a href="https://escortsandbodyrubs.com/term/confirmvisit" class="register-btn text-center" target="_blank" style="background-color: #1587e7;">
                              Register Here For Escorts/Bodyrubs Advertising
                                </a>
                            </div>
                            <div class="info-list">
                                <a href="<?php echo base_url();?>register" class="register-btn text-center">
                                All Other Advertising Register Here </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="register-with-google">
                    <h2>Or</h2>
                    <div class="google-register-btn">
                        <a href="#">
                            <div class='g-sign-in-button' id="google_sign">
                                <div class=content-wrapper>
                                    <div class='logo-wrapper'>
                                        <img src='<?php echo base_url();?>fontassets/img/g-logo.png' alt="Google Logo">
                                    </div>
                                    <span class='text-container'> 
                                       <span>Sign in with Google</span>
                                    </span>
                                </div>
                            </div>
                           <button class="button btn3 g-signin2" data-onsuccess="onSignIn" type="button" style="display: none;"></button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="select-location-sec2 spl-padding-section px-sm-0 px-3 mx-0 mb-5">
        <div class="container">
            <div class="row ">
                <div class="col-lg-6">
                    <div class="row justify-content-center">
                        <div class="col-md-12 col-12">
                            <div class="base"><a href="https://bestdrifting.com/" target="_blank">

                                    <div>
                                        <img src="https://crackerclassifieds.com/style/760632a82e03e5a26a614ec6f56a09fc.jpg" class="long" alt="run">
                                        <img src="https://bestdrifting.com/public/img/icons/favicon.png" class="title" alt="nfs-payback">
                                        <img src="https://bestdrifting.com/public/img/bestdrifting.png" class="ea" alt="ea" style="width: 200px;height: 50px;">
                                        
                                        <div class="spin2">
                                            <div class="spinner"></div>
                                        </div>
                                        <div class="slid1"></div>
                                        <div class="butd">
                                            <button class="but">Take the wheel !</button>
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
                        <div class="col-md-12 col-12">
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
<!-- Modal -->
  <div class="modal fade" id="lostpassword" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="border-radius: 14px;">
        <div class="modal-header" style="background:#d93920;color: aliceblue;">
         <h4 class="modal-title"><i class="fa fa-unlock"></i> Forgot Password</h4>
          <button type="button" class="close" data-dismiss="modal" style="color: white;">&times;</button>
        </div>
        <form action="<?php echo base_url();?>authentication/lostpassword" method="post">
        <div class="modal-body">
         <div class="row">
            <div class="col-md-12">
                <p style="font-size: 13px;font-weight: 600;text-transform: uppercase;">Please Enter your <span style="color: red;"> <i class="fa fa-envelope-o"></i> Email Address /User Name</span> , Your updated password will be sent in your<span style="color: red;"> <i class="fa fa-envelope-o"></i> Email Address</span></p>
            </div> 
            <div class="col-md-12">
              <input type="text" name="lost_username" class="form-control" placeholder="Enter Email/Username" required style="height: 48px;">
            </div> 
         </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" style="background: black;"><i class="fa fa-location-arrow"></i> Send</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>

  <style type="text/css">
    .select-location-sec2
    {
        padding: 40px 0!important;
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
        }
        @media only screen and (max-width: 767px) {
        .select-location-sec2{
        height: 150px;
        /*margin-top: 115px;*/
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
                top: 55px;
                width: 130px;
                font-size: 15px;
                height: 30px;
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
        @media only screen and (max-width: 991px){
            .spl-padding-section.select-location-sec2 {
            padding: 0;
            margin-top: 0px!important;
            margin-bottom: 190px;
          }
        }


</style>