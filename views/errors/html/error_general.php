<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Error</title>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Arvo">
</head>
<section class="page_404">
	<div class="container">
		<div class="row">	
		<div class="col-sm-12 ">
		<div class="col-sm-10 col-sm-offset-1  text-center">
		<div class="four_zero_four_bg2">
		<h1 class="text-center">Page Error</h1>
		</div>
		<div class="four_zero_four_bg">
		<img src="http://backpageclassifieds.com/fontassets/2b4b15fa_1599714169079.gif">
		</div>
		<div class="contant_box_404">
		<h3 class="h2">
		Look like you're lost
		</h3>
		
		<p>The page you are looking for not avaible!</p>
		<div style="display: none;"><?php echo $message; ?></div>
		<a href="#" onClick="history.go(-1);" class="link_404">Go to Home</a>
	    </div>
		</div>
		</div>
		</div>
	</div>
</section>
</html>
<style type="text/css">
	
/*======================
    404 page
=======================*/


.page_404{ padding:40px 0; background:#fff; font-family: 'Arvo', serif;
}

.page_404  img{width: 48%;
    height: 100%;margin-left: -4%;}

.four_zero_four_bg{
 
 /*background-image: url();*/
 /*background-image: url(https://media.giphy.com/media/OUxiK1L8xXZYc/giphy.gif);*/
    height: 400px;
    /*background-position: center;*/
 }
 
 
 .four_zero_four_bg2 h1{
 font-size:80px;
 }
 
  .four_zero_four_bg h3{
			 font-size:80px;
			 }
			 
			 .link_404{			 
	color: #fff!important;
    padding: 10px 20px;
    background: #39ac31;
    margin: 20px 0;
    display: inline-block;}
	.contant_box_404{ margin-top:-19px;}
</style>
