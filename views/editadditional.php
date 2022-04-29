<link href="<?php echo base_url();?>fontassets/css/ad-your-post.css" rel="stylesheet ">
<!--  -->
<?php
if($this->session->userdata('login_id')=='')
{
  redirect('authentication?loginerr==0');
}

 $u_id=$this->session->userdata('login_id');
 // $user=$this->db->get_where('user_master',array('id'=>$u_id))->row();

 $this->db->select('id,category_id');
 $ad=$this->db->get_where('ad_master',array('id'=>$this->session->userdata('ad_id')))->row();
 $category=$ad->category_id;

        if($ad->category_id=5)
        {
          $class=$this->db->get_where('classes_addtional',array('ad_id'=>$ad->id))->row();
        }
        if($ad->category_id=6)
        {
          $community=$this->db->get_where('community_additional',array('ad_id'=>$ad->id))->row();
        }
        if($ad->category_id=7)
        {
          $event=$this->db->get_where('events_additional',array('ad_id'=>$ad->id))->row();
        }
        if($ad->category_id=8)
        {
          $forsale=$this->db->get_where('for_sale_additional',array('ad_id'=>$ad->id))->row();
        }
        if($ad->category_id=9)
        {
          $job=$this->db->get_where('job_additional',array('ad_id'=>$ad->id))->row();
        }
        if($ad->category_id=10)
        {
          $personal=$this->db->get_where('personal_additional',array('ad_id'=>$ad->id))->row();
        }
        if($ad->category_id=11)
        {
          $realestate=$this->db->get_where('real_estate_additional',array('ad_id'=>$ad->id))->row();
        }
        if($ad->category_id=12)
        {
          $service=$this->db->get_where('service_additional',array('ad_id'=>$ad->id))->row();
        }
        if($ad->category_id=14)
        {
          $vehicle=$this->db->get_where('vehicle_additional',array('ad_id'=>$ad->id))->row();
        }

        
