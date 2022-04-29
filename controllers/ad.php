<?php
session_start();
error_reporting(0);
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Ad extends CI_Controller
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
      
      public function details($id)
      {

        $this->db->select('id,user_id,country,ad_title,location,ad_image,ad_video,ad_description,web_link,category_id,email_address,contact_number,posted_date');
        $ad=$this->db->get_where('ad_master',array('id'=>$id))->row();
        $result['ad']=$ad;
        $this->load->view('inc/addetailsheader');
        $this->load->view('ad',$result);
        $this->load->view('inc/footer');
        $this->load->view('inc/addetailsfooter');
      }
      public function redisigndetails($id)
      {

        $this->db->select('id,user_id,country,ad_title,location,ad_image,ad_video,ad_description,web_link,category_id,email_address,contact_number,posted_date');
        $ad=$this->db->get_where('ad_master',array('id'=>$id))->row();
        $result['ad']=$ad;
        $this->load->view('inc/redesignaddetailsheader');
        $this->load->view('redesignad',$result);
        $this->load->view('inc/redesignfooter');
        $this->load->view('inc/redesignaddetailsfooter');
      }
      public function updateloc()
      {
        $this->db->limit(100);
        $result=$this->db->get_where('ad_master',array('latitude'=>NULL))->result();
    //     foreach ($result as $key => $value) {
    //       $this->db->set('location',$value->city);
    //       $this->db->where('id',$value->id);
    //       $this->db->update('ad_master');
    //     }
    // echo count($result);
    // exit;
        foreach($result as $res)
        {
          if($res->location!='' || $res->location!=NULL){
            $queryString = http_build_query([
              'access_key' => '0801a580dfa36eb6cc0b3eeb1da03096',
              'query' => $res->country,
              'output' => 'json',
              'limit' => 1,
            ]);

            $ch = curl_init(sprintf('%s?%s', 'http://api.positionstack.com/v1/forward', $queryString));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $json = curl_exec($ch);

            curl_close($ch);

            $apiResult = json_decode($json, true);
            
            $this->db->set('latitude',$apiResult['data'][0][latitude]);
            $this->db->set('longitude',$apiResult['data'][0][longitude]);
    // $this->db->set('location',$res->city);
            $this->db->where('id',$res->id);
            $this->db->update('ad_master');
          }
        }
      }

      public function updateloc2()
      {

        $result=$this->db->get_where('ad_master',array('latitude'=>NULL,'longitude'=>NULL))->result();

        foreach($result as $res)
        {

          $getLoc=$this->db->get_where('ad_master',array('location'=>$res->location))->row();
          $this->db->set('latitude',$getLoc->latitude);
          $this->db->set('longitude',$getLoc->longitude);
          $this->db->where('id',$res->id);
          $this->db->update('ad_master');
          
        }
      }
  //////////////
      public function category($cat)
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
        $this->db->select('id,ad_image,ad_title,posted_date,user_id,category_id,country,state,city,posted_date,contact_number');
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

        $this->db->select('id,ad_image,ad_title,posted_date,user_id,category_id,country,state,city,posted_date,contact_number');
        $this->db->from('ad_master');
        $this->db->where('category_id', $category);
        $this->db->where('status','Active');
        $this->db->where('report_count <','5');
        $this->db->order_by('id','desc');
        $this->db->limit($config["per_page"], $page);
        $query=$this->db->get();
        $ad=$query->result();
       
  $this->db->select('ad_master.id,ad_master.ad_image,ad_master.ad_title,ad_master.posted_date,ad_master.user_id,ad_master.category_id,ad_master.country,ad_master.state,ad_master.city,ad_master.posted_date,ad_master.contact_number,featured_ad_details.ad_id');
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
  $this->db->select('ad_master.id,ad_master.ad_image,ad_master.ad_title,ad_master.posted_date,ad_master.user_id,ad_master.category_id,ad_master.country,ad_master.state,ad_master.city,ad_master.posted_date,ad_master.contact_number,available_table.ad_id,available_table.from_datetime');
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
  $this->db->select('ad_master.id,ad_master.ad_image,ad_master.ad_title,ad_master.posted_date,ad_master.user_id,ad_master.category_id,ad_master.country,ad_master.state,ad_master.city,ad_master.posted_date,ad_master.contact_number,premium_ad_details.ad_id');
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
  $this->db->select('ad_master.id,ad_master.ad_image,ad_master.ad_title,ad_master.posted_date,ad_master.user_id,ad_master.category_id,ad_master.country,ad_master.state,ad_master.city,ad_master.posted_date,ad_master.contact_number,topad_table.ad_id');
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
    $this->load->view('inc/header');
    $this->load->view('inc/adlistheader');
    $this->load->view('personalcategoryadlist',$result);
    $this->load->view('inc/footerNew');
    $this->load->view('inc/adlistfooter');
  }else{
    $this->load->view('inc/header');
    $this->load->view('inc/adlistheader');
    $this->load->view('categoryadlist',$result);
    $this->load->view('inc/footerNew');
    $this->load->view('inc/adlistfooter');
  }
}
  ///////////
