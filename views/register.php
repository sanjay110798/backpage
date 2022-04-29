<link href="<?php echo base_url();?>fontassets/css/register.css" rel="stylesheet">
<!--  -->
<?php 
$banner=$this->db->get_where('banner',array('id'=>1))->row();
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
                <h6>Register to advertise</h6>    
                <form action="<?php echo base_url();?>register/insertuser" method="post">
                    <div class="form-group username">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Choose a name for viewers to see" style="text-transform:none;" required>
                        <span id="validerror" style="padding-left: 5px;color: #ff5c00;font-weight: 600;display: none;">Enter a Valid Username...</span>
                        <span id="usererror" style="padding-left: 5px;color: #ff5c00;font-weight: 600;display: none;">Username is not Available...</span>
                        <span id="usersucc" style="padding-left: 5px;color: chartreuse;font-weight: 600;display: none;">Username is Available...</span>
                    </div>
                    <div class="form-group email">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your current email address" style="text-transform:none;" required>
                        <span id="validerr" style="padding-left: 5px;color: #ff5c00;font-weight: 600;display: none;">Enter a Valid Email...</span>
                        <span id="emailerror" style="padding-left: 5px;color: #ff5c00;font-weight: 600;display: none;">Email is not Available...</span>
                        <span id="emailsucc" style="padding-left: 5px;color: chartreuse;font-weight: 600;display: none;">Email is Available...</span>
                    </div>
                    <div class="form-group email">
                        <input type="email" class="form-control" name="con_email" id="con_email" placeholder="Enter your email address again to confirm" style="text-transform:none;" required>
                    </div>
                    <div class="form-group password">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Choose the password you want to use to login" required style="text-transform:none;"> 
                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" onclick="showpass()"></span>
                    </div>
                    <div class="form-group password">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Type your password again to Confirm" required style="text-transform:none;">
                        <span toggle="#confirm-password-field" class="fa fa-fw fa-eye field-icon toggle-confirm-password" onclick="showpass2()"></span>
                    </div>

                    <div class="form-group country">

                        <input type="text" class="form-control" list="countryy" name="country"  placeholder="Country" id="country" required>
                        
                            <datalist id="countryy">
                              <?php 
                                $this->db->select('country_name');
                                $country_qry=$this->db->get('countries_new')->result_array();
                                foreach ($country_qry as $country) {

                                ?>
                                <option value="<?=$country['country_name']?>"><?=$country['country_name'];?></option>

                                <?php } ?>   
                            </datalist>
                        </div>
                         <div class="form-group country">
                           
                            <input type="text" name="city" class="form-control" placeholder="Enter City" list="city" required>
                            <datalist id="city">
                              <option value="">Select</option>  
                            </datalist>
                        </div>
                        <div class="form-group pincode style1">

                            <div class="row">
                                <div class="col-4">
                                    <select class="form-control mdb-select" name="phonecode" required>
                                        <option>Select Country Code</option>
                                        <?php 
                                        $this->db->select('nicename,iso,phonecode');
                                        $code_id=$this->db->get('country')->result_array();
                                        foreach ($code_id as $code) {

                                            ?>
                                            <option value="<?=$code['phonecode']?>" <?php if($code['iso']==$country_code){echo "selected";}?>><?=$code['nicename']?>   (+<?=$code['phonecode']?>)</option>

                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-8">
                                <input type="tel" class="form-control" placeholder="your mobile number" name="mobile" maxlength="15" oninput="this.value=this.value.replace(/[^0-9]/g,'');" required>
                                </div>
                            </div>
                        </div>
                        
                       <!--  <div class="row mx-0 justify-content-center">
                        <div class="col-md-12 col-12 px-0 recaptcha" id="g-recaptcha1"></div>
                    </div> -->
                    <button type="submit" class="register-btn cracker_register" onclick="return Validate()">Register Now</button>
                    <p class="account">Already have an account? <a href="<?php echo base_url();?>authentication">Sign in</a></p>
                    <small class="form-text text-muted">This form is sensitive Auto fill will not work. So please type the information into the correct fields.</small>
                    <small class="form-text text-muted mt-3">If you get a message saying your email address is already taken, please send us a message at support@crackerclassifieds.com and give your phone number, user name, and location we will get back to you as soon as possible.</small>
                </form>
            </div>
        </div>
    </div>
</section>

