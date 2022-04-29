<link href="<?php echo base_url();?>fontassets/css/ad-your-post.css" rel="stylesheet ">
<!--  -->
<?php
if($this->session->userdata('login_id')=='')
{
  redirect('authentication?loginerr==0');
}

 $u_id=$this->session->userdata('login_id');
 $user=$this->db->get_where('user_master',array('id'=>$u_id))->row();


?>
<div class="modal modall fade" id="PostadopenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="
    border-radius: 43px;overflow: hidden;
    background: url(https://scorts.com.au/assets/images/bg-spllll.jpg);
    background-size: cover;
    background-position: left;
    background-repeat: no-repeat;">
    <div class="modal-body modalContent">
      <div class="row w-100">
        <div class="col-md-12 text-center">
         <img src="https://backpageclassifieds.com/fontassets/img/logo.png" alt="space rocket" width="150">
       </div>
       <div class="col-md-12 text-center">
         <div class="modalInfo mt-2">

          <p style="color: #efefef;font-family: 'Tangerine', serif;">For all adult and escorts please put in the personals categories! .This needs to be near categories selection</p>

        </div>
      </div>
    </div>
    <div class="row w-100 mb-2">
      <div class="col-md-12 text-center"><button type="button" class="btn btn-sm pr-2" data-dismiss="modal" aria-label="Close" style="color: aliceblue;
      background: #007bff;">
      Continue
    </button></div>

  </div>
</div>

</div>
</div>
</div>
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
                   
                    <h6 class="ad-post-title">Post Free Ads</h6>
                    <div class="post-ad-form">
                        <form name="form" method="post" action="<?php echo base_url();?>postad/add" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col">
                                    <label for="exampleFormControlSelect1">Category</label>
                                      <select name="category_id" id="category_id" class="form-control mdb-select" required>
                                        <option>Select Category</option>
                                      <?php
                                       $this->db->select('id,category_name'); 
                                       $category_qry=$this->db->get('category_master')->result_array();
                                       foreach ($category_qry as $category) 
                                       {
                                       ?>
                                        <option value="<?=$category['id']?>"><?=$category['category_name']?></option>
                                      <?php } ?>
                                      </select>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlSelect2">Sub Category</label>
                                    <select id="subcategory_id" name="subcategory_id" class="form-control mdb-select" required>
                                        <option>Select Sub Category</option>
                                      </select>
                                </div>

                            </div>
                             <div class="row">
                                <div class="col" id="sub_sub_category">
                                  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="ad_title" placeholder="Enter Your Ads Title(around 120 character).." maxlength="120"required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Description</label>
                                    <textarea name="description" id="description" rows="10" cols="80" required></textarea>
                                    <script>
                                        CKEDITOR.replace('description');
                                    </script>
                                </div>
                            </div>
                            <div class="row image-upload">
                                <div class="col">
                                    <label for="exampleFormControlFile1">Upload Main Image</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="ad_image" size="40" required>
                                    <i class="fa fa-camera"></i>
                                </div>
                            </div>
                            <div class="row image-upload">
                                <div class="col">
                                    <label for="exampleFormControlFile2">Upload Other Images</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile2" name="gallery_image[]" multiple required>
                                    <i class="fa fa-camera"></i>
                                    <span class="select-multiple-image">[Press ctrl and select multiple images..]</span>
                                </div>
                            </div>
                            <div class="row image-upload">
                                <div class="col">
                                    <label for="exampleFormControlFile2">Upload Video (Optional)</label>
                                    <input type="file" class="form-control-file" id="img" name="video" accept="video/*">
                                    <i class="fa fa-video-camera"></i>
                                    
                                </div>
                            </div>
                    </div>
                </div>
            
               
             
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
                                        <input type="text" list="city_list" name="city" class="form-control" placeholder="Select City" required>
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
                                     <input type="text" name="location" id="location2" class="form-control" required placeholder="Enter Your Location..">
                                     <div id="showlooc"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Zip Code</label>
                                    <input type="text" name="zip_code" class="form-control" placeholder="Zip">
                                </div>
                                <div class="col">
                                    <label>Website</label>
                                    <input type="text" name="website" class="form-control" placeholder="Enter Website link">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Phone number</label>
                                    <input type="tel" name="phone_number" class="form-control" placeholder="Enter Phone Number" required>
                                </div>
                                <div class="col">
                                    <label>Email address</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Email Address.." style="text-transform: none;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="g-recaptcha" data-sitekey="6LcQFhgeAAAAADte3REJ1b06uNOyE8YmoyM7hap0"></div>  
                                </div>
                            </div>
                            <div class="row form-btn">
                                <div class="col">
                                    <button class="btn post-back-btn" type="button" onClick="history.go(-1);">Back</button>
                                    <button type="submit" class="btn post-add-btn">Post Your Add</button>
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
</style>