public function subcategory($category)
{
  // $sc=$this->db->get_where('subcategory_master',array('id'=>$category))->row();  
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
  $this->db->where('subcat_id', $category);
  $this->db->where('status','Active');
  $this->db->where('report_count <','5');
  $cquery=$this->db->get();
  $count=$cquery->num_rows();

  $config = array();
  $config["base_url"] = base_url() . "ad/subcategory/".$category."?";
  $config["total_rows"] = $count;
  $config["per_page"] = 20;
  $config["uri_segment"] = 4;
  $config['page_query_string'] = TRUE;  
  $this->pagination->initialize($config);

  $page = $this->input->get('per_page');

  $result["links"] = $this->pagination->create_links();

   $this->db->select('id,ad_image,ad_title,posted_date,user_id,category_id,country,state,city,posted_date,contact_number');
  $this->db->from('ad_master');
  $this->db->where('subcat_id', $category);
  $this->db->where('status','Active');
  $this->db->where('report_count <','5');
  $this->db->order_by('id','desc');
  $this->db->limit($config["per_page"], $page);
  $query=$this->db->get();
  $ad=$query->result();
  /////////////
  $date=date('Y-m-d');

  $this->db->select('ad_master.id,ad_master.ad_image,ad_master.ad_title,ad_master.posted_date,ad_master.user_id,ad_master.category_id,ad_master.country,ad_master.state,ad_master.city,ad_master.posted_date,ad_master.contact_number,featured_ad_details.ad_id');
  $this->db->from('featured_ad_details'); // from Table1
  $this->db->join('ad_master','featured_ad_details.ad_id = ad_master.id','INNER'); 
  $this->db->where('ad_master.subcat_id', $category);
  $this->db->where('ad_master.status','Active');
  $this->db->where('ad_master.report_count <','5');
  $this->db->where('featured_ad_details.days >=',$date);

  $this->db->order_by('featured_ad_details.id','desc');
  $this->db->limit($config["per_page"], $page); // Set Filter
  $ress = $this->db->get();
  $featured_sql=$ress->result();


  $datetime=date('Y-m-d H:i:s');
  $this->db->select('ad_master.id,ad_master.ad_image,ad_master.ad_title,ad_master.posted_date,ad_master.user_id,ad_master.category_id,ad_master.country,ad_master.state,ad_master.city,ad_master.posted_date,ad_master.contact_number,available_table.ad_id,available_table.from_datetime');
  $this->db->from('available_table'); // from Table1
  $this->db->join('ad_master','available_table.ad_id = ad_master.id','INNER'); 
  $this->db->where('ad_master.subcat_id', $category);
  $this->db->where('ad_master.status','Active');
  $this->db->where('ad_master.report_count <','5');
  $this->db->where('available_table.last_datetime >=',$datetime);

  $this->db->order_by('available_table.id','desc');
  $this->db->limit($config["per_page"], $page); // Set Filter
  $ress2 = $this->db->get();
  $available_qry=$ress2->result();

  //////////////////////
  $this->db->select('ad_master.id,ad_master.ad_image,ad_master.ad_title,ad_master.posted_date,ad_master.user_id,ad_master.category_id,ad_master.country,ad_master.state,ad_master.city,ad_master.posted_date,ad_master.contact_number,premium_ad_details.ad_id');
  $this->db->from('premium_ad_details'); // from Table1
  $this->db->join('ad_master','premium_ad_details.ad_id = ad_master.id','INNER'); 
  $this->db->where('ad_master.subcat_id', $category);
  $this->db->where('ad_master.status','Active');
  $this->db->where('ad_master.report_count <','5');
  $this->db->where('premium_ad_details.days >=',$date);
  $this->db->order_by('premium_ad_details.id','desc');
  $this->db->limit($config["per_page"], $page); // Set Filter
  $res = $this->db->get();
  $premium_sql=$res->result();

  //////////////////////
  $this->db->select('ad_master.id,ad_master.ad_image,ad_master.ad_title,ad_master.posted_date,ad_master.user_id,ad_master.category_id,ad_master.country,ad_master.state,ad_master.city,ad_master.posted_date,ad_master.contact_number,topad_table.ad_id');
  $this->db->from('topad_table'); // from Table1
  $this->db->join('ad_master','topad_table.ad_id = ad_master.id','INNER'); 
  $this->db->where('ad_master.subcat_id', $category);
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
  
  if($sc->category_id==10)
  {
    $this->load->view('inc/header');
    $this->load->view('inc/adlistheader');
    $this->load->view('personalsubcategoryadlist',$result);
    $this->load->view('inc/footerNew');
    $this->load->view('inc/adlistfooter');
  }else{
    $this->load->view('inc/header');
    $this->load->view('inc/adlistheader');
    $this->load->view('subcategoryadlist',$result);
    $this->load->view('inc/footerNew');
    $this->load->view('inc/adlistfooter');
  }
}
  /////////////////
