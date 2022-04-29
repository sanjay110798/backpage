<?php 
// session_start();
error_reporting(0);
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
$url =  "https://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; 
// $url=$this->uri->segment(1);
// $url2=$this->uri->segment(2);

$meta_page=$this->db->query("SELECT * from cracker_meta where page = '".$url."'");
$meta=$meta_page->row();
$meta_count=$meta_page->num_rows();
?>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-signin-client_id" content="533133317728-roq55jf3hf47u5lf33fmrv22o6b8jh5k.apps.googleusercontent.com">
    <?php 
    if($meta_count!=0){?>
    <title><?=$meta->meta_title?></title>
    <meta name="keywords" content="<?=$meta->keyword;?>" />
    <meta name="description" content="<?=$meta->description;?>" />
    <?php } else{?>
    <title>Backpage Classifieds - Free Classifieds Advertising Worldwide </title>
    <meta name="keywords" content="Backpage Classifieds,Free Backpage Classifieds,Cracker Classifieds,Cracker, Classifieds Advertising, Backpage Replacement, Free Classifieds Advertising" />
    <meta name="description" content="Backpage Classifieds Advertising services worldwide. Now You can view your business ads from all over the world on Backpage & Cracker Classifieds." />
    <?php } ?>
    <meta name="robots" content="index,follow" />
    <meta property="og:title" content="Backpage Classifieds - Free Classifieds Advertising Worldwide " />
    <meta property="og:type" content="Backpage Classifieds Advertising services worldwide. Now You can view your business ads from all over the world on Backpage & Cracker Classifieds." />
    <meta property="og:image" content="https://backpageclassifieds.com/style/assets/images/fav1.jpeg" />
    <meta property="og:url" content="https://backpageclassifieds.com/" />
    <meta name="google-site-verification" content="WLMbW-53RvpoAOgR8nWvyQhfHfrODke6O0tz-LZ_Rry" />
    <link rel="canonical" href="https://backpageclassifieds.com/" />

    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>style/assets/images/fav1.jpeg">
    <!-- bootstrap-links -->
    <link href="<?php echo base_url();?>fontassets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- fonts-link -->
    <!--    font-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@400;700&display=swap" rel="stylesheet">
    <!-- css-link -->
    <link href="<?php echo base_url();?>fontassets/css/header.css" rel="stylesheet">
    <link href="<?php echo base_url();?>fontassets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>fontassets/css/footer.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--    <link href="<?php echo base_url();?>style/redesign.css" rel="stylesheet">-->
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "WebSite",
            "name": "Backpage Classifieds",
            "url": "https://backpageclassifieds.com/",
            "potentialAction": {
                "@type": "SearchAction",
                "target": "https://backpageclassifieds.com/ad/search?q={search_term_string}",
                "query-input": "required name=search_term_string"
            }
        }

    </script>
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f9676a2b30a760012e6f376&product=sop' async='async'></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-LQFJEKMK5R"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-LQFJEKMK5R');

    </script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body class="page-id-2" id="page" style="overflow-x: hidden;">

    <!--    header-start-->

    <header>
        <div class="pre-header">
            <div class="container px-sm-0">
                <div class="row">
                    <div class="col-md-6 col-sm-4 pr-md-3 pr-0 my-sm-auto mb-1 d-sm-block d-none">
                        <p class="mb-0">The Largest Classifieds In The World.</p>
                    </div>
                    <div class="col-md-6 col-sm-8 text-right pl-md-3 pl-0">
                        <ul>
                            <li class="select-language preheader-li">
                                <i class="fa fa-language"></i>
                                <select class="custom-select" onchange="doGTranslate(this);">
                                    <option>Language</option>
                                    <option value="en|en">English</option>
                                    <option value="en|zh-CN">Chinese</option>
                                    <option value="en|hi">Hindi</option>
                                    <option value="en|es">Spanish</option>
                                    <option value="en|fr">French</option>
                                    <option value="en|ar">Arabic</option>
                                    <option value="en|ms">Malay</option>
                                    <option value="en|bn">Bengali</option>
                                    <option value="en|ru">Russian</option>
                                    <option value="en|pt">Portuguese</option>
                                    <option value="en|id">Indonesian</option>
                                    <option value="en|ur">Urdu</option>
                                    <option value="en|de">German</option>
                                    <option value="en|ja">Japanese</option>
                                    <option value="en|sw">Swahili</option>
                                    <option value="en|mr">Marathi</option>
                                    <option value="en|te">Telugu</option>
                                    <option value="en|pa">Punjabi</option>
                                    <option value="en|zh">Wu Chinese</option>
                                    <option value="en|ta">Tamil</option>
                                    <option value="en|tr">Turkish</option>
                                </select>
                            </li>
                            <li class="select-country preheader-li">
                                <i class="fa fa-globe"></i>
                                <select class="custom-select" name="session_country" id="session_country" style="width: 125px;">
                                    <option>Country</option>
                                    <?php 
                                    $country_qry=$this->db->get('countries_new',50)->result();
                                    foreach ($country_qry as $country) {

                                    ?>
                                    <option value="<?=$country->country_name;?>" <?php if($this->session->userdata('country')==$country->country_name){echo"selected";}?>><?=$country->country_name;?></option>
                                    <?php } ?>
                                    <option value="all">Show All</option>
                                </select>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="header">
            <div class="container px-sm-0">
                <nav class="navbar navbar-expand-lg navbar-light">

                    <a class="navbar-brand" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>style/rajarshi_images/logo.png" alt="Our Logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ml-auto text-lg-right text-center">
                            <?php 
                    if($this->session->userdata('login_id')=='')
                    {
                    ?>


                            <li class="nav-item sticky-rounds">
                                <a class="circle" href="https://backpageclassifieds.com/ad/category/classes">

                                    <img src="https://crackerclassifieds.com/upload/1582783826_presentation.png" alt="Category Image"></a>
                            </li>
                            <li class="nav-item sticky-rounds">
                                <a class="circle" href="https://backpageclassifieds.com/ad/category/community">

                                    <img src="https://crackerclassifieds.com/upload/1575625913_social-care.png" alt="Category Image"></a>
                            </li>
                            <li class="nav-item sticky-rounds">
                                <a class="circle" href="https://backpageclassifieds.com/ad/category/events">

                                    <img src="https://crackerclassifieds.com/upload/1575625939_calendar.png" alt="Category Image"></a>
                            </li>
                            <li class="nav-item sticky-rounds">
                                <a class="circle" href="https://backpageclassifieds.com/ad/category/for_sale">

                                    <img src="https://crackerclassifieds.com/upload/1582780990_coupon.png" alt="Category Image"></a>
                            </li>
                            <li class="nav-item sticky-rounds">
                                <a class="circle" href="https://backpageclassifieds.com/ad/category/jobs">

                                    <img src="https://crackerclassifieds.com/upload/1582892693_businessman (2).png" alt="Category Image"></a>
                            </li>
                            <li class="nav-item sticky-rounds">

                                <a class="circle" href="https://backpageclassifieds.com/ad/category/personals">

                                    <img src="https://crackerclassifieds.com/upload/1582892103_like (1).png" alt="Category Image"></a>
                            </li>
                            <li class="nav-item sticky-rounds">
                                <a class="circle" href="https://backpageclassifieds.com/ad/category/real_estate">

                                    <img src="https://crackerclassifieds.com/upload/1575625979_building.png" alt="Category Image"></a>
                            </li>
                            <li class="nav-item sticky-rounds">
                                <a class="circle" href="https://backpageclassifieds.com/ad/category/services">

                                    <img src="https://crackerclassifieds.com/upload/1575625990_technical-support.png" alt="Category Image"></a>
                            </li>
                            <li class="nav-item sticky-rounds">
                                <a class="circle" href="https://backpageclassifieds.com/ad/category/vehicles">

                                    <img src="https://crackerclassifieds.com/upload/1582890446_car (1).png" alt="Category Image"></a>
                            </li>

                        </ul>

                        <ul class="navbar-nav navbar-info text-lg-right text-center">
                            <li class="nav-item my-lg-auto">
                                <a href="#" class="btn default-btn"><i class="fa fa-plus-circle"></i> Post A Free Ad</a>
                            </li>
                            <li class="nav-item my-lg-auto login-btn-wrap">
                                <a href="#" class="btn default-btn login-btn"><i class="fa fa-user"></i> Log In/Register</a>
                            </li>
                            <?php } else{ ?>
                            <!-- /////////////// -->
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>profile/myaccount" class="btn default-btn">Account</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>authentication/logout" class="btn alt-default-btn">Log Out</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>


    <style>
        .pre-header {
            padding: 13px 0;
            background: #0868ff !important;
        }

        .pre-header a,
        .pre-header p {
            font-size: 22px;
            font-weight: 600;
            color: #fff;
            /* font-family: 'Dosis', sans-serif; */
            transition: 0.3s ease-in-out;
        }

        .preheader-li {
            max-width: 210px;
            margin-left: 10px;
            display: inline-block;
            position: relative;
        }

        .preheader-li .custom-select {
            padding: 4px 30px;
            height: 42px;
            color: #495057;
            vertical-align: middle;
            background: #fff url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e) no-repeat right 0.75rem center/8px 10px;
            border: 2px solid #0868ff;
            border-radius: 8px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        .preheader-li i {
            position: absolute;
            left: 10px;
            top: 12px;
        }

        .nav-item .default-btn {
            border-radius: 8px;
            font-weight: 500;
            padding: 6px 8px;
            text-transform: uppercase;
            background: #fff;
            border: 2px solid #0868ff;
            position: relative;
            overflow: hidden;
            color: #0868ff;
            /* border: none; */
        }

        .nav-item .alt-default-btn {
            background: #656565;
            text-transform: uppercase;
            font-weight: 500;
            border: none;
            color: #fff;
            height: 40px;
            padding: 8px 8px;
            border-radius: 8px;
            position: relative;
            overflow: hidden;
            transition: 0.4s ease-in-out;
        }

        .nav-item .alt-default-btn {
            display: none;
        }



        .nav-item.sticky-rounds {
            display: none;
        }

        .header.sticky .nav-item.login-btn-wrap {
            display: none;
        }

        .header.sticky .nav-item .default-btn.login-btn {
            display: none;
            transition: 0.2s linear;
        }

        .header.sticky .nav-item.sticky-rounds {
            display: block;
            transition: 0.2s linear;
        }

        .header.sticky .nav-item {
            margin-left: 12px;
        }

        .nav-item .default-btn i {
            margin-right: 2px;
        }

        .nav-item .default-btn:hover {
            background: #0868ff;
            color: #ffffff;
        }

        .circle {
            display: inline-block;
            height: 45px;
            width: 45px;
            background: #0868ff;
            border: 2px #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        .circle:hover {
            background-color: #fff;
            border: 2px solid #0868ff;
            transition: 0s linear;
        }

        .circle:hover img {
            filter: invert(27%) sepia(87%) saturate(2470%) hue-rotate(207deg) brightness(99%) contrast(101%);
        }

        .circle img {
            display: block;
            padding: 5px;
            filter: invert(1);
        }

        .header.sticky {
            border-bottom: 2px solid #0868ff;
            top: 0px;
        }

        @media only screen and (max-width: 991px) {
            .navbar-nav {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-direction: column;
                flex-direction: row;
                padding-left: 0;
                margin-bottom: 0;
                list-style: none;
                flex-wrap: wrap;
                justify-content: center;
                align-content: center;
            }

            .nav-item {
                margin: 8px 4px 8px 4px;
                /* max-width: 170px; */
                /* display: inline-block; */
                /*                float: left;*/
            }

            .navbar-brand {
                width: 190px;
            }

            .header {
                border-bottom: 3px solid #0868ff;
            }

            .header.sticky .nav-item {
                margin: 8px 10px;
            }
        }

        @media only screen and (max-width:767px) {
            .header {
                background-color: #ffffff;
            }

            .header.sticky .nav-item {
                margin-left: 12px;
                margin: 10px 7px;
            }

            .nav-item {
                margin: 10px 6px 10px 6px;
            }

            .navbar-info .nav-item {
                margin: 6px 6px 6px 6px;
            }

            .pre-header a,
            .pre-header p {
                font-size: 15px !important;
            }
        }

        @media only screen and (max-width:575px) {

            .nav-item {
                margin: 12px 0px 12px 6px;
            }

            .header {
                top: 68px !important;
            }

            .header.sticky {
                top: 0px !important;
            }

            .header.sticky .nav-item {
                margin-left: 12px px;
                margin: 8px 5px;
            }
        }

    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(window).scroll(function() {
            if ($(this).scrollTop() > 30) {
                $('.header').addClass("sticky"), 1000;
            } else {
                $('.header').removeClass("sticky"), 1000;;
            }
        });

    </script>
