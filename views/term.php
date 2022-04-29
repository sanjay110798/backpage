<!-- CSS -->
<!-- slik-slider-link -->
<link href="<?php echo base_url();?>fontassets/css/home.css" rel="stylesheet">
<link href="<?php echo base_url();?>fontassets/css/user-dashboard.css" rel=" stylesheet ">
<!-- *************** -->
<?php 
$banner=$this->db->get_where('banner',array('id'=>1))->row();
?>
<section class="user-dashboard-banner" style="background-image: url(<?=$banner->image?>)!important;">

        <div class="container ">
            <div class="banner-content ">
                <div class="row "></div>
            </div>
        </div>
    </section>

    <section class="select-location-sec" style=" background: #dedede;">
        <div class="container">
            
            <div class="row">
                <div class="state-location">
                    <div class="card mx-auto" style="width: 70%;">
                        <div class="card-body">
                            <div class="state-list">
                              
                                <div class="state-list-box1">
                                    
                                  <div class="row justify-content-center mb-3 mt-1">
                                      <div class="col-md-12 text-center">
                                          <img src="<?php echo base_url();?>fontassets/img/logo.png" alt="Backpage Classifieds Image" style="width: 46%;">
                                      </div>
                                      <div class="col-md-12 text-center">
                                          <p style="font-size: 19px;font-weight: 600"><span style="font-size: 27px;color: #d93920;font-weight: 600;">WARNING:</span> This site contains adult content</p>
                                      </div>
                                      <div class="col-md-12 text-center">
                                          <p style="font-size: 17px;font-weight: 600;padding: 34px;">You must be over 18 years old or the legal age to view in your country and you have read and accept our <a href="<?php echo base_url();?>terms" style="color: #d93920"> terms and conditions</a></p>
                                      </div>
                                      <div class="col-md-12 text-center mb-2">
                                        <a href="<?php echo base_url();?>" style="font-size: 19px;color: red;">DECLINE</a>
                                      </div>
                                      <div class="col-md-12 text-center mb-2">
                                          <a href="<?php echo base_url();?>term/up"><button type="button" class="btn btn-primary">AGREE AND ENTER</button></a>
                                      </div>
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
     @media only screen and (max-width: 480px)
     {
        .card{
            width: 100%!important;
        }
     }
 </style>