public function childcategory($category)
{

  $date=date('Y-m-d');
  $time=date('H:i:s');


  // ///////////

  $feature=array();
  $premium=array();
  $topad=array();
  $availalbe=array();
  $data=array();
  //////////////
  $this->db->select('id,ad_image,ad_title,posted_date,user_id,category_id,country,state,city');
  $this->db->from('ad_master');
  $this->db->where('sub_child_id', $category);
  $this->db->where('status','Active');
  $this->db->where('report_count <','5');
  $cquery=$this->db->get();
  $count=$cquery->num_rows();

  $config = array();
  $config["base_url"] = base_url() . "ad/childcategory/".$category."?";
  $config["total_rows"] = $count;
  $config["per_page"] = 20;
  $config["uri_segment"] = 4;
  $config['page_query_string'] = TRUE;  
  $this->pagination->initialize($config);

  $page = $this->input->get('per_page');

  $result["links"] = $this->pagination->create_links();

  $this->db->select('id,ad_image,ad_title,posted_date,user_id,category_id,country,state,city,posted_date,contact_number');
  $this->db->from('ad_master');
  $this->db->where('sub_child_id', $category);
  $this->db->where('status','Active');
  $this->db->where('report_count <','5');
  $this->db->order_by('id','desc');
  $this->db->limit($config["per_page"], $page);
  $query=$this->db->get();
  $ad=$query->result();
  /////////////
  $date=date('Y-m-d');

  $this->db->select('ad_master.id,ad_master.ad_image,ad_master.ad_title,ad_master.posted_date,ad_master.user_id,ad_master.category_id,ad_master.country,ad_master.state,ad_master.city,ad_master.posted_date,ad_master.contact_number,featured_ad_details.ad_id');
  $this->db->from('featured_ad_details'); // from Table1
  $this->db->join('ad_master','featured_ad_details.ad_id = ad_master.id','INNER'); 
  $this->db->where('ad_master.sub_child_id', $category);
  $this->db->where('ad_master.status','Active');
  $this->db->where('ad_master.report_count <','5');
  $this->db->where('featured_ad_details.days >=',$date);
  $this->db->order_by('featured_ad_details.id','desc');
  $this->db->limit($config["per_page"], $page); // Set Filter
  $ress = $this->db->get();
  $featured_sql=$ress->result();


  $datetime=date('Y-m-d H:i:s');
  $this->db->select('ad_master.id,ad_master.ad_image,ad_master.ad_title,ad_master.posted_date,ad_master.user_id,ad_master.category_id,ad_master.country,ad_master.state,ad_master.city,ad_master.posted_date,ad_master.contact_number,available_table.ad_id,available_table.from_datetime');
  $this->db->from('available_table'); // from Table1
  $this->db->join('ad_master','available_table.ad_id = ad_master.id','INNER'); 
  $this->db->where('ad_master.sub_child_id', $category);
  $this->db->where('ad_master.status','Active');
  $this->db->where('ad_master.report_count <','5');
  $this->db->where('available_table.last_datetime >=',$datetime);

  $this->db->order_by('available_table.id','desc');
  $this->db->limit($config["per_page"], $page); // Set Filter
  $ress2 = $this->db->get();
  $available_qry=$ress2->result();


  //////////////////////
  $this->db->select('ad_master.id,ad_master.ad_image,ad_master.ad_title,ad_master.posted_date,ad_master.user_id,ad_master.category_id,ad_master.country,ad_master.state,ad_master.city,ad_master.posted_date,ad_master.contact_number,premium_ad_details.ad_id');
  $this->db->from('premium_ad_details'); // from Table1
  $this->db->join('ad_master','premium_ad_details.ad_id = ad_master.id','INNER'); 
  $this->db->where('ad_master.sub_child_id', $category);
  $this->db->where('ad_master.status','Active');
  $this->db->where('ad_master.report_count <','5');
  $this->db->where('premium_ad_details.days >=',$date);
  $this->db->order_by('premium_ad_details.id','desc');
  $this->db->limit($config["per_page"], $page); // Set Filter
  $res = $this->db->get();
  $premium_sql=$res->result();

  //////////////////////
   $this->db->select('ad_master.id,ad_master.ad_image,ad_master.ad_title,ad_master.posted_date,ad_master.user_id,ad_master.category_id,ad_master.country,ad_master.state,ad_master.city,ad_master.posted_date,ad_master.contact_number,topad_table.ad_id');
  $this->db->from('topad_table'); // from Table1
  $this->db->join('ad_master','topad_table.ad_id = ad_master.id','INNER'); 
  $this->db->where('ad_master.sub_child_id', $category);
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

  
  $this->load->view('inc/header');
  $this->load->view('inc/adlistheader');
  $this->load->view('subcategoryadlist',$result);
  $this->load->view('inc/footerNew');
  $this->load->view('inc/adlistfooter');
}
  //////////////
