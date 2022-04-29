<?php
   error_reporting(0);
   if(!defined('BASEPATH')) exit('No direct script access allowed');

   class Custom404 extends CI_Controller
   {
      /**
     * This is default constructor of the class
     */
    public function __construct()
    {
      parent::__construct();
      $this->load->helper('url');
     
    }
	
	public function index()
	{

    $this->output->set_status_header('404');
    $this->load->view('error404');
    
  }
  /////////
 
  }

 ?>