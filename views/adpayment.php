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
<section class="user-dashboard-banner" style="background-image: url(<?=$banner->image?>)!important;">
<section class="user-dashboard-banner ">
        <div class="container ">
            <div class="banner-content ">
                <div class="row "></div>
            </div>
        </div>
    </section>
    <?php 
    $ad_id=$this->session->userdata('ad_id');
    $type=$this->session->userdata('all');
    $u_id=$this->session->userdata('login_id');

    $this->db->select('id,name,address,email,mobile,state,city,country');
    $user=$this->db->get_where('user_master',array('id'=>$u_id))->row();

    $credit_id=$this->session->userdata('credit_id');
    $value=$this->session->userdata('credit_value');
    $price=$this->session->userdata('price');
    $credit_qry=$this->db->get_where('credit_master',array('id'=>$credit_id))->row();
    // echo $u_id." ".$credit_id." ".$price;
    $uuid = '5da5272d763e9';
    $passphrase = 'j5u9ewzy';
    $tranamt=number_format($price,2,'.',',');
    $currency='aud';
    $hash=MD5(MD5($passphrase).$uuid.$tranamt.$currency);

    ?>
    <section class="dashboard-content">
        <div class="container">
            <div class="dashboard-tabs">
                <div class="row justify-content-center">
                    
                    <div class="col-lg-9 col-md-8">
                        <div class="tab-content" id="v-pills-tabContent">
                            
                            <div class="tab-pane fade show active" id="v-pills-credits" role="tabpanel" aria-labelledby="v-pills-credits-tab">
                               <!--  <?=$ad_id;?>,<?=$type?>,<?=$u_id?>,<?=$credit_id?>,<?=$value?>,<?=$price?> -->                            
                                <div class="buy-credit-box">
                                    <marquee>
                                    <h4>Please provide your details to buy Ad Credits</h4></marquee>
                                    <div class="row p-3" style="border: 1px solid #007bff;">
                                    <div class="col-md-12">
                                    <img src="https://crackerclassifieds.com/style/paypal-logo.png" alt="Paypal Logo" style="width: 210px;">
                                    </div>

                                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                                    <input type="hidden" name="cmd" value="_xclick">
                                    <input type="hidden" name="business" value="crackerclassifieds@yahoo.com">
                                    <input type="hidden" name="item_name" value="<?=$credit_qry->credit_level;?>">
                                    <input type="hidden" name="amount" value="<?=$price;?>">
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="currency_code" value="AUD">
                                    <input type="hidden" name="return" value="<?php echo base_url('payment/adpaypalsuccess/'.$u_id.'/'.$credit_id.'/'.$price);?>">
                                    <input type="hidden" name="cancel_return" value="<?php echo base_url('buycredit');?>">
                                    
                                        <div class="col-md-12 mt-5 text-right">
                                             <button type="submit" class="btn btn-primary btn-primary1" name="submit">Pay</button>
                                             <a href="<?php echo base_url('buycredit');?>"><button type="button" class="btn btn-danger btn-primary1">Back</button></a>
                                        </div>
                                    
                                    </form>
                                    </div>
                                    <div class="divider mt-2 mb-2" style="border-top: 3px solid #e9e9e9;"></div>
                                    <div class="row p-3" style="border: 1px solid #007bff;">
                                        <div class="col-md-12">
                                            <div id="cardData"></div>
                                            <button class="btn btn-success button" id="submitButton" onclick='submitFrame()'>Submit</button>
                                            <a href="<?php echo base_url('buycredit');?>"><button type="button" class="btn btn-danger btn-primary1">Back</button></a>
                                            <form name="frm" method="Post" id='frmsubmit' action='<?php echo base_url('payment/admarchentsuccess/'.$u_id.'/'.$credit_id.'/'.$price);?>' style="display: none;" class="rajo-bador12">
                                            <input type="hidden" name="merchantUUID" id="merchantUUID" value="5da5272d763e9"></input>
                                            <input type="hidden" name="apiKey" id="apiKey" value="4gxddoda"></input>
                                            <input type="hidden" name="payframeToken" id="payframeToken" value=""></input>
                                            <input type="hidden" name="payframeKey" id="payframeKey" value=""></input>
                                            <!-- <input type="hidden" name="hash" id="hash" value=""></input> -->
                                            <input type="hidden" name="hash" value="<?=$hash;?>"></input>
                                            <div class="row justify-content-center py-3">
                                            <div class="col-md-3 text-right">
                                            <label>Transaction Amount</label>
                                            </div>
                                            <div class="col-md-6">
                                            <input type='text' name='transactionAmount' class="form-control" value='<?=number_format($price,2,'.',',')?>' id='transactionAmount' readonly/>
                                            </div>
                                            </div>
                                            <div class="row justify-content-center py-3">
                                            <div class="col-md-3 text-right">
                                            <label>Transaction Currency</label>
                                            </div>
                                            <div class="col-md-6">
                                            <input type='text' name='transactionCurrency' class="form-control" value='AUD' id='transactionCurrency' readonly />
                                            </div>
                                            </div>
                                            <div class="row justify-content-center py-3">
                                            <div class="col-md-3 text-right">
                                            <label>Customer Name</label>
                                            </div>
                                            <div class="col-md-6">
                                            <input type='text' name='customerName' class="form-control" value='<?=$user->name;?>' readonly/>
                                            </div>
                                            </div>
                                            <input type='hidden' name='transactionProduct' value='Buy Credits Txn'/>
                                            <div class="row justify-content-center py-3">
                                            <div class="col-md-3 text-right">
                                            <label>Customer Address</label>
                                            </div>
                                            <div class="col-md-6">
                                            <?php if($user->address=='' || $user->address==NULL)
                                            {
                                            ?>
                                             <input type='text' class="form-control" name='customerAddress' required/>
                                            <?php }else{?>
                                             <input type='text' class="form-control" name='customerAddress' value='<?=$user->address;?>' readonly/>
                                            <?php } ?>
                                            </div>
                                            </div>
                                           
                                            
                                            <?php if($user->city=='' || $user->city==NULL)
                                            {
                                            ?>
                                             <input type='hidden' name='customerCity' value='Customer City is Null' readonly/>
                                            <?php }else{?>
                                            <input type='hidden' name='customerCity' value='<?=$user->city;?>' required/>
                                            <?php } ?>
                                            
                                            <?php if($user->state=='' || $user->state==NULL)
                                            {
                                            ?>
                                             <input type='hidden' name='customerState' value='Customer State is Null' readonly/>
                                            <?php }else{?>
                                            <input type='hidden' name='customerState' value='<?=$user->state;?>' required/>
                                            <?php } ?>                             
                                            
                                            <input type='hidden' name='customerPostCode' value='4000'/>
                                            
                                            <?php if($user->country=='' || $user->country==NULL)
                                            {
                                            ?>
                                             <input type='hidden' name='customerCountry' value='Customer Country is Null' readonly/>
                                            <?php }else{?>
                                            <input type='hidden' name='customerCountry' value='<?=$user->country?>' required/>
                                            <?php } ?>   
                                            
                                          
                                            
                                            <input type='hidden' name='customerPhone' value='<?=$user->mobile;?>' required/>
                                           
                                            <div class="row justify-content-center py-3">
                                            <div class="col-md-3 text-right">
                                            <label>Customer Email</label>
                                            </div>
                                            <div class="col-md-6">
                                            <input type='text' class="form-control" name='customerEmail' value='<?=$user->email;?>' readonly/>
                                            </div>
                                            </div>
                                            <div class="row justify-content-center py-3">
                                            <div class="col-4 rajo-badri">
                                            <input type="submit" class="btn btn-success" name="Payment" value="Payment" style="color: white;font-weight: 600;">
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
            </div>
        </div>
    </section>