public function country($cntry)
{
  if($cntry=="Dedop'listsqaros_Raioni" || $cntry=="Virgin _Islands, _British" || $cntry=="Baghdat'is_Raioni" || $cntry=="Debubawi_K'eyih_Bahri" || $cntry=="Dnipropetrovs'ka_Oblast'" || $cntry=="Bristol,_City_of" || $cntry=="Volyns'ka_Oblast'" || $cntry=="Al_Istiwa'iyah" || $cntry=="Kirovohrads'ka_Oblast'" || $cntry=="Mts'khet'is_Raioni" || $cntry=="Zestap'onis_Raioni" || $cntry=="Cherkas'ka_Oblast'" || $cntry=="Shamal_Sina'" || $cntry=="Ch'ungch'ong-bukto" || $cntry=="Ch'ungch'ong-namdo" || $cntry=="Ozurget'is_Raioni" || $cntry=="Ts'ageris_Raioni" || $cntry=="Grand'_Anse" || $cntry=="Stavropol'" || $cntry=="T'ai-wan" || $cntry=="Yaroslavl'" || $cntry=="Umm_Sa'id" || $cntry=="Sevastopol'" || $cntry=="Vitsyebskaya_Voblasts'" || $cntry=="Ash_Shati'" || $cntry=="As_Suwayda'" || $cntry=="Libertador_General_Bernardo_O'Higgins" || $cntry=="Inch'on-jikhalsi" || $cntry=="Ul'yanovsk" || $cntry=="Ternopil's'ka_Oblast'" || $cntry=="Donets'ka_Oblast'" || $cntry=="Ryazan'" || $cntry=="Primor'ye" || $cntry=="Kotayk'" || $cntry=="Scottish_Borders,_The" || $cntry=="Adygeya,_Republic_of" || $cntry=="Kingston_upon_Hull,_City_of" || $cntry=="London,_City_of" || $cntry=="La,youne-Boujdour-Sakia_El_Hamra" || $cntry=="Chernihivs'ka_Oblast'" || $cntry=="Khmel'nyts'ka_Oblast'" || $cntry=="Zakarpats'ka_Oblast'" || $cntry=="Mahilyowskaya_Voblasts'" || $cntry=="Ch'okhatauris_Raioni" || $cntry=="Zaporiz'ka_Oblast'" || $cntry=="Vale_of_Glamorgan,_The" || $cntry=="T'et'ritsqaros_Raioni" || $cntry=="Dushet'is_Raioni" || $cntry=="Arkhangel'sk" || $cntry=="N'zi-Comoe" || $cntry=="Bur_Sa'id" || $cntry=="Ma'akel" || $cntry=="T'erjolis_Raioni" || $cntry=="Chernivets'ka_Oblast'" || $cntry=="Ch'khorotsqus_Raioni" || $cntry=="Kharkivs'ka_Oblast'" || $cntry=="Vinnyts'ka_Oblast'" || $cntry=="Sach'kheris_Raioni" || $cntry=="T'ianet'is_Raioni" || $cntry=="Seoul-t'ukpyolsi" || $cntry=="Al_Isma'iliyah" || $cntry=="Hrodzyenskaya_Voblasts'" || $cntry=="Mykolayivs'ka_Oblast'" || $cntry=="Zhytomyrs'ka_Oblast'" || $cntry=="Brestskaya_Voblasts'" || $cntry=="Akhalts'ikhis_Raioni" || $cntry=="Kyyivs'ka_Oblast'" || $cntry=="Luhans'ka_Oblast'" || $cntry=="K'arelis_Raioni" || $cntry=="P'yongan-namdo" || $cntry=="P'yongan-bukto" || $cntry=="Chiat'ura" || $cntry=="Hawke's_Bay" || $cntry=="Syunik'" || $cntry=="At_Ta'mim" || $cntry=="Rust'avi" || $cntry=="T'elavis_Raioni" || $cntry=="Khersons'ka_Oblast'" || $cntry=="Homyel'skaya_Voblasts'")
  {
    redirect(base_url().'custom404');
  }
  $country=str_replace("_", " ", $cntry);
  $date=date('Y-m-d');
  $time=date('H:i:s');
  
  $feature=array();
  $premium=array();
  $topad=array();
  $data=array();
  //////////////
  $this->db->select('id');
  $this->db->from('ad_master');
  $this->db->where('country', $country);
  $this->db->where('status','Active');
  $this->db->where('category_id !=','10');
  $this->db->where('report_count <','5');
  $cquery=$this->db->get();
  $count=$cquery->num_rows();

  $config = array();
  $config["base_url"] = base_url() . "ad/country/".$cntry."?";
  $config["total_rows"] = $count;
  $config["per_page"] = 20;
  $config["uri_segment"] = 4;
  
  $config['page_query_string'] = TRUE;  
  $this->pagination->initialize($config);

  $page = $this->input->get('per_page');

  $result["links"] = $this->pagination->create_links();

  $this->db->select('id,ad_image,ad_title,posted_date,user_id,category_id,country,state,city,posted_date,contact_number');
  $this->db->from('ad_master');
  $this->db->where('country', $country);
  $this->db->where('status','Active');
  $this->db->where('category_id !=','10');
  $this->db->where('report_count <','5');
  $this->db->order_by('id','desc');
  $this->db->limit($config["per_page"], $page);
  $query=$this->db->get();
  $ad=$query->result();
  /////////////
  $date=date('Y-m-d');

  $this->db->select('ad_master.id,ad_master.ad_image,ad_master.ad_title,ad_master.posted_date,ad_master.user_id,ad_master.category_id,ad_master.country,ad_master.state,ad_master.city,ad_master.posted_date,ad_master.contact_number,featured_ad_details.ad_id');
  $this->db->from('featured_ad_details'); // from Table1
  $this->db->join('ad_master','featured_ad_details.ad_id = ad_master.id','INNER'); 
  $this->db->where('ad_master.country',$country);
  $this->db->where('ad_master.status','Active');
  $this->db->where('ad_master.category_id !=','10');
  $this->db->where('ad_master.report_count <','5');
  $this->db->where('featured_ad_details.days >=',$date);

  $this->db->order_by('featured_ad_details.id','desc');
  $this->db->limit($config["per_page"], $page); // Set Filter
  $ress = $this->db->get();
  $featured_sql=$ress->result();
  
  //////////////////////
  $this->db->select('ad_master.id,ad_master.ad_image,ad_master.ad_title,ad_master.posted_date,ad_master.user_id,ad_master.category_id,ad_master.country,ad_master.state,ad_master.city,ad_master.posted_date,ad_master.contact_number,premium_ad_details.ad_id');
  $this->db->from('premium_ad_details'); // from Table1
  $this->db->join('ad_master','premium_ad_details.ad_id = ad_master.id','INNER'); 
  $this->db->where('ad_master.country',$country);
  $this->db->where('ad_master.status','Active');
  $this->db->where('ad_master.category_id !=','10');
  $this->db->where('ad_master.report_count <','5');
  $this->db->where('premium_ad_details.days >=',$date);

  $this->db->order_by('premium_ad_details.id','desc');
  $this->db->limit($config["per_page"], $page); // Set Filter
  $res = $this->db->get();
  $premium_sql=$res->result();

  //////////////////////
  $this->db->select('ad_master.id,ad_master.ad_image,ad_master.ad_title,ad_master.posted_date,ad_master.user_id,ad_master.category_id,ad_master.country,ad_master.state,ad_master.city,ad_master.posted_date,ad_master.contact_number,topad_table.ad_id');
  $this->db->from('topad_table'); // from Table1
  $this->db->join('ad_master','topad_table.ad_id = ad_master.id','INNER'); 
  $this->db->where('ad_master.country',$country);
  $this->db->where('ad_master.status','Active');
  $this->db->where('ad_master.category_id !=','10');
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
  $result['country']=$country;

  $this->load->view('inc/header');
  $this->load->view('inc/adlistheader');
  $this->load->view('countryadlist',$result);
  $this->load->view('inc/footerNew');
  $this->load->view('inc/adlistfooter');
}
  ///////////////
