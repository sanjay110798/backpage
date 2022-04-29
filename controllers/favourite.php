<?php
   // session_start();
   error_reporting(0);
   if(!defined('BASEPATH')) exit('No direct script access allowed');

   class Favourite extends CI_Controller
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

    $this->db->select('*');
    $this->db->from('favourite_ad');
    $this->db->where('user_id',$this->session->userdata('login_id'));
    $query=$this->db->get();
    $ad_qry=$query->result();
    foreach($ad_qry as $adf)
    {
    $this->db->select('id,ad_image,ad_title');
    $ad=$this->db->get_where('ad_master',array('id'=>$adf->ad_id))->row();
 
    $favourite[]=$ad;
    }
    $result['favourite']=$favourite;
        
    $this->load->view('inc/header');
    $this->load->view('inc/favouriteheader');
    $this->load->view('favourite',$result);
    $this->load->view('inc/footer');
    $this->load->view('inc/favouritefooter');
   
  }
   public function delete($id)
  {
   
    $this->db->delete('favourite_ad',array('ad_id'=>$id,'user_id'=>$this->session->userdata('login_id')));
    $this->session->set_flashdata('succ','Favourite Ad Deleted Successfully..');
    redirect(base_url().'favourite');
  }
  public function addfavourite()
  {
    $data=array(
    'ad_id'=>$this->input->get('ad_id'),
    'user_id'=>$this->session->userdata('login_id'),
    );
    $this->db->insert('favourite_ad',$data);
    echo "success";
  }
  /////////

   }

 ?>