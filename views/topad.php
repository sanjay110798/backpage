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

// $ad=$this->db->get_where('ad_master',array('id'=>$this->session->userdata('ad_id')))->row();
$ad_id=$this->session->userdata('ad_id');
$u_id=$this->session->userdata('login_id');
// $user=$this->db->get_where('user_master',array('id'=>$u_id))->row();
?>

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

     <section class="dashboard-content">
        <div class="container">
            <div class="dashboard-tabs">
                <div class="row justify-content-center">
                    
                    <div class="col-lg-9 col-md-8">
                        <div class="tab-content" id="v-pills-tabContent">
                            
                            <div class="tab-pane fade show active" id="v-pills-credits" role="tabpanel" aria-labelledby="v-pills-credits-tab">
                                <div class="credit-packs-box">
                                    <div class="credit-text-box">
                                        <h4>Get Ad Credit Packs</h4>
                                        <p>Ad Credits are an option to buy multiple Credits</p>
                                    </div>
                                    <div class="credit-img-box">
                                        <img src="<?php echo base_url();?>fontassets/img/discount.png" alt="Backpage Classifieds Image">
                                        <h5>upto 50% discount</h5>
                                    </div>
                                </div>
                                <!-- <div class="credit-box">
                                  
                                </div> -->
                                <div class="buy-credit-box">
                                	<div class="notice"><i class="fa fa-bullhorn fa-1x"></i> Notice</div>
                                    <marquee><h4>Please Choose How Many Days ,You Want To Make Your Top Ad.We Charged 1 AUD For One Days.</h4></marquee>
                                    <form method="post" name="frm" action="<?php echo base_url();?>topad/payment">
                                        <div class="form-row">
                                            <div class="col mb-1 mt-3">
                                            <label for="exampleFormControlSelect1">How Many Days</label>
                                            <select class="form-control" name="ad_days" id="ad_days" required>
                                                <option value="">Select</option>
                                                <option value="1">1 Days</option>
                                                <option value="2">2 Days</option>
                                                <option value="3">3 Days</option>
                                                <option value="4">4 Days</option>
                                                <option value="5">5 Days</option>
                                                <option value="6">6 Days</option>
                                                <option value="7">7 Days</option>
                                                <option value="8">8 Days</option>
                                                <option value="9">9 Days</option>
                                                <option value="10">10 Days</option>
                                                <option value="11">11 Days</option>
                                                <option value="12">12 Days</option>
                                                <option value="13">13 Days</option>
                                                <option value="14">14 Days</option>
                                                <option value="15">15 Days</option>
                                                <option value="16">16 Days</option>
                                                <option value="17">17 Days</option>
                                                <option value="18">18 Days</option>
                                                <option value="19">19 Days</option>
                                                <option value="20">20 Days</option>
                                                <option value="21">21 Days</option>
                                                <option value="22">22 Days</option>
                                                <option value="23">23 Days</option>
                                                <option value="24">24 Days</option>
                                                <option value="25">25 Days</option>
                                                <option value="26">26 Days</option>
                                                <option value="27">27 Days</option>
                                                <option value="28">28 Days</option>
                                                <option value="29">29 Days</option>
                                                <option value="30">30 Days</option>
                                            </select> 
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="form-row">
                                        	
                                        	<div class="col mb-1">
                                        		<label for="exampleFormControlSelect1">Time</label>
                                                <input type="time" name="ad_time"  class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                        	
                                        	<div class="col mb-1">
                                        		<label for="exampleFormControlSelect1">Price</label>
                                                <input type="text" name="price" id="price" class="form-control" placeholder="Price For Top Ads" readonly>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                        	<div class="col"></div>
                                        	<div class="col"></div>
                                        	<div class="col mt-2">
                                                <a href="<?php echo base_url();?>myads"><button type="button" class="purchase-pack-btn">Back To Ad's List</button></a>
                                            </div>
                                            <div class="col mt-2">
                                                <button type="submit" class="purchase-pack-btn">Purchase Pack</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>