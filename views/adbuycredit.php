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
 
$u_id=$this->session->userdata('login_id');
// $user=$this->db->get_where('user_master',array('id'=>$u_id))->row();

$ad_id=$this->session->userdata('ad_id');
$this->session->set_userdata('all',$this->input->get('all'));
$type=$this->session->userdata('all');
// echo $ad_id;
// echo $type;
// exit();
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
                                <div class="credit-box">
                                    <div class="total-credits">
                                        <h4></h4>
                                    </div>
                                    <div class="credit-info">
                                        <a href="#" class="help-btn">Ad Credit Help</a>
                                        <a href="<?php echo base_url();?>faq" class="read-btn">Read Faq's</a>
                                    </div>
                                </div>
                                <div class="buy-credit-box">
                                    <h4>Please provide your details to buy Ad Credits</h4>
                                    <form method="post" name="frm" action="<?php echo base_url();?>payment/adpayment">
                                        <div class="form-row">
                                            <div class="col">
                                            <select class="form-control" name="credit_id" id="credit_id">
                                            <option>Select</option>
                                            <?php 
                                            $credit_master=$this->db->get_where('credit_master')->result_array();
                                            foreach ($credit_master as $crdt) {
                                            ?>
                                            <option value="<?=$crdt['id']?>"><?=$crdt['credit_level']?></option>

                                            <?php } ?>  
                                            </select> 
                                            </div>
                                            <div class="col" id="price">
                                                <input type="text" name="price"  class="form-control" placeholder="Price of Credit Ads">
                                            </div>
                                            <div class="col">
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