?>
<section class="ad-post-banner ">
        <div class="container ">
            <div class="banner-content ">
                <div class="row "></div>
            </div>
        </div>
    </section>

    <section class="post-content" style="padding: 0px 0!important;">
        <div class="container">
         <div class="row">
                <div class="post-free-ad">
                    <div class="row">
                        <div class="col-12">
                           <div class="notice"><i class="fa fa-bullhorn fa-1x"></i> Notice</div><marquee><h6 class="ad-post-title" style="font-size: 15px;color: #d93920;">Warning we will delete any advertisement we believe is a scam or fraudulent</h6></marquee>  
                        </div>
                    </div>
                    <form name="form" method="post" action="<?php echo base_url();?>postad/editadditionallist/<?=$this->session->userdata('ad_id')?>" enctype="multipart/form-data">
                </div>
            
               
             
                <!-- ////End -->
                 <?php if($category==5){?>
                <div class="ad-post-details" id="class_additional">
                <h6 class="post-details-title">Add Additional Details</h6>
                <div class="post-details-form">
                <div class="row">
                <div class="col-md-6">
                    <label>Classes Date</label>
                    <input type="date" class="form-control" name="class_date">
                    
                </div>
                </div>   
                </div>
                </div>
                <?php } if($category==7){?>
                <div class="ad-post-details" id="event_additional" >
                <h6 class="post-details-title">Add Additional Details</h6>
                <div class="post-details-form">
                <div class="row">
                <div class="col-md-6">
                    <label>Events Date</label>
                    <input type="date" class="form-control" name="event_date">
                    
                </div>
                </div>   
                </div>
                </div>
                <?php } if($category==8){?>
                <!-- /////////// -->
                <div class="ad-post-details" id="forsale_additional">
                <h6 class="post-details-title">Add Additional Details</h6>
                <div class="post-details-form">
                <div class="row">
                <div class="col-md-6 position-relative">
                    <label>Price</label>
                    <input type="text" class="form-control position-relative" name="forsale_price" >
                    <select class="form-control" name="forsale_price_type" style="position: absolute;top: 32px;width: 24%;height: 48px;right: 17px;background: black;color: white;">
                        <option value="USD (US$)">USD (US$)</option>
                        <option value="EUR (€)">EUR (€)</option>
                        <option value="JPY (¥)">JPY (¥)</option>
                        <option value="GBP (£)">GBP (£)</option>
                        <option value="AUD (A$)">AUD (A$)</option>
                        <option value="CAD (C$)">CAD (C$)</option>
                        <option value="CHF (CHF)">CHF (CHF)</option>
                        <option value="HKD (HK$)">HKD (HK$)</option>
                        <option value="NZD (NZ$)">NZD (NZ$)</option>
                        <option value="SEK (kr)">SEK (kr)</option>
                        <option value="KRW (₩)">KRW (₩)</option>
                        <option value="SGD (S$)">SGD (S$)</option>
                        <option value="NOK (kr)">NOK (kr)</option>
                        <option value="MXN ($)">MXN ($)</option>
                        <option value="INR (₹)">INR (₹)</option>
                        <option value="RUB (₽)">RUB (₽)</option>
                        <option value="ZAR (R)">ZAR (R)</option>
                        <option value="TRY (₺)">TRY (₺)</option>
                        <option value="BRL (R$)">BRL (R$)</option>
                        <option value="TWD (NT$)">TWD (NT$)</option>
                        <option value="DKK (kr)">DKK (kr)</option>
                        <option value="PLN (zł)">PLN (zł)</option>
                        <option value="THB (฿)">THB (฿)</option>
                        <option value="IDR (Rp)">IDR (Rp)</option>
                        <option value="HUF (Ft)">HUF (Ft)</option>
                        <option value="CZK (Kč)">CZK (Kč)</option>
                        <option value="ILS (₪)">ILS (₪)</option>
                        <option value="CLP (CLP$)">CLP (CLP$)</option>
                        <option value="PHP (₱)">PHP (₱)</option>
                        <option value="AED (د.إ)">AED (د.إ)</option>
                        <option value="COP (COL$)">COP (COL$)</option>
                        <option value="SAR (﷼)">SAR (﷼)</option>
                        <option value="MYR (RM)">MYR (RM)</option>
                        <option value="RON (L)">RON (L)</option>
                        
                    </select>
                </div>
               
                <div class="col-md-6">
                    <label>Condition</label>
                    <label class="container-checkbox">Used
                    <input type="radio" name="forsale_condition" value="Used">
                    <span class="checkmark"></span>
                    </label>
                    <label class="container-checkbox">New
                    <input type="radio" name="forsale_condition" value="New">
                    <span class="checkmark"></span>
                    </label>
                   
                </div>

                </div>   
                </div>
                </div>
                <?php } if($category==9){?>
                <!-- //////////// -->
                <div class="ad-post-details" id="jobs_additional" >
                <h6 class="post-details-title">Add Additional Details</h6>
                <div class="post-details-form">
                <div class="row">
                <div class="col-md-6">
                    <label>Opening Date</label>
                    <input type="date" class="form-control" name="opening_date">
                    
                </div>
                <div class="col-md-6">
                    <label>Closing Date</label>
                    <input type="date" class="form-control" name="closing_date">
                    
                </div>
                </div>   
                </div>
                </div>
                <?php } if($category==10){?>
                <!-- ////////////// -->
                <div class="ad-post-details" id="personal_additional">
                <h6 class="post-details-title">Add Additional Details</h6>
                <div class="post-details-form">
                <div class="row">
               
                <div class="col-md-6">
                    <label>Gender</label>
                   
                    <label class="container-checkbox">Male
                    <input type="radio" name="gender" value="Male">
                    <span class="checkmark"></span>
                    </label>
                    <label class="container-checkbox">Female
                    <input type="radio" name="gender" value="Female" >
                    <span class="checkmark"></span>
                    </label>
                    <label class="container-checkbox">Other
                    <input type="radio" name="gender" value="Other">
                    <span class="checkmark"></span>
                    </label>
                </div>
                <div class="col-md-6">
                    <label>Age</label>
                    <input type="number" min="18" name="personal_age" class="form-control" placeholder="Enter ">

                </div>
                <div class="col-md-6">
                    <label>Bust</label>
                    <div class="city">
                    <select name="bust" class="search-city mdb-select" style="height: 50px;">
                    <option value="">Please Select</option>
                    <option value="man">I am a Man</option>
                    <option value="A Cup">A Cup</option>
                    <option value="B Cup">B Cup</option>
                    <option value="C Cup">C Cup</option>
                    <option value="D Cup">D Cup</option>
                    <option value="DD Cup">DD Cup</option>
                    <option value="DDD Cup">DDD Cup</option>
                    </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Eyes</label>
                    <div class="city">
                    <select name="eyes" class="search-city mdb-select" style="height: 50px;">
                    <option value="">Select</option>
                    <option value="Brown Eyes">Brown Eyes</option>
                    <option value="Blue Eyes">Blue Eyes</option>
                    <option value="Gray Eyes">Gray Eyes</option>
                    <option value="Hazel Eyes">Hazel Eyes</option>
                    <option value="Green Eyes">Green Eyes</option>
                    <option value="Amber Eyes">Amber Eyes</option>
                    </select>
                </div>
                </div>
                <div class="col-md-6">
                    <label>Height</label>
                    <div class="city">
                    <select name="height" class="search-city mdb-select" style="height: 50px;">
                    <option value="">Select</option>

                    <option value="4' 9''/145cm">4' 9''/145cm</option>
                    <option value="4'10''/147.5cm">4' 10''/147.5cm</option>
                    <option value="4'11''/150cm">4' 11''/150cm</option>
                    <option value="5' 0''/152.5cm">5' 0''/152.5cm</option>
                    <option value="5' 0.5''/155cm">5' 0.5''/155cm</option>
                    <option value="5' 1''/155cm">5' 1''/155cm</option>
                    <option value="5' 2''/157.5cm">5' 2''/157.5cm</option>
                    <option value="5' 3''/160cm">5' 3''/160cm</option>
                    <option value="5' 4''/162.5cm">5' 4''/162.5cm</option>
                    <option value="5' 5''/165cm">5' 5''/165cm</option>
                    <option value="5' 6''/167.5cm">5' 6''/167.5cm</option>
                    <option value="5' 7''/170cm">5' 7''/170cm</option>
                    <option value="5' 8''/172.5cm">5' 8''/172.5cm</option>
                    <option value="5' 9''/175cm">5' 9''/175cm</option>
                    <option value="5' 10''/177.5cm">5' 10''/177.5cm</option>
                    <option value="5' 11''/180cm">5' 11''/180cm</option>
                    <option value="6' 0''/182.5cm">6' 0''/182.5cm</option>
                    <option value="6' 1''/185cm">6' 1''/185cm</option>

                    </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Race</label>
                    <div class="city">
                    <select name="race" class="search-city mdb-select" style="height: 50px;">
                    <option value="">Select</option>
                    <option value="Asian">Asian</option>
                    <option value="Arabian">Arabian</option>
                    <option value="Aborigine">Aborigine</option>
                    <option value="Black">Black</option>
                    <option value="Brazilian">Brazilian</option>
                    <option value="Chinese">Chinese</option>
                    <option value="Caucasian">Caucasian</option>
                    <option value="Eurasian">Euro Asian</option>
                    <option value="European">European</option>
                    <option value="Greek">Greek</option>
                    <option value="Hispanic">Hispanic</option>
                    <option value="Indian">Indian</option>
                    <option value="Japanese">Japanese</option>
                    <option value="Korean">Korean</option>
                    <option value="Latino">Latino</option>
                    <option value="Middle East">Middle East</option>
                    <option value="Native American">Native American</option>
                    <option value="Polynesian">Polynesian</option>
                    <option value="Russian">Russian</option>
                    <option value="Scandinavian">Scandinavian</option>
                    <option value="Thai">Thai</option>
                    <option value="White">White</option>
                    </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Available From</label>
                     <input type="time" class="form-control" name="available_from">
                </div>
                <div class="col-md-6">
                    <label>Available To</label>
                     <input type="time" class="form-control" name="available_to">
                </div>
                </div>   
                </div>
                </div>
            <?php } if($category==11){?>
                <!-- /////////// -->
                  <div class="ad-post-details" id="realestate_additional">
                <h6 class="post-details-title">Add Additional Details</h6>
                <div class="post-details-form">
                <div class="row">
                <div class="col-md-6">
                    <label>What type of property do you have?</label>
                    <div class="city">
                    <select name="property_type" class="search-city mdb-select" style="height: 50px;">
                    <option value="">Select</option>
                    <option value="House">House</option>
                    <option value="Townhouse">Townhouse</option>
                    <option value="Apartment & Unit">Apartment & Unit</option>
                    <option value="Villa">Villa</option>
                    <option value="Commercial Space">Commercial Space</option>
                    </select>
                </div>
                </div>
                <div class="col-md-6">
                    <label>Bedrooms</label>
                    <input type="number" class="form-control" name="bedrooms" >
                    
                </div>
                <div class="col-md-6">
                    <label>Bathrooms</label>
                    <input type="number" class="form-control" name="bathrooms">
                    
                </div>
                <div class="col-md-6">
                    <label>Parking spaces</label>
                    <input type="number" class="form-control" name="parking_space" >
                    
                </div>
                <div class="col-md-6">
                    <label>Building size (optional)<i class="fa fa-info-circle"></i></label>
                    <input type="text" class="form-control" name="building_size" >
                    
                </div>
                <div class="col-md-6">
                    <label>Land area (optional)<i class="fa fa-info-circle"></i></label>
                    <input type="text" class="form-control" name="land_area" >
                    
                </div>
                <div class="col-md-12 mt-2">
                    <label>Property features (optional)<i class="fa fa-info-circle"></i></label>
                    <div class="row">
                        <div class="col-md-6">
                        <label class="container-checkbox">Alarm system
                        <input type="radio" name="property_feature[]" value="Alarm system">
                        <span class="checkmark"></span>
                        </label>
                        <label class="container-checkbox">Broadband internet available
                        <input type="radio" name="property_feature[]" value="Broadband internet available">
                        <span class="checkmark"></span>
                        </label>
                        <label class="container-checkbox">Dishwasher
                        <input type="radio" name="property_feature[]" value="Dishwasher">
                        <span class="checkmark"></span>
                        </label>
                        <label class="container-checkbox">Outdoor entertainment area
                        <input type="radio" name="property_feature[]" value="Outdoor entertainment area">
                        <span class="checkmark"></span>
                        </label>
                        <label class="container-checkbox">Solar panels
                        <input type="radio" name="property_feature[]" value="Solar panels">
                        <span class="checkmark"></span>
                        </label>  
                        </div>
                        <div class="col-md-6">
                         <label class="container-checkbox">Balcony
                        <input type="radio" name="property_feature[]" value="Balcony">
                        <span class="checkmark"></span>
                        </label>
                        <label class="container-checkbox">Built-in wardrobes
                        <input type="radio" name="property_feature[]" value="Built-in wardrobes">
                        <span class="checkmark"></span>
                        </label>
                        <label class="container-checkbox">Furnished
                        <input type="radio" name="property_feature[]" value="Furnished">
                        <span class="checkmark"></span>
                        </label>
                        <label class="container-checkbox">Pets considered
                        <input type="radio" name="property_feature[]" value="Pets considered">
                        <span class="checkmark"></span>
                        </label>
                        <label class="container-checkbox">Swimming pool (in-ground)
                        <input type="radio" name="property_feature[]" value="Swimming pool (in-ground)">
                        <span class="checkmark"></span>
                        </label>      
                        </div>
                    </div>
                    
                </div>
               
                <div class="col-md-6 position-relative">
                    <label>Price</label>
                    <input type="text" class="form-control" name="real_price" >
                    <select class="form-control" name="real_price_type" style="position: absolute;top: 33px;width: 24%;height: 48px;right: 148px;background: black;color: white;">
                        <option value="USD (US$)">USD (US$)</option>
                        <option value="EUR (€)">EUR (€)</option>
                        <option value="JPY (¥)">JPY (¥)</option>
                        <option value="GBP (£)">GBP (£)</option>
                        <option value="AUD (A$)">AUD (A$)</option>
                        <option value="CAD (C$)">CAD (C$)</option>
                        <option value="CHF (CHF)">CHF (CHF)</option>
                        <option value="HKD (HK$)">HKD (HK$)</option>
                        <option value="NZD (NZ$)">NZD (NZ$)</option>
                        <option value="SEK (kr)">SEK (kr)</option>
                        <option value="KRW (₩)">KRW (₩)</option>
                        <option value="SGD (S$)">SGD (S$)</option>
                        <option value="NOK (kr)">NOK (kr)</option>
                        <option value="MXN ($)">MXN ($)</option>
                        <option value="INR (₹)">INR (₹)</option>
                        <option value="RUB (₽)">RUB (₽)</option>
                        <option value="ZAR (R)">ZAR (R)</option>
                        <option value="TRY (₺)">TRY (₺)</option>
                        <option value="BRL (R$)">BRL (R$)</option>
                        <option value="TWD (NT$)">TWD (NT$)</option>
                        <option value="DKK (kr)">DKK (kr)</option>
                        <option value="PLN (zł)">PLN (zł)</option>
                        <option value="THB (฿)">THB (฿)</option>
                        <option value="IDR (Rp)">IDR (Rp)</option>
                        <option value="HUF (Ft)">HUF (Ft)</option>
                        <option value="CZK (Kč)">CZK (Kč)</option>
                        <option value="ILS (₪)">ILS (₪)</option>
                        <option value="CLP (CLP$)">CLP (CLP$)</option>
                        <option value="PHP (₱)">PHP (₱)</option>
                        <option value="AED (د.إ)">AED (د.إ)</option>
                        <option value="COP (COL$)">COP (COL$)</option>
                        <option value="SAR (﷼)">SAR (﷼)</option>
                        <option value="MYR (RM)">MYR (RM)</option>
                        <option value="RON (L)">RON (L)</option>
                        
                    </select>
                    <select class="form-control" name="real_price_time" style="position: absolute;top: 33px;width: 24%;height: 48px;right: 17px;background: black;color: white;">
                        <option value="permanent">Permanent</option>
                        <option value="per year">Per Year</option>
                        <option value="per month">Per Month</option>
                        <option value="per week">Per Week</option>
                        <option value="per day">Per Day</option>
                    </select>
                </div>
                <div class="col-md-6 position-relative">
                    <label>Bond <i class="fa fa-money"></i></label>
                    <input type="text" class="form-control" name="bond_price" >
                    <select class="form-control" name="bond_price_type" style="position: absolute;top: 33px;width: 24%;height: 48px;right: 17px;background: black;color: white;">
                        <option value="USD (US$)">USD (US$)</option>
                        <option value="EUR (€)">EUR (€)</option>
                        <option value="JPY (¥)">JPY (¥)</option>
                        <option value="GBP (£)">GBP (£)</option>
                        <option value="AUD (A$)">AUD (A$)</option>
                        <option value="CAD (C$)">CAD (C$)</option>
                        <option value="CHF (CHF)">CHF (CHF)</option>
                        <option value="HKD (HK$)">HKD (HK$)</option>
                        <option value="NZD (NZ$)">NZD (NZ$)</option>
                        <option value="SEK (kr)">SEK (kr)</option>
                        <option value="KRW (₩)">KRW (₩)</option>
                        <option value="SGD (S$)">SGD (S$)</option>
                        <option value="NOK (kr)">NOK (kr)</option>
                        <option value="MXN ($)">MXN ($)</option>
                        <option value="INR (₹)">INR (₹)</option>
                        <option value="RUB (₽)">RUB (₽)</option>
                        <option value="ZAR (R)">ZAR (R)</option>
                        <option value="TRY (₺)">TRY (₺)</option>
                        <option value="BRL (R$)">BRL (R$)</option>
                        <option value="TWD (NT$)">TWD (NT$)</option>
                        <option value="DKK (kr)">DKK (kr)</option>
                        <option value="PLN (zł)">PLN (zł)</option>
                        <option value="THB (฿)">THB (฿)</option>
                        <option value="IDR (Rp)">IDR (Rp)</option>
                        <option value="HUF (Ft)">HUF (Ft)</option>
                        <option value="CZK (Kč)">CZK (Kč)</option>
                        <option value="ILS (₪)">ILS (₪)</option>
                        <option value="CLP (CLP$)">CLP (CLP$)</option>
                        <option value="PHP (₱)">PHP (₱)</option>
                        <option value="AED (د.إ)">AED (د.إ)</option>
                        <option value="COP (COL$)">COP (COL$)</option>
                        <option value="SAR (﷼)">SAR (﷼)</option>
                        <option value="MYR (RM)">MYR (RM)</option>
                        <option value="RON (L)">RON (L)</option>
                        
                    </select>
                </div>
                </div>
                </div>   
                </div>
            <?php } if($category==14){ ?>
             
                <div class="ad-post-details" id="vehicle_additional">
                <h6 class="post-details-title">Add Additional Details</h6>
                <div class="post-details-form">
                <div class="row">
                <div class="col-md-6">
                    <label>Make</label>
                    <div class="city">
                    <input type="text" name="make" list="make_list" class="form-control" placeholder="Select Make">
                    <datalist id="make_list" style="height: 50px;">
                    <option value="">Select</option>
                    <?php
                    $this->db->select('make');
                    $this->db->distinct();
                    $qry=$this->db->get('make_model_master')->result_array();
                    foreach ($qry as $qr) {

                    ?>
                    <option value="<?=$qr['make'];?>"><?=$qr['make'];?></option>
                    <?php } ?>
                    </datalist>
                </div>
                </div>
                <div class="col-md-6">
                    <label>Model</label>
                    <div class="city">
                    <input type="text" name="model" list="model_list" class="form-control" placeholder="Select Model">
                    <datalist id="model_list" style="height: 50px;">
                    <option value="">Select</option>
                    <?php

                    $qry2=$this->db->get('make_model_master')->result_array();
                    foreach ($qry2 as $qr1) {

                    ?>
                    <option value="<?=$qr1['model'];?>"><?=$qr1['model'];?></option>
                    <?php } ?>
                    </datalist>
                </div>
                </div>
                <div class="col-md-6">
                    <label>Year</label>
                    <div class="city">
                    <select name="vehicle_year" class="search-city mdb-select" style="height: 50px;">
                    <option value="">Please Select</option>
                    <option value="1950">1950</option>
                    <option value="1951">1951</option>
                    <option value="1952">1952</option>
                    <option value="1953">1953</option>
                    <option value="1954">1954</option>
                    <option value="1955">1955</option>
                    <option value="1956">1956</option>
                    <option value="1957">1957</option>
                    <option value="1958">1958</option>
                    <option value="1959">1959</option>
                    <option value="1960">1960</option>
                    <option value="1961">1961</option>
                    <option value="1962">1962</option>
                    <option value="1963">1963</option>
                    <option value="1964">1964</option>
                    <option value="1965">1965</option>
                    <option value="1966">1966</option>
                    <option value="1967">1967</option>
                    <option value="1968">1968</option>
                    <option value="1969">1969</option>
                    <option value="1970">1970</option>
                    <option value="1971">1971</option>
                    <option value="1972">1972</option>
                    <option value="1973">1973</option>
                    <option value="1974">1974</option>
                    <option value="1975">1975</option>
                    <option value="1976">1976</option>
                    <option value="1977">1977</option>
                    <option value="1978">1978</option>
                    <option value="1979">1979</option>
                    <option value="1980">1980</option>

                    <option value="1981">1981</option>
                    <option value="1982">1982</option>
                    <option value="1983">1983</option>
                    <option value="1984">1984</option>
                    <option value="1985">1985</option>
                    <option value="1986">1986</option>
                    <option value="1987">1987</option>
                    <option value="1988">1988</option>
                    <option value="1989">1989</option>

                    <option value="1990">1990</option>
                    <option value="1991">1991</option>
                    <option value="1992">1992</option>
                    <option value="1993">1993</option>
                    <option value="1994">1994</option>
                    <option value="1995">1995</option>
                    <option value="1996">1996</option>
                    <option value="1997">1997</option>
                    <option value="1998">1998</option>
                    <option value="1999">1999</option>

                    <option value="2000">2000</option>
                    <option value="2001">2001</option>
                    <option value="2002">2002</option>
                    <option value="2003">2003</option>
                    <option value="2004">2004</option>
                    <option value="2005">2005</option>
                    <option value="2006">2006</option>
                    <option value="2007">2007</option>
                    <option value="2008">2008</option>
                    <option value="2009">2009</option>
                    <option value="2010">2010</option>
                    <option value="2011">2011</option> 
                    <option value="2012">2012</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>

                    </select>
                </div>
                </div>
                <div class="col-md-6 position-relative">
                    <label>Sale Price</label>
                    <input type="text" class="form-control position-relative" placeholder="Enter Sale Price" name="sale_price" >
                    <select class="form-control" name="sale_price_type" style="position: absolute;top: 32px;width: 24%;height: 48px;right: 17px;background: black;color: white;">
                        <option value="USD (US$)">USD (US$)</option>
                        <option value="EUR (€)">EUR (€)</option>
                        <option value="JPY (¥)">JPY (¥)</option>
                        <option value="GBP (£)">GBP (£)</option>
                        <option value="AUD (A$)">AUD (A$)</option>
                        <option value="CAD (C$)">CAD (C$)</option>
                        <option value="CHF (CHF)">CHF (CHF)</option>
                        <option value="HKD (HK$)">HKD (HK$)</option>
                        <option value="NZD (NZ$)">NZD (NZ$)</option>
                        <option value="SEK (kr)">SEK (kr)</option>
                        <option value="KRW (₩)">KRW (₩)</option>
                        <option value="SGD (S$)">SGD (S$)</option>
                        <option value="NOK (kr)">NOK (kr)</option>
                        <option value="MXN ($)">MXN ($)</option>
                        <option value="INR (₹)">INR (₹)</option>
                        <option value="RUB (₽)">RUB (₽)</option>
                        <option value="ZAR (R)">ZAR (R)</option>
                        <option value="TRY (₺)">TRY (₺)</option>
                        <option value="BRL (R$)">BRL (R$)</option>
                        <option value="TWD (NT$)">TWD (NT$)</option>
                        <option value="DKK (kr)">DKK (kr)</option>
                        <option value="PLN (zł)">PLN (zł)</option>
                        <option value="THB (฿)">THB (฿)</option>
                        <option value="IDR (Rp)">IDR (Rp)</option>
                        <option value="HUF (Ft)">HUF (Ft)</option>
                        <option value="CZK (Kč)">CZK (Kč)</option>
                        <option value="ILS (₪)">ILS (₪)</option>
                        <option value="CLP (CLP$)">CLP (CLP$)</option>
                        <option value="PHP (₱)">PHP (₱)</option>
                        <option value="AED (د.إ)">AED (د.إ)</option>
                        <option value="COP (COL$)">COP (COL$)</option>
                        <option value="SAR (﷼)">SAR (﷼)</option>
                        <option value="MYR (RM)">MYR (RM)</option>
                        <option value="RON (L)">RON (L)</option>
                        
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Condition</label>
                   
                    <label class="container-checkbox">Used
                    <input type="radio" name="vehicle_condition" value="Used">
                    <span class="checkmark"></span>
                    </label>
                    <label class="container-checkbox">New
                    <input type="radio" name="vehicle_condition" value="New">
                    <span class="checkmark"></span>
                    </label>
                </div>
                
                <div class="col-md-6 position-relative">
                    <label>Mileage</label>
                    <input type="text" name="mileage" class="form-control position-relative" placeholder="Enter Mileage">
                    <select class="form-control" name="mileage_type" style="position: absolute;top: 32px;width: 24%;height: 48px;right: 17px;background: black;color: white;">
                        <option value="Kms">Kms</option>
                    </select>
                </div>
              <div class="col-md-6">
                    <label>Color</label>
                    <div class="city">
                    <select name="color" class="search-city form-control mdb-select" style="height: 50px;">
                    <option value="">Please Select</option>
                    <option value="red">Red</option>
                    <option value="blue">Blue</option>
                    <option value="black">Black</option>
                    <option value="green">Green</option>
                    <option value="yellow">Yellow</option>
                    <option value="white">White</option> 
                    <option value="orange">Orange</option>
                    <option value="purple">Purple</option> 
                    <option value="silver">Silver</option>
                    <option value="brown">Brown</option>
                    <option value="biege">Beige</option>     
                    </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Body type</label>
                    <div class="city">
                    <select name="body_type" class="search-city mdb-select" style="height: 50px;">
                    <option value="">Please Select</option>
                    <option value="convertible">Convertible</option>
                    <option value="coupe">Coupe</option>
                    <option value="hatchback">Hatchback</option>
                    <option value="other">Other</option>
                    <option value="suv">SUV</option>
                    <option value="sedan">Sedan</option>
                    <option value="station wagon">Station wagon</option> 
                    <option value="truck">Truck</option>
                    <option value="van/minivan">Van/Minivan</option>
                    <option value="Airboat">Airboat</option>
                    <option value="Bass boat">Bass boat</option>
                    <option value="Bow rider">Bow rider</option>
                    <option value="Bracera">Bracera</option>
                    <option value="Brig">Brig</option>
                    <option value="Cabin cruiser">Cabin cruiser</option>
                    <option value="Cruise ship">Cruise ship</option>
                    <option value="Coble">Coble</option>
                    <option value="Cuddy boat">Cuddy boat</option>
                    <option value="Cape Islander">Cape Islander</option>
                    <option value="Dhow">Dhow</option>
                    <option value="Dinghy">Dinghy</option>
                    <option value="Dorna">Dorna</option>
                    <option value="Drift boat">Drift boat</option>
                    <option value="Electric boat">Electric boat</option>
                    <option value="Ferry">Ferry</option>
                    <option value="Fireboat">Fireboat</option>
                    <option value="Folding boat">Folding boat</option>
                    <option value="Fishing boat(contemporary)">Fishing boat(contemporary)</option>
                    <option value="Fishing boat(traditional)">Fishing boat(traditional)</option>
                    <option value="Galway hooker">Galway hooker</option>
                    <option value="Gundalow">Gundalow</option> 
                    <option value="Ice boat">Ice boat</option>
                    <option value="Jetboat">Jetboat</option>
                    <option value="Jon boat">Jon boat</option>
                    <option value="Jet ski">Jet ski</option>
                    <option value="Ketch">Ketch</option>
                    <option value="Lifeboat">Lifeboat</option>
                    <option value="Missile boat">Missile boat</option>
                    <option value="Narrowboat">Narrowboat</option>
                    <option value="Patrol boat">Patrol boat</option>
                    <option value="Pump boat">Pump boat</option>
                    <option value="Rowboat">Rowboat</option>
                    <option value="Shad boat">Shad boat</option>
                    <option value="Towboat">Towboat</option>
                    <option value="Wakeboard boat">Wakeboard boat</option>
                    </select>
                </div>
                </div>
                <div class="col-md-6">
                    <label>Is your car registered?</label>
                   
                    <label class="container-checkbox">Yes
                    <input type="radio" name="car_register" value="Yes">
                    <span class="checkmark"></span>
                    </label>
                    <label class="container-checkbox">No
                    <input type="radio" name="car_register" value="No">
                    <span class="checkmark"></span>
                    </label>
                </div>
                <div class="col-md-6">
                    <label>Registration Plate Number</label>
                    <input type="text" class="form-control position-relative"  name="register_plate_number" >
                </div>
               <div class="col-md-12">
                   <div class="row p-3">
                    <div class="col-md-12 mt-2" style="background: #d2caca;color: #515151;padding: 11px 12px 9px 15px;" ><h5>Market Features +</h5></div>
                       <div class="col-md-6 mt-2 new-t">
                        <label>Wheels & Tyres</label>

                        <label class="container-checkbox">16" Alloy Wheels
                        <input type="radio" name="wheel_tyres" value='16" Alloy Wheels'>
                        <span class="checkmark"></span>
                        </label>
                        <label class="container-checkbox">17" Alloy Wheels
                        <input type="radio" name="wheel_tyres" value='17" Alloy Wheels'>
                        <span class="checkmark"></span>
                        </label>  
                        <label class="container-checkbox">18" Alloy Wheels
                        <input type="radio" name="wheel_tyres" value='18" Alloy Wheels'>
                        <span class="checkmark"></span>
                        </label> 
                        <label class="container-checkbox">19" Alloy Wheels
                        <input type="radio" name="wheel_tyres" value='19" Alloy Wheels'>
                        <span class="checkmark"></span>
                        </label> 
                        <label class="container-checkbox">20" Alloy Wheels
                        <input type="radio" name="wheel_tyres" value='20" Alloy Wheels'>
                        <span class="checkmark"></span>
                        </label> 
                        <label class="container-checkbox">22" Alloy Wheels
                        <input type="radio" name="wheel_tyres" value='22" Alloy Wheels'>
                        <span class="checkmark"></span>
                        </label> 
                        <label class="container-checkbox">Wide Wheels
                        <input type="radio" name="wheel_tyres" value="Wide Wheels">
                        <span class="checkmark"></span>
                        </label> 
                       </div>
                       <div class="col-md-6 mt-2 new-t">
                        <label>Lights & Windows</label>

                        <label class="container-checkbox">Driving Lamps
                        <input type="radio" name="light_window" value="Driving Lamps">
                        <span class="checkmark"></span>
                        </label>
                        <label class="container-checkbox">Fog Lamps - Front
                        <input type="radio" name="light_window" value="Fog Lamps - Front">
                        <span class="checkmark"></span>
                        </label>  
                        <label class="container-checkbox">Tinted Windows
                        <input type="radio" name="light_window" value="Tinted Windows">
                        <span class="checkmark"></span>
                        </label> 
                        <label class="container-checkbox">Tinted Windows - 2 Doors
                        <input type="radio" name="light_window" value="Tinted Windows - 2 Doors">
                        <span class="checkmark"></span>
                        </label> 
                        <label>Instruments & Controls</label>

                        <label class="container-checkbox">GPS (Satellite Navigation)
                        <input type="radio" name="instrument" value="GPS (Satellite Navigation)">
                        <span class="checkmark"></span>
                        </label>
                                               
                       
                       </div>
                       <div class="col-md-6 new-t">
                        <label>Comfort & Convenience</label>

                        <label class="container-checkbox">Air Conditioning
                        <input type="radio" name="comfort" value="Air Conditioning">
                        <span class="checkmark"></span>
                        </label>
                        <label class="container-checkbox">Cargo Barrier
                        <input type="radio" name="comfort" value="Cargo Barrier">
                        <span class="checkmark"></span>
                        </label>  
                        <label class="container-checkbox">Carpet Mats
                        <input type="radio" name="comfort" value="Carpet Mats">
                        <span class="checkmark"></span>
                        </label> 
                        <label class="container-checkbox">Cruise Control
                        <input type="radio" name="comfort" value="Cruise Control">
                        <span class="checkmark"></span>
                        </label> 
                        <label class="container-checkbox">Hand Throttle and Brake Controls
                        <input type="radio" name="comfort" value="Hand Throttle and Brake Controls">
                        <span class="checkmark"></span>
                        </label>
                        <label class="container-checkbox">Wheelchair Accessible
                        <input type="radio" name="comfort" value="Wheelchair Accessible">
                        <span class="checkmark"></span>
                        </label>                      
                                               
                       </div>
                        <div class="col-md-6 new-t" >
                        <label>Interior</label>

                        <label class="container-checkbox">Leather Seats
                        <input type="radio" name="interior" value="Leather Seats">
                        <span class="checkmark"></span>
                        </label>
                        <label class="container-checkbox">Leather Trim (Incl. Seats, inserts)
                        <input type="radio" name="interior" value="Leather Trim (Incl. Seats, inserts)">
                        <span class="checkmark"></span>
                        </label> 
                        <label>Fuel</label> 
                        <label class="container-checkbox">LPG - Electronic Sequential MPI (Dual Fuel)
                        <input type="radio" name="fuel" value="LPG - Electronic Sequential MPI (Dual Fuel)">
                        <span class="checkmark"></span>
                        </label> 
                        <label class="container-checkbox">LPG (Dual Fuel)
                        <input type="radio" name="fuel" value="LPG (Dual Fuel)">
                        <span class="checkmark"></span>
                        </label> 
                        <label class="container-checkbox">Petrol
                        <input type="radio" name="fuel" value="Petrol">
                        <span class="checkmark"></span>
                        </label>
                        <label class="container-checkbox">Diesel
                        <input type="radio" name="fuel" value="Diesel">
                        <span class="checkmark"></span>
                        </label>                      
                        <label class="container-checkbox">Elctric
                        <input type="radio" name="fuel" value="Elctric">
                        <span class="checkmark"></span>
                        </label>
                        <label class="container-checkbox">Hydrogen
                        <input type="radio" name="fuel" value="Hydrogen">
                        <span class="checkmark"></span>
                        </label> 
                       </div>
                       <div class="col-md-6 new-t">
                        <label>Safety & Security</label>

                        <label class="container-checkbox">Alarm
                        <input type="radio" name="safety" value="Alarm">
                        <span class="checkmark"></span>
                        </label>
                        <label class="container-checkbox">Central Locking
                        <input type="radio" name="safety" value="Central Locking">
                        <span class="checkmark"></span>
                        </label> 
                        <label class="container-checkbox">Control - Park Distance Rear
                        <input type="radio" name="safety" value="Control - Park Distance Rear">
                        <span class="checkmark"></span>
                        </label> 
                        <label class="container-checkbox">Engine Immobiliser
                        <input type="radio" name="safety" value="Engine Immobiliser">
                        <span class="checkmark"></span>
                        </label> 
                       
                       </div>
                       <div class="col-md-6 new-t">
                        <label>Audio, Visual & Communication</label>

                        <label class="container-checkbox">Audio - MP3 Decoder
                        <input type="radio" name="communication" value="Audio - MP3 Decoder">
                        <span class="checkmark"></span>
                        </label>
                        <label class="container-checkbox">Bluetooth System
                        <input type="radio" name="communication" value="Bluetooth System">
                        <span class="checkmark"></span>
                        </label> 
                        <label class="container-checkbox">CB Radio - 40 Channel UHF
                        <input type="radio" name="communication" value="CB Radio - 40 Channel UHF">
                        <span class="checkmark"></span>
                        </label> 
                        <label class="container-checkbox">CD Player
                        <input type="radio" name="communication" value="CD Player">
                        <span class="checkmark"></span>
                        </label> 
                        <label class="container-checkbox">Colour Display Screen - Front
                        <input type="radio" name="communication" value="Colour Display Screen - Front">
                        <span class="checkmark"></span>
                        </label> 
                        <label class="container-checkbox">Colour Display Screen - Rear
                        <input type="radio" name="communication" value="Colour Display Screen - Rear">
                        <span class="checkmark"></span>
                        </label> 
                        <label class="container-checkbox">DVD Player
                        <input type="radio" name="communication" value="DVD Player">
                        <span class="checkmark"></span>
                        </label> 

                       </div>
                       <div class="col-md-6 new-t">
                        <label>Exterior</label>

                        <label class="container-checkbox">Body Kit - Lower (skirts, F & R Aprons)
                        <input type="radio" name="exterior" value="Body Kit - Lower (skirts, F & R Aprons)">
                        <span class="checkmark"></span>
                        </label>
                        <label class="container-checkbox">Bonnet Protector
                        <input type="radio" name="exterior" value="Bonnet Protector">
                        <span class="checkmark"></span>
                        </label> 
                        <label class="container-checkbox">Headlight Covers
                        <input type="radio" name="exterior" value="Headlight Covers">
                        <span class="checkmark"></span>
                        </label> 
                        <label class="container-checkbox">Side Steps
                        <input type="radio" name="exterior" value="Side Steps">
                        <span class="checkmark"></span>
                        </label> 
                        <label class="container-checkbox">Snorkel
                        <input type="radio" name="exterior" value="Snorkel">
                        <span class="checkmark"></span>
                        </label> 
                        <label class="container-checkbox">Spoiler - Rear
                        <input type="radio" name="exterior" value="Spoiler - Rear">
                        <span class="checkmark"></span>
                        </label> 
                        <label class="container-checkbox">Sunroof
                        <input type="radio" name="exterior" value="Sunroof">
                        <span class="checkmark"></span>
                        </label> 
                        <label class="container-checkbox">Sunroof - Electric
                        <input type="radio" name="exterior" value="Sunroof - Electric">
                        <span class="checkmark"></span>
                        </label>
                        <label class="container-checkbox">Weather Shields
                        <input type="radio" name="exterior" value="Weather Shields">
                        <span class="checkmark"></span>
                        </label>
                       </div>
                       <div class="col-md-6 new-t"></div>
                   </div>
               </div>
                </div>   
                </div>   
                </div>
                <?php } ?>
                 <div class="ad-post-details">
                    
                    <div class="post-details-form">
                                                 
                            <div class="row form-btn">
                                <div class="col">
                                    <button type="submit" class="btn post-add-btn">Edit Additional</button>

                                    <a href="<?php echo base_url();?>myads"><button class="btn post-back-btn" type="button" >Skip</button></a>
                                </div>
                            </div>
                        
                    </div>
                </div>
               </form>
            </div>
            
        </div>
    </section>
    <style type="text/css">
    .post-category .category-box:hover .white-icon {
    filter: invert(1)brightness(1);
    }

    .notice
    {
    background: #cb2027 !important;
    display: inline-block !important;
    padding: 5px !important;
    color: white !important;
    font-weight: 600 !important;
    position: absolute;
    z-index: 1;
    }
    /* The container */
.container-checkbox {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.container-checkbox input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.container-checkbox .checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #cecbcb;
}

/* On mouse-over, add a grey background color */
.container-checkbox:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container-checkbox input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.container-checkbox .checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.container-checkbox input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.container-checkbox .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
body
{
    overflow-x: hidden;
}
.new-t
{
    background: #f3f3f3;
    color: #5b5b5b;
}
.ad-post-details .post-details-form label {
    font-size: 15px!important;
}
.post-content .ad-post-details {
    padding-top: 31px!important;
    }
</style>