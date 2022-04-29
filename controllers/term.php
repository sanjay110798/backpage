<?php
   // session_start();
   error_reporting(0);
   if(!defined('BASEPATH')) exit('No direct script access allowed');

   class Term extends CI_Controller
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
    
    $this->load->view('inc/header');
    $this->load->view('term');
    $this->load->view('inc/footer');
  }
  /////////
  public function up()
  {
    $session_id = $this->session->userdata('session');
    $this->db->set('status','Y');
    $this->db->where('session_id',$session_id);
    $res=$this->db->update('save_term');
    if($res)
    {
    redirect(base_url().'ad/category/personals');
    }
  }

  }

 ?>