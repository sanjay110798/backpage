<link href="<?php echo base_url();?>fontassets/css/user-dashboard.css" rel=" stylesheet ">
<?php
if($this->session->userdata('login_id')=='')
{
  redirect('authentication?loginerr==0');
}
?>
<?php 
$banner=$this->db->get_where('banner',array('id'=>1))->row();
?>
<section class="user-dashboard-banner " style="background-image: url(<?=$banner->image?>)!important;">
        <div class="container ">
            <div class="banner-content ">
                <div class="row "></div>
            </div>
        </div>
    </section>
    <?php 
    $u_id=$this->session->userdata('login_id');

    $this->db->select('image,id,name,credit_value');
    $user=$this->db->get_where('user_master',array('id'=>$u_id))->row();

    ?>
    <section class="dashboard-content">
        <div class="container">
            <div class="dashboard-tabs">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="user-profile">
                            <div class="profile-img">
                                
                                <?php 
                                if($user->image !='')
                                {
                                ?>
                                
                                 <img src="<?=$user->image?>" alt="User Main Image">
                          
                                <?php }else{ ?>
                                <img src="<?php echo base_url();?>fontassets/img/user.png" alt="User Main Image">
                                <?php } ?>
                            </div>
                            <div class="profile-text">
                                <h4>Welcome, <?=$user->name?></h4>
                                <a href="<?php echo base_url();?>profile/edit"><i class="fa fa-user"></i> View my profile</a>
                            </div>
                        </div>
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link " href="<?php echo base_url();?>profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">My Profile <i class="fa fa-angle-right"></i></a>
                            <a class="nav-link " href="<?php echo base_url();?>myads" role="tab" aria-controls="v-pills-ads" aria-selected="false ">My Ads <i class="fa fa-angle-right"></i></a>
                            <a class="nav-link active" href="<?php echo base_url();?>buycredit" role="tab" aria-controls="v-pills-credits" aria-selected="false">Buy Credits <i class="fa fa-angle-right"></i></a>
                            <a class="nav-link" href="<?php echo base_url();?>postad">Post A New Ad <i class="fa fa-angle-right"></i></a>
                            <a class="nav-link" href="<?php echo base_url();?>favourite" role="tab" aria-controls="v-pills-favourite" aria-selected="false">Favourite Ads <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="tab-content" id="v-pills-tabContent">
                            
                            <div class="tab-pane fade show active" id="v-pills-credits" role="tabpanel" aria-labelledby="v-pills-credits-tab">
                                <div class="credit-packs-box">
                                    <div class="credit-text-box">
                                        <h4>Get Ad Credit Packs</h4>
                                        <p>Ad Credits are an option to buy multiple Credits</p>
                                    </div>
                                    <div class="credit-img-box">
                                        <img src="<?php echo base_url();?>fontassets/img/discount.png" alt="Discount Main Image">
                                        <h5>upto 50% discount</h5>
                                    </div>
                                </div>
                                <div class="credit-box">
                                    <div class="total-credits">
                                        <h4>Total Credit = <?=$user->credit_value;?></h4>
                                    </div>
                                    <div class="credit-info">
                                        <a href="#" class="help-btn">Ad Credit Help</a>
                                        <a href="<?php echo base_url();?>faq" class="read-btn">Read Faq's</a>
                                    </div>
                                </div>
                                <div class="buy-credit-box">
                                    <h4>Please provide your details to buy Ad Credits</h4>
                                    <form method="post" name="frm" action="<?php echo base_url();?>payment">
                                        <div class="form-row">
                                            <div class="col">
                                            <select class="form-control" name="credit_id" id="credit_id" required>
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