public function state($state)
{
  $state=str_replace("_", " ", $state);
  $date=date('Y-m-d');
  $time=date('H:i:s');
  $feature=array();
  $premium=array();
  $topad=array();
  $data=array();
  //////////////
  $this->db->select('id');
  $this->db->from('ad_master');
  $this->db->where('state', $state);
  $this->db->where('status','Active');
  $this->db->where('category_id !=','10');
  $this->db->where('report_count <','5');
  $cquery=$this->db->get();
  $count=$cquery->num_rows();

  $config = array();
  $config["base_url"] = base_url() . "ad/state/".$state."?";
  $config["total_rows"] = $count;
  $config["per_page"] = 20;
  $config["uri_segment"] = 4;
  
  $config['page_query_string'] = TRUE;  
  $this->pagination->initialize($config);

  $page = $this->input->get('per_page');

  $result["links"] = $this->pagination->create_links();

  $this->db->select('id,ad_image,ad_title,posted_date,user_id,category_id,country,state,city,posted_date,contact_number');
  $this->db->from('ad_master');
  $this->db->where('state', $state);
  $this->db->where('status','Active');
  $this->db->where('category_id !=','10');
  $this->db->where('report_count <','5');
  $this->db->order_by('id','desc');
  $this->db->limit($config["per_page"], $page);
  $query=$this->db->get();
  $ad=$query->result();
  /////////////
  $date=date('Y-m-d');

  $this->db->select('ad_master.id,ad_master.ad_image,ad_master.ad_title,ad_master.posted_date,ad_master.user_id,ad_master.category_id,ad_master.country,ad_master.state,ad_master.city,ad_master.posted_date,ad_master.contact_number,featured_ad_details.ad_id');
  $this->db->from('featured_ad_details'); // from Table1
  $this->db->join('ad_master','featured_ad_details.ad_id = ad_master.id','INNER'); 
  $this->db->where('ad_master.state',$state);
  $this->db->where('ad_master.status','Active');
  $this->db->where('ad_master.category_id !=','10');
  $this->db->where('ad_master.report_count <','5');
  $this->db->where('featured_ad_details.days >=',$date);
  $this->db->order_by('featured_ad_details.id','desc');
  $this->db->limit($config["per_page"], $page); // Set Filter
  $ress = $this->db->get();
  $featured_sql=$ress->result();

  //////////////////////
  $this->db->select('ad_master.id,ad_master.ad_image,ad_master.ad_title,ad_master.posted_date,ad_master.user_id,ad_master.category_id,ad_master.country,ad_master.state,ad_master.city,ad_master.posted_date,ad_master.contact_number,premium_ad_details.ad_id');
  $this->db->from('premium_ad_details'); // from Table1
  $this->db->join('ad_master','premium_ad_details.ad_id = ad_master.id','INNER'); 
  $this->db->where('ad_master.state',$state);
  $this->db->where('ad_master.status','Active');
  $this->db->where('ad_master.category_id !=','10');
  $this->db->where('ad_master.report_count <','5');
  $this->db->where('premium_ad_details.days >=',$date);

  $this->db->order_by('premium_ad_details.id','desc');
  $this->db->limit($config["per_page"], $page); // Set Filter
  $res = $this->db->get();
  $premium_sql=$res->result();

  //////////////////////
  $this->db->select('ad_master.id,ad_master.ad_image,ad_master.ad_title,ad_master.posted_date,ad_master.user_id,ad_master.category_id,ad_master.country,ad_master.state,ad_master.city,ad_master.posted_date,ad_master.contact_number,topad_table.ad_id');
  $this->db->from('topad_table'); // from Table1
  $this->db->join('ad_master','topad_table.ad_id = ad_master.id','INNER'); 
  $this->db->where('ad_master.state',$state);
  $this->db->where('ad_master.status','Active');
  $this->db->where('ad_master.category_id !=','10');
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
  $result['state']=$state;

  $this->load->view('inc/header');
  $this->load->view('inc/adlistheader');
  $this->load->view('stateadlist',$result);
  $this->load->view('inc/footerNew');
  $this->load->view('inc/adlistfooter');
}
  /////////
