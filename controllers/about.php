<?php
   // session_start();
   error_reporting(0);
   if(!defined('BASEPATH')) exit('No direct script access allowed');

   class About extends CI_Controller
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
    $this->load->view('about');
    $this->load->view('inc/footer');
  }
  /////////
 

  }

 ?>