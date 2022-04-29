<?php
   // session_start();
   error_reporting(0);
   if(!defined('BASEPATH')) exit('No direct script access allowed');

   class Escorts extends CI_Controller
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
	
	public function index()
	{
      $this->db->select('id,ad_image,ad_title,posted_date,user_id,category_id,country,state,city');
      $this->db->from('ad_master');
      $this->db->where('category_id', 10);
      $this->db->where('status','Active');
      $this->db->where('report_count <','5');
      $this->db->order_by('id','desc');
      $this->db->limit(16);
      $query=$this->db->get();
      $agency_sql=$query->result();
      foreach($agency_sql as $ve)
      {
      $agencytbl[]=$ve;
      }
    $result['agency']=$agencytbl;
    $this->load->view('inc/header');
    $this->load->view('escortspage',$result);
    $this->load->view('inc/footer');
  }
  /////////
 

  }

 ?>