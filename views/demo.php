<link href="<?php echo base_url();?>fontassets/css/category.css" rel="stylesheet">
<link href="<?php echo base_url();?>fontassets/slick/slick/slick-theme.css" rel="stylesheet">
<link href="<?php echo base_url();?>fontassets/slick/slick/slick.css" rel="stylesheet">
<link href="<?php echo base_url();?>fontassets/css/home.css" rel="stylesheet">
<link href="<?php echo base_url();?>style/custom.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<?php 
$name=strtoupper(str_replace("_",' ',$this->uri->segment(3)));
$banner=$this->db->get_where('banner',array('id'=>1))->row();
?>

<section class="category-banner" style="background-image: url(<?=$banner->image?>)!important;">
        <div class="container">
            <div class="banner-content">
                <div class="row">
                    <div class="serch-form">
                        <form action="<?php echo base_url();?>ad/search" method="get">
                            <div class="form-row">
                                <div class="col">
                                    <div class="serchable">
                                        <input type="text" name="category" class="search-categorie" placeholder="search item" list="category_list" value="<?=$this->input->post('category');?>">
                                        <datalist id="category_list">
                                        <?php 
                                        $category_qry=$this->db->get('category_master')->result_array();
                                        foreach ($category_qry as $cat) {

                                        ?>
                                        <option value="<?=$cat['category_name']?>"><?=$cat['category_name']?></option>
                                        <?php } ?>
                                        <?php 
                                        $ser_qry=$this->db->get_where('subcategory_master')->result_array();
                                        foreach ($ser_qry as $val) {

                                        ?>
                                        <option value="<?=$val['subcategory_name']?>"><?=$val['subcategory_name']?></option>
                                        <?php } ?>
                                        <?php 
                                        $ser_qry=$this->db->get_where('child_sub_master')->result_array();
                                        foreach ($ser_qry as $val) {

                                        ?>
                                        <option value="<?=$val['child_sub_name']?>"><?=$val['child_sub_name']?></option>
                                        <?php } ?>     
                                        </datalist>
                                    </div>
                                    <div id="locationField" class="location">
                                        <input type="text" class="location-field" id="autocomplete" placeholder="Enter your Location" name="location" onFocus="geolocate()" value="<?=$this->input->post('location')?>">
                                        <input type="hidden" class="lat-field" name="Latitude11" id="lat"/>
                                        <input type="hidden" class="lan-field" name="Longitude11" id="lng"/>
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
                    <div class="anchor-tags">
                        <div class="container">
                            <div class="row">
                                <span>or try :</span>
                                 <?php 
                                 $ctt=$this->db->get_where('category_master',array('category_name'=>$name))->row();
                                $this->db->order_by('id','RANDOM');
                                $sub_qry=$this->db->get_where('subcategory_master',array('category_id'=>$ctt->id),5)->result_array();
                                foreach ($sub_qry as $sub) 
                                {                     
                                ?>
                                <a href="<?php echo base_url();?>ad/subcategory/<?=$sub['id']?>"><?=$sub['subcategory_name']?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


        <!--    refine-category-start-->
    <section class="refine-catergory-wrap py-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <img class="pre-btn-img" src="images/Untitled-1.png">
                        <span class="pre-btn-span">Looking for more <b>Specific Results ?</b></span>
                        <button type="submit" class="btn primary-btn default-btn toggle">Visit Categories</button>
                    </div>
                    <div class="sidebar-wrap">
                        <div class="text-right slide-close-div">
                            <a href="#0" id="close-btn"><i class="fa fa-times" aria-hidden="true"></i></a>
                        </div>
                        <div class="sidebar-under">
                            <div class="sidebar-heading">
                                <h4 class="mb-0">Refine Category</h4>
                            </div>
                            <div class="sidebar-list-wrap">
                                <ul class="sidebar-list">
                                    <li><a href="#" class="sidebar-anchor">All Categories</a></li>
                                    <li><a href="#" class="sidebar-anchor">Adult Jobs</a></li>

                                    <li><a href="#" class="sidebar-anchor">Dating, Romance, Long Term Relationship (LTR)</a>
                                        <ul class="sidebar-under-list">
                                            <li><a href="#0">I am a man seeking a man</a></li>
                                            <li><a href="#0">I am a man seeking a woman</a></li>
                                            <li><a href="#0">I am a woman seeking a man</a></li>
                                            <li><a href="#0">I am a woman seeking a woman</a></li>
                                            <li><a href="#0">Trans-sexual</a></li>
                                        </ul>
                                    </li>


                                    <li><a href="#" class="sidebar-anchor">Erotic Services (Escort, Body Rubs )</a>
                                        <ul class="sidebar-under-list">
                                            <li><a href="#0">Adult Jobs</a></li>
                                            <li><a href="#0">Bars &amp; Clubs</a></li>
                                            <li><a href="#0">BDSM &amp; Fetish</a></li>
                                            <li><a href="#0">Body Rubs</a></li>
                                            <li><a href="#0">Dom &amp; Fetish</a></li>
                                            <li><a href="#0">Erotic Photography</a></li>
                                            <li><a href="#0">Escorts</a></li>
                                            <li><a href="#0">Male Escorts</a></li>
                                            <li><a href="#0">Other Personal Services</a></li>
                                            <li><a href="#0">Phone &amp; Cam</a></li>
                                            <li><a href="#0">Strippers</a></li>
                                            <li><a href="#0">Transsexual Escorts</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="#" class="sidebar-anchor">Matrimonial (Marriage, Brides, Grooms)</a>
                                        <ul class="sidebar-under-list">
                                            <li><a href="#0">Matrimonial Services </a></li>
                                            <li><a href="#0">Seeking Bride</a></li>
                                            <li><a href="#0">Seeking Groom</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="#" class="sidebar-anchor">Adult Toys and Products</a></li>
                                    <li><a href="#" class="sidebar-anchor">Website and Phone</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <!--    refine-category-end-->

        <!--    carousel-section-start-->
    <section class="carousel-section my-5">
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div id="owl-carousel" class="owl-carousel owl-theme">
                            <div class="item">
                                <div class="caraousel-box">
                                    <a href="#0">
                                        <div class="carousel-img" href="#0">
                                            <img src="https://crackerclassifieds.com/upload/1616049633_251.jpg" class="adimage">
                                            <!--                                            <h6 class="top-ad-text">Top Ad</h6>-->
                                            <h6 class="available-now-text">AVAILABLE NOW - 15 HOURS AGO</h6>
                                        </div>
                                        <div class="carousel-text">
                                            <div class="row mx-0">
                                                <div class="col-sm-6 pr-md-0 pr-3 text-md-left text-center">
                                                    <span class="location-pin"><i class="fa fa-map-marker"></i>Singapore</span>
                                                </div>
                                                <div class="col-sm-6 pl-md-0 pl-3 text-md-right text-center">
                                                    <span class="category-span">SERVICES</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="item">
                                <div class="caraousel-box">
                                    <a href="#0">
                                        <div class="carousel-img" href="#0">
                                            <img src="https://crackerclassifieds.com/upload/1616049633_251.jpg" class="adimage">
                                            <h6 class="available-now-text">AVAILABLE NOW - 15 HOURS AGO</h6>
                                        </div>
                                        <div class="carousel-text">
                                            <div class="row mx-0">
                                                <div class="col-sm-6 pr-md-0 pr-3 text-md-left text-center">
                                                    <span class="location-pin"><i class="fa fa-map-marker"></i>Singapore</span>
                                                </div>
                                                <div class="col-sm-6 pl-md-0 pl-3 text-md-right text-center">
                                                    <span class="category-span">SERVICES</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="item">
                                <div class="caraousel-box">
                                    <a href="#0">
                                        <div class="carousel-img" href="#0">
                                            <img src="https://crackerclassifieds.com/upload/1616049633_251.jpg" class="adimage">
                                            <h6 class="top-ad-text">Top Ad</h6>
                                        </div>
                                        <div class="carousel-text">
                                            <div class="row mx-0">
                                                <div class="col-sm-6 pr-md-0 pr-3 text-md-left text-center">
                                                    <span class="location-pin"><i class="fa fa-map-marker"></i>Singapore</span>
                                                </div>
                                                <div class="col-sm-6 pl-md-0 pl-3 text-md-right text-center">
                                                    <span class="category-span">SERVICES</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="item">
                                <div class="caraousel-box">
                                    <a href="#0">
                                        <div class="carousel-img" href="#0">
                                            <img src="https://crackerclassifieds.com/upload/1616049633_251.jpg" class="adimage">
                                            <h6 class="featured-text">Featured</h6>
                                        </div>
                                        <div class="carousel-text">
                                            <div class="row mx-0">
                                                <div class="col-sm-6 pr-md-0 pr-3 text-md-left text-center">
                                                    <span class="location-pin"><i class="fa fa-map-marker"></i>Singapore</span>
                                                </div>
                                                <div class="col-sm-6 pl-md-0 pl-3 text-md-right text-center">
                                                    <span class="category-span">SERVICES</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="item">
                                <div class="caraousel-box">
                                    <a href="#0">
                                        <div class="carousel-img" href="#0">
                                            <img src="https://crackerclassifieds.com/upload/1616049633_251.jpg" class="adimage">
                                            <h6 class="featured-text">Featured</h6>
                                        </div>
                                        <div class="carousel-text">
                                            <div class="row mx-0">
                                                <div class="col-sm-6 pr-md-0 pr-3 text-md-left text-center">
                                                    <span class="location-pin"><i class="fa fa-map-marker"></i>Singapore</span>
                                                </div>
                                                <div class="col-sm-6 pl-md-0 pl-3 text-md-right text-center">
                                                    <span class="category-span">SERVICES</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </section>
    <!--    carousel-section-end-->

       <!-- Ad Section -->
    <section class="select-location-sec2 spl-padding-section px-sm-0 px-3 mx-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 col-sm-12">
                    <div class="base2"><a href="https://escortsandbodyrubs.com/" target="_blank">

                            <div>
                                <img src="https://crackerclassifieds.com/style/1614501149_1596025982_Camilla 2.jpg" class="long" alt="run">
                                <img src="https://escortsandbodyrubs.com/images/ic.ico" class="title" alt="nfs-payback">
                                <img src="https://escortsandbodyrubs.com/images/logo1.png" class="ea" alt="ea" style="width: 200px;height: 40px; top: 26px;">
                                <!-- <img src="https://psmedia.playstation.com/is/image/psmedia/psn-icon-new-to-ps4-product-grid-02-eu-14jun18?$Icon$" class="ps" alt="ps4">
                            <img src="http://www.iconarchive.com/download/i98465/dakirby309/simply-styled/Xbox.ico" class="x" alt="xbox-one"> -->
                                <div class="spin2">
                                    <div class="spinner"></div>
                                </div>
                                <div class="slid1"></div>
                                <div class="butd">
                                    <button class="but">Visit Now</button>
                                </div>
                                <div class="butd2 d-sm-none d-inline-block">
                                    <button class="but2">Advertise now for Free !</button>
                                </div>
                                <div class="h2">
                                    <h class="h1">Advertise now for Free !</h>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="category-content box-border">
        <div class="container">
            <div class="row">
                <div class="col-md-4 d-none">
                    <div class="category-filter-list">
                        <div class="refine-category">
                            <h2>Refine Category</h2>
                            <ul>
                                <a href="https://backpageclassifieds.com/ad/allcategory">
                                    <li>All categories</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/subcategory/128">
                                    <li>Website and Phone</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/subcategory/152">
                                    <li>Adult jobs </li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/subcategory/32">
                                    <li>Sex with No Strings Attached (NSA)</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/childcategory/88">
                                    <li><span>I am a man looking for a man</span></li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/childcategory/87">
                                    <li><span>I am a man looking for a woman</span></li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/childcategory/89">
                                    <li><span>I am a transsexual looking for a man</span></li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/childcategory/85">
                                    <li><span>I am a woman looking for a man</span></li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/childcategory/86">
                                    <li><span>I am a woman looking for a woman</span></li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/childcategory/90">
                                    <li><span>I am looking for fetish encounters</span></li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/childcategory/91">
                                    <li><span>I am looking for fetish encounters</span></li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/childcategory/92">
                                    <li><span>Virtual Adventures</span></li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/childcategory/94">
                                    <li><span>We are a couple looking for a man</span></li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/childcategory/93">
                                    <li><span>We are a couple looking for a woman</span></li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/childcategory/95">
                                    <li><span>We are a couple looking for another couple</span></li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/subcategory/31">
                                    <li>Erotic Services (Escort, Body Rubs )</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/childcategory/411">
                                    <li><span>Adult Jobs</span></li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/childcategory/102">
                                    <li><span>Bars & Clubs</span></li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/childcategory/99">
                                    <li><span>BDSM & Fetish</span></li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/childcategory/380">
                                    <li><span>Body Rubs</span></li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/childcategory/410">
                                    <li><span>Dom & Fetish</span></li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/childcategory/103">
                                    <li><span>Erotic Photography</span></li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/childcategory/96">
                                    <li><span>Escorts</span></li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/childcategory/97">
                                    <li><span>Male Escorts</span></li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/childcategory/106">
                                    <li><span>Other Personals Services</span></li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/childcategory/105">
                                    <li><span>Phone & Cam</span></li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/childcategory/101">
                                    <li><span>Strippers</span></li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/childcategory/98">
                                    <li><span>Transsexual Escorts</span></li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/subcategory/138">
                                    <li>Adult Toys and Products</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/subcategory/30">
                                    <li>Dating, Romance, Long Term Relationship (LTR)</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/childcategory/83">
                                    <li><span>I am a man seeking a man</span></li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/childcategory/81">
                                    <li><span>I am a man seeking a woman</span></li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/childcategory/80">
                                    <li><span>I am a woman seeking a man</span></li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/childcategory/84">
                                    <li><span>I am a woman seeking a woman</span></li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/childcategory/406">
                                    <li><span>Trans-sexual</span></li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/subcategory/29">
                                    <li>Matrimonial (Marriage, Brides, Grooms)</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/childcategory/77">
                                    <li><span>Matrimonial Services </span></li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/childcategory/78">
                                    <li><span>Seeking Bride</span></li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/childcategory/79">
                                    <li><span>Seeking Groom</span></li>
                                </a>

                            </ul>
                        </div>
                        <!--
                        <div class="choose-location">
                            <h2>Choose Location</h2>
                            <ul>
                                <a href="https://backpageclassifieds.com/ad/state/Oslomej">
                                    <li>Oslomej</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/state/Al_Qalyubiyah">
                                    <li>Al Qalyubiyah</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/state/Bulawayo">
                                    <li>Bulawayo</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/state/Newry_and_Mourne">
                                    <li>Newry and Mourne</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/state/Swindon">
                                    <li>Swindon</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/state/Oran">
                                    <li>Oran</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/state/Federal_Capital_Territory">
                                    <li>Federal Capital Territory</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/state/Lop_Buri">
                                    <li>Lop Buri</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/state/Cavan">
                                    <li>Cavan</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/state/Yamal-Nenets">
                                    <li>Yamal-Nenets</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/state/Kalimantan_Barat">
                                    <li>Kalimantan Barat</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/state/As_Suwayda'">
                                    <li>As Suwayda'</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/state/Guelma">
                                    <li>Guelma</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/state/Alta_Verapaz">
                                    <li>Alta Verapaz</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/state/Alibori">
                                    <li>Alibori</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/state/Gornja_Radgona">
                                    <li>Gornja Radgona</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/state/Banjul">
                                    <li>Banjul</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/state/Marawi">
                                    <li>Marawi</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/state/Haa_Alifu">
                                    <li>Haa Alifu</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/state/Noord-Brabant">
                                    <li>Noord-Brabant</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/state/Tatarstan">
                                    <li>Tatarstan</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/state/P'yongan-bukto">
                                    <li>P'yongan-bukto</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/state/Leningrad">
                                    <li>Leningrad</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/state/Nakhon_Phanom">
                                    <li>Nakhon Phanom</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/state/Colombo">
                                    <li>Colombo</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/state/Sagarmatha">
                                    <li>Sagarmatha</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/state/Thyolo">
                                    <li>Thyolo</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/state/Ma">
                                    <li>Ma</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/state/Zardab">
                                    <li>Zardab</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/state/Al_Mafraq">
                                    <li>Al Mafraq</li>
                                </a>
                            </ul>
                        </div>
-->
                        <!--
                        <div class="most-popular">
                            <h2>Most Popular</h2>
                            <ul>
                                <a href="https://backpageclassifieds.com/ad/country/Madagascar">
                                    <li><i class="fa fa-star"></i>Madagascar</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/country/Armenia">
                                    <li><i class="fa fa-star"></i>Armenia</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/country/Rwanda">
                                    <li><i class="fa fa-star"></i>Rwanda</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/country/Western_Sahara">
                                    <li><i class="fa fa-star"></i>Western Sahara</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/country/Martinique">
                                    <li><i class="fa fa-star"></i>Martinique</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/country/Panama">
                                    <li><i class="fa fa-star"></i>Panama</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/country/Sao_Tome_and_Principe">
                                    <li><i class="fa fa-star"></i>Sao Tome and Principe</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/country/Bermuda">
                                    <li><i class="fa fa-star"></i>Bermuda</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/country/Anguilla">
                                    <li><i class="fa fa-star"></i>Anguilla</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/country/Togo">
                                    <li><i class="fa fa-star"></i>Togo</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/country/Mauritania">
                                    <li><i class="fa fa-star"></i>Mauritania</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/country/Korea,_Republic_of">
                                    <li><i class="fa fa-star"></i>Korea, Republic of</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/country/Gabon">
                                    <li><i class="fa fa-star"></i>Gabon</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/country/Tunisia">
                                    <li><i class="fa fa-star"></i>Tunisia</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/country/Cote_d'Ivoire">
                                    <li><i class="fa fa-star"></i>Cote d'Ivoire</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/country/Yemen">
                                    <li><i class="fa fa-star"></i>Yemen</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/country/Netherlands_Antilles">
                                    <li><i class="fa fa-star"></i>Netherlands Antilles</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/country/Zimbabwe">
                                    <li><i class="fa fa-star"></i>Zimbabwe</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/country/Macao">
                                    <li><i class="fa fa-star"></i>Macao</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/country/New_Caledonia">
                                    <li><i class="fa fa-star"></i>New Caledonia</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/country/Italy">
                                    <li><i class="fa fa-star"></i>Italy</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/country/Lebanon">
                                    <li><i class="fa fa-star"></i>Lebanon</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/country/Faroe_Islands">
                                    <li><i class="fa fa-star"></i>Faroe Islands</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/country/Sierra_Leone">
                                    <li><i class="fa fa-star"></i>Sierra Leone</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/country/Cuba">
                                    <li><i class="fa fa-star"></i>Cuba</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/country/Turks_and_Caicos_Islands">
                                    <li><i class="fa fa-star"></i>Turks and Caicos Islands</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/country/Timor-Leste">
                                    <li><i class="fa fa-star"></i>Timor-Leste</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/country/Taiwan">
                                    <li><i class="fa fa-star"></i>Taiwan</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/country/United_Arab_Emirates">
                                    <li><i class="fa fa-star"></i>United Arab Emirates</li>
                                </a>
                                <a href="https://backpageclassifieds.com/ad/country/Nigeria">
                                    <li><i class="fa fa-star"></i>Nigeria</li>
                                </a>
                            </ul>
                        </div>
-->
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="category-item">
                        <div class="premium-option">
                            <!-- <div class="spl-slider-12" id="spl-slider-12"> -->
                            <div class="row">

                                <!--
                                <div class="col-md-4 col-sm-6 mb-5">
                                    <div class="premium-box">
                                        <div class="card text-white">

                                            <img src="https://backpageclassifieds.com/upload/1617004750_images (5).jpeg" class="card-img">

                                            <label class="premium-label">PREMIUM</label>
                                            <div class="card-img-overlay box-overlay">
                                                <div class="row box-content">
                                                    <div class="box-info">
                                                        <p class="date mb-0">2021-03-29</p>
                                                        <p class="place mb-0">Malaysia</p>
                                                    </div>
                                                    <div class="box-btn">
                                                        <a href="https://backpageclassifieds.com/ad/details/26653?pagefirst==0" class="view-btn">View</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
-->
                                <div class="col-md-12">
                                    <h2 class="ads-heading">Premium Ads</h2>
                                </div>
                                <!-- </div> -->
                                <div class="col-lg-4 col-sm-6 my-3">
                                    <div class="property-blog-card card" style="">
                                        <div class="card-img-top">
                                            <img src="https://crackerclassifieds.com/upload/1617622220_153-1.jpg" class="" alt="...">
                                            <span class="premium-tag">PREMIUM</span>
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col-7 pr-md-3 pr-sm-1">
                                                    <span class="blog-bottom-1"><i class="fa fa-calendar" aria-hidden="true"></i> April 15, 2020</span>
                                                    <span class="blog-bottom-2"><i class="fa fa-map-marker" aria-hidden="true"></i> Malaysia</span>
                                                </div>
                                                <div class="col-5 pl-md-3 pl-sm-1 text-md-right text-sm-left text-right my-auto">
                                                    <button type="submit" class="btn btn-primary default-btn">View</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- </div> -->
                                <div class="col-lg-4 col-sm-6 my-3">
                                    <div class="property-blog-card card" style="">
                                        <div class="card-img-top">
                                            <img src="https://crackerclassifieds.com/upload/1617622220_153-1.jpg" class="" alt="...">
                                            <span class="premium-tag">PREMIUM</span>
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col-7 pr-md-3 pr-sm-1">
                                                    <span class="blog-bottom-1"><i class="fa fa-calendar" aria-hidden="true"></i> April 15, 2020</span>
                                                    <span class="blog-bottom-2"><i class="fa fa-map-marker" aria-hidden="true"></i> Malaysia</span>
                                                </div>
                                                <div class="col-5 pl-md-3 pl-sm-1 text-md-right text-sm-left text-right my-auto">
                                                    <button type="submit" class="btn btn-primary default-btn">View</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- </div> -->
                                <div class="col-lg-4 col-sm-6 my-3">
                                    <div class="property-blog-card card" style="">
                                        <div class="card-img-top">
                                            <img src="https://crackerclassifieds.com/upload/1617622220_153-1.jpg" class="" alt="...">
                                            <span class="premium-tag">PREMIUM</span>
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col-7 pr-md-3 pr-sm-1">
                                                    <span class="blog-bottom-1"><i class="fa fa-calendar" aria-hidden="true"></i> April 15, 2020</span>
                                                    <span class="blog-bottom-2"><i class="fa fa-map-marker" aria-hidden="true"></i> Malaysia</span>
                                                </div>
                                                <div class="col-5 pl-md-3 pl-sm-1 text-md-right text-sm-left text-right my-auto">
                                                    <button type="submit" class="btn btn-primary default-btn">View</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--    </div>
                             </div> -->
                            </div>
                        </div>


                        <!--                        Marquee Tag Box-->

                        <div class="item-list-box">

                            <!--
                            <div class="card item-box">
                                <div class="item-img">

                                    <img src="https://escortsandbodyrubs.com/uploads/1617017814_20160804_212902.jpg" class="card-img-top">

                                </div>
                                <div class="item-info card-body">
                                    <a class="item-title" href="https://backpageclassifieds.com/ad/details/26657?pagefirst==0">Sexy Irish..</a>
                                    <h4 class="item-date">2021-03-29</h4>
                                    <p class="item-desc">Sexy eroti...</p>
                                    <a class="item-contact" href="https://backpageclassifieds.com/ad/details/26657?pagefirst==0"><i class="fa fa-phone"></i> 0481601257</a>
                                </div>
                            </div>
-->
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <h2 class="ads-heading">Free Ads</h2>
                                </div>
                                <!--
                                <div class="col-12">
                                    <div class="non-premium-sec mb-4">
                                        <ul>
                                            <li><a href="#">27 year old Female from London, United Kingdom - 27 <span> (London)</span></a></li>
                                            <li><a href="#">27 year old Female from London, United Kingdom - 27 <span> (London)</span></a></li>
                                            <li><a href="#">27 year old Female from London, United Kingdom - 27 <span> (London)</span></a></li>
                                            <li><a href="#">27 year old Female from London, United Kingdom - 27 <span> (London)</span></a></li>
                                            <li><a href="#">27 year old Female from London, United Kingdom - 27 <span> (London)</span></a></li>
                                        </ul>
                                    </div>
                                </div>
-->

                                <div class="col-12">
                                    <div class="free-ad-div">
                                        <div class="row">
                                            <div class="col-6 my-md-4 my-3">
                                                <div class="free-ad-grid">
                                                    <div class="row">
                                                        <div class="col-md-5 pr-md-0 free-img-box">
                                                            <img src="https://crackerclassifieds.com/upload/1617949865_241.jpg" alt="img">
                                                        </div>
                                                        <div class="col-md-7 pl-md-0">
                                                            <div class="free-ad-texts">
                                                                <h4><a href="#0">2014 M.ben..</a></h4>
                                                                <h5>2021-04-09</h5>
                                                                <h6>Reg 2015 H...</h6>
                                                                <h5><i class="fa fa-phone"></i><a href="tel:+852 98831212">+852 98831212</a></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 my-md-4 my-3">
                                                <div class="free-ad-grid">
                                                    <div class="row">
                                                        <div class="col-md-5 pr-md-0 free-img-box">
                                                            <img src="https://crackerclassifieds.com/upload/1617949865_241.jpg" alt="img">
                                                        </div>
                                                        <div class="col-md-7 pl-md-0">
                                                            <div class="free-ad-texts">
                                                                <h4><a href="#0">2014 M.ben..</a></h4>
                                                                <h5>2021-04-09</h5>
                                                                <h6>Reg 2015 H...</h6>
                                                                <h5><i class="fa fa-phone"></i><a href="tel:+852 98831212">+852 98831212</a></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <!-- <div class="all-item-box">
                                <a class="load-more-btn">load More</a>
                            </div> -->
                        </div>
                    </div>
                    <div class="row page">
                        <div class="col-md-12 mt-3 text-right">&nbsp;<a href="#0"><strong>1</strong></a>&nbsp;
                            <a class="other-links" href="https://backpageclassifieds.com/ad/category/personals/20">2</a>&nbsp;
                            <a class="other-links" href="https://backpageclassifieds.com/ad/category/personals/40">3</a>&nbsp;
                            <a class="other-links" href="https://backpageclassifieds.com/ad/category/personals/20">&gt;</a>&nbsp;&nbsp;
                            <a class="other-links" href="https://backpageclassifieds.com/ad/category/personals/8180">Last &rsaquo;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>









    <style>
    	 .box-border.category-content {
            padding: 50px 0 !important;
        }
    	        .category-content {
            background-color: #ffffff !important;
        }
    /* width */
    .sidebar-wrap::-webkit-scrollbar {
    width: 10px;
    }

    /* Track */
    .sidebar-wrap::-webkit-scrollbar-track {
    background: #f1f1f1; 
    }

    /* Handle */
    .sidebar-wrap::-webkit-scrollbar-thumb {
    background-image: linear-gradient(to right, #6fcbfd, #467ec6); 
    }

    /* Handle on hover */
    .sidebar-wrap::-webkit-scrollbar-thumb:hover {
    background-image: linear-gradient(to right, #6fcbfd, #467ec6); 
    }
    .sidebar-wrap{
        z-index: 110;
    }
    </style>
   <style type="text/css">
    
        .non-premium-sec ul li {
        box-shadow: 2px 2px 6px 1px #ff006c73;
        padding: 10px 7px;
        margin:10px 0;
        }

 .im{
    margin:0 2px;
 }
            .category-content {
            background-color: #ffffff !important;
        }
                .box-border.category-content {
            padding: 50px 0 !important;
        }
        .marquee {
        padding: 5px 0;
        background-image: linear-gradient(to right, #6fcbfd, #467ec6);
        margin: 12px 0;
}
        .marquee span{
            font-size: 16px;
    font-weight: 600;
    color: #fff;
        }
    .featured-tag
    {
    top: -1px;
    left: -1px;
    width: 50%!important;
    height: auto!important;
    }
    .no-results{
    background: white;
    padding: 48px;
    box-shadow: 0px 0px 20px 0px #a39e9e;
    }
     .page2 .other-links {
            padding: 7px 12px;
            background: #5c80bb;
            color: white;
        }

        .page2 strong {
            padding: 7px 12px;
            background: #ff006c;
            color: white;
        }
      .base2 {
            position: absolute;
            margin: auto;
            top: 0;
            right: -10px !important;
            bottom: 0;
            left: 0px;
            width: 98%;
            height: 90px;
            overflow: hidden;
            background: #fff;
            border-radius: 0px;
            box-shadow: 2px 1px 12px;

        }

        .select-location-sec2 {
            padding: 100px 0;
            background-color: #f6f6f6;
        }


        .long {
            height: 470%;
            transform: rotate(-3deg);
            position: absolute;
            top: -210px;
            left: -10px;
            animation: long 0.4s ease-in-out infinite;
            animation-direction: alternate-reverse;
        }

        .title {
            position: absolute;
            height: 70%;
            left: 10px;
            top: 15px;
            filter: drop-shadow(0px 0px 10px #000);
            z-index: 1;
            animation: t 10s ease-in-out infinite;
        }

        .spin2 {
            position: absolute;
            animation: spin2 10s linear infinite;
        }

        .spinner:before {
            content: "";
            box-sizing: border-box;
            position: absolute;
            top: 25px;
            left: -60px;
            width: 40px;
            height: 40px;
            filter: blur(50%);
            border-radius: 100%;
            border: 10px solid blue;
            border-top-color: blue;
            border-bottom-color: red;
            animation: spinner 0.4s linear infinite;
            animation-direction: alternate-reverse;
            filter: blur(30px) brightness(15);
        }

        .slid1 {
            position: absolute;
            background-color: white;
            height: 300px;
            width: 800px;
            top: -100px;
            left: -10px;
            transform: rotate(10deg);
            z-index: 2;
            animation: s1 10s ease infinite;
        }

        .but {
            color: white;
            position: absolute;
            top: 32px;
            left: 350px;
            height: 35px;
            width: 180px;
            border: none;
            border-radius: 6px;
            outline: none;
            background: linear-gradient(45deg, #a6075b, #fe0034, #fe0034);
            box-shadow: 0px 0px 20px 0.5px #000;
            cursor: pointer;
            font-family: "Raleway", sans-serif;
            font-size: 20px;
            animation: b 2s linear infinite;
            z-index: 1;
        }

        .but2 {
            color: white;
            position: absolute;
            top: 40px;
            left: 80px;
            height: 35px;
            width: 180px;
            border: none;
            border-radius: 6px;
            outline: none;
            background: linear-gradient(45deg, #004580, #1e8ce8, #89c9ff);
            box-shadow: 0px 0px 20px 0.5px #000;
            cursor: pointer;
            font-family: "Raleway", sans-serif;
            font-size: 15px;
            animation: b 2s linear infinite;
            z-index: 1;
        }

        .butd {
            position: absolute;
            animation: butd 10s ease-in-out infinite;
        }

        .butd2 {
            position: absolute;
            animation: butd2 10s ease-in-out infinite;
        }

        /*a:link,
a:visited {
  color: azure;
  text-decoration: none;
}*/

        .ea {
            position: absolute;
            height: 70%;
            top: 13px;
            left: 320px;
            z-index: 3;
            animation: ea 10s ease infinite;
        }

        .ps {
            position: absolute;
            height: 100%;
            left: 1700px;
            z-index: 3;
            animation: ps 10s ease-in-out infinite;
        }

        .x {
            position: absolute;
            height: 70%;
            top: 11.5px;
            left: 1700px;
            z-index: 3;
            animation: x 10s ease-in-out infinite;
        }

        .h2 {
            position: absolute;
            height: 400px;
            width: 190px;
            top: -100px;
            left: 800px;
            background: linear-gradient(45deg, #a6075b, #fe0034, #fe0034);
            transform: rotate(10deg);
            z-index: 6;
            animation: h2 10s ease-in-out infinite;
        }

        .h1 {
            color: white;
            position: absolute;
            text-align: center;
            top: 100px;
            left: 10px;
            padding-top: 24px;
            height: 90px;
            width: 160px;
            border: none;
            outline: none;
            font-size: 18px;
            font-family: "Raleway", sans-serif;
            font-weight: bolder;
            animation: h 10s ease-in-out infinite;
            transform: rotate(-10deg);
            z-index: 6;
        }

        @keyframes h2 {
            30% {
                left: 1500px;
            }

            70% {
                left: 558px;
            }

            90% {
                left: 558px;
            }

            99% {
                left: 1500px;
            }
        }

        @keyframes ps {
            30% {
                left: 1500px;
            }

            60% {
                left: 385px;
            }

            90% {
                left: 385px;
            }

            99% {
                left: 1500px;
            }
        }

        @keyframes x {
            30% {
                left: 1700px;
            }

            65% {
                left: 475px;
            }

            89% {
                left: 475px;
            }

            99% {
                left: 1700px;
            }
        }

        @keyframes t {
            0% {
                left: 800px;
            }

            20% {
                left: 5px;
            }

            21% {
                left: 10px;
            }
        }

        @keyframes butd {
            0% {
                top: 500px;
            }

            20% {
                top: 0px;
            }
        }

        @keyframes butd2 {
            0% {
                top: 500px;
            }

            20% {
                top: 0px;
            }
        }

        @keyframes b {
            0% {
                transform: rotate(0deg);
            }

            10% {
                transform: rotate(0deg);
            }

            20% {
                transform: rotate(0deg);
            }

            30% {
                transform: rotate(0deg);
            }

            40% {
                transform: rotate(1deg);
            }

            50% {
                transform: rotate(-1deg);
            }

            60% {
                transform: rotate(1deg);
            }

            70% {
                transform: rotate(0deg);
            }

            80% {
                transform: rotate(0deg);
            }

            90% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(0deg);
            }
        }

        @keyframes ea {
            0% {
                left: 320px;
            }

            30% {
                left: 1500px;
            }

            60% {
                left: 320px;
            }
        }

        @keyframes s1 {
            0% {
                left: -5px;
            }

            30% {
                left: 1500px;
            }

            55% {
                left: 300px;
            }

            90% {
                left: 300px;
            }
        }

        @keyframes long {
            0% {
                left: -12px;
                top: -212px;
            }

            50% {
                left: -13px;
                top: -210px;
            }
        }

        @keyframes spin2 {
            0% {
                left: -60px;
            }

            25% {
                left: -60px;
            }

            30% {
                left: 120px;
            }

            80% {
                left: 120px;
            }

            99% {
                left: 120px;
            }
        }

        @keyframes spinner {
            0% {
                opacity: 0;
            }

            50% {
                transform: rotate(360deg);
            }
        }

        .fixed-header .post-ad a {
            padding: 6px 3px 6px 3px;
        }

        .fixed-header .header-info li {
            padding: 3px 4px;
        }

        @media only screen and (max-width:1199px) and (min-width:992px) {
            .h2 {
                position: absolute;
                height: 600px;
                width: 300px;
                top: -320px;
                left: 800px;
            }

            .h1 {
                color: white;
                position: absolute;
                text-align: center;
                top: 330px;
                left: 40px;
                padding-top: 25px;
            }

            .but {
                color: white;
                left: 280px;
                top: 32px;
            }

            .ea {
                left: 290px;
                top: 15px;
            }

            @keyframes ea {
                0% {
                    left: 290px;
                }

                30% {
                    left: 1500px;
                }

                60% {
                    left: 290px;
                }

                .h2 {
                    display: none;
                }
            }

            .slid1 {
                height: 800px;
                width: 800px;
                top: -480px;
            }

        }

        @media only screen and (max-width:991px) {

            .base2 {
                right: -10px !important;
                left: -10px;
                width: 100%;
            }

            .spl-padding-section.select-location-sec2 {
                padding: 100px 0!important;
            }

            .slid1 {
                height: 500px;
                width: 1000px;
                top: -200px;
                left: -100px;
            }

            .ea {
                left: 305px;
                width: 160px !important;
            }

            @keyframes ea {
                0% {
                    left: 305px;
                }

                30% {
                    left: 1500px;
                }

                60% {
                    left: 305px;
                }
            }

            .but {
                top: 32px;
                left: 90px;
            }

            .h2 {
                position: absolute;
                height: 1100px;
                width: 1100px;
                top: -900px;
                left: 800px;
                background: linear-gradient(222deg, #a6075b, #fe0034, #fe0034);
            }

            .h1 {
                top: 990px;
                left: 10px;
                padding-top: 24px;
                height: 90px;
                width: 210px;
            }
        }

        @media only screen and (max-width:767px) {
            .box-border.category-content {
                padding: 40px 0 !important;
            }

            .slid1 {
                height: 1500px;
                width: 1800px;
                top: -1200px;
                left: -100px;
            }

            .base2 {
                
                width: 100%;
            }

            .but {
                left: 85px !important;
                width: 100px;
                top: 30px;
                font-size: 18px;
            }

            .ea {
                width: 140px !important;
                height: 32px !important;
                top: 32px !important;
                left: 210px !important;
            }

            @keyframes ea {
                0% {
                    left: 245px;
                }

                30% {
                    left: 1500px;
                }

                60% {
                    left: 245px;
                }
            }

            .h1 {
                top: 2540px;
                left: 10px;
                padding-top: 20px;
                height: 90px;
                width: 160px;
            }

            .h2 {
                position: absolute;
                height: 2800px;
                width: 1500px;
                top: -2400px;
                left: 800px;
                background: linear-gradient(222deg, #a6075b, #fe0034, #fe0034);
            }
        }

        @media only screen and (max-width:575px) {
            .base2 {
    width: 95%;
}
            .h2 {
                display: none;
            }

            .title {
                position: absolute;
                height: 40%;
                left: 5px;
                top: 5px;
                filter: drop-shadow(0px 0px 10px #000);
                z-index: 1;
                animation: t 10s ease-in-out infinite;
            }

            .but {
                left: 5px !important;
                top: 55px;
                width: 130px;
                font-size: 15px;
                height: 30px;
            }

            .but2 {
                top: 55px;
                left: 145px;
                height: 30px;
                width: 135px;
                font-size: 11px;
                z-index: 50;
            }

            .ea {
                width: 120px !important;
                left: 160px !important;
                top: 12px !important;
            }

            @keyframes ea {
                0% {
                    left: 160px;
                }

                30% {
                    left: 1500px;
                }

                60% {
                    left: 160px;
                }
            }

            .slid1 {
                height: 2000px;
                width: 900px;
                top: -1800px;
                left: -100px;
            }
        }

    </style>


<!--owl-carousel-js-->

   <!--sidebar-scroll-->