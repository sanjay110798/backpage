<link href="<?php echo base_url();?>fontassets/css/ad-your-post.css" rel="stylesheet ">
<!--  -->
<?php
if($this->session->userdata('login_id')=='')
{
  redirect('authentication?loginerr==0');
}

 $u_id=$this->session->userdata('login_id');

 // $this->db->select('city_name');
 $user=$this->db->get_where('user_master',array('id'=>$u_id))->row();

// $this->db->select('id,category_id,subcat_id,sub_child_id,ad_title,ad_description,ad_image,ad_video,city,location,zip_code,web_link,contact_number,email_address');
$ad=$this->db->get_where('ad_master',array('id'=>$this->session->userdata('ad_id')))->row();

?>
<section class="ad-post-banner ">
        <div class="container ">
            <div class="banner-content ">
                <div class="row "></div>
            </div>
        </div>
    </section>

    <section class="post-content" style="padding: 0px 0;">
        <div class="container">
            <!-- <div class="row">
                <h6 class="category-title">your category</h6>
                <div class="post-category">
					<?php 
					$category_qry=$this->db->get('category_master')->result_array();
					foreach ($category_qry as $cat) {
					?>
                    <div class="category-box">
                        <a href="#">
						<img class="black-icon" src="<?=$cat['category_icon']?>">
						<img class="white-icon" src="<?=$cat['category_icon']?>">
						<p><?=$cat['category_name'];?></p>
                        </a>
                    </div>
                   <?php } ?>
                </div>
            </div> -->
            <div class="row">
                <div class="post-free-ad">
                    <div class="row">
                        <div class="col-12">
                           <div class="notice"><i class="fa fa-bullhorn fa-1x"></i> Notice</div><marquee><h6 class="ad-post-title" style="font-size: 15px;color: #d93920;">Warning we will delete any advertisement we believe is a scam or fraudulent</h6></marquee>  
                        </div>
                    </div>
                   
                    <h6 class="ad-post-title">Edit Your Ad</h6>
                    <div class="post-ad-form">
                        <form name="form" method="post" action="<?php echo base_url();?>postad/edit/<?=$ad->id?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col">
                                    <label for="exampleFormControlSelect1">Category</label>
                                      <select name="category_id" id="category_id" class="form-control mdb-select" required>
                                        <option>Select Category</option>
                                      <?php 
                                       $this->db->select('category_name,id');
                                       $category_qry=$this->db->get('category_master')->result_array();
                                       foreach ($category_qry as $category) 
                                       {
                                       ?>
                                        <option value="<?=$category['id']?>"<?if($category['id']==$ad->category_id){echo"selected";}?>><?=$category['category_name']?></option>
                                      <?php } ?>
                                      </select>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlSelect2">Sub Category</label>
                                    <select id="subcategory_id" name="subcategory_id" class="form-control mdb-select" required>
                                        <option>Select Sub Category</option>
                                        <?php 
                                        $this->db->select('subcategory_name,id');
                                        $sub_qry=$this->db->get_where('subcategory_master',array('category_id'=>$ad->category_id))->result_array();
                                        foreach($sub_qry as $val)
                                        {
                                        ?>
                                        <option value="<?=$val['id'];?>"<?php if($val['id']==$ad->subcat_id){echo"selected";}?>><?=$val['subcategory_name'];?></option>
                                        <?php } ?>
                                      </select>
                                </div>
                                 
                            </div>
                             <div class="row">
                                <div class="col" id="sub_sub_category">
                                <?php
                                
                                $child_qry=$this->db->get_where('child_sub_master',array('id'=>$ad->sub_child_id));
                                $cnt=$child_qry->num_rows();
                                if($cnt!=0)
                                {
                                ?>   
                                 <label for="exampleFormControlSelect2">Child Category</label>
                                    <select name="subchildcategory_id" id="subchildcategory_id" class="form-control mdb-select">
                                    <option>Select Child Category</option>
                                    <?php 
                                    $this->db->select('child_sub_name,id');
                                    $child_qry=$this->db->get_where('child_sub_master',array('subcategory_id'=>$ad->subcat_id))->result_array();
                                    foreach($child_qry as $val)
                                    {
                                     ?>
                                    
                                    <option value="<?=$val['id']?>"<?php if($ad->sub_child_id==$val['id']){echo"selected";};?>><?=$val['child_sub_name'];?>
                                    </option>
                                  <?php } ?>
                                 </select> 
                                <?php } ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="ad_title" value="<?=$ad->ad_title?>" placeholder="Enter Your Ads Title(around 120 character).." maxlength="120"required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Description</label>
                                    <textarea name="description" id="description" rows="10" cols="80" required><?=$ad->ad_description?></textarea>
                                    <script>
                                        CKEDITOR.replace('description');
                                    </script>
                                </div>
                            </div>
                           
                            <div class="row image-upload">
                                <div class="col">
                                    <label for="exampleFormControlFile1">Upload Main Image</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="ad_image">
                                    <i class="fa fa-camera"></i>
                                </div>
                           
                            </div>
                            <div class="row">
                                <div class="col-4">
                                <div class="input-wrapper">
                                      <?php if($ad->pic_url==1){?>
                                        <img src="<?=$ad->ad_image;?>" alt="Ads Main Image" style="width: 120px;margin-top: 10px;">
                                      <?php }if($ad->pic_url==2){?>
                                        <img src="<?=$ad->ad_image;?>" alt="Ads Main Image" style="width: 120px;margin-top: 10px;">
                                      <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row image-upload">
                                <div class="col">
                                    <label for="exampleFormControlFile2">Upload Other Images</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile2" name="gallery_image[]" multiple >
                                    <i class="fa fa-camera"></i>
                                    <span class="select-multiple-image">[Press ctrl and select multiple images..]</span>
                                </div>
                            </div>
                            <div class="row no-gutters">
                                   
                                       <?php 
                                       $this->db->select('pic_url,id,ad_details_image');
                                        $img_qry=$this->db->get_where('details_image_master',array('ad_id'=>$ad->id))->result_array();
                                        foreach ($img_qry as $img) 
                                        {
                                        ?>
                                        <div class="col-2">
                                        <div class="input-wrapper position-relative">
                                          <?php if($img['pic_url']==1){?>
                                            
                                            <img src="<?=$img['ad_details_image'];?>" class="position-relative" alt="Ads Main Image" style="width: 120px;height:120px;border:1px solid;">
                                            <a href="<?php echo base_url('postad/deleteimage/'.$ad->id.'/'.$img['id']);?>" class="st"><i class="fa fa-times"></i></a>
                                            <?php }if($img['pic_url']==2){?>
                                              
                                              <img src="<?=$img['ad_details_image'];?>" class="position-relative" alt="Ads Main Image" style="width: 120px;height:120px;border:1px solid;">
                                               <a href="<?php echo base_url('postad/deleteimage/'.$ad->id.'/'.$img['id']);?>" class="st"><i class="fa fa-times"></i></a>
                                        <?php } ?>
                                        </div>
                                        </div>
                                      <?php } ?>
                                    
                                </div>
                            <div class="row image-upload">
                                <div class="col">
                                    <label for="exampleFormControlFile2">Upload Video (Optional)</label>
                                    <input type="file" class="form-control-file" id="img" name="video" accept="video/*">
                                    <i class="fa fa-video-camera"></i>
                                    
                                </div>
                            </div>
                            <?php if($ad->ad_video!=''){?>
                            <div class="row">
                                <div class="col-4">
                                <div class="input-wrapper">
                                    <video width="120" height="20" controls>
                                    <source src="<?php echo base_url();?>video/<?=$ad->ad_video;?>" type="video/mp4">
                                    </video>
                                                                         
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- ///Start Additional -->
                
                
                <!-- ////End -->
                 <div class="ad-post-details">
                    <h6 class="post-details-title">Add Your Details</h6>
                    <div class="post-details-form">
                       
                            <div class="row">
                                
                                 <div class="col-md-6">
                                    <label>Country</label>
                                      <input type="text" id="country" list="listCountry"  name="country" placeholder="Enter Country" class="form-control" required />
                                              <datalist id="listCountry">
                                                <?php 
                                                $this->db->select('country_name');
                                                $CountryList=$this->db->get_where('countries_new')->result();
                                                foreach($CountryList as $val)
                                                {
                                                ?>
                                                  <option value="<?=$val->country_name;?>"></option>
                                                <?php 
                                                }
                                                ?>
                                              </datalist>
                                 
                                </div>
                                 <div class="col-md-6">
                                    <label>State</label>
                                      <input type="text" list="state"  name="state" placeholder="Enter" class="form-control" required />
                                              <datalist id="state">
                                               
                                              </datalist>
                                 
                                </div>
                                <div class="col-md-6">
                                    <label>City</label>
                                    <div class="city">
                                        <input type="text" name="city" list="city_list" class="form-control" placeholder="Select City" value="<?=$ad->city?>" required>
                                        <datalist id="city_list">
                                            <option>Select</option>
                                              <?php

                                              $this->db->select('id');
                                              $country_qry=$this->db->get_where('countries_new',array('country_name'=>$user->country))->row();

                                              $this->db->select('city_name');
                                              $city_qry=$this->db->get_where('cities',array('country_id'=>$country_qry->id))->result_array();
                                              foreach ($city_qry as $city) {
                                               
                                              ?>
                                                <option value="<?=$city['city_name']?>"><?=$city['city_name'];?></option>
                                             
                                              <?php } ?>
                                        </datalist>
                                    </div>
                                </div>
                                <div class="col-md-6 location">
                                    <label>Location</label>
                                     <input type="text" name="location" id="location2" class="form-control" required value="<?=$ad->location;?>" placeholder="Enter Your Location..">
                                 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Zip Code</label>
                                    <input type="text" name="zip_code" value="<?=$ad->zip_code?>" class="form-control" placeholder="Zip">
                                </div>
                                <div class="col">
                                    <label>Website</label>
                                    <input type="text" name="website" value="<?=$ad->web_link?>" class="form-control" placeholder="Enter Website link">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Phone number</label>
                                    <input type="tel" name="phone_number" value="<?=$ad->contact_number?>" class="form-control" placeholder="Enter Phone Number" required>
                                </div>
                                <div class="col">
                                    <label>Email address</label>
                                    <input type="email" name="email" value="<?=$ad->email_address?>" class="form-control" placeholder="Enter Email Address.." style="text-transform: none;">
                                </div>
                            </div>
                            <div class="row form-btn">
                                <div class="col">
                                    <button class="btn post-back-btn" type="button" onClick="history.go(-1);">Back</button>
                                    <button type="submit" class="btn post-add-btn">Edit Your Add</button>
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
    background: #5c81bb !important;
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
.st
{
    position: absolute;
    top: 0px;
    left: 99px;
    font-size: 19px;
    color: red!important;
    background: darkgrey;
    padding: 0px 4px 2px 2px;
}
</style>