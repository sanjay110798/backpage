<div id="loader" class="loader">
        <div>
            <img src='https://backpageclassifieds.com/style/rajarshi_images/logo.png' alt="Loader Image">
        </div>
    </div>
    <style type="text/css">
.loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100vw;
    height: 100vh;
    overflow: hidden;
    z-index: 99999;
    /* background: url(https://backpageclassifieds.com/assets/lod.gif) 50% 50% no-repeat rgb(25,24,25); */
    background: rgb(255 255 255);

}

.loader div{
    text-align: center;
    position: relative;
    height: 100%;
}
.loader div img{
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    width: 280px;
    margin: auto;
}
</style>
<!-- slik-slider-link -->
<!--<link href="<?php echo base_url();?>fontassets/css/home.css" rel="stylesheet">-->
<!--  -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<!--<link href="<?php echo base_url();?>style/custom.css" rel="stylesheet">-->
<link href="<?php echo base_url();?>style/redesign.css" rel="stylesheet">
<!-- *************** -->


<style>
    @media only screen and (max-width:991px) {

        .location-search-btn {
            font-size: 16px;
        }

        .banner-details-wrap h3 {
            font-size: 38px;
            margin: 5px 0 0px;
        }

        .banner-details-wrap span {
            font-size: 38px;
            margin: 5px 0 0px;
        }

        .banner-details-wrap h4 {
            font-size: 38px;
        }

        .location-search-form-area {
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .banner {
            padding: 40px 0;
        }

        .country-text {
            font-size: 24px;
        }
    }

    @media only screen and (max-width:767px) {
        .banner {
            height: auto;
            background-position: inherit;
            padding: 40px 0px;
        }

        .location-search-form-area {
            margin-top: 0px;
        }

        .banner-details-wrap h3 {
            font-size: 28px;
            margin: 12px 0 0px;
        }

        .banner-details-wrap span {
            font-size: 28px;
        }

        .banner-details-wrap h4 {
            font-size: 27px;
        }

        .country-text {
            font-size: 16px;
            font-weight: 600;
            margin: 5px 0;
        }

        .location-search-form {
            box-shadow: 1px 1px 5px 3px #ffffff60;
        }

        .banner-country-wrap {
            box-shadow: 1px 1px 5px 3px #ffffff50;
        }
    }

    @media only screen and (max-width:575px) {

        .banner-details-wrap h3 {
            font-size: 28px;
            margin: 10px 0 0 0;
            padding-bottom: 4px;
        }

        .location-search-form-area {
            margin-top: 0px;
            margin-bottom: 15px;
        }

        .banner-details-wrap span {
            font-size: 28px;
        }

        .banner-details-wrap h4 {
            font-size: 28px;
        }

        .country-text {
            font-size: 17px;
            margin: 5px 0;
        }

    }

    @media only screen and (max-width:410px) {
        .banner-details-wrap h3 {
            font-size: 25px;
            margin: 0px;
        }

        .banner-details-wrap span {
            font-size: 25px;
            margin: 0px;
        }

        .banner-details-wrap h4 {
            font-size: 25px;
        }

    }

</style>

<!--home-banner-start-->
<section class="banner" style="background-image: url(https://backpageclassifieds.com/style/rajarshi_images/banner-new.jpg);">
    <div class="home-banner-overlay"></div>
    <div class="container-fluid">


        <!--        banner-details-->

        <div class="banner-details-wrap text-center">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h3>Welcome to <span>Backpage Classifieds.</span></h3>
                    <h4>You can buy, sell anything you want.</h4>
                </div>
            </div>
        </div>

        <!--        banner-details-->

    </div>
    <!-- **** Location Search Form Area **** -->

    <div class="container px-md-0">
        <div class="location-search-form-area wow fadeInUp">
            <div class="row justify-content-center">
                <div class="col-md-12 px-md-3 px-sm-0 px-3">
                    <form class="location-search-form" action="<?php echo base_url();?>ad/search" method="get">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="row justify-content-center">
                                    <div class="col-md-3 pr-md-0 my-md-0 my-2">
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="product_name" aria-describedby="emailHelp" placeholder="Product Name">
                                    </div>
                                    <div class="location col-md-3 pr-md-0 my-md-0 my-2">
                                        <input type="text" class="form-control location-field"  placeholder="Type Location For Search" value="<?=$this->input->get('location')?>" id="location" name="location" >
                                        <div id="showlooc"></div>
                                    </div>
                                    <div class="col-md-3 pr-md-0 my-md-0 my-2">
                                        <input type="text" name="category" class="search-categorie form-control" placeholder="Select Category" list="category_list" value="<?=$this->input->post('category');?>">
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
                                    <div class="col-md-1 pr-md-0 my-md-0 my-2">
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
                                    <div class="col-md-2 my-md-0 my-2">
                                        <button type="submit" class="btn location-search-btn"><i class="fa fa-search mr-2" aria-hidden="true"></i>Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- **** Location Search Form Area **** -->




        <div class="clearfix"></div>
    </div>
</section>

<!--home-banner-end-->

<style>
    @media only screen and (max-width:991px) {
        .practise-area-grid {
            margin: 0 auto;
            border-radius: 6px;
            padding: 5px 0;
        }

        .practise-area-grid:hover .practise-caption p {
            transform: translateY(-38px);
            margin-bottom: -40px;
        }

        .practise-caption h6 {
            font-size: 13px;
        }
    }

    @media only screen and (max-width:767px) {
        .practise-area-grid {
            width: 62%;
            border: 2px solid #fff;
            padding: 10px 0;
            background-color: #0868ff;
        }

        .practise-border {
            border-right: none;
        }

    }

    @media only screen and (max-width:575px) {
        .practise-area-grid {
            width: 95%;
        }

        .practise-caption h6 {
            font-size: 14px;
        }
    }

</style>


