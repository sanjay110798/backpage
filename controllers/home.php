<?php
   // session_start();
   error_reporting(0);
   if(!defined('BASEPATH')) exit('No direct script access allowed');

   class Home extends CI_Controller
   {
      /**
     * This is default constructor of the class
     */
    public function __construct()
    {
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
    // $this->load->model('Home_model');
    $this->load->library("pagination");
		$this->load->database();
    }
	
  public function coming()
  {
      $this->load->view('comingsoon');
  }
  public function makeLoc()
  {
      $det=$this->db->get_where('backpage_search_api',array('active'=>'Y'))->row();
      $queryString = http_build_query([
      'access_key' => $det->api_key,
      'query' => $this->input->get('location'),
      'output' => 'json',
      'limit' => 5,
      ]);

      $ch = curl_init(sprintf('%s?%s', 'http://api.positionstack.com/v1/forward', $queryString));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      $json = curl_exec($ch);

      curl_close($ch);

      $apiResult = json_decode($json, true);
     
      $html='';
      $html.='<ul class="locationsearch">';
      foreach($apiResult['data'] as $val)
      {
       $html.="<li class='listItem' data-item='".$val[label]."'><i class='fa fa-map-marker' style='color:red;margin-right: 4px;'></i>".$val[label]."</li>";
      } 
      $html.="</ul>";
      echo $html;
  } 
  public function makeLoc2()
  {
      $det=$this->db->get_where('backpage_postad_api',array('active'=>'Y'))->row();
      $queryString = http_build_query([
      'access_key' => $det->api_key,
      'query' => $this->input->get('location'),
      'output' => 'json',
      'limit' => 5,
      ]);

      $ch = curl_init(sprintf('%s?%s', 'http://api.positionstack.com/v1/forward', $queryString));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      $json = curl_exec($ch);

      curl_close($ch);

      $apiResult = json_decode($json, true);
      // print_r($apiResult);
      // exit;
      $html='';
      $html.='<ul class="locationsearch">';
      foreach($apiResult['data'] as $val)
      {
       $html.="<li class='listItem' data-item='".$val[label]."'><i class='fa fa-map-marker' style='color:red;margin-right: 4px;'></i>".$val[label]."</li>";
      } 
      $html.="</ul>";
      echo $html;
  }   
    public function getLocation()
  {
    $loc=$this->input->post("tst");
    $this->db->select('city,country,lat,lng,id');
    $this->db->from('location');
    $this->db->where("city LIKE '%$loc%'");
    $res=$this->db->get();
    $addressList=$res->result();
    
    // echo json_encode($addressList);
    $html='';
    if($this->input->post("tst")!=''){
      foreach($addressList as $ad)
      {
        $html.='<option value="'.$ad->id.'">'.$ad->city.','.$ad->country.'('.$ad->lat.','.$ad->lng.')</option>';
      }
    }
    echo $html;

  }

  public function getCity()
  {
    $list=$this->db->query('SELECT city, COUNT(city) FROM worldcities GROUP BY city HAVING COUNT(city)>1')->result();
    echo "<pre>";
    print_r($list);

  }
  
	public function index()
	{
       
    $date=date('Y-m-d');
    $time=date('H:i:s');

      $this->db->select('ad_master.id,ad_master.ad_image,ad_master.ad_title,ad_master.posted_date,ad_master.user_id,ad_master.category_id,ad_master.country,ad_master.state,ad_master.city');
      $this->db->from('featured_ad_details'); // from Table1
      $this->db->join('ad_master','featured_ad_details.ad_id = ad_master.id','INNER');
      $this->db->where('ad_master.status','Active');
      $this->db->where('ad_master.category_id !=',10);
      $this->db->where('featured_ad_details.days >=',$date);
      $this->db->where('featured_ad_details.status','Approved');
      $this->db->order_by('featured_ad_details.id','desc');
      $this->db->limit(20); // Set Filter
      $ress = $this->db->get();
      $featured_sql=$ress->result();

    $this->db->select('ad_master.id,ad_master.ad_image,ad_master.ad_title,ad_master.posted_date,ad_master.user_id,ad_master.category_id,ad_master.country,ad_master.state,ad_master.city');
    $this->db->from('topad_table'); // from Table1
    $this->db->join('ad_master','topad_table.ad_id = ad_master.id','INNER');
    $this->db->where('ad_master.status','Active');
    $this->db->where('ad_master.category_id !=',10);
    $this->db->where('topad_table.last_date >=',$date);
    $this->db->where('topad_table.ad_time <',$time);
    $this->db->order_by('topad_table.id','desc');
    $this->db->limit(20); // Set Filter
    $res = $this->db->get();
    $topad_qry=$res->result();


    $result['featuredad']=$featured_sql;
    $result['topad']=$topad_qry;

    $this->load->view('inc/backpageheader');
    $this->load->view('inc/backpagehomeheader');
    $this->load->view('backpagehome',$result);
    $this->load->view('inc/backpagefooter');
    $this->load->view('inc/backpagehomefooter');
  }
  //////////////
  public function redesign()
  {
    $this->load->view('inc/redesignheader');
    $this->load->view('inc/redesignhomeheader');
    $this->load->view('redesignhome');
    $this->load->view('inc/redesignfooter');
    $this->load->view('inc/redesignhomefooter');
  }
      public function redesigncategory($cat)
      {
        $name=strtoupper(str_replace("_",' ',$cat));
        $this->db->select('id');
        $ct=$category_qry=$this->db->get_where('category_master',array('category_name'=>$name))->row();
        $category=$ct->id;

        $date=date('Y-m-d');
        $time=date('H:i:s');
        
        $feature=array();
        $premium=array();
        $topad=array();
        $availalbe=array();
        $data=array();

        
        //////////////
        $this->db->select('id,ad_image,ad_title,posted_date,user_id,category_id,country,state,city');
        $this->db->from('ad_master');
        $this->db->where('category_id', $category);
        $this->db->where('status','Active');
        $this->db->where('report_count <','5');
        $cquery=$this->db->get();
        $count=$cquery->num_rows();

        $config = array();
        $config["base_url"] = base_url() . "ad/category/".$cat."?";
        $config["total_rows"] = $count;
        $config["per_page"] = 20;
        $config["uri_segment"] = 4;
        $config['page_query_string'] = TRUE;  
        $this->pagination->initialize($config);

        $page = $this->input->get('per_page');

        $result["links"] = $this->pagination->create_links();

        $this->db->select('id,ad_image,ad_title,posted_date,user_id,category_id,country,state,city');
        $this->db->from('ad_master');
        $this->db->where('category_id', $category);
        $this->db->where('status','Active');
        $this->db->where('report_count <','5');
        $this->db->order_by('id','desc');
        $this->db->limit($config["per_page"], $page);
        $query=$this->db->get();
        $ad=$query->result();

  $this->db->select('ad_master.id,ad_master.ad_image,ad_master.ad_title,ad_master.posted_date,ad_master.user_id,ad_master.category_id,ad_master.country,ad_master.state,ad_master.city,featured_ad_details.ad_id');
  $this->db->from('featured_ad_details'); // from Table1
  $this->db->join('ad_master','featured_ad_details.ad_id = ad_master.id','INNER'); 
  $this->db->where('ad_master.category_id', $category);
  $this->db->where('ad_master.status','Active');
  $this->db->where('ad_master.report_count <','5');
  $this->db->where('featured_ad_details.days >=',$date);
  $this->db->order_by('featured_ad_details.id','desc');
  $this->db->limit($config["per_page"], $page); // Set Filter
  $ress = $this->db->get();
  $featured_sql=$ress->result();


  $datetime=date('Y-m-d H:i:s');
  $this->db->select('ad_master.id,ad_master.ad_image,ad_master.ad_title,ad_master.posted_date,ad_master.user_id,ad_master.category_id,ad_master.country,ad_master.state,ad_master.city,available_table.ad_id');
  $this->db->from('available_table'); // from Table1
  $this->db->join('ad_master','available_table.ad_id = ad_master.id','INNER'); 
  $this->db->where('ad_master.category_id', $category);
  $this->db->where('ad_master.status','Active');
  $this->db->where('ad_master.report_count <','5');
  $this->db->where('available_table.last_datetime >=',$datetime);
  $this->db->order_by('available_table.id','desc');
  $this->db->limit($config["per_page"], $page); // Set Filter
  $ress2 = $this->db->get();
  $available_qry=$ress2->result();


  //////////////////////
  $this->db->select('ad_master.id,ad_master.ad_image,ad_master.ad_title,ad_master.posted_date,ad_master.user_id,ad_master.category_id,ad_master.country,ad_master.state,ad_master.city,premium_ad_details.ad_id');
  $this->db->from('premium_ad_details'); // from Table1
  $this->db->join('ad_master','premium_ad_details.ad_id = ad_master.id','INNER'); 
  $this->db->where('ad_master.category_id', $category);
  $this->db->where('ad_master.status','Active');
  $this->db->where('ad_master.report_count <','5');
  $this->db->where('premium_ad_details.days >=',$date);
  $this->db->order_by('premium_ad_details.id','desc');
  $this->db->limit($config["per_page"], $page); // Set Filter
  $res = $this->db->get();
  $premium_sql=$res->result();

  //////////////////////
  $this->db->select('ad_master.id,ad_master.ad_image,ad_master.ad_title,ad_master.posted_date,ad_master.user_id,ad_master.category_id,ad_master.country,ad_master.state,ad_master.city,topad_table.ad_id');
  $this->db->from('topad_table'); // from Table1
  $this->db->join('ad_master','topad_table.ad_id = ad_master.id','INNER'); 
  $this->db->where('ad_master.category_id', $category);
  $this->db->where('ad_master.status','Active');
  $this->db->where('ad_master.report_count <','5');
  $this->db->where('topad_table.last_date >=',$date);
  $this->db->where('topad_table.ad_time <',$time);
  $this->db->order_by('topad_table.id','desc');
  $this->db->limit($config["per_page"], $page); // Set Filter
  $res2 = $this->db->get();
  $top_sql=$res2->result();

  /////////////////////
  // ///////////
  foreach($ad as $val)
  {

    if (in_array($val->id, $premium_sql['ad_id']))
    {
      $data=[];
    }else{
      $data[]=$val;
    }
  }
  /////////////////

  $result['featuredad']=$featured_sql;
  $result['premiumad']=$premium_sql;
  $result['topad']=$top_sql;
  $result['ad']=$data;
  $result['available']=$available_qry;


  if($category==10){
    $this->load->view('inc/redesignheader');
    $this->load->view('inc/redesignhomeheader');
    $this->load->view('repersonalcategoryadlist',$result);
    $this->load->view('inc/redesignfooter');
    $this->load->view('inc/redesignhomefooter');
  }else{
   
    $this->load->view('inc/redesignheader');
    $this->load->view('inc/redesignhomeheader');
    $this->load->view('redesigncategoryadlist',$result);
    $this->load->view('inc/redesignfooter');
    $this->load->view('inc/redesignhomefooter');
  }
}
  /////////
  public function setcountry()
  {
    $country=$this->input->get('country');
    $this->session->set_userdata('country',$country);
    echo $country;
  }
  public function showadimage()
  {
    $id=$this->input->get('id');
    $this->db->select('ad_image,pic_url');
    $ad=$this->db->get_where('ad_master',array('id'=>$id))->row();
    if($ad->pic_url==1)
    {
      echo base_url()."upload/".$ad->ad_image;
    }
    if($ad->pic_url==2){
      echo $ad->ad_image;
    }
    
  }
  public function showcity()
  {
    $id=$this->input->get('id');
    $this->db->order_by('id','RANDOM');
    $state_qry=$this->db->get_where('cities',array('country_id'=>$id),10)->result_array();
    foreach ($state_qry as $state) {
    $st=str_replace(" ","_",$state['city_name']);
    ?>
     <li><a href="<?php echo base_url();?>ad/city/<?=$st?>" class="city-list"><?=$state['city_name']?></a></li>
  <?php
  } }
  public function continent($name)
  {
    $cntry=$this->db->get_where('continent',array('continent'=>str_replace("_"," ", $name)))->result();
    $result['data']=$cntry;
    $this->load->view('inc/header');
    $this->load->view('inc/homeheader');
    $this->load->view('continentlist',$result);
    $this->load->view('inc/footer');
    $this->load->view('inc/homefooter');
  }

  }

 ?>