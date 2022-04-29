<link href="<?php echo base_url();?>fontassets/css/register.css" rel="stylesheet">
<!--  -->
<?php 
$banner=$this->db->get_where('banner',array('id'=>1))->row();
$id=$this->uri->segment(3);
?>
<section class="register-banner" style="background-image: url(<?=$banner->image?>)!important;">

        <div class="container">
            <div class="banner-content">
                <div class="row"></div>
            </div>
        </div>
    </section>


    <section class="register-sec">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 register-form">
                    <h6>OTP Verification For Register</h6>    
                    <!-- <span style="color: red;"><?php echo $this->session->flashdata('err');?></span> -->
                        <form name="myfrom" action="<?php echo base_url('register/verify_otp/'.$id);?>" method="post" enctype="multipart/form-data">
                        <div class="form-group username">
                            <input type="text" class="form-control" placeholder="Enter OTP.." name="sms_otp" id="first_name" required>
                        </div>
                        
                        <button type="submit" class="register-btn cracker_register" name="btnn">Verify</button>
                        </form>
                        <form action="<?php echo base_url('register/verify_otp/'.$id);?>" method="post">
                        <button type="submit" name="btnnn" class="register-btn cracker_register">Back</button>
                        </form>
                        <small class="form-text text-muted">The OTP has been sent to your registered phone and email please check</small>
                       
                    
                </div>
            </div>
        </div>
    </section>
    
    