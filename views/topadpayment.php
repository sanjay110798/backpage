<link href="<?php echo base_url();?>fontassets/css/user-dashboard.css" rel=" stylesheet ">
<?php
if($this->session->userdata('login_id')=='')
{
  redirect('authentication?loginerr==0');
}
?>
<section class="user-dashboard-banner ">
        <div class="container ">
            <div class="banner-content ">
                <div class="row "></div>
            </div>
        </div>
    </section>
    <?php 
    $ad_id=$this->session->userdata('ad_id');
    $u_id=$this->session->userdata('login_id');
    $user=$this->db->get_where('user_master',array('id'=>$u_id))->row();

    $ad_days=$this->session->userdata('ad_days');
    $ad_time=$this->session->userdata('ad_time');
    $price=$this->session->userdata('price');
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
                                    <div class="notice"><i class="fa fa-bullhorn fa-1x"></i> Notice</div>
                                    <marquee>
                                    <h4>Please provide your details For Payment,Or Use Your Credits to Pay More Obvious</h4></marquee>
                                    <div class="credit-box mb-2">
                                    <div class="total-credits">
                                    <h4>Credit For Top Ad = <?=number_format($price);?> </h4>
                                    </div>
                                    <div class="credit-info">
                                    <?php if($user->credit_value>= number_format($price)){?>
                                    <a href="<?php echo base_url();?>topad/topbycredit" class="read-btn" data-tooltip="You Make Your Top Ad By Credit Value">
                                    <?php } else{?>
                                    <a href="#Not Possible" id="not_possible" class="read-btn" data-tooltip="Sorry! You Have No Enough Credit">
                                    <?php }?>
                                    Spend Credit</a>
                                    </div>
                                    </div>
                                    <div class="row p-3" style="border: 1px solid #007bff;margin-left: 0px;margin-right: 0px;">
                                    <div class="col-md-12">
                                    <img src="https://crackerclassifieds.com/style/paypal-logo.png" alt="Backpage Classifieds Image" style="width: 210px;">
                                    </div>

                                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                                    <input type="hidden" name="cmd" value="_xclick">
                                    <input type="hidden" name="business" value="crackerclassifieds@yahoo.com">
                                    <input type="hidden" name="item_name" value="Buy Credit For Top Ad">
                                    <input type="hidden" name="amount" value="<?=$price;?>">
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="currency_code" value="AUD">
                                    <input type="hidden" name="cancel_return" value="<?php echo base_url('topad/adpaypalsuccess');?>">
                                    <input type="hidden" name="return" value="<?php echo base_url('myads');?>">
                                    
                                        <div class="col-md-12 mt-5 text-right">
                                             <button type="submit" class="btn btn-primary btn-primary1" name="submit">Pay</button>
                                             <a href="<?php echo base_url('buycredit');?>"><button type="button" class="btn btn-danger btn-primary1">Back</button></a>
                                        </div>
                                    
                                    </form>
                                    </div>
                                    <div class="divider mt-2 mb-2" style="border-top: 3px solid #e9e9e9;"></div>
                                    <div class="row p-3" style="border: 1px solid #007bff;margin-left: 0px; margin-right: 0px;">
                                        <div class="col-md-12">
                                            <div id="cardData"></div>
                                            <button class="btn btn-success button" id="submitButton" onclick='submitFrame()'>Submit</button>
                                            <a href="<?php echo base_url('buycredit');?>"><button type="button" class="btn btn-danger btn-primary1">Back</button></a>
                                            <form name="frm" method="Post" id='frmsubmit' action='<?php echo base_url('topad/admarchentsuccess');?>' style="display: none;" class="rajo-bador12">
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
                                            <input type='hidden' name='transactionProduct' value='Pay Money For Top Ad'/>
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
    <style type="text/css">


    a:hover {
    text-decoration: none;
    }


    /**
    * Tooltip Styles
    */

    /* Add this attribute to the element that needs a tooltip */
    [data-tooltip] {
    position: relative;
    z-index: 2;
    cursor: pointer;
    }

    /* Hide the tooltip content by default */
    [data-tooltip]:before,
    [data-tooltip]:after {
    visibility: hidden;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
    filter: progid: DXImageTransform.Microsoft.Alpha(Opacity=0);
    opacity: 0;
    pointer-events: none;
    }

    /* Position tooltip above the element */
    [data-tooltip]:before {
    position: absolute;
    bottom: 150%;
    left: 50%;
    margin-bottom: 5px;
    margin-left: -80px;
    padding: 7px;
    width: 160px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    background-color: #000;
    background-color: hsla(0, 0%, 20%, 0.9);
    color: #fff;
    content: attr(data-tooltip);
    text-align: center;
    font-size: 14px;
    line-height: 1.2;
    }

    /* Triangle hack to make tooltip look like a speech bubble */
    [data-tooltip]:after {
    position: absolute;
    bottom: 150%;
    left: 50%;
    margin-left: -5px;
    width: 0;
    border-top: 5px solid #000;
    border-top: 5px solid hsla(0, 0%, 20%, 0.9);
    border-right: 5px solid transparent;
    border-left: 5px solid transparent;
    content: " ";
    font-size: 0;
    line-height: 0;
    }

    /* Show tooltip content on hover */
    [data-tooltip]:hover:before,
    [data-tooltip]:hover:after {
    visibility: visible;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
    filter: progid: DXImageTransform.Microsoft.Alpha(Opacity=100);
    opacity: 1;
    }
    </style>