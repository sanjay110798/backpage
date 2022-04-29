<?php
if($this->session->userdata('login_id')=='')
{
  redirect('authentication?loginerr==0');
}
if($this->session->userdata('ad_id')=='')
{
  $this->session->set_flashdata('err','Sorry !! You have no Previous Ads');
  redirect('myads?aderror==0');
}
?>
<section class="ad-pacakage-banner">
    <div class="container ">
        <div class="banner-content ">
            <div class="row "></div>
        </div>
    </div>
</section>
<?php 
$this->db->select('ad_title,id');
$ad=$this->db->get_where('ad_master',array('id'=>$this->session->userdata('ad_id')))->row();
?>
<section class="ad-package-sec">
        <div class="container">
            <div class="your-ad-content">
                <h2>Your : "<?=substr($ad->ad_title,0,30);?>..."</h2>
                <p>put your ad in front of more eyes and increase the number of enquiries by up to 10 times!</p>
            </div>
            <div class="ad-pacakage-option">
                <div class="row justify-content-center" style="row-gap: 40px;">
                    <?php if($this->input->get('all')=='1' || $this->input->get('all')=='3'){?>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card pacakage-box featured-ad">
                            <div class="card-header new-class">
                                <i class="fa fa-thumbs-up"></i>
                                <h5 class="pacakage-title">Featured Ad</h5>
                                <i class="fa fa-info-circle"></i>
                            </div>
                            <div class="card-body">
                                <p class="card-text mt-4">Puts Your Advertisement in The Carousel Above All other ads in that category</p>
                                <div class="pacakage-screenshot"><img src="<?php echo base_url();?>fontassets/img/screencapture.jpg" alt="Feature Duration Image"></div>
                                <a href="#" class="pacakage-btn btn" data-toggle="modal" data-target="#myModal1">Select Duration <i class="fa fa-angle-double-right"></i></a>
                                <div class="modal fade" id="myModal1" role="dialog">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="row no-gutters">
                                <div class="col-md-12">
                                <div class="top-ad text-center">
                                <div class="row ">
                                <div class="col-2">
                                <i class="fa fa-thumbs-up"></i>
                                </div>
                                <div class="col-8">
                                <h5 class="pacakage-title">Featured Ad</h5>
                                </div>
                                <div class="col-2">
                                <button type="button" class="close" data-dismiss="modal" style="margin-right: 10px;">&times;</button>
                                </div>
                                </div>
                                </div>
                                <div class="modal-body text-center">
                                <div class="row">
                                <?php 
                                $feature_ad_qry=$this->db->get_where('premium_ad')->result_array();
                                foreach ($feature_ad_qry as $ft)
                                {
                                ?>

                                <div class="col-sm-4 col-6 mb-2">
                                <a href="<?php echo base_url('postad/makefeaturedad/'.$ad->id.'/'.$ft['featured_credit'].'/'.$ft['days'].'?all='.$this->input->get('all'));?>">
                                <div class="bg-blue">
                                <p><?=$ft['days'];?>Days</p>
                                <span><i class="fa fa-money"></i>
                                <?=$ft['featured_credit'];?>Credit
                                </span>
                                
                                </div>
                                </a>
                                </div>

                                <?php } ?>
                                </div>

                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 <?php } ?>
                 <?php if($this->input->get('all')=='1' || $this->input->get('all')=='2'){?>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card pacakage-box premium-ad">
                            <div class="card-header new-class">
                                <i class="fa fa-diamond"></i>
                                <h5 class="pacakage-title">Premium Ad</h5>
                                <i class="fa fa-info-circle"></i>
                            </div>
                            <div class="card-body">
                                <p class="card-text mt-4">Puts Your Advertisement in a large gallery type advertisement under the carousel but above all other ads in that category</p>
                                <div class="pacakage-screenshot"><img src="<?php echo base_url();?>fontassets/img/screencapture.jpg" alt="Premium Duration Image"></div>
                                <a href="#" class="pacakage-btn btn" data-toggle="modal" data-target="#myModal3">Select Duration <i class="fa fa-angle-double-right"></i></a>
                                <!-- Featured Ad -->
                                <div class="modal fade" id="myModal3" role="dialog">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="row no-gutters">
                                <div class="col-md-12">
                                <div class="top-ad text-center bg-yellow">
                                <div class="row ">
                                <div class="col-2">
                                <i class="fa fa-diamond"></i>
                                </div>
                                <div class="col-8">
                                <h5 class="pacakage-title">Premium Ad</h5>
                                </div>
                                <div class="col-2">
                                <button type="button" class="close" data-dismiss="modal" style="margin-right: 10px;">&times;</button>
                                </div>
                                </div>
                                </div>
                                <div class="modal-body text-center">
                                <div class="row">
                                <?php 
                                $premium_ad_qry=$this->db->get_where('premium_ad')->result_array();
                                foreach ($premium_ad_qry as $ft)
                                {
                                ?>
                                <div class="col-sm-4 col-6 mb-2">
                                <a href="<?php echo base_url('postad/makepremiumad/'.$ad->id.'/'.$ft['premium_credit'].'/'.$ft['days'].'?all='.$this->input->get('all'));?>">
                                <div class="bg-blue">
                                
                                <p><?=$ft['days'];?>Days</p>
                                <span><i class="fa fa-money"></i>
                                <?=$ft['premium_credit'];?>Credit
                                </span>
                                
                                </div>  
                                </a>                      
                                </div>

                                <?php } ?>
                                </div>

                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>

                                <!-- ///////*******/////// -->
                            </div>
                        </div>
                    </div>
                 <?php } ?>
                 <?php if($this->input->get('all')=='1'){?>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card pacakage-box Free-ad">
                            <div class="card-header new-class">
                                <i class="fa fa-hashtag"></i>
                                <h5 class="pacakage-title">Free Ad</h5>
                                <i class="fa fa-info-circle"></i>
                            </div>
                            <div class="card-body">
                                <p class="card-text mt-4">Puts Your Advertisement in a simple type advertisement under this list of ad</p>
                                <div class="pacakage-screenshot"><img src="<?php echo base_url();?>fontassets/img/screencapture.jpg" alt="Ads Package Screenshot"></div>
                                <a href="<?php echo base_url();?>postad/freead" class="pacakage-btn btn">Proceed <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                  <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <style type="text/css">
       .card-header.new-class
       {
        width: 100%;
        top: -5px;
        right: 0;
        background: #1587e7;
        text-align: center;
        padding: 10px 10px;
        position: absolute;
        z-index: 1;
        transform: rotateZ(0deg);
        }
    </style>