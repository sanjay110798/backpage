<?php
   session_start();
   error_reporting(0);
   if(!defined('BASEPATH')) exit('No direct script access allowed');

   class Postad extends CI_Controller
   {
      /**
     * This is default constructor of the class
     */
    public function __construct()
    {
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->library("pagination");
		$this->load->database();
    }
	
	public function index()
	{
    
    $this->load->view('inc/header');
    $this->load->view('inc/postadheader');
    $this->load->view('postad');
    $this->load->view('inc/footer');
    $this->load->view('inc/postadfooter');
  }
  /////////
  public function replacesubcategory()
  {
  $cat_id = $this->input->get('ctgry'); ?>

  <option>Select Sub Category</option>
  <?php
  $this->db->select('id,subcategory_name');
  $subcategory_query = $this->db->get_where('subcategory_master',array('category_id'=>$cat_id))->result_array();
  foreach($subcategory_query as $sub)
  {
  ?>
  <option value="<?=$sub['id']?>"><?=$sub['subcategory_name']?></option>

  <?php }  
  }
    public function replacesubsubcategory()
    {
    $subcat_id = $this->input->get('subct'); 
    $sub_qry=$this->db->get_where('child_sub_master',array('subcategory_id'=>$subcat_id));
    $count=$sub_qry->num_rows();
    if($count != 0)
    {
    ?>
  
    <label for="exampleFormControlSelect2">Sub Category</label>
    <select name="subchildcategory_id" id="subchildcategory_id" class="form-control mdb-select2">
    <option>Select Sub Sub Category</option>
    <?php
    $this->db->select('id,child_sub_name');
    $subchild_query = $this->db->get_where('child_sub_master',array('subcategory_id'=>$subcat_id))->result_array();
    
    foreach($subchild_query as $subchild)
    {
    ?>
    <option value="<?=$subchild['id']?>"><?=$subchild['child_sub_name']?></option>
    <?php } ?>
    </select>
    <script type="text/javascript">
    $(".mdb-select2").select2({

    });
    </script>
<?php } }
  public function replaceadditional()
  {
  $cat_id = $this->input->get('cat'); 
  $add_qry=$this->db->get_where('additional_data_master',array('sub_category_id'=>$cat_id));
  $count=$add_qry->num_rows();
  $ch=$this->db->get_where('child_sub_master',array('subcategory_id'=>$cat_id))->result_array();

  if($count!=0)
  {?>

  <h6 class="post-details-title">Additional Details</h6>
  <div class="post-details-form">
  <div class="row">
  <?php
  foreach ($add_qry->result_array() as $add) 
  {
  $dt=str_replace("_"," ",$add['meta_key']);
  ?>
  <div class="col col-md-6">
  <label><?=$dt;?></label>

  <?php 
  if($dt=='Rent')
  {
  ?>
 
  <input type="hidden" name="meta_key[]" value="<?=$add['meta_key'];?>" id="subject-1">
  <input type="<?=$add['meta_type'];?>" name="meta_value<?=$add['meta_key'];?>" class="form-control" placeholder="Enter <?=$dt;?>..">
  <span style="margin-left: 5px;color: blue;">per/month</span>

  <?php } ?>
  <?php 
  if($dt=='Number Of Bedrooms')
  {
  ?>

  <input type="hidden" name="meta_key[]" value="<?=$add['meta_key'];?>" id="subject-1">
  <!--  <input type="<?=$add['meta_type'];?>" name="meta_value<?=$add['meta_key'];?>" id="subject-1" placeholder="Enter <?=$dt;?>.."> -->
  <select name="meta_value<?=$add['meta_key'];?>" class="form-control" style="height: 50px;">
  <option>Select</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option> 
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10">10</option>
  <option value="11">11</option>
  </select>

  <?php } ?>
  <?php 
  if($dt=='Number Of Car Park')
  {
  ?>

  <input type="hidden" name="meta_key[]" value="<?=$add['meta_key'];?>" id="subject-1">
  <!--  <input type="<?=$add['meta_type'];?>" name="meta_value<?=$add['meta_key'];?>" id="subject-1" placeholder="Enter <?=$dt;?>.."> -->
  <select name="meta_value<?=$add['meta_key'];?>" class="form-control" style="height: 50px;">
  <option>Select</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option> 
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10">10</option>
  <option value="11">11</option>
  </select>

  <?php } ?>
  <?php 
  if($dt=='Number Of Bathrooms')
  {
  ?>
 
  <input type="hidden" name="meta_key[]" value="<?=$add['meta_key'];?>" id="subject-1">
  <!--  <input type="<?=$add['meta_type'];?>" name="meta_value<?=$add['meta_key'];?>" id="subject-1" placeholder="Enter <?=$dt;?>.."> -->
  <select name="meta_value<?=$add['meta_key'];?>" class="form-control" style="height: 50px;">
  <option>Select</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option> 
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10">10</option>
  <option value="11">11</option>
  </select>

  <?php } ?>
  <?php 
  if($dt=='Number Of Toilets')
  {
  ?>

  <input type="hidden" name="meta_key[]" value="<?=$add['meta_key'];?>" id="subject-1">
  <!--  <input type="<?=$add['meta_type'];?>" name="meta_value<?=$add['meta_key'];?>" id="subject-1" placeholder="Enter <?=$dt;?>.."> -->
  <select name="meta_value<?=$add['meta_key'];?>" class="form-control" style="height: 50px;">
  <option>Select</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option> 
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10">10</option>
  <option value="11">11</option>
  </select>
 
  <?php } ?>
  <?php 
  if($dt=='Land Size')
  {
  ?>

  <input type="hidden" name="meta_key[]" value="<?=$add['meta_key'];?>" id="subject-1">
  <input type="<?=$add['meta_type'];?>" name="meta_value<?=$add['meta_key'];?>" class="form-control" placeholder="Enter <?=$dt;?>.."><span style="margin-left: 5px;
  color: blue;">m²</span>

  <?php } ?>
  <?php 
  if($dt=='House Size')
  {
  ?>
 
  <input type="hidden" name="meta_key[]" value="<?=$add['meta_key'];?>" id="subject-1">
  <input type="<?=$add['meta_type'];?>" name="meta_value<?=$add['meta_key'];?>" class="form-control" placeholder="Enter <?=$dt;?>.."><span style="margin-left: 5px;
  color: blue;">m²</span>

  <?php } ?>
  <?php 
  if($dt=='Mileage')
  {
  ?>
  
  <input type="hidden" name="meta_key[]" value="<?=$add['meta_key'];?>" id="subject-1">
  <input type="<?=$add['meta_type'];?>" name="meta_value<?=$add['meta_key'];?>" class="form-control" placeholder="Enter <?=$dt;?>.."><span style="margin-left: 5px;
  color: blue;">kms</span>

  <?php } ?>
  <?php 
  if($dt=='Body type')
  {
  ?>

  <input type="hidden" name="meta_key[]" value="<?=$add['meta_key'];?>" id="subject-1">
  <!--  <input type="<?=$add['meta_type'];?>" name="meta_value<?=$add['meta_key'];?>" id="subject-1" placeholder="Enter <?=$dt;?>.."> -->
  <select name="meta_value<?=$add['meta_key'];?>" class="form-control" style="height: 50px;">
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
  </select>
 
  <?php } ?>
  <?php 
  if($dt=='Fuel')
  {
  ?>
 
  <input type="hidden" name="meta_key[]" value="<?=$add['meta_key'];?>" id="subject-1">
  <!--  <input type="<?=$add['meta_type'];?>" name="meta_value<?=$add['meta_key'];?>" id="subject-1" placeholder="Enter <?=$dt;?>.."> -->
  <select name="meta_value<?=$add['meta_key'];?>" class="form-control" style="height: 50px;">
  <option value="">Please Select</option>
  <option value="petrol">Petrol</option>
  <option value="diesel">Diesel</option>
  <option value="lpg/autogas">Lpg/Autogas</option>
  <option value="elctric">Elctric</option>
  <option value="hybrid">Hybrid</option>
  <option value="hydrogen">Hydrogen</option> 
  </select>

  <?php } ?>
  <?php 
  if($dt=='Color')
  {
  ?>
  
  <input type="hidden" name="meta_key[]" value="<?=$add['meta_key'];?>" id="subject-1">
  <!--  <input type="<?=$add['meta_type'];?>" name="meta_value<?=$add['meta_key'];?>" id="subject-1" placeholder="Enter <?=$dt;?>.."> -->
  <select name="meta_value<?=$add['meta_key'];?>" class="form-control" style="height: 50px;">
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
  
  <?php } ?>
  <?php 
  if($dt=='Condition')
  {
  ?>
  
  <input type="hidden" name="meta_key[]" value="<?=$add['meta_key'];?>" id="subject-1">
  <input type="radio" name="meta_value<?=$add['meta_key'];?>" value="used" style="width: 9%;">Used
  <input type="radio" name="meta_value<?=$add['meta_key'];?>" value="new" style="width: 9%;">New

  <?php } ?>
  <?php 
  if($dt=='Transmission')
  {
  ?>

  <input type="hidden" name="meta_key[]" value="<?=$add['meta_key'];?>" id="subject-1">
  <input type="radio" name="meta_value<?=$add['meta_key'];?>" value="autometic" style="width: 9%;">Autometic
  <input type="radio" name="meta_value<?=$add['meta_key'];?>" value="manual" style="width: 9%;">Manual

  <?php } ?>
  <?php 
  if($dt=='Year')
  {
  ?>
 
  <input type="hidden" name="meta_key[]" value="<?=$add['meta_key'];?>" id="subject-1">
  <!--  <input type="<?=$add['meta_type'];?>" name="meta_value<?=$add['meta_key'];?>" id="subject-1" placeholder="Enter <?=$dt;?>.."> -->
  <select name="meta_value<?=$add['meta_key'];?>" class="form-control" style="height: 50px;">
  <option value="">Please Select</option>
  <option value="1950">1950</option>
  <option value="1951">1951</option>
  <option value="1952">1952</option>
  <option value="1952">1952</option>
  <option value="1953">1953</option>
  <option value="1952">1954</option>
  <option value="1952">1955</option>
  <option value="1952">1956</option>
  <option value="1952">1957</option>
  <option value="1952">1958</option>
  <option value="1952">1959</option>
  <option value="1952">1960</option>
  <option value="1952">1961</option>
  <option value="1952">1962</option>
  <option value="1952">1963</option>
  <option value="1952">1964</option>
  <option value="1952">1965</option>
  <option value="1952">1966</option>
  <option value="1952">1967</option>
  <option value="1952">1968</option>
  <option value="1952">1969</option>
  <option value="1952">1970</option>
  <option value="1952">1971</option>
  <option value="1952">1972</option>
  <option value="1952">1973</option>
  <option value="1952">1974</option>
  <option value="1952">1975</option>
  <option value="1952">1976</option>
  <option value="1952">1977</option>
  <option value="1952">1978</option>
  <option value="1952">1979</option>
  <option value="1952">1980</option>

  <option value="1980">1981</option>
  <option value="1980">1982</option>
  <option value="1980">1983</option>
  <option value="1980">1984</option>
  <option value="1985">1985</option>
  <option value="1980">1986</option>
  <option value="1980">1987</option>
  <option value="1980">1988</option>
  <option value="1980">1989</option>

  <option value="1990">1990</option>
  <option value="1990">1991</option>
  <option value="1990">1992</option>
  <option value="1990">1993</option>
  <option value="1990">1994</option>
  <option value="1995">1995</option>
  <option value="1995">1996</option>
  <option value="1995">1997</option>
  <option value="1995">1998</option>
  <option value="1995">1999</option>

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
  
  <?php } ?>
  <?php 

  if($dt=='Bust')
  {
  ?>
  
  <input type="hidden" name="meta_key[]" value="<?=$add['meta_key'];?>" id="subject-1">
  <!--  <input type="<?=$add['meta_type'];?>" name="meta_value<?=$add['meta_key'];?>" id="subject-1" placeholder="Enter <?=$dt;?>.."> -->
  <select name="meta_value<?=$add['meta_key'];?>" class="form-control" style="height: 50px;">
  <option value="">Please Select</option>
  <option value="man">I am a Man</option>
  <option value="A Cup">A Cup</option>
  <option value="B Cup">B Cup</option>
  <option value="C Cup">C Cup</option>
  <option value="D Cup">D Cup</option>
  <option value="DD Cup">DD Cup</option>
  <option value="DDD Cup">DDD Cup</option>

  </select>
  
  <?php } ?>
  <?php 
  if($dt=='Gender')
  {
  ?>
  
  <input type="hidden" name="meta_key[]" value="<?=$add['meta_key'];?>" id="subject-1">
  <input type="radio"  name="meta_value<?=$add['meta_key'];?>" value="Male" style="width: 9%;">Male
  <input type="radio"  name="meta_value<?=$add['meta_key'];?>" value="Female" style="width: 9%;">Female
  <input type="radio"  name="meta_value<?=$add['meta_key'];?>" value="Other" style="width: 9%;">Other

  <?php } ?>
  <?php 
  if($dt=='Air conditioning')
  {
  ?>
  
  <input type="hidden" name="meta_key[]" value="<?=$add['meta_key'];?>" id="subject-1">
  <input type="radio"  name="meta_value<?=$add['meta_key'];?>" value="Yes" style="width: 9%;">Yes
  <input type="radio"  name="meta_value<?=$add['meta_key'];?>" value="No" style="width: 9%;">No


  <?php } ?>
  <?php 
  if($dt=='Make')
  {
  ?>
  <!--  <div class="col-sm-9" id="own_show"> -->
 
  <input type="hidden" name="meta_key[]" value="<?=$add['meta_key'];?>" id="subject-1">

  <!-- <input list="datamodel" name="meta_value<?=$add['meta_key'];?>" class="subject-1" placeholder="Select Make.." id="own_value"> -->
  <input list="datamodel" name="meta_value<?=$add['meta_key'];?>" class="form-control" placeholder="Select Make..">
  <datalist id="datamodel">

  <?php
  $this->db->select('make');
  $this->db->distinct();
  $qry=$this->db->get('make_model_master')->result_array();
  foreach ($qry as $qr) {

  ?>
  <option value="<?=$qr['make'];?>"><?=$qr['make'];?></option>
  <?php } ?>
  </datalist>
  <!-- <span id="add_own" onclick="showhide()" style="cursor: pointer;">Add Your Own</span> -->

 
  <!--   <div class="col-sm-9" id="own_show_clone" style="display: none;">

  <input type="hidden" name="meta_key[]" value="<?=$add['meta_key'];?>" id="subject-1">
  <input name="meta_value<?=$add['meta_key'];?>" class="subject-1" placeholder="Select own Make..">

  </div> -->
  <?php } ?>
  <?php 
  if($dt=='Model')
  {
  ?>
  <!-- <div class="col-sm-9" id="own_show1"> -->
 
  <input type="hidden" name="meta_key[]" value="<?=$add['meta_key'];?>" id="subject-1">

  <input list="datamodel2" name="meta_value<?=$add['meta_key'];?>" class="form-control" placeholder="Select Model..">
  <datalist id="datamodel2">

  <?php

  $qry2=$this->db->get('make_model_master')->result_array();
  foreach ($qry2 as $qr1) {

  ?>
  <option value="<?=$qr1['model'];?>"><?=$qr1['model'];?></option>
  <?php } ?>
  </datalist>


  <!--  <div class="col-sm-9" id="own_show1_clone" style="display: none;">

  <input type="hidden" name="meta_key[]" value="<?=$add['meta_key'];?>" id="subject-1">

  <input name="meta_value<?=$add['meta_key'];?>" class="subject-1" placeholder="Select own Model..">

  </div> -->

  <?php } ?>
  <?php 
  if($dt=='Boat Type')
  {
  ?>
 
  <input type="hidden" name="meta_key[]" value="<?=$add['meta_key'];?>" id="subject-1">
  <!--  <input type="<?=$add['meta_type'];?>" name="meta_value<?=$add['meta_key'];?>" id="subject-1" placeholder="Enter <?=$dt;?>.."> -->
  <select name="meta_value<?=$add['meta_key'];?>" class="form-control" style="height: 50px;">
  <option value="">Please Select</option>
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
 
  <?php } ?>
  <?php 
  if($dt=='Available From')
  {
  ?>
 
  <input type="hidden" name="meta_key[]" value="<?=$add['meta_key'];?>" id="subject-1">
  <input type="time" name="meta_value<?=$add['meta_key'];?>" class="form-control" >

  <?php } ?>
  <?php 
  if($dt=='Available To')
  {
  ?>
 
  <input type="hidden" name="meta_key[]" value="<?=$add['meta_key'];?>" id="subject-1">
  <input type="time" name="meta_value<?=$add['meta_key'];?>"  class="form-control">

  <?php } ?>
  <?php 
  if($dt=='Eyes')
  {
  ?>
 
  <input type="hidden" name="meta_key[]" value="<?=$add['meta_key'];?>" id="subject-1">
  <select name="meta_value<?=$add['meta_key'];?>" class="form-control" style="height: 50px;">
  <option value="">Select</option>
  <option value="Brown Eyes">Brown Eyes</option>
  <option value="Blue Eyes">Blue Eyes</option>
  <option value="Gray Eyes">Gray Eyes</option>
  <option value="Hazel Eyes">Hazel Eyes</option>
  <option value="Green Eyes">Green Eyes</option>
  <option value="Amber Eyes">Amber Eyes</option>
  </select>

  <?php } ?>
  <?php 
  if($dt=='Height')
  {
  ?>
 
  <input type="hidden" name="meta_key[]" value="<?=$add['meta_key'];?>" id="subject-1">
  <select name="meta_value<?=$add['meta_key'];?>" class="form-control" style="height: 50px;">
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


  <?php } ?>
  <?php 
  if($dt=='Race')
  {
  ?>

  <input type="hidden" name="meta_key[]" value="<?=$add['meta_key'];?>" id="subject-1">
  <select name="meta_value<?=$add['meta_key'];?>" class="form-control" style="height: 50px;">
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


  <?php } ?>
  <?php 
  if($dt=='Age')
  {
  ?>
  
  <input type="hidden" name="meta_key[]" value="<?=$add['meta_key'];?>" id="subject-1">
  <input type="number" min="18" name="meta_value<?=$add['meta_key'];?>" class="form-control" placeholder="Enter <?=$dt;?>.." required>
  <p class="pt-1" style="color: deeppink;font-weight: 600;">You Must Be Over 18 Years Of Age *</p>

  <?php } ?>
  <?php 
  if($dt!='Rent' && $dt!='Body type' && $dt!='Condition' && $dt!='Color' && $dt!='Number Of Bedrooms' && $dt!='Land Size'  && $dt!='House Size' && $dt!='Fuel' && $dt!='Mileage' && $dt!='Year' && $dt!='Transmission' && $dt!='Bust' && $dt!='Gender' && $dt!='Number Of Bathrooms' && $dt!='Number Of Toilets' && $dt!='Air conditioning'  && $dt!='Number Of Car Park' && $dt!='Make' && $dt!='Model' && $dt!='Boat Type' && $dt!='Available From' && $dt!='Available To' && $dt!='Eyes' && $dt!='Height' && $dt!='Race' && $dt!='Age')
  {
  ?>

  <input type="hidden" name="meta_key[]" value="<?=$add['meta_key'];?>" id="subject-1">
  <input type="<?=$add['meta_type'];?>" name="meta_value<?=$add['meta_key'];?>" class="form-control" placeholder="Enter <?=$dt;?>..">

  <?php } ?>
  </div>
 
  <?php 
  }?>

  <?php }
  }
  /////////////////////////////////
  public function add()
  {
    $country=$this->input->post('country');
    $category=$this->input->post('category_id');
    if($country=='United States' && $category==10)
    {
      $this->session->set_flashdata('err','Sorry!! You Can Not Post Ad In This Country For Personal');
      redirect(base_url().'postad');
    }
    $upload_dir= 'upload/';
    $temp_error = $_FILES['ad_image']['error'];

    $file_name  = time().'_'.$_FILES['ad_image']['name']; 
    $tmp_name   = $_FILES['ad_image']['tmp_name'];
    $file_size  = $_FILES['ad_image']['size'];

    move_uploaded_file($tmp_name,$upload_dir.$file_name);

    // $file_name = time().'_'.$_FILES['ad_image']['name'];
    // $config['image_library'] = 'gd2';
    // $config['source_image'] = $_FILES['ad_image']['tmp_name'];
    // $config['create_thumb'] = FALSE;
    // $config['maintain_ratio'] = FALSE;
    // $config['width'] = 300;
    // $config['height'] = 300;
    // $config['new_image'] = 'upload/' . $file_name;
    // $this->load->library('image_lib', $config);
    // $this->image_lib->resize();

    $fl_name='https://backpageclassifieds.com/upload/'.$file_name;

    if($_FILES['video']['name']!='')
    {
          $upload_dir= 'video/';
          $temp_error = $_FILES['video']['error'];

          $video_name  = time().'_'.$_FILES['video']['name']; 
          $tmp_name   = $_FILES['video']['tmp_name'];
          $file_size  = $_FILES['video']['size'];

          move_uploaded_file($tmp_name,$upload_dir.$video_name);

          $vid_name='https://backpageclassifieds.com/video/'.$video_name;
    }
    if($_FILES['video']['name']=='')
    {
          $vid_name='';
    }
    
      $det=$this->db->get_where('backpage_postad_api',array('active'=>'Y'))->row();
      $queryString = http_build_query([
      'access_key' => $det->api_key,
      'query' => $this->input->post('location'),
      'output' => 'json',
      'limit' => 1,
      ]);

      $ch = curl_init(sprintf('%s?%s', 'http://api.positionstack.com/v1/forward', $queryString));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      $json = curl_exec($ch);

      curl_close($ch);

      $apiResult = json_decode($json, true);
  
    $date=date('Y-m_d');
    $data = array(
    'user_id'=>$this->session->userdata('login_id'),
    'country'=>$this->input->post('country'),
    'state'=>$this->input->post('state'),
    'city'=>$this->input->post('city'),
    'zip_code'=>$this->input->post('zip_code'),
    'category_id'=>$this->input->post('category_id'),
    'subcat_id'=>$this->input->post('subcategory_id'),
    'sub_child_id'=>$this->input->post('subchildcategory_id'),
    'ad_title'=>addslashes(utf8_encode($this->input->post('ad_title'))),
    'ad_description'=>$this->input->post('description'),
    'ad_image'=>$fl_name,
    'ad_video'=>$vid_name,
    'location'=>$this->input->post('location'),
    'latitude'=>$apiResult['data'][0][latitude],
    'longitude'=>$apiResult['data'][0][longitude],
    'Web_link'=>$this->input->post('website'),
    'contact_number'=>$this->input->post('phone_number'),
    'email_address'=>$this->input->post('email'),
    'posted_date'=>$date,
    // 'status'=>'Active'
    );  
    $result = $this->db->insert('ad_master', $data);
    $ad_id=$this->db->insert_id();
    // echo "<pre>";
    // print_r($data);
    // exit();
    foreach($_FILES['gallery_image']['tmp_name'] as $key => $image)
    {

    $file_name2  = time().'_'.$_FILES['gallery_image']['name'][$key]; 
    $tmp_name   = $_FILES['gallery_image']['tmp_name'][$key];
    $temp_error = $_FILES['gallery_image']['error'][$key]; 
    $file_size  = $_FILES['gallery_image']['size'][$key];
    $upload_dir= 'detailsimage/';
    move_uploaded_file($tmp_name,$upload_dir.$file_name2); 
   
    $data3=array(
    'ad_id'=>$ad_id,
    'ad_details_image'=>'https://backpageclassifieds.com/detailsimage/'.$file_name2,
    );
    $result3=$this->db->insert('details_image_master',$data3);

    }    
    
      if($category==5 || $category==7 || $category==8 || $category==9 || $category==10 || $category==11 || $category==14)
      {
      $this->session->set_userdata('ad_id',$ad_id);
      redirect(base_url().'postad/additional/'.$ad_id);
      }
      elseif($category==6 || $category==12)
      {
      $this->session->set_userdata('ad_id',$ad_id);
      redirect(base_url().'bestview?all=1');
      }
     else
      {
      $this->session->set_userdata('ad_id',$ad_id);
      redirect(base_url().'bestview?all=1');
      }
         
   
  }
  public function additional()
  {
    $this->load->view('inc/header');
    $this->load->view('inc/postadheader');
    $this->load->view('additionallist');
    $this->load->view('inc/footer');
    $this->load->view('inc/postadfooter');
  }
   public function editadditional()
  {
    $this->load->view('inc/header');
    $this->load->view('inc/postadheader');
    $this->load->view('editadditional');
    $this->load->view('inc/footer');
    $this->load->view('inc/postadfooter');
  }
  public function addadditionallist($ad_id)
  {
    $this->session->set_userdata('ad_id',$ad_id);
    $this->db->select('category_id');
    $ad=$this->db->get_where('ad_master',array('id'=>$ad_id))->row();
    $category=$ad->category_id;
    
    // echo $ad_id;
    // exit();
    if($category==5)
    {
      $additional=array(
        'ad_id'=>$ad_id,
        'ad_date'=>date('Y-m-d'),
        'class_date'=>$this->input->post('class_date'),
      );
      $add_result=$this->db->insert('classes_addtional',$additional);
    }
    
    if($category==7)
    {
      $additional=array(
        'ad_id'=>$ad_id,
        'ad_date'=>date('Y-m-d'),
        'event_date'=>$this->input->post('event_date'),
      );
      $add_result=$this->db->insert('events_additional',$additional);
    }
    if($category==8)
    {
    
      $additional=array(
        'ad_id'=>$ad_id,
        'ad_date'=>date('Y-m-d'),
        'price'=>$this->input->post('forsale_price'),
        'price_type'=>$this->input->post('forsale_price_type'),
        'conditions'=>($this->input->post('forsale_condition')!='') ? $this->input->post('forsale_condition'):'',
      );
      $add_result=$this->db->insert('for_sale_additional',$additional);
    }
    if($category==9)
    {
      $additional=array(
        'ad_id'=>$ad_id,
        'ad_date'=>date('Y-m-d'),
        'opening_date'=>$this->input->post('opening_date'),
        'closing_date'=>$this->input->post('closing_date'),
      );
      $add_result=$this->db->insert('job_additional',$additional);
    }
    if($category==10)
    {
      $additional=array(
        'ad_id'=>$ad_id,
        'ad_date'=>date('Y-m-d'),
        'gender'=>($this->input->post('gender')!='') ? $this->input->post('gender'):'',
        'age'=>$this->input->post('personal_age'),
        'bust'=>$this->input->post('bust'),
        'eyes'=>$this->input->post('eyes'),
        'height'=>$this->input->post('height'),
        'race'=>$this->input->post('race'),
        'available_from'=>$this->input->post('available_from'),
        'available_to'=>$this->input->post('available_to'),
      );
      $add_result=$this->db->insert('personal_additional',$additional);
    }
    if($category==11)
    {
      $additional=array(
        'ad_id'=>$ad_id,
        'ad_date'=>date('Y-m-d'),
        'property_type'=>($this->input->post('property_type')!='') ?$this->input->post('property_type') : '',
        'bedrooms'=>($this->input->post('bedrooms')!='') ? $this->input->post('bedrooms'): '',
        'bathrooms'=>($this->input->post('bathrooms')!='') ? $this->input->post('bathrooms'): '',
        'parking_space'=>($this->input->post('parking_space')!='') ? $this->input->post('parking_space'):'',
        'building_size'=>($this->input->post('building_size')!='') ? $this->input->post('building_size'): '',
        'land_area'=>($this->input->post('land_area')!='') ? $this->input->post('land_area'): '',
        // 'property_feature'=>($this->input->post('property_feature')!='') ? implode(",", $this->input->post('property_feature')):'',
        // 'available_from'=>$this->input->post('real_available_from'),
        'price'=>($this->input->post('real_price')!='') ? $this->input->post('real_price') : '',
        'price_type'=>($this->input->post('real_price_type')!='') ? $this->input->post('real_price_type') : '',
        'price_time'=>($this->input->post('real_price_time')!='') ? $this->input->post('real_price_time') : '',
        'bond_price'=>($this->input->post('bond_price')!='') ? $this->input->post('bond_price') : '',
        'bond_price_type'=>($this->input->post('bond_price')!='') ? $this->input->post('bond_price_type') : '',

      );
    
      $add_result=$this->db->insert('real_estate_additional',$additional);
    }
   
     if($category==14)
    {
      $additional=array(
        'ad_id'=>$ad_id,
        'ad_date'=>date('Y-m-d'),
        'make'=>$this->input->post('make'),
        'model'=>$this->input->post('model'),
        'vehicle_year'=>$this->input->post('vehicle_year'),
        'sale_price'=>$this->input->post('sale_price'),
        'sale_price_type'=>$this->input->post('sale_price_type'),
        'vehicle_condition'=>($this->input->post('vehicle_condition')!='')?$this->input->post('vehicle_condition'):'',
        'mileage'=>$this->input->post('mileage'),
        'mileage_type'=>$this->input->post('mileage_type'),
        'color'=>$this->input->post('color'),
        'body_type'=>$this->input->post('body_type'),
        'car_register'=>($this->input->post('car_register')!='')?$this->input->post('car_register'):'',
        'register_plate_number'=>$this->input->post('register_plate_number'),
        'wheel_tyres'=>($this->input->post('wheel_tyres')!='')? $this->input->post('wheel_tyres'): '',
        'light_window'=>($this->input->post('light_window')!='')?$this->input->post('light_window') : '',
        'comfort'=>($this->input->post('comfort')!='')? $this->input->post('comfort'): '',
        'instrument'=>($this->input->post('instrument')!='')? $this->input->post('instrument'): '',
        'interior'=>($this->input->post('interior')!='')?$this->input->post('interior') : '',
        'fuel'=>($this->input->post('fuel')!='')? $this->input->post('fuel'): '',
        'safety'=>($this->input->post('safety')!='')? $this->input->post('safety'): '',
        'communication'=>($this->input->post('communication')!='')? $this->input->post('communication') : '',
        'exterior'=>($this->input->post('exterior')!='')?$this->input->post('exterior') : '',

      );
      $add_result=$this->db->insert('vehicle_additional',$additional);
    }
    redirect(base_url().'bestview?all=1');

  }
  public function editadditionallist($ad_id)
  {
    $this->db->select('category_id');
    $ad=$this->db->get_where('ad_master',array('id'=>$ad_id))->row();
    $category=$ad->category_id;
    echo $ad_id;
    // exit();
    if($category==5)
    {
      $check=$this->db->get_where('classes_addtional',array('ad_id'=>$ad_id))->num_rows();
      if($check==0)
      {
        $additional=array(
        'ad_id'=>$ad_id,
        'ad_date'=>date('Y-m-d'),
        'class_date'=>$this->input->post('class_date'),
      );
      $add_result=$this->db->insert('classes_addtional',$additional);
      }else{

      $additional=array(
        'ad_date'=>date('Y-m-d'),
        'class_date'=>$this->input->post('class_date'),
      );
      $this->db->where('ad_id',$ad_id);
      $add_result=$this->db->update('classes_addtional',$additional);
    }
    }
    
    if($category==7)
    {
      $check=$this->db->get_where('events_additional',array('ad_id'=>$ad_id))->num_rows();
      if($check==0)
      {
        $additional=array(
        'ad_id'=>$ad_id,
        'ad_date'=>date('Y-m-d'),
        'event_date'=>$this->input->post('event_date'),
      );
      $add_result=$this->db->insert('events_additional',$additional);
      }else{

      $additional=array(
        'ad_date'=>date('Y-m-d'),
        'event_date'=>$this->input->post('event_date'),
      );
      $this->db->where('ad_id',$ad_id);
      $add_result=$this->db->update('events_additional',$additional);
    }
    }
    if($category==8)
    {
      $check=$this->db->get_where('for_sale_additional',array('ad_id'=>$ad_id))->num_rows();
      if($check==0)
      {
        $additional=array(
        'ad_id'=>$ad_id,
        'ad_date'=>date('Y-m-d'),
         'price'=>$this->input->post('forsale_price'),
        'price_type'=>$this->input->post('forsale_price_type'),
        'conditions'=>($this->input->post('forsale_condition')!='') ? $this->input->post('forsale_condition'):'',
      );
      $add_result=$this->db->insert('for_sale_additional',$additional);
      }else{
      $additional=array(
        'ad_date'=>date('Y-m-d'),
         'price'=>$this->input->post('forsale_price'),
        'price_type'=>$this->input->post('forsale_price_type'),
        'conditions'=>($this->input->post('forsale_condition')!='') ? $this->input->post('forsale_condition'):'',
      );
      $this->db->where('ad_id',$ad_id);
      $add_result=$this->db->update('for_sale_additional',$additional);
    }
    }
    if($category==9)
    {
      $check=$this->db->get_where('job_additional',array('ad_id'=>$ad_id))->num_rows();
      if($check==0)
      {
         $additional=array(
        'ad_id'=>$ad_id,
        'ad_date'=>date('Y-m-d'),
        'opening_date'=>$this->input->post('opening_date'),
        'closing_date'=>$this->input->post('closing_date'),
      );
      $add_result=$this->db->insert('job_additional',$additional);
      }else{
        $additional=array(
        'ad_date'=>date('Y-m-d'),
        'opening_date'=>$this->input->post('opening_date'),
        'closing_date'=>$this->input->post('closing_date'),
      );
      $this->db->where('ad_id',$ad_id);
      $add_result=$this->db->update('job_additional',$additional);
      }
      
    }
    if($category==10)
    {
      $check=$this->db->get_where('personal_additional',array('ad_id'=>$ad_id))->num_rows();
      if($check==0)
      {
        $additional=array(
        'ad_id'=>$ad_id,
        'ad_date'=>date('Y-m-d'),
        'gender'=>($this->input->post('gender')!='') ? $this->input->post('gender'):'',
        'age'=>$this->input->post('personal_age'),
        'bust'=>$this->input->post('bust'),
        'eyes'=>$this->input->post('eyes'),
        'height'=>$this->input->post('height'),
        'race'=>$this->input->post('race'),
        'available_from'=>$this->input->post('available_from'),
        'available_to'=>$this->input->post('available_to'),
      );
      $add_result=$this->db->insert('personal_additional',$additional);
      }else{

      $additional=array(
        'ad_date'=>date('Y-m-d'),
       'gender'=>($this->input->post('gender')!='') ? $this->input->post('gender'):'',
        'age'=>$this->input->post('personal_age'),
        'bust'=>$this->input->post('bust'),
        'eyes'=>$this->input->post('eyes'),
        'height'=>$this->input->post('height'),
        'race'=>$this->input->post('race'),
        'available_from'=>$this->input->post('available_from'),
        'available_to'=>$this->input->post('available_to'),
      );
      $this->db->where('ad_id',$ad_id);
      $add_result=$this->db->update('personal_additional',$additional);
    }
    }
     if($category==11)
    {
      $check=$this->db->get_where('real_estate_additional',array('ad_id'=>$ad_id))->num_rows();
      if($check==0)
      {
        $additional=array(
        'ad_id'=>$ad_id,
        'ad_date'=>date('Y-m-d'),
        'property_type'=>$this->input->post('property_type'),
        'bedrooms'=>$this->input->post('bedrooms'),
        'bathrooms'=>$this->input->post('bathrooms'),
        'parking_space'=>$this->input->post('parking_space'),
        'building_size'=>$this->input->post('building_size'),
        'land_area'=>$this->input->post('land_area'),
        // 'property_feature'=>($this->input->post('property_feature')!='') ? implode(",", $this->input->post('property_feature')):'',
        // 'available_from'=>$this->input->post('real_available_from'),
        'price'=>$this->input->post('real_price'),
        'price_type'=>$this->input->post('real_price_type'),
        'price_time'=>$this->input->post('real_price_time'),
        'bond_price'=>$this->input->post('bond_price'),
        'bond_price_type'=>$this->input->post('bond_price_type'),

      );
      $add_result=$this->db->insert('real_estate_additional',$additional);
      }else{
      $additional=array(
        'ad_date'=>date('Y-m-d'),
        'property_type'=>$this->input->post('property_type'),
        'bedrooms'=>$this->input->post('bedrooms'),
        'bathrooms'=>$this->input->post('bathrooms'),
        'parking_space'=>$this->input->post('parking_space'),
        'building_size'=>$this->input->post('building_size'),
        'land_area'=>$this->input->post('land_area'),
        // 'property_feature'=>($this->input->post('property_feature')!='')?implode(",", $this->input->post('property_feature')):'',
        // 'available_from'=>$this->input->post('real_available_from'),
        'price'=>$this->input->post('real_price'),
        'price_type'=>$this->input->post('real_price_type'),
        'price_time'=>$this->input->post('real_price_time'),
        'bond_price'=>$this->input->post('bond_price'),
        'bond_price_type'=>$this->input->post('bond_price_type'),

      );
      $this->db->where('ad_id',$ad_id);
      $add_result=$this->db->update('real_estate_additional',$additional);
     }
    }
   
     if($category==14)
    {
      $check=$this->db->get_where('vehicle_additional',array('ad_id'=>$ad_id))->num_rows();
      if($check==0)
      {
        $additional=array(
        'ad_id'=>$ad_id,
        'ad_date'=>date('Y-m-d'),
        'make'=>$this->input->post('make'),
        'model'=>$this->input->post('model'),
        'vehicle_year'=>$this->input->post('vehicle_year'),
        'sale_price'=>$this->input->post('sale_price'),
        'sale_price_type'=>$this->input->post('sale_price_type'),
        'vehicle_condition'=>($this->input->post('vehicle_condition')!='')?$this->input->post('vehicle_condition'):'',
        'mileage'=>$this->input->post('mileage'),
        'mileage_type'=>$this->input->post('mileage_type'),
        'color'=>$this->input->post('color'),
        'body_type'=>$this->input->post('body_type'),
        'car_register'=>($this->input->post('car_register')!='')?$this->input->post('car_register'):'',
        'register_plate_number'=>$this->input->post('register_plate_number'),
        'wheel_tyres'=>($this->input->post('wheel_tyres')!='')? $this->input->post('wheel_tyres'): '',
        'light_window'=>($this->input->post('light_window')!='')?$this->input->post('light_window') : '',
        'comfort'=>($this->input->post('comfort')!='')? $this->input->post('comfort'): '',
        'instrument'=>($this->input->post('instrument')!='')? $this->input->post('instrument'): '',
        'interior'=>($this->input->post('interior')!='')?$this->input->post('interior') : '',
        'fuel'=>($this->input->post('fuel')!='')? $this->input->post('fuel'): '',
        'safety'=>($this->input->post('safety')!='')? $this->input->post('safety'): '',
        'communication'=>($this->input->post('communication')!='')? $this->input->post('communication') : '',
        'exterior'=>($this->input->post('exterior')!='')?$this->input->post('exterior') : '',

      );
      $add_result=$this->db->insert('vehicle_additional',$additional);
      }else{
      $additional=array(
        'ad_date'=>date('Y-m-d'),
        'make'=>$this->input->post('make'),
        'model'=>$this->input->post('model'),
        'vehicle_year'=>$this->input->post('vehicle_year'),
        'sale_price'=>$this->input->post('sale_price'),
        'sale_price_type'=>$this->input->post('sale_price_type'),
        'vehicle_condition'=>($this->input->post('vehicle_condition')!='')?$this->input->post('vehicle_condition'):'',
        'mileage'=>$this->input->post('mileage'),
        'mileage_type'=>$this->input->post('mileage_type'),
        'color'=>$this->input->post('color'),
        'body_type'=>$this->input->post('body_type'),
        'car_register'=>($this->input->post('car_register')!='')?$this->input->post('car_register'):'',
        'register_plate_number'=>$this->input->post('register_plate_number'),
        'wheel_tyres'=>($this->input->post('wheel_tyres')!='')? $this->input->post('wheel_tyres'): '',
        'light_window'=>($this->input->post('light_window')!='')?$this->input->post('light_window') : '',
        'comfort'=>($this->input->post('comfort')!='')? $this->input->post('comfort'): '',
        'instrument'=>($this->input->post('instrument')!='')? $this->input->post('instrument'): '',
        'interior'=>($this->input->post('interior')!='')?$this->input->post('interior') : '',
        'fuel'=>($this->input->post('fuel')!='')? $this->input->post('fuel'): '',
        'safety'=>($this->input->post('safety')!='')? $this->input->post('safety'): '',
        'communication'=>($this->input->post('communication')!='')? $this->input->post('communication') : '',
        'exterior'=>($this->input->post('exterior')!='')?$this->input->post('exterior') : '',

      );
      $this->db->where('ad_id',$ad_id);
      $add_result=$this->db->update('vehicle_additional',$additional);
    }
    }
    $this->session->set_flashdata('succ','Thanks!!You Edited Your Ad..');
    redirect(base_url().'myads');
  }

public function edit()
{
    $this->db->select('id,category_id,ad_image,ad_video');
    $product=$this->db->get_where('ad_master',array('id'=>$this->uri->segment(3)))->row();
    $category=$product->category_id;
    $ad_id=$product->id;
    if($_FILES['ad_image']['name']!='')
    {
    $upload_dir= 'upload/';
    // $watermarkImagePath = 'https://backpageclassifieds.com/fontassets/img/logo.png'; 

    $temp_error = $_FILES['ad_image']['error'];

    $file_name  = time().'_'.$_FILES['ad_image']['name']; 
    $tmp_name   = $_FILES['ad_image']['tmp_name'];
    $file_size  = $_FILES['ad_image']['size'];

    move_uploaded_file($tmp_name,$upload_dir.$file_name);

    // $fileName = time().'_'.$_FILES['ad_image']['name']; 
    // $targetFilePath = $upload_dir . $fileName; 
    // $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION); 

    // if(move_uploaded_file($_FILES["ad_image"]["tmp_name"], $targetFilePath)){ 
    //   // Load the stamp and the photo to apply the watermark to 
    //   $watermarkImg = imagecreatefrompng($watermarkImagePath); 
    //   switch($fileType){ 
    //       case 'jpg': 
    //           $im = imagecreatefromjpeg($targetFilePath); 
    //           break; 
    //       case 'jpeg': 
    //           $im = imagecreatefromjpeg($targetFilePath); 
    //           break; 
    //       case 'png': 
    //           $im = imagecreatefrompng($targetFilePath); 
    //           break; 
    //       default: 
    //           $im = imagecreatefromjpeg($targetFilePath); 
    //   } 
       
    //   // Set the margins for the watermark 
    //   $marge_right = 10; 
    //   $marge_bottom = 10; 
       
    //   // Get the height/width of the watermark image 
    //   $sx = imagesx($watermarkImg); 
    //   $sy = imagesy($watermarkImg); 
       
    //   // Copy the watermark image onto our photo using the margin offsets and  
    //   // the photo width to calculate the positioning of the watermark. 
    //   imagecopy($im, $watermarkImg, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($watermarkImg), imagesy($watermarkImg)); 
       
    //   // Save image and free memory 
    //   imagepng($im, $targetFilePath); 
    //   imagedestroy($im); 
  
    // }

    // $file_name = time().'_'.$_FILES['ad_image']['name'];
    // $config['image_library'] = 'gd2';
    // $config['source_image'] = $_FILES['ad_image']['tmp_name'];
    // $config['create_thumb'] = FALSE;
    // $config['maintain_ratio'] = FALSE;
    // $config['width'] = 300;
    // $config['height'] = 300;
    // $config['new_image'] = 'upload/' . $file_name;
    // $this->load->library('image_lib', $config);
    // $this->image_lib->resize();

    $fl_name='https://backpageclassifieds.com/upload/'.$file_name;
    // $fl_name=$targetFilePath;
    }
    if($_FILES['ad_image']['name']=='')
    {
       $fl_name=$product->ad_image;
    }
    if($_FILES['video']['name']!='')
    {
    $upload_dir= 'video/';
    $temp_error = $_FILES['video']['error'];

    $video_name  = time().'_'.$_FILES['video']['name']; 
    $tmp_name   = $_FILES['video']['tmp_name'];
    $file_size  = $_FILES['video']['size'];

    move_uploaded_file($tmp_name,$upload_dir.$video_name);

    $vid_name='https://backpageclassifieds.com/video/'.$video_name;
    }
    if($_FILES['video']['name']=='')
    {
    $vid_name=$product->ad_video;
    }

    $det=$this->db->get_where('backpage_postad_api',array('active'=>'Y'))->row();
    $queryString = http_build_query([
    'access_key' => $det->api_key,
    'query' => $this->input->post('location'),
    'output' => 'json',
    'limit' => 1,
    ]);
     $ch = curl_init(sprintf('%s?%s', 'http://api.positionstack.com/v1/forward', $queryString));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      $json = curl_exec($ch);

      curl_close($ch);

      $apiResult = json_decode($json, true);


    $date=date('Y-m_d');
    $data = array(
    'country'=>$this->input->post('country'),
    'state'=>$this->input->post('state'),
    'city'=>$this->input->post('city'),
    'zip_code'=>$this->input->post('zip_code'),
    'category_id'=>$this->input->post('category_id'),
    'subcat_id'=>$this->input->post('subcategory_id'),
    'sub_child_id'=>$this->input->post('subchildcategory_id'),
    'ad_title'=>addslashes(utf8_encode($this->input->post('ad_title'))),
    'ad_description'=>$this->input->post('description'),
    'ad_image'=>$fl_name,
    'ad_video'=>$vid_name,
    'location'=>$loc->city.",".$loc->country,
    'latitude'=>$apiResult['data'][0][latitude],
    'longitude'=>$apiResult['data'][0][longitude],
    'Web_link'=>$this->input->post('website'),
    'contact_number'=>$this->input->post('phone_number'),
    'email_address'=>$this->input->post('email'),
    'posted_date'=>$date,
    );  
    $this->db->where('id',$product->id);
    $result = $this->db->update('ad_master', $data);
    if($_FILES["gallery_image"]["name"][0] != null)
    {
    $det=$this->db->get_where('details_image_master',array('ad_id'=>$product->id))->result();
    // foreach($det as $val)
    // {
    // unlink(base_url($val->ad_details_image));
    // }
    // $this->db->where('ad_id',$product->id);
    // $res2=$this->db->delete('details_image_master');
    foreach($_FILES['gallery_image']['tmp_name'] as $key => $image)
    {

    $file_name2  = $_FILES['gallery_image']['name'][$key]; 
    $tmp_name   = $_FILES['gallery_image']['tmp_name'][$key];
    $temp_error = $_FILES['gallery_image']['error'][$key]; 
    $file_size  = $_FILES['gallery_image']['size'][$key];
    $upload_dir= 'detailsimage/';
    move_uploaded_file($tmp_name,$upload_dir.$file_name2); 

    $data3=array(
    'ad_id'=>$product->id,
    'ad_details_image'=>'https://backpageclassifieds.com/detailsimage/'.$file_name2,
    );
    $result3=$this->db->insert('details_image_master',$data3);

    }
  }
  
      if($category==5)
      {
      $this->session->set_userdata('ad_id',$ad_id);
      redirect(base_url().'postad/editadditional');
      }
      if($category==6)
      {
      $this->session->set_flashdata('succ','Thanks!!You Edited Your Ad..');
      redirect(base_url().'myads');
      }
      if($category==7)
      {
      $this->session->set_userdata('ad_id',$ad_id);
      redirect(base_url().'postad/editadditional');
      }
      if($category==8)
      {
      $this->session->set_userdata('ad_id',$ad_id);
      redirect(base_url().'postad/editadditional');
      }
      if($category==9)
      {
      $this->session->set_userdata('ad_id',$ad_id);
      redirect(base_url().'postad/editadditional');
      }
      if($category==10)
      {
      $this->session->set_userdata('ad_id',$ad_id);
      redirect(base_url().'postad/editadditional');
      }
      if($category==11)
      {
      $this->session->set_userdata('ad_id',$ad_id);
      redirect(base_url().'postad/editadditional');
      }
      if($category==12)
      {
      $this->session->set_flashdata('succ','Thanks!!You Edited Your Ad..');
      redirect(base_url().'myads');
      }
      if($category==14)
      {
      $this->session->set_userdata('ad_id',$ad_id);
      redirect(base_url().'postad/editadditional');
      }

}
public function makepremiumad()
{
$all=$this->input->get('all');
$date=date('Y-m-d');
$ad_id=$this->uri->segment(3);
$user_id=$this->session->userdata('login_id');
$credit_val=$this->uri->segment(4);
$days=$this->uri->segment(5);

$this->db->select('id,category_id');
$ad=$this->db->get_where('ad_master',array('id'=>$ad_id))->row();
$cat_qryy=$this->db->get_where('category_master',array('id'=>$ad->category_id))->row();
$last_date=date('Y-m-d', strtotime($date. " + {$days} days"));
$this->db->select('id,credit_value');
$serch_qry=$this->db->get_where('user_master',array('id'=>$user_id))->row();
$credit_value=$serch_qry->credit_value;
if ($credit_value!='') 
{
if($credit_value<$credit_val)
{
$this->session->set_flashdata('err','Sorry!!You Have No Enough Credit..');
redirect(base_url().'postad/buycredit?all='.$all);
}else{

$data=array(
'ad_id'=>$ad_id,
'user_id'=>$user_id,
'days'=>$last_date,
'status'=>'Approved'
);

$qr=$this->db->get_Where('premium_ad_details',array('ad_id'=>$ad_id))->num_rows();
if($qr==0)
{
$res=$this->db->insert('premium_ad_details',$data);
}
if($qr!=0)
{
$this->db->delete('premium_ad_details',array('ad_id'=>$ad_id));
$res=$this->db->insert('premium_ad_details',$data);
}
if($res)
{
$cr=$credit_value-$credit_val;
$this->db->set('credit_value',$cr);
$this->db->where('id',$user_id);
$result=$this->db->update('user_master');
if($result)
{

if($cat_qryy->category_name=='PERSONALS')
{
$this->db->set('status','Active');
$this->db->set('photo_varified','H');
$this->db->where('id',$ad_id);
$result22=$this->db->update('ad_master');
$this->session->set_flashdata('succ','Thanks!!You Have Added Your Ad..');
redirect(base_url().'myads');
}
if($cat_qrry->category_name!="PERSONALS")
{
$this->db->set('status','Active');
$this->db->where('id',$ad_id);
$result22=$this->db->update('ad_master');
$this->session->set_flashdata('succ','Thanks!!You Have Added Your Ad..');
redirect(base_url().'myads');
}
}

}
}
}
else
{
$this->session->set_flashdata('err','Sorry!!You Have No Credit Value..');
redirect(base_url().'postad/buycredit?all='.$all);
}

}
  //////////////////////////////
public function makefeaturedad()
{
$all=$this->input->get('all');
$date=date('Y-m-d');
$ad_id=$this->uri->segment(3);
$user_id=$this->session->userdata('login_id');
$credit_val=$this->uri->segment(4);
$days=$this->uri->segment(5);
$this->db->select('id,category_id');
$ad=$this->db->get_where('ad_master',array('id'=>$ad_id))->row();
$cat_qryy=$this->db->get_where('category_master',array('id'=>$ad->category_id))->row();

$last_date=date('Y-m-d', strtotime($date. " + {$days} days"));
$this->db->select('id,credit_value');
$serch_qry=$this->db->get_where('user_master',array('id'=>$user_id))->row();
$credit_value=$serch_qry->credit_value;
if ($credit_value!='') 
{
if($credit_value<$credit_val)
{
$this->session->set_flashdata('err','Sorry!!You Have No Enough Credit..');
redirect(base_url().'postad/buycredit?all='.$all);
}
else{

$data=array(
'ad_id'=>$ad_id,
'user_id'=>$user_id,
'days'=>$last_date,
'status'=>'Approved'
);
$qr=$this->db->get_Where('featured_ad_details',array('ad_id'=>$ad_id))->num_rows();
if($qr==0)
{
$res=$this->db->insert('featured_ad_details',$data);
}
if($qr!=0)
{
$this->db->delete('featured_ad_details',array('ad_id'=>$ad_id));
$res=$this->db->insert('featured_ad_details',$data);
}
if($res)
{
$cr=$credit_value-$credit_val;
$this->db->set('credit_value',$cr);
$this->db->where('id',$user_id);
$result=$this->db->update('user_master');
if($result)
{
// redirect('addpost/addanothercity/'.$ad_id);
if($cat_qryy->category_name=='PERSONALS')
{
$this->db->set('status','Active');
$this->db->set('photo_varified','H');
$this->db->where('id',$ad_id);
$result22=$this->db->update('ad_master');
// redirect('myads');
$this->session->set_flashdata('succ','Thanks!!You Have Added Your Ad..');
redirect(base_url().'myads');
}
if($cat_qrry->category_name!="PERSONALS")
{
$this->db->set('status','Active');
$this->db->where('id',$ad_id);
$result22=$this->db->update('ad_master');
// redirect('myads');
$this->session->set_flashdata('succ','Thanks!!You Have Added Your Ad..');
redirect(base_url().'myads');
}

}

}
}
}
else
{
$this->session->set_flashdata('err','Sorry!!You Have No Credit Value..');
redirect(base_url().'postad/buycredit?all='.$all);
}

}
//////////////////////////////////
public function freead()
{
$ad_id=$this->session->userdata('ad_id');
$this->db->select('id,category_id');
$ad=$this->db->get_where('ad_master',array('id'=>$ad_id))->row();
$cat=$this->db->get_where('category_master',array('id'=>$ad->category_id))->row();
if($cat->category_name=='PERSONALS')
{
$this->db->set('status','Active');
$this->db->set('photo_varified','H');
$this->db->where('id',$ad_id);
$result22=$this->db->update('ad_master');
// redirect('myads');
$this->session->set_flashdata('succ','Thanks!!You Have Added Your Ad..');
redirect(base_url().'myads');
}
if($cat->category_name!="PERSONALS")
{
$this->db->set('status','Active');
$this->db->where('id',$ad_id);
$result22=$this->db->update('ad_master');
// redirect('myads');
$this->session->set_flashdata('succ','Thanks!!You Have Added Your Ad..');
redirect(base_url().'myads');
}
}
/////////////////////////////////
public function redirect()
{
  $type=$this->uri->segment(3);
  $ad_id=$this->uri->segment(4);
  if($type=='Premium')
  {
   $this->session->set_userdata('ad_id',$ad_id);
    redirect(base_url().'bestview?all=2');
  }
  if($type=='Feature')
  {
    $this->session->set_userdata('ad_id',$ad_id);
    redirect(base_url().'bestview?all=3');
  }
  if($type=='Topad')
  {
    $this->session->set_userdata('ad_id',$ad_id);
    redirect(base_url().'topad?all=1');
  }
  if($type=='Available')
  {
    $this->session->set_userdata('ad_id',$ad_id);
    redirect(base_url().'available?all=1');
  }
  if($type=='Adedit')
  {
    $this->session->set_userdata('ad_id',$ad_id);
    redirect(base_url().'myads/edit?adedit=1');
  }
}
/////////////////////////////
public function buycredit()
{
  $this->load->view('inc/header');
  $this->load->view('inc/adbuycreditheader');
  $this->load->view('adbuycredit');
  $this->load->view('inc/footer');
  $this->load->view('inc/adbuycreditfooter');
}
/////////////////////////////////
public function deleteimage()
{
  $ad_id=$this->uri->segment(3);
  $id=$this->uri->segment(4);
  $this->session->set_userdata('ad_id',$ad_id);
  $ad=$this->db->get_where('details_image_master',array('id'=>$id))->row();
  unlink(base_url("detailsimage/".$ad->ad_details_image));

  $this->db->delete('details_image_master',array('id'=>$id));
  redirect(base_url().'myads/edit?adedit=1');
}

} 

 ?>