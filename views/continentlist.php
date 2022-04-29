<!-- CSS -->
<!-- slik-slider-link -->
<link href="<?php echo base_url();?>fontassets/css/home.css" rel="stylesheet">
<link href="<?php echo base_url();?>fontassets/slick/slick/slick-theme.css" rel="stylesheet">
<link href="<?php echo base_url();?>fontassets/slick/slick/slick.css" rel="stylesheet">
<!-- *************** -->
<?php 
$banner=$this->db->get_where('banner',array('id'=>1))->row();
?>
<section class="home-banner" style="background-image: url(<?=$banner->image?>)!important;">
        <div class="container">
            <div class="banner-content">
             
            </div>
        </div>
    </section>
<style type="text/css">
    .select-location-sec3 h5{
    color: #034c8c;
    padding: 12px;
    border-bottom: 4px solid #7b9ff5;
    font-size: 21px;
    text-transform: uppercase;
    }
    .list a{
    font-size: 17px;
    padding: 0 10px 0 22px;
    font-weight: 600;
        color: #0b1721;
    } 
    .list1{
        background: #b6f3f3;
    border-radius: 10px;
    padding: 6px;
    }
</style>
  
 <!-- Ad Section -->
 <section class="select-location-sec3" style="background: aliceblue;">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <h5><i class="fa fa-list"></i>  Countries List</h5>
                </div>
              <div class="col-md-12 mb-3">
                 <div class="location-left">
                    <?php 
                    foreach ($data as $value) {
                    ?>
                   
                    <div class="list1 " style="margin-bottom: 12.22px!important;">
                     <a href="<?php echo base_url();?>ad/country/<?=str_replace(" ","_",$value->country)?>"><i class="fa fa-flag" style="color: #f97b00;"></i>  <?=$value->country?></a>    
                    </div>
                         
                 <?php } ?>
               </div>
              </div>
              
        </div>

      </div>
    </section>

  
    <style type="text/css">
    .home-banner .categories-filter .category-box:hover .white-icon {
    filter: invert(1)brightness(1);
    }
      .location-left {
        /*border:1px solid #ccc;*/
        /*padding:5px;*/
        list-style:none;
        -moz-column-count:2; /* Firefox */
        -moz-column-gap:36px;
        -moz-column-rule-width:1px;
        -moz-column-rule-style:outset;
        -moz-column-rule-color:#ccc;
        -webkit-column-count:2; /* Safari and Chrome */
        -webkit-column-gap:36px;
        -webkit-column-rule-width:1px;
        -webkit-column-rule-style:outset;
        -webkit-column-rule-color:#ccc;
        column-count: 2px;  
        column-gap:36px;
        column-rule-width:1px;
        column-rule-style:outset;
        column-rule-color:#ccc;
    }
    .featured-tag
    {
    top: -1px;
    left: -1px;
    width: 50%!important;
    height: auto!important;
    }
    @media screen and (max-width: 991px) and (min-width: 768px)
    {
    .home-banner .categories-filter ul li {
    min-width: 74px!important;
    flex: unset;
    }
    }
    @media screen and (max-width: 767px) and (min-width: 481px)
    {
    .home-banner .categories-filter ul li {
    min-width: 70px!important;
    margin: 10px 10px 0 0;
    }
    }
    @media screen and (max-width: 480px) and (min-width: 200px)
    {
    .home-banner .categories-filter ul li {
    min-width: 86px!important;
    margin: 10px 10px 0 0;
    }
    }

@media only screen and (max-width: 767px)
{

.select-location-sec2 {
    height: 150px;
    margin-top: 115px!important;
    padding: 0;
}
.home-banner {
    padding: 127px 20px 0px 20px;
    /* margin-top: 6px; */
}
}
    </style>