public function city($city)
{
  $state=str_replace("_", " ", $city);
  $date=date('Y-m-d');
  $time=date('H:i:s');
  $feature=array();
  $premium=array();
  $topad=array();
  $data=array();
  //////////////
  $this->db->select('id,ad_image,ad_title,posted_date,user_id,category_id,country,state,city');
  $this->db->from('ad_master');
  $this->db->where('city', $state);
  $this->db->where('status','Active');
  $this->db->where('category_id !=','10');
  $this->db->where('report_count <','5');
  $cquery=$this->db->get();
  $count=$cquery->num_rows();

  $config = array();
  $config["base_url"] = base_url() . "ad/city/".$city;
  $config["total_rows"] = $count;
  $config["per_page"] = 20;
  $config["uri_segment"] = 4;
  
  $config['page_query_string'] = TRUE;  
  $this->pagination->initialize($config);

  $page = $this->input->get('per_page');

  $result["links"] = $this->pagination->create_links();

  $this->db->select('id,ad_image,ad_title,posted_date,user_id,category_id,country,state,city,posted_date,contact_number');
  $this->db->from('ad_master');
  $this->db->where('city', $state);
  $this->db->where('status','Active');
  $this->db->where('category_id !=','10');
  $this->db->where('report_count <','5');
  $this->db->order_by('id','desc');
  $this->db->limit($config["per_page"], $page);
  $query=$this->db->get();
  $ad=$query->result();
  /////////////
  $date=date('Y-m-d');

  $this->db->select('ad_master.id,ad_master.ad_image,ad_master.ad_title,ad_master.posted_date,ad_master.user_id,ad_master.category_id,ad_master.country,ad_master.state,ad_master.city,ad_master.posted_date,ad_master.contact_number,featured_ad_details.ad_id');
  $this->db->from('featured_ad_details'); // from Table1
  $this->db->join('ad_master','featured_ad_details.ad_id = ad_master.id','INNER'); 
  $this->db->where('ad_master.city',$state);
  $this->db->where('ad_master.status','Active');
  $this->db->where('ad_master.category_id !=','10');
  $this->db->where('ad_master.report_count <','5');
  $this->db->where('featured_ad_details.days >=',$date);

  $this->db->order_by('featured_ad_details.id','desc');
  $this->db->limit($config["per_page"], $page); // Set Filter
  $ress = $this->db->get();
  $featured_sql=$ress->result();

  //////////////////////
  $this->db->select('ad_master.id,ad_master.ad_image,ad_master.ad_title,ad_master.posted_date,ad_master.user_id,ad_master.category_id,ad_master.country,ad_master.state,ad_master.city,ad_master.posted_date,ad_master.contact_number,premium_ad_details.ad_id');
  $this->db->from('premium_ad_details'); // from Table1
  $this->db->join('ad_master','premium_ad_details.ad_id = ad_master.id','INNER'); 
  $this->db->where('ad_master.city',$state);
  $this->db->where('ad_master.status','Active');
  $this->db->where('ad_master.category_id !=','10');
  $this->db->where('ad_master.report_count <','5');
  $this->db->where('premium_ad_details.days >=',$date);

  $this->db->order_by('premium_ad_details.id','desc');
  $this->db->limit($config["per_page"], $page); // Set Filter
  $res = $this->db->get();
  $premium_sql=$res->result();

  //////////////////////
   $this->db->select('ad_master.id,ad_master.ad_image,ad_master.ad_title,ad_master.posted_date,ad_master.user_id,ad_master.category_id,ad_master.country,ad_master.state,ad_master.city,ad_master.posted_date,ad_master.contact_number,topad_table.ad_id');
  $this->db->from('topad_table'); // from Table1
  $this->db->join('ad_master','topad_table.ad_id = ad_master.id','INNER'); 
  $this->db->where('ad_master.city',$state);
  $this->db->where('ad_master.status','Active');
  $this->db->where('ad_master.category_id !=','10');
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
  $result['state']=$state;

  $this->load->view('inc/header');
  $this->load->view('inc/adlistheader');
  $this->load->view('stateadlist',$result);
  $this->load->view('inc/footerNew');
  $this->load->view('inc/adlistfooter');
}
  /////////
