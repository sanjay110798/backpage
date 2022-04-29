<?php
   // session_start();
   error_reporting(0);
   if(!defined('BASEPATH')) exit('No direct script access allowed');

   class Myads extends CI_Controller
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
    $this->db->select('id,ad_image,ad_title,category_id,status,photo_varified');
    $myads=$this->db->get_where('ad_master',array('user_id'=>$this->session->userdata('login_id')))->result();
    $result['myads']=$myads;        
    $this->load->view('inc/header');
    $this->load->view('inc/myadsheader');
    $this->load->view('myads',$result);
    $this->load->view('inc/footer');
    $this->load->view('inc/myadsfooter');
   
  }
  public function edit()
  {
    
    $this->load->view('inc/header');
    $this->load->view('inc/postadheader');
    $this->load->view('editad');
    $this->load->view('inc/footer');
    $this->load->view('inc/postadfooter');
  }
  public function delete($id)
  {
    $ad=$this->db->get_where('ad_master',array('id'=>$id))->row();
    unlink(base_url($ad->ad_image));
    unlink(base_url($ad->ad_video));
    $det=$this->db->get_where('details_image_master',array('ad_id'=>$id))->result();
    foreach($det as $val)
    {
      unlink(base_url($val->ad_details_image));
    }
    
    $this->db->delete('ad_master',array('id'=>$id));
    $this->db->delete('favourite_ad',array('ad_id'=>$id,'user_id'=>$this->session->userdata('login_id')));
    $this->db->delete('featured_ad_details',array('ad_id'=>$id));
    $this->db->delete('topad_table',array('ad_id'=>$id));
    $this->db->delete('premium_ad_details',array('ad_id'=>$id));
    $this->db->delete('available_table',array('ad_id'=>$id));
    $this->db->delete('details_image_master',array('ad_id'=>$id));
    $this->session->set_flashdata('succ','Ad Deleted Successfully..');
    redirect(base_url().'myads');
  }
  /////////

   }

 ?>