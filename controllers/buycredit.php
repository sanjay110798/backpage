<?php
   // session_start();
   error_reporting(0);
   if(!defined('BASEPATH')) exit('No direct script access allowed');

   class Buycredit extends CI_Controller
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
    $this->load->view('inc/buycreditheader');
    $this->load->view('buycredit');
    $this->load->view('inc/footer');
    $this->load->view('inc/buycreditfooter');
   
  }
  public function replace()
    { 
      $this->db->select('country');
      $id=$this->db->get_where('user_master',array('id'=>$this->session->userdata('login_id')))->row();
      $tm = $this->input->get('crdt');
      $this->db->select('value');
      $value_qry=$this->db->get_where('credit_master',array('id'=>$tm))->row();

      $this->db->select('price');
      $price_query = $this->db->get_where('featured_ad',array('country'=>$id->country,'credit_id'=>$tm))->row();
          ?>
          <input type="text" name="price" value="<?=number_format($price_query->price,2,'.',',');?>" class="form-control" readonly>
           <input type="hidden" name="credit_value" value="<?=$value_qry->value?>">                            
      <?php }
  /////////

   }

 ?>