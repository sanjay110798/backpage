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
                                      <div id="showlooc"></div>
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
                                 $this->db->select('id');
                                 $ctt=$this->db->get_where('category_master',array('category_name'=>$name))->row();

                                $this->db->select('id,subcategory_name');
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
                       <!--  <img class="pre-btn-img" src="<?php echo base_url();?>style/lady.png"> -->
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
                                   
                                    <a href="<?php echo base_url();?>ad/allcategory" class="sidebar-anchor">
                                    <li>All categories</li>
                                </a>
                                <?php 
                                $this->db->select('category_name,id');
                                $category_qry=$this->db->get_where('category_master')->result_array();
                                foreach ($category_qry as $category) 
                                {                             
                                ?>
                                <li class="sidebar-anchor"><a href="<?php echo base_url();?>ad/category/<?=strtolower(str_replace(" ", "_",$category['category_name']));?>" ><?=$category['category_name']?></a>
                                    
                                <ul class="sidebar-under-list">
                                <?php 
                                $this->db->select('id,subcategory_name');
                                $this->db->order_by('id','RANDOM');
                                $sub_qry=$this->db->get_where('subcategory_master',array('category_id'=>$category['id']),5)->result_array();
                                foreach ($sub_qry as $sub) 
                                {          
                                ?>
                                    <li><a href="<?php echo base_url();?>ad/subcategory/<?=$sub['id']?>"><span><?=$sub['subcategory_name']?></span></a></li>
                                
                                <?php } ?>
                                </ul>

                                </li>
                                 
                                <?php } ?>
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
                         
                           <?php 
                            foreach ($topad as $ad_qry) 
                            {
                            $this->db->select('category_name');
                            $cat_qry=$this->db->get_where('category_master',array('id'=>$ad_qry->category_id))->row();
                            ?>
                            <div class="item">
                                <div class="caraousel-box">
                                    <a href="<?php echo base_url();?>ad/details/<?=$ad_qry->id;?>?pagefirst==0">
                                        <div class="carousel-img" href="#0">
                                            <img src="<?=$ad_qry->ad_image;?>" class="adimage" alt="Ads Main Image">
                                            <h6 class="top-ad-text">Top Ad</h6>
                                            <h2 class="premiumfont1">backpage</h2>
                                        </div>
                                        <div class="carousel-text">
                                            <div class="row mx-0">
                                                <div class="col-sm-12 pr-md-0 pr-3 text-md-left text-left">
                                                    <span class="location-pin"><i class="fa fa-map-marker"></i><?=substr($ad_qry->city,0,8);?>..</span>
                                                </div>
                                                <div class="col-sm-12 pl-md-3 pl-3 text-md-left text-left">
                                                    <span class="category-span"><?=$cat_qry->category_name;?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php } ?>
                            <?php 
                            foreach ($featuredad as $ad_qry) 
                            {
                            $this->db->select('category_name');
                            $cat_qry=$this->db->get_where('category_master',array('id'=>$ad_qry->category_id))->row();
                            ?>
                            <div class="item">
                                <div class="caraousel-box">
                                    <a href="<?php echo base_url();?>ad/details/<?=$ad_qry->id;?>?pagefirst==0">
                                        <div class="carousel-img" href="#0">
                                            <img src="<?=$ad_qry->ad_image;?>" class="adimage" alt="Ads Main Image">
                                            <h6 class="featured-text">Featured</h6>
                                            <h2 class="premiumfont1">backpage</h2>
                                        </div>
                                        <div class="carousel-text">
                                            <div class="row mx-0">
                                                <div class="col-sm-12 pr-md-0 pr-3 text-md-left text-left">
                                                    <span class="location-pin"><i class="fa fa-map-marker"></i><?=substr($ad_qry->city,0,8);?>..</span>
                                                </div>
                                                <div class="col-sm-12 pl-md-3 pl-3 text-md-left text-left">
                                                    <span class="category-span"><?=$cat_qry->category_name;?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                           <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </section>
    <!--    carousel-section-end-->

        <!-- Ad Section -->
    <?php if(count($premiumad)>0 && count($ad)>0){?>
    <section class="select-location-sec2 select-location-sec3 spl-padding-section px-sm-0 px-3 mx-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 col-sm-12">
                    <div class="base2"><a href="https://bestdrifting.com/" target="_blank">

                            <div>
                                <img src="https://crackerclassifieds.com/style/760632a82e03e5a26a614ec6f56a09fc.jpg" class="long" alt="run">
                                <img src="https://bestdrifting.com/public/img/icons/favicon.png" class="title" alt="nfs-payback">
                                <img src="https://bestdrifting.com/public/img/bestdrifting.png" class="ea" alt="ea" style="width: 200px;height: 40px; top: 26px;">

                                <div class="spin2">
                                    <div class="spinner"></div>
                                </div>
                                <div class="slid1"></div>
                                <div class="butd">
                                    <button class="but">Take the wheel !</button>
                                </div>

                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
        <section class="category-content box-border">
        <div class="container">
            <div class="row">
            
                <div class="col-md-12">
                    <?php if(count($premiumad)>0 && count($ad)>0){?>
                    <div class="category-item">
                        <div class="premium-option">
                            <!-- <div class="spl-slider-12" id="spl-slider-12"> -->
                            <div class="row">

                               
                                <div class="col-md-12">
                                    <!-- <h2 class="ads-heading">Premium Ads</h2> -->
                                </div>
                                <!-- </div> -->
                                <?php 
                                foreach($premiumad as $ad_qry) 
                                {
                                
                                ?>
                                <div class="col-lg-4 col-sm-6 my-3">
                                    <div class="property-blog-card card" style="">
                                        <div class="card-img-top">
                                            <img src="<?=$ad_qry->ad_image;?>" class="" alt="Ads Main Image">
                                            <span class="premium-tag">PREMIUM</span>
                                            <h2 class="premiumfont">backpage</h2>
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col-7 pr-md-3 pr-sm-1">
                                                    <span class="blog-bottom-1"><i class="fa fa-calendar" aria-hidden="true"></i> <?=$ad_qry->posted_date;?></span>
                                                    <span class="blog-bottom-2"><i class="fa fa-map-marker" aria-hidden="true"></i> <?=$ad_qry->country;?></span>
                                                </div>
                                                <div class="col-5 pl-md-3 pl-sm-1 text-md-right text-sm-left text-right my-auto">
                                                    <a href="<?php echo base_url();?>ad/details/<?=$ad_qry->id;?>?pagefirst==0"><button type="button" class="btn btn-primary default-btn">View</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              <?php } ?>
                                <?php 
                                if($name=='VEHICLES'){?>
                                <div class="col-lg-4 col-sm-6 my-3">
                                
                                <div class="card-img-top" style="height: 100%;">
                                <a href=""><img src="https://bestdrifting.com/public/img/ad_birite.jpg" alt="Ads Main Image" style="width: 100%;height: 100%;"></a>  
                                </div>

                                
                                
                                </div> 
                                <?php } ?>
                            </div>
                        </div>


                        <!--                        Marquee Tag Box-->

                        <div class="item-list-box">

                         
                            <div class="row">
                                
                                <div class="col-md-12 mt-1">
                                    <!-- <h2 class="ads-heading">Free Ads </h2> -->
                                </div>
                                <div class="col-12">
                                     <div class="free-ad-div">
                                        <div class="row">
                                            <?php 
                                            foreach ($ad as $ad_qry) 
                                            {
                                            ?>
                                           
                                            <div class="col-6 my-md-4 my-3">
                                                <div class="free-ad-grid">
                                                    
                                                    <div class="row">
                                                        
                                                        <div class="col-md-5 px-md-2 free-img-box position-relative">
                                                            <a href="<?php echo base_url();?>ad/details/<?=$ad_qry->id;?>?pagefirst==0">
                                                            <img src="<?=$ad_qry->ad_image;?>" alt="img">
                                                        </a>
                                                        <h2 class="premiumfont2">backpage</h2>
                                                        </div>
                                                       
                                                        <div class="col-md-7 pl-md-0">
                                                            <div class="free-ad-texts">
                                                                <a href="<?php echo base_url();?>ad/details/<?=$ad_qry->id;?>?pagefirst==0">
                                                                <h4><?=utf8_decode(substr($ad_qry->ad_title,0,10))?>..</h4>
                                                                <h5><?=$ad_qry->posted_date;?></h5>
                                                                <!-- <h6><?=utf8_decode(substr($ad_qry->ad_description,0,10))?>..</h6> -->
                                                                <h5><i class="fa fa-phone"></i><a href="tel:<?=$ad_qry->contact_number?>"><?=$ad_qry->contact_number?></a></h5>
                                                            </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                 
                                                </div>
                                            </div>    
                                           
                                          <?php } ?>
                                           
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>

                            <!-- <div class="all-item-box">
                                <a class="load-more-btn">load More</a>
                            </div> -->
                        </div>
                    </div>
                    <?php } else{?>
                     <div class="category-item">
                        <div class="premium-option">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="section text-center">
                                    <h1 class="error">404</h1>
                                    <div class="page">Ooops!!! Sorry No Data Found!!</div>
                                    <a class="back-home btn btn-primary" href="<?=base_url();?>">Back to home</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <style type="text/css">
                    .section{
                    padding: 0rem 2rem;
                    }

                    .section .error{
                    font-size: 150px;
                    color: #008B62;
                    text-shadow: 
                    1px 1px 1px #00593E,    
                    2px 2px 1px #00593E,
                    3px 3px 1px #00593E,
                    4px 4px 1px #00593E,
                    5px 5px 1px #00593E,
                    6px 6px 1px #00593E,
                    7px 7px 1px #00593E,
                    8px 8px 1px #00593E,
                    25px 25px 8px rgba(0,0,0, 0.2);
                    }

                    .page{
                    margin: 2rem 0;
                    font-size: 20px;
                    font-weight: 600;
                    color: #444;
                    }

                    /*.back-home{
                    display: inline-block;
                    border: 2px solid #222;
                    color: #222;
                    text-transform: uppercase;
                    font-weight: 600;
                    padding: 0.75rem 1rem 0.6rem;
                    transition: all 0.2s linear;
                    box-shadow: 0 3px 8px rgba(0,0,0, 0.3);
                    }*/
                    .back-home:hover{
                    background: #222;
                    color: #ddd;
                    }
                    </style>
                    <?php } ?>
                    <div class="row page">
                        <div class="col-md-12 mt-3 text-right"><?php echo $links;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
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
    </style>
   <style type="text/css">
        .non-premium-sec ul li {
            box-shadow: 2px 2px 6px 1px #ff006c73;
            padding: 10px 7px;
            margin: 10px 0;
        }

        .im {
            margin: 0 2px;
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

        .marquee span {
            font-size: 16px;
            font-weight: 600;
            color: #fff;
        }

        .featured-tag {
            top: -1px;
            left: -1px;
            width: 50% !important;
            height: auto !important;
        }

        .no-results {
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
            height: 500% !important;
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
            left: 420px;
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
            display: none;
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

        /*@keyframes h2 {
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
        }*/

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
                left: 420px;
            }

            30% {
                left: 1500px;
            }

            60% {
                left: 420px;
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
                left: 480px;
                top: 32px;
            }

            .ea {
                left: 470px;
                top: 15px;
            }

            @keyframes ea {
                0% {
                    left: 470px;
                }

                30% {
                    left: 1500px;
                }

                60% {
                    left: 470px;
                }

                .h2 {
                    display: none;
                }
            }

            .slid1 {
                height: 1100px;
                width: 1000px;
                top: -180px;
                left: -100px;
            }

        }

        @media only screen and (max-width:991px) {

            .base2 {
                right: -10px !important;
                left: -10px;
                width: 100%;
            }

            .spl-padding-section.select-location-sec2 {
                padding: 100px 0 !important;
            }

            .slid1 {
                height: 1000px;
                width: 1500px;
                top: -200px;
                left: -100px;
            }

            .ea {
                left: 450px;
                width: 160px !important;
            }

            @keyframes ea {
                0% {
                    left: 450px;
                }

                30% {
                    left: 1500px;
                }

                60% {
                    left: 450px;
                }
            }

            .but {
                top: 32px;
                left: 115px;
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
                top: -800px;
                left: -100px;
            }

            .base2 {

                width: 100%;
            }

            .but {
                left: 90px !important;
                width: 150px;
                top: 30px;
                font-size: 18px;
            }

            .ea {
                width: 140px !important;
                height: 32px !important;
                top: 32px !important;
                left: 340px !important;
            }

            @keyframes ea {
                0% {
                    left: 340px;
                }

                30% {
                    left: 1500px;
                }

                60% {
                    left: 340px;
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
                left: 55px;
                top: 5px;
                filter: drop-shadow(0px 0px 10px #000);
                z-index: 1;
                animation: t 10s ease-in-out infinite;
            }

            @keyframes t {
                0% {
                    left: 800px;
                }

                20% {
                    left: 55px;
                }

                21% {
                    left: 55px;
                }
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
                top: 32px !important;
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