public function search()
{
  $sc='';
  $filter = array();
  $search_string = ''; 
  $feature=array();
  $premium=array();
  $topad=array();
  $availalbe=array();
  $data=array();
  $latitude=$longitude='';
  if($this->input->get('category')=='')
  {
   $filter['p.category_id !='] = '10';
 }
 if($this->input->get('category')!='')
 {
  $category=$this->input->get('category');

  $this->db->select('id');
  $category_id=$this->db->get_where('category_master',array('category_name'=>$category))->row();
  $this->db->select('id,category_id');
  $subcat_id=$this->db->get_where('subcategory_master',array('subcategory_name'=>$category))->row();
  $this->db->select('id,subcategory_id');
  $sub_child_id=$this->db->get_where('child_sub_master',array('child_sub_name'=>$category))->row();
  if($category_id)
  {
    $filter['p.category_id'] = $category_id->id;
    $sc=$category_id->id;
  }
  if($subcat_id)
  {
    $filter['p.subcat_id'] = $subcat_id->id;
    $sc=$subcat_id->category_id;
  }
  if($sub_child_id)
  {
    $filter['p.sub_child_id'] = $sub_child_id->id;

    $this->db->select('id,category_id');
    $ch=$this->db->get_where('subcategory_master',array('id'=>$sub_child_id->subcategory_id))->row();
    $sc=$ch->category_id;
  }

  
}
$search_string.= 'category='.$category.'&';
if($this->input->get('location')!='')
{

  if($this->input->get('Latitude11')=='')
  {
    $det=$this->db->get_where('backpage_search_api',array('active'=>'Y'))->row();
    $queryString = http_build_query([
      'access_key' => $det->api_key,
      'query' => $this->input->get('location'),
      'output' => 'json',
      'limit' => 1,
    ]);

    $ch = curl_init(sprintf('%s?%s', 'http://api.positionstack.com/v1/forward', $queryString));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $json = curl_exec($ch);

    curl_close($ch);

    $apiResult = json_decode($json, true);
    $latitude=$apiResult['data'][0][latitude];
    $longitude=$apiResult['data'][0][longitude];

  }else{
    $latitude=$this->input->get('Latitude11');
    $longitude=$this->input->get('Longitude11');
  }
  $location=$this->input->get('location');
  
  $loc=explode(',', $location);
  $l=explode(" ",$loc[0]);
  
  // echo $latitude;
  // exit;
  $search_string.= 'location='.$location.'&';
  $search_string.= 'Longitude11='. $longitude.'&';
  $search_string.= 'Latitude11='. $latitude.'&';
  
}

if($this->input->get('radius')!=0)
{
  $range=$this->input->get('radius');

}else{
  $range='200';

}

if($this->input->get('product_name')!='')
{
  $product_name=$this->input->get('product_name');
  $search_string.= 'product_name='.$product_name.'&';
  $filter['p.ad_title like'] = $product_name;
}   

$date=date('Y-m-d');
$time=date('H:i:s');

$search_string.= 'radius='.$range.'&';

$sql_distance=$having = '';
if(!empty($latitude) && !empty($longitude)){ 
  $radius_km = $range; 
  $sql_distance = " ,(((acos(sin((".$latitude."*pi()/180)) * sin((`p`.`latitude`*pi()/180))+cos((".$latitude."*pi()/180)) * cos((`p`.`latitude`*pi()/180)) * cos(((".$longitude."-`p`.`longitude`)*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance"; 

  $having = "(distance <= $radius_km) "; 

  $order_by = 'distance ASC '; 
}else{ 
  $order_by = ""; 
} 
// print_r($filter);
// exit;
$this->db->select('p.id'.$sql_distance);
$this->db->from('ad_master as p');
$this->db->where($filter);
if($having!=''){
$this->db->having($having);
}
$this->db->where('p.status','Active');
$this->db->where('p.report_count <','5');
if($order_by=='')
{
$this->db->order_by('p.id','desc');
}else{
 $this->db->order_by($order_by); 
}
$query = $this->db->get();
$count=$query->num_rows();


$config = array();
$config["base_url"] = base_url() . "ad/search?".$search_string;
$config["total_rows"] = $count;
$config["per_page"] = 20;
$config["uri_segment"] = 3;

$config['page_query_string'] = TRUE;    

$this->pagination->initialize($config);
$data['last_row_num']   =   $this->uri->segment(3);
$page                   =   $this->input->get('per_page');     

$result["links"] = $this->pagination->create_links();
  /////////////////////////////////////////////////
$this->db->select('p.id,p.ad_image,p.ad_title,p.ad_description,p.posted_date,p.user_id,p.category_id,p.country,p.state,p.city,p.contact_number'.$sql_distance);
$this->db->from('ad_master as p');
if($having!=''){
$this->db->having($having);
}
$this->db->where('p.status','Active');
$this->db->where('p.report_count <','5');
if($order_by=='')
{
$this->db->order_by('p.id','desc');
}else{
 $this->db->order_by($order_by); 
}
$this->db->limit($config["per_page"], $page); 
$query2 = $this->db->get();
$ad=$query2->result();

$datetime=date('Y-m-d H:i:s');
$this->db->select('av.ad_id,av.from_datetime');
$this->db->select('p.id,p.ad_image,p.ad_title,p.ad_description,p.posted_date,p.user_id,p.category_id,p.country,p.state,p.city,p.contact_number'.$sql_distance);
  $this->db->from('available_table as av'); // from Table1
  $this->db->join('ad_master as p','av.ad_id = p.id','INNER'); 
  $this->db->where($filter);
  if($having!=''){
  $this->db->having($having);
  }
  $this->db->where('p.status','Active');
  $this->db->where('p.report_count <','5');
  $this->db->where('av.last_datetime >=',$datetime);
  if($order_by=='')
{
$this->db->order_by('p.id','desc');
}else{
 $this->db->order_by($order_by); 
}
  $this->db->limit($config["per_page"], $page); // Set Filter
  $ress2 = $this->db->get();
  $available_qry=$ress2->result();
  if(count($available_qry)!=0)
  {
    $_SESSION['av'] = $available_qry; 

  }

  $date=date('Y-m-d');
  $this->db->select('fe.ad_id');
  $this->db->select('p.id,p.ad_image,p.ad_title,p.ad_description,p.posted_date,p.user_id,p.category_id,p.country,p.state,p.city,p.contact_number'.$sql_distance);
  $this->db->from('featured_ad_details as fe'); 
  $this->db->join('ad_master as p','fe.ad_id = p.id','INNER'); 
  $this->db->where('p.status','Active');
  $this->db->where('p.report_count <','5');
  $this->db->where($filter);
  if($having!=''){
  $this->db->having($having);
  }
  $this->db->where('fe.days >=',$date);
if($order_by=='')
{
$this->db->order_by('p.id','desc');
}else{
 $this->db->order_by($order_by); 
}
  $this->db->limit($config["per_page"], $page); // Set Filter
  $ress = $this->db->get();
  $featured_sql=$ress->result();
  if(count($featured_sql)!=0)
  {
    $_SESSION['fet'] = $featured_sql; 

  }
  // echo"<pre>";
  // print_r($_SESSION['fet']);
  // exit;
  //////////////////////
  $this->db->select('pe.ad_id');
  $this->db->select('p.id,p.ad_image,p.ad_title,p.ad_description,p.posted_date,p.user_id,p.category_id,p.country,p.state,p.city,p.contact_number'.$sql_distance);
  $this->db->from('premium_ad_details as pe');
  $this->db->join('ad_master as p','pe.ad_id = p.id','INNER'); 
  $this->db->where('p.status','Active');
  $this->db->where('p.report_count <','5');
  $this->db->where($filter);
  if($having!=''){
  $this->db->having($having);
  }
  $this->db->where('pe.days >=',$date);
  if($order_by=='')
{
$this->db->order_by('p.id','desc');
}else{
 $this->db->order_by($order_by); 
}
  $this->db->limit($config["per_page"], $page);
  $res = $this->db->get();
  $premium_sql=$res->result();
  if(count($premium_sql)!=0)
  {
    $_SESSION['pre'] = $premium_sql; 

  }

  //////////////////////
  $this->db->select('tp.ad_id');
  $this->db->select('p.id,p.ad_image,p.ad_title,p.ad_description,p.posted_date,p.user_id,p.category_id,p.country,p.state,p.city,p.contact_number'.$sql_distance);
  $this->db->from('topad_table as tp');
  $this->db->join('ad_master as p','tp.ad_id = p.id','INNER'); 
  $this->db->where('p.status','Active');
  $this->db->where('p.report_count <','5');
  $this->db->where($filter);
  if($having!=''){
  $this->db->having($having);
  }
  $this->db->where('tp.last_date >=',$date);
  $this->db->where('tp.ad_time <',$time);
  if($order_by=='')
{
$this->db->order_by('p.id','desc');
}else{
 $this->db->order_by($order_by); 
}
  $this->db->limit($config["per_page"], $page); // Set Filter
  $res2 = $this->db->get();
  $top_sql=$res2->result();
  if(count($top_sql)!=0)
  {
    $_SESSION['top'] = $top_sql; 

  }
  
  $result['featuredad']=$_SESSION['fet'];
  $result['premiumad']=$_SESSION['pre'];
  $result['topad']=$_SESSION['top'];
  $result['availalbe']=$_SESSION['av'];
  $result['ad']=$ad;
  
  if($sc=='')
  {
    $this->load->view('inc/header');
    $this->load->view('inc/adlistheader');
    $this->load->view('searchadlist',$result);
    $this->load->view('inc/footerNew');
    $this->load->view('inc/adlistfooter');
  }else{
    if($sc==10)
    {
      $this->load->view('inc/header');
      $this->load->view('inc/adlistheader');
      $this->load->view('personalsearchadlist',$result);
      $this->load->view('inc/footerNew');
      $this->load->view('inc/adlistfooter');
    }else{
      $this->load->view('inc/header');
      $this->load->view('inc/adlistheader');
      $this->load->view('searchadlist',$result);
      $this->load->view('inc/footerNew');
      $this->load->view('inc/adlistfooter');
    }
  }
  
  
}
 ///////////////////
