<link href="<?php echo base_url();?>fontassets/css/ad-description.css" rel="stylesheet">
 <!-- //////////////////////////// -->
<?php 
$banner=$this->db->get_where('banner',array('id'=>1))->row();
?>
<section class="ad-banner" style="background-image: url(<?=$banner->image?>)!important;">
 
        <div class="container">
            <div class="banner-content">
                <div class="row">
                    <div class="serch-form" id="show_search">
                        <form action="<?php echo base_url();?>ad/search" method="post">
                            <div class="form-row">
                                <div class="col">
                                    <div class="serchable">
                                        <input type="text" name="category" class="search-categorie" placeholder="search item" list="category_list" value="<?=$this->input->post('category');?>">
                                        <datalist id="category_list">
                                        <?php 
                                        $this->db->select('category_name');
                                        $category_qry=$this->db->get('category_master')->result_array();
                                        foreach ($category_qry as $cat) {

                                        ?>
                                        <option value="<?=$cat['category_name']?>"><?=$cat['category_name']?></option>
                                        <?php } ?>
                                        <?php 
                                        $this->db->select('subcategory_name');
                                        $ser_qry=$this->db->get_where('subcategory_master')->result_array();
                                        foreach ($ser_qry as $val) {

                                        ?>
                                        <option value="<?=$val['subcategory_name']?>"><?=$val['subcategory_name']?></option>
                                        <?php } ?>
                                        <?php 
                                        $this->db->select('child_sub_name');
                                        $ser_qry=$this->db->get_where('child_sub_master')->result_array();
                                        foreach ($ser_qry as $val) {

                                        ?>
                                        <option value="<?=$val['child_sub_name']?>"><?=$val['child_sub_name']?></option>
                                        <?php } ?>     
                                        </datalist>
                                    </div>
                                    <div id="locationField" class="location">
                                        <input type="text" class="location-field"  placeholder="Type Location For Search" value="<?=$this->input->get('location')?>" id="location" name="location" >
                                    </div>
                                    <div class="distance">
                                        <select class="custom-select distance-field" name="radius">
                                            <option selected value="0">+ 0 km</option>
                                            <option value="5"<?php if($this->input->post('radius')==5)?>>+ 5 km</option>
                                            <option value="10"<?php if($this->input->post('radius')==10)?>>+ 10 km</option>
                                            <option value="15"<?php if($this->input->post('radius')==15)?>>+ 15 km</option>
                                            <option value="20"<?php if($this->input->post('radius')==20)?>>+ 20 km</option>
                                            <option value="30"<?php if($this->input->post('radius')==30)?>>+ 30 km</option>
                                            <option value="50"<?php if($this->input->post('radius')==50)?>>+ 50 km</option>
                                            <option value="100"<?php if($this->input->post('radius')==100)?>>+ 100 km</option>
                                            <option value="1000"<?php if($this->input->post('radius')==1000)?>>+ All</option>
                                        </select>
                                    </div>
                                    <div class="find">
                                        <button type="submit" class="btn find-btn"><i class="fa fa-search"></i>Find it!</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="serch-form1 row ml-auto pr-2 mt-2" style="display: none;" >
                        <div class="form-row1 col-md-12">
                            
                                <button type="button" id="adv_search" class="btn find-btn" style="background: black;color: white;font-size: 14px;"><i class="fa fa-search"></i></button>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ad-desc-sec">
        <div class="container">
            <div class="row">
                <?php
                $aD_id=$this->uri->segment(3);
                ?>
                <div class="ad-content">
                    <div class="post-nav">
                        <div class="previous-nav">
                            <?php if(!$this->input->get('pagefirst'))
                            {?>
                            <i class="fa fa-angle-left"></i>
                            <a href="javascript:history.go(-1)"> Previous Ad</a>
                            <?php } ?>
                        </div>
                        <div class="next-nav">
                            <?php
                            $this->db->select('id');
                            $this->db->order_by('id','RANDOM');
                            $this->db->limit(1);
                            $AD_qry=$this->db->get_where('ad_master',array('category_id'=>$ad->category_id,'id !='=>$aD_id))->result();
                            foreach ($AD_qry as $dq) {
                            ?>
                            <a href="<?php echo base_url();?>ad/details/<?=$dq->id;?>">Next Ad
                            
                            </a>
                            <?php } ?>
                            <i class="fa fa-angle-right"></i>
                        </div>
                    </div>
                    <div class="ad-pics-slider carousel slide row" id="carouselExampleIndicators" data-ride="carousel">
                       
                        <div class="col-md-12">
                             <h1 class="ad-title"><?=utf8_decode($ad->ad_title)?> - <?=$ad->location?></h1>
                            <div class="ad-single-pic carousel-inner">
                                

                                <div class="carousel-item active">

                                    <div class="ad-pic position-relative">
                                        
                                        <a href="<?=$ad->ad_image;?>">
                                        <img src="<?=$ad->ad_image;?>" class="d-block" alt="Ads Main Image"></a>
                                        
                                    </div>
                                    <h2 class="premiumfont">backpage</h2>
                                </div>
                                <?php 
                                $this->db->select('ad_details_image');
                                $details_image=$this->db->get_where('details_image_master',array('ad_id'=>$ad->id))->result_array();
                                
                                foreach ($details_image as $image) 
                                { 
                                if($image['ad_details_image']!='')
                                {           
                                ?>
                                <div class="carousel-item">
                                    <div class="ad-pic">
                                        
                                        <a href="<?=$image['ad_details_image']?>">
                                        <img src="<?=$image['ad_details_image']?>" class="d-block" alt="Ads Details Image"></a>
                                        
                                    </div>
                                    <h2 class="premiumfont">backpage</h2>
                                </div>
                                <?php } }?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <ol class="ad-all-pic carousel-indicators">

                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                                   
                                    <img src="<?=$ad->ad_image?>" class="d-block" alt="Ads Main Image">
                                    
                                </li>
                                <?php 
                                $i=1;
                                $this->db->select('ad_details_image');
                                $details_image=$this->db->get_where('details_image_master',array('ad_id'=>$ad->id))->result_array();
                                if(count($details_image)!=0)
                                {
                                foreach ($details_image as $image) 
                                {            
                                ?>
                                <li data-target="#carouselExampleIndicators" data-slide-to="<?=$i++;?>">
                                    
                                    <img src="<?=$image['ad_details_image']?>" class="d-block" alt="Ads Details Image">
                                    
                                </li>
                                <?php } }?>
                            </ol>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"></a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"></a>
                    </div>
                    <?php if($ad->ad_video!=''){?>
                    <div class="ad-description">
                        <div class="row">
                            <div class="col-md-12">
                                <video width="100%" controls>
                                <source src="<?php echo base_url();?>video/<?=$ad->ad_video;?>" type="video/mp4">
                                Your browser does not support HTML video.
                                </video>
                            </div>
                        </div>
                    </div>
                   <?php } ?>
                    <div class="ad-description">
                        <h6>Description</h6>
                        <p><?=utf8_decode($ad->ad_description);?></p>
                        
                        
                     <?php if($ad->web_link !=''){?>
                      <h6>Web Site</h6>
                        <a href="<?=($ad->web_link);?>"><p><?=($ad->web_link);?> <i class="fa fa-share-square-o"></i></p></a>
                     <?php } ?>
                    </div>
                          <?php
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
                        
                  <?php if($class){?>
                    <div class="ad-description">
                        <h6>Ad Features</h6>
                  
                        <ul>
                            <?php if($class->class_date!=''){?>
                            <li>
                                <h4>Classes Date</h4>
                                <p><?=date('j F Y', strtotime($class->class_date));?></p>
                            </li>
                         <?php }?>
                        </ul>
                    </div>
                   <?php } ?>
                   <?php if($community){?>
                    <div class="ad-description">
                        <h6>Ad Features</h6>
                  
                        <ul>
                            <li>
                                <h4></h4>
                                <p></p>
                            </li>
                        </ul>
                    </div>
                   <?php } ?>
                   <?php if($event){?>
                    <div class="ad-description">
                        <h6>Ad Features</h6>
                  
                        <ul>
                            <?php if($event->event_date!='' ){?>
                            <li>
                                <h4>Events Date</h4>
                                <p><?=date('j F Y', strtotime($event->event_date));?></p>
                            </li>
                           <?php } ?>
                        </ul>
                    </div>
                   <?php } ?> 
                   <?php if($forsale){?>
                    <div class="ad-description">
                        <h6>Ad Features</h6>
                  
                        <ul>
                            <?php if($forsale->price_type!=''){?>
                            <li>
                                <h4>Price</h4>
                                <p><?=$forsale->price?> <?=$forsale->price_type?></p>
                            </li>
                            <?php } if($forsale->conditions!=''){?>
                            <li>
                                <h4>Condition</h4>
                                <p><?=$forsale->conditions?></p>
                            </li>
                          <?php } ?>
                        </ul>
                    </div>
                   <?php } ?>
                   <?php if($job){?>
                    <div class="ad-description">
                        <h6>Ad Features</h6>
                  
                        <ul>
                            <?php if($job->opening_date!='' ){?>
                            <li>
                                <h4>Opening Date</h4>
                                <p><?=date('j F Y', strtotime($job->opening_date));?></p>
                            </li>
                            <?php } if($job->closing_date!='' ){?>
                            <li>
                                <h4>Closing Date</h4>
                                <p><?=date('j F Y', strtotime($job->closing_date));?></p>
                            </li>
                          <?php } ?>
                        </ul>
                    </div>
                   <?php } ?> 
                    <?php if($personal){?>
                    <div class="ad-description">
                        <h6>Ad Features</h6>
                  
                        <ul>
                            <?php if($personal->gender!='' ){?>
                            <li>
                                <h4>Gender</h4>
                                <p><?=$personal->gender?></p>
                            </li>
                            <?php }if($personal->age!='' ){?>
                            <li>
                                <h4>Age</h4>
                                <p><?=$personal->age?></p>
                            </li>
                            <?php }if($personal->bust!='' ){?>
                            <li>
                                <h4>Bust</h4>
                                <p><?=$personal->bust?></p>
                            </li>
                            <?php }if($personal->eyes!='' ){?>
                            <li>
                                <h4>Eyes</h4>
                                <p><?=$personal->eyes?></p>
                            </li>
                            <?php }if($personal->height!=''){?>
                            <li>
                                <h4>Height</h4>
                                <p><?=$personal->height?></p>
                            </li>
                            <?php }if($personal->race!='' ){?>
                            <li>
                                <h4>Race</h4>
                                <p><?=$personal->race?></p>
                            </li>
                            <?php }if($personal->available_from!='' ){?>
                            <li>
                                <h4>Available From</h4>
                                <p><?=$personal->available_from?></p>
                            </li>
                            <?php }if($personal->available_to!='' ){?>
                            <li>
                                <h4>Available To</h4>
                                <p><?=$personal->available_to?></p>
                            </li>
                            <?php } ?>
                           
                        </ul>
                    </div>
                   <?php } ?>  
                   <?php if($service){?>
                    <div class="ad-description">
                        <h6>Ad Features</h6>
                  
                        <ul>
                            <li>
                                <h4></h4>
                                <p></p>
                            </li>
                        </ul>
                    </div>
                   <?php } ?> 
                   <?php if($realestate){?>
                    <div class="ad-description">
                        <h6>Ad Features</h6>
                  
                        <ul>
                            <?php if($realestate->property_type!='' ){?>
                            <li>
                                <h4>Property Type</h4>
                                <p><?=$realestate->property_type;?></p>
                            </li>
                            <?php }if($realestate->bedrooms!='' ){?>
                            <li>
                                <h4>Bedrooms</h4>
                                <p><?=$realestate->bedrooms;?></p>
                            </li>
                            <?php }if($realestate->bathrooms!='' ){?>
                            <li>
                                <h4>Bathrooms</h4>
                                <p><?=$realestate->bathrooms;?></p>
                            </li>
                            <?php }if($realestate->perking_space!=''){?>
                            <li>
                                <h4>Parking Space</h4>
                                <p><?=$realestate->perking_space;?></p>
                            </li>
                            <?php }if($realestate->building_size!='' ){?>
                            <li>
                                <h4>Building Size</h4>
                                <p><?=$realestate->building_size;?></p>
                            </li>
                            <?php }if($realestate->land_area!='' ){?>
                            <li>
                                <h4>Land Area</h4>
                                <p><?=$realestate->land_area;?></p>
                            </li>
                            <?php }if($realestate->property_feature!=''){?>
                            <li>
                                <h4>Property Feature</h4>
                                <p><?=$realestate->property_feature;?></p>
                            </li>
                            <?php }if($realestate->available_from!=''){?>
                            <li>
                                <h4>Available From</h4>
                                <p><?=$realestate->available_from;?></p>
                            </li>
                            <?php }if($realestate->price!=''){?>
                            <li>
                                <h4>Price</h4>
                                <p><?=$realestate->price;?> <?=$realestate->price_type;?>/<?=$realestate->price_time;?></p>
                            </li>
                            <?php }if($realestate->bond_price!='' ){?>
                            <li>
                                <h4>Bond</h4>
                                <p><?=$realestate->bond_price;?> <?=$realestate->bond_price_type;?></p>
                            </li>
                           <?php } ?>
                        </ul>
                    </div>
                   <?php } ?>   
                    <?php if($vehicle){?>
                    <div class="ad-description">
                        <h6>Ad Features</h6>
                  
                        <ul>
                            <?php if($vehicle->make!=''){?>
                            <li>
                                <h4>Make</h4>
                                <p><?=$vehicle->make;?></p>
                            </li>
                            <?php } if($vehicle->model!=''){?>
                            <li>
                                <h4>Model</h4>
                                <p><?=$vehicle->model;?></p>
                            </li>
                            <?php } if($vehicle->vehicle_year!='' ){?>
                            <li>
                                <h4>Year</h4>
                                <p><?=$vehicle->vehicle_year;?></p>
                            </li>
                            <?php } if($vehicle->sale_price!='' ){?>
                            <li>
                                <h4>Sale Price</h4>
                                <p><?=$vehicle->sale_price;?> <?=$vehicle->sale_price_type;?></p>
                            </li>
                            <?php } if($vehicle->vehicle_condition!=''){?>
                            <li>
                                <h4>Condition</h4>
                                <p><?=$vehicle->vehicle_condition;?></p>
                            </li>
                            <?php } if($vehicle->mileage!=''){?>
                            <li>
                                <h4>Mileage</h4>
                                <p><?=$vehicle->mileage;?> <?=$vehicle->mileage_type;?></p>
                            </li>
                            <?php } if($vehicle->color!=''){?>
                            <li>
                                <h4>Color</h4>
                                <p><?=$vehicle->color;?></p>
                            </li>
                            <?php } if($vehicle->body_type!=''){?>
                            <li>
                                <h4>Body Type</h4>
                                <p><?=$vehicle->body_type;?></p>
                            </li>
                            <?php } if($vehicle->car_register!='' ){?>
                            <li>
                                <h4>Car Registered</h4>
                                <p><?=$vehicle->car_register;?></p>
                            </li>
                            <?php } if($vehicle->register_plate_number!='' ){?>
                            <li>
                                <h4>Plate Number</h4>
                                <p><?=$vehicle->register_plate_number;?></p>
                            </li>
                            <?php } if($vehicle->wheel_tyres!='' ){?>
                            <li>
                                <h4>Wheels & Tyres</h4>
                                <p><?=$vehicle->wheel_tyres;?></p>
                            </li>
                            <?php } if($vehicle->light_window!='' ){?>
                            <li>
                                <h4>Lights & Windows</h4>
                                <p><?=$vehicle->light_window;?></p>
                            </li>
                            <?php } if($vehicle->instrument!='' ){?>
                            <li>
                                <h4>Instruments & Controls</h4>
                                <p><?=$vehicle->instrument;?></p>
                            </li>
                            <?php } if($vehicle->comfort!=''){?>
                            <li>
                                <h4>Comfort & Convenience</h4>
                                <p><?=$vehicle->comfort;?></p>
                            </li>
                            <?php } if($vehicle->interior!='' ){?>
                            <li>
                                <h4>Interior</h4>
                                <p><?=$vehicle->interior;?></p>
                            </li>
                            <?php } if($vehicle->fuel!='' ){?>
                            <li>
                                <h4>Fuel</h4>
                                <p><?=$vehicle->fuel;?></p>
                            </li>
                            <?php } if($vehicle->safety!='' ){?>
                            <li>
                                <h4>Safety & Security</h4>
                                <p><?=$vehicle->safety;?></p>
                            </li>
                            <?php } if($vehicle->communication!=''){?>
                            <li>
                                <h4>Audio, Visual & Communication</h4>
                                <p><?=$vehicle->communication;?></p>
                            </li>
                            <?php } if($vehicle->exterior!='' ){?>
                            <li>
                                <h4>Exterior</h4>
                                <p><?=$vehicle->exterior;?></p>
                            </li>
                        <?php } ?>
                        </ul>
                        
                    </div>
                    <?php } ?>
                    <div class="ad-details">
                        <div class="row">
                           

                            <div class="col-md-6">
                                <div class="ad-seller-details">
                                    <div class="advertiser">
                                        <h2>Advertiser</h2>
                                        <i class="fa fa-flag"></i>
                                    </div>
                                    <div class="advertiser-contact-details">
                                        <span class="advertsier-email">Email Adress : <a href="mailto:<?=$ad->email_address;?>"><?php if($ad->email_address!=""){echo $ad->email_address;}if($ad->email_address==""){echo "Blank";}?></a></span>
                                        <span class="advertsier-phone">Contact No : <a href="tel:<?=$ad->contact_number;?>"><?php if($ad->contact_number!=""){echo $ad->contact_number;}if($ad->contact_number==""){echo "Blank";}?></a></span>
                                    </div>
                                    <div class="ad-time-location">
                                        <div class="ad-time">
                                            <i class="fa fa-calendar"></i>
                                            <h6>posted</h6>
                                            <p><?=$ad->posted_date;?></p>
                                        </div>
                                        <div class="ad-location">
                                            <i class="fa fa-map-marker"></i>
                                            <h6>location</h6>
                                            <p><?=$ad->location;?></p>
                                           
                                        </div>
                                       
                                    </div>
                                     <div class="row">
                                            <div class="col-md-12">
                                               <div class="map-location">
                                            <div class="mapouter" style="width: auto!important;"><div class="gmap_canvas" style="width: auto!important;"><iframe width="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=<?=$ad->location;?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div><style>.mapouter{position:relative;text-align:right;height:79px;width:162px;}.gmap_canvas {overflow:hidden;background:none!important;height:79px;width:162px;}</style></div>
                                            </div>  
                                            </div>
                                        </div>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="ad-product-details">
                                    <div class="ad-rate-share">
                                        <h2 class="ad-rate"></h2>
                                        <div class="share-ad">
                                           <div class="sharethis-inline-share-buttons"></div>
                                            
                                        </div>
                                    </div>
                                    <!-- <h4></h4> -->
                                    <div class="ad-id mb-2 mt-5">
                                        <h2>AD ID :<?=$ad->id;?></h2>
                                        <?php
                                        $id=$this->uri->segment(3);
                                        if($this->session->userdata('login_id')!='')
                                        {
                                         $u_id=$this->session->userdata('login_id');
                                        }else{
                                            if($this->session->userdata('ip_Add')=='')
                                            {
                                                $u_id=$this->input->ip_address();
                                                $this->session->set_userdata('ip_Add',$u_id);
                                            }
                                            else{
                                                $u_id=$this->session->userdata('ip_Add');
                                            }
                                            
                                        }
                                        
                                        $qry=$this->db->get_where('report_table',array('ad_id'=>$id,'user_id'=>$u_id))->num_rows();

                                        if($qry==0)
                                        {
                                        ?>
                                        <a href="" data-toggle="modal" data-target="#myModal" id="report_ads"><i class="fa fa-ban"></i> Report this ad</a>
                                        <?php }if($qry!=0){?>
                                        <a href="#"><i class="fa fa-ban"></i>Already Reported</a>
                                        <?php } ?>
                                    </div>
                                    <div class="ad-free-post">
                                        <!-- <h2>Couldn't find what you are looking for?</h2> -->
                                        <div class="ad-post">
                                        <?php if($this->session->userdata('login_id')==''){?>
                                        <a href="<?php echo base_url();?>authentication?loginfirst==1" class="post-btn"><?php } if($this->session->userdata('login_id')!=''){?><a href="<?php echo base_url();?>postad" class="post-btn"><?php } ?><i class="fa fa-plus-circle"></i>  Post A Free Ad</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php if($ad->email_address!=''){?>
                                        <div class="col-md-6 mt-3 text-center">
                                            <a href="" data-toggle="modal" data-target="#contactModal"><button  class="btn btn-primary w-100"><i class="fa fa-envelope-o"></i> Contact Advertiser</button></a>
                                        </div>
                                        <?php }if($ad->email_address!=''){ ?>
                                        <div class="col-md-6 mt-3 text-center">
                                        <?php } if($ad->email_address==''){?>
                                        <div class="col-md-12 mt-3 text-center">
                                        <?php } ?>
                                            <a href="https://api.whatsapp.com/send?phone=+<?=$ad->contact_number;?>"><button class="btn btn-success w-100"><i class="fa fa-whatsapp"></i> <?=$ad->contact_number;?></button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="related-ads">
                        <h6>Related ads</h6>
                        <div class="related-ad-posts">
                            <?php 
                            $this->db->select('id,ad_image,ad_title,ad_description,contact_number');
                            $this->db->order_by('id','RANDOM');
                            $this->db->limit(5);
                            $ad_qry=$this->db->get_where('ad_master',array('category_id'=>$ad->category_id,'status'=>'Active'))->result_array();
                            foreach ($ad_qry as $adqq) {
                            if ($adqq['id'] != $ad->id) {

                            ?>
                            <div class="card">
                                <div class="related-ad-img position-relative">
                                    <a class="" href="<?php echo base_url();?>ad/details/<?=$adqq['id']?>">
                                    
                                    <img class="card-img-top" src="<?=$adqq['ad_image'];?>" alt="Card image cap">
                                    
                                </a>
                                <h2 class="premiumfont">backpage</h2>
                                </div>
                                <div class="related-ad-info card-body">
                                    <a class="related-ad-title" href="<?php echo base_url();?>ad/details/<?=$adqq['id']?>"><?=utf8_decode($adqq['ad_title'])?></a>
                                    <!-- <h4 class="related-ad-price">$1.00</h4> -->
                                    <p class="related-ad-desc"><?=substr(strip_tags(utf8_decode($adqq['ad_description'])),0,120);?>.....</p>
                                    <a class="related-ad-contact" href="<?php echo base_url();?>ad/details/<?=$adqq['id']?>"><i class="fa fa-phone"></i><?=$adqq['contact_number']?></a>
                                </div>
                            </div>
                            <?php } }?>
                           
                            <?php 
                           $this->db->select('id,ad_image,ad_title,ad_description,contact_number');
                            $this->db->order_by('id','RANDOM');
                            $this->db->limit(10);
                            $ads_qry=$this->db->get_where('ad_master',array('category_id'=>$ad->category_id,'status'=>'Active'))->result_array();
                            foreach ($ads_qry as $ads) {
                            if ($ads['id'] != $ad->id) {

                            ?>
                            <div class="card hide">
                                <div class="related-ad-img position-relative">
                                    <a class="" href="<?php echo base_url();?>ad/details/<?=$ads['id']?>">
                                    
                                    <img class="card-img-top" src="<?=$ads['ad_image'];?>" alt="Card image cap">
                                   
                                </a>
                                <h2 class="premiumfont">backpage</h2>
                                </div>
                                <div class="related-ad-info card-body">
                                    <a class="related-ad-title" href="<?php echo base_url();?>ad/details/<?=$ads['id']?>"><?=utf8_decode($ads['ad_title'])?></a>
                                    <!-- <h4 class="related-ad-price">$1.00</h4> -->
                                    <p class="related-ad-desc"><?=substr(strip_tags(utf8_decode($ads['ad_description'])),0,120);?>.....</p>
                                    <a class="related-ad-contact" href="<?php echo base_url();?>ad/details/<?=$ads['id']?>"><i class="fa fa-phone"></i><?=$ads['contact_number']?></a>
                                </div>
                            </div>
                            <?php } }?>
                            <div class="all-related-ads">
                                <a class="load-more-btn">load more related ads</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 
   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="border-radius: 14px;">
        <div class="modal-header" style="background:#d93920;color: aliceblue;">
         <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Report This Ad</h4>
          <button type="button" class="close" data-dismiss="modal" style="color: white;">&times;</button>
        </div>
        <form action="<?php echo base_url();?>report/reportad/<?=$this->uri->segment(3);?>" method="post">
        <div class="modal-body">
         <div class="row">
            <div class="col-md-12">
                <textarea class="form-control" name="message" placeholder="Enter Your Message" rows="8" required></textarea>
            </div> 
            <div class="col-md-12 mt-2">
              <input type="text" name="name" class="form-control" placeholder="Enter Your Name" required style="height: 48px;">
            </div> 
            <div class="col-md-12 mt-2">
              <input type="email" name="email" class="form-control" placeholder="Enter Your Email Address" required style="height: 48px;">
            </div>
         </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" style="background: black;"><i class="fa fa-location-arrow"></i> Send</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  <!-- /////////////////// -->
  <div class="modal fade" id="contactModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="border-radius: 14px;">
        <div class="modal-header" style="background:#d93920;color: aliceblue;">
         <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Contact Advertiser</h4>
          <button type="button" class="close" data-dismiss="modal" style="color: white;">&times;</button>
        </div>
        <form action="<?php echo base_url();?>ad/contactadvertiser/<?=$this->uri->segment(3);?>" method="post">
        <div class="modal-body">
         <div class="row">
            <div class="col-md-12">
                <textarea class="form-control" name="message" placeholder="Enter Your Message" rows="8" required></textarea>
            </div> 
            
            <div class="col-md-12 mt-2">
              <input type="email" name="email" class="form-control" placeholder="Enter Your Email Address" required style="height: 48px;">
            </div>
         </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" style="background: black;"><i class="fa fa-location-arrow"></i> Send</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>

  <!-- ////////////////// -->

    <style type="text/css">
        @font-face {
    font-family: 'CooperStdBlack';
    src: url('/style/CooperStdBlack.ttf')  format('truetype');
    }
    .premiumfont {
    font-family: 'CooperStdBlack';
    color: #68bef4;
    font-size: 30px;
    opacity: 0.65;
    position: absolute;
    text-align: center;
    margin: 0;
    top: 50%;
    left: 50%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    }
    .ad-details .ad-product-details, .ad-details .ad-seller-details {
    height: 100% !important;
    }
       /* The container */
.container-checkbox {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 17px;
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
    .net-t
    {
    font-size: 21px;
    font-weight: 600;
    text-transform: uppercase;
    }
    </style>

