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
$user=$this->db->get_where('user_master',array('id'=>$u_id))->row();
?>

<section class="user-dashboard-banner ">
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
                                        <img src="<?php echo base_url();?>fontassets/img/discount.png" alt="Ads Discount Image">
                                        <h5>upto 50% discount</h5>
                                    </div>
                                </div>
                                <!-- <div class="credit-box">
                                  
                                </div> -->
                                <div class="buy-credit-box">
                                	<div class="notice"><i class="fa fa-bullhorn fa-1x"></i> Notice</div>
                                    <marquee><h4>Enter Your suitable "Available time"- for 3 hours..
                        and this Ad will be displayed in the carousel for Your selected time duretion as well.We Charged 1 AUD For 3 Hours.</h4></marquee>
                                    <form method="post" name="frm" action="<?php echo base_url();?>available/addavailable">
                                        <div class="form-row">
                                            <div class="col mb-1 mt-3">
                                            <label for="exampleFormControlSelect1">How Many Hours</label>
                                            <select class="form-control" name="how_time" id="how_time" required>
                                            <option value="">Select hours</option>
                                            <option value="3">3 hours</option>
                                            <option value="6">6 hours</option>
                                            <option value="9">9 hours</option>
                                            <option value="12">12 hours</option>
                                            <option value="15">15 hours</option>
                                            <option value="18">18 hours</option>
                                            <option value="21">21 hours</option>
                                            <option value="24">24 hours</option>
                                            </select> 
                                            </div>
                                            
                                            
                                        </div>
                                      
                                        <div class="form-row">
                                        	
                                        	<div class="col mb-1">
                                        		<label for="exampleFormControlSelect1">Credit Value</label>
                                                <input type="text" name="price" id="price" class="form-control" placeholder="Credit Value For Availalbe Ads" readonly>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                        	<div class="col"></div>
                                        	<div class="col"></div>
                                        	<div class="col mt-2">
                                                <a href="<?php echo base_url();?>myads"><button type="button" class="purchase-pack-btn">Back To Ad's List</button></a>
                                            </div>
                                            <div class="col mt-2">
                                                <button type="submit" class="purchase-pack-btn">Make Available</button>
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