public function contactadvertiser($ad_id)
{
  if($this->input->post('email')!='')
  {
    $ad=$this->db->get_where('ad_master',array('id'=>$ad_id))->row();
    $to = $ad->email_address;
    $subject = "Notification For Contact Advertiser";
    $message = "
    <html>
    <head>
    <title>HTML email</title>
    </head>
    <body>
    <h1>WelCome</h1>
    <hr>
    <p>
    <br><br>
    Customer Email Address: ".$this->input->post('email')."<br></br>
    Customer Message: ".$this->input->post('message')."<br></br>
    
    He/She Wants To Contact With You.

    </p>

    </body>
    </html>
    ";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

  // More headers
    $headers .= 'From: <'.$this->input->post('email').'>' . "\r\n";

    mail($to,$subject,$message,$headers);      
    $this->session->set_flashdata('succ','Your Message Sended Successfuly');
    redirect(base_url().'ad/details/'.$ad_id);
  }else{
    $this->session->set_flashdata('err','Please Enter Email');
    redirect(base_url().'ad/details/'.$ad_id);
  }
}
 //////////////////////////////
public function allcountry()
{
  $this->load->view('inc/header');
  $this->load->view('inc/adlistheader');
  $this->load->view('allcountrylist');
  $this->load->view('inc/footer');
  $this->load->view('inc/adlistfooter');
}
 ////////////////////////////
public function changelatlang()
{
  $es=$this->db->get_where('escorts_user_master')->result();
  foreach ($es as $key => $value) {
    $ad=$this->db->get_where('ad_master',array('id'=>$value->ad_id))->row();
    if($ad)
    {
     $this->db->set('latitude',$value->latitude);
     $this->db->set('longitude',$value->longitude);
     $this->db->where('id',$ad->id);
     $this->db->update('ad_master');
   } 
   
 }
}
public function demo()
{
  $ad=$this->db->get_where('ad_master',array('id'=>'27733'))->row();
  

}

}

?>