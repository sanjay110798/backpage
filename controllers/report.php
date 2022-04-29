<?php
   // session_start();
   error_reporting(0);
   if(!defined('BASEPATH')) exit('No direct script access allowed');

   class Report extends CI_Controller
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
	
	public function ad()
	{
    if($this->session->userdata('login_id')=='')
    {
      $this->session->set_flashdata('err','Sorry! Login First For This Action');
      redirect(base_url().'authentication');
    }
    else{
    $this->load->view('inc/header');
    $this->load->view('reportcause');
    $this->load->view('inc/footer');
    }
   
  }
  //////////////////
  public function reportad()
      {

        $ad_id=$this->uri->segment(3);
        if($this->session->userdata('login_id')!='')
        {
        $user_id=$this->session->userdata('login_id');
        }else{
        $user_id=$this->session->userdata('ip_Add');

        }
       
        $ad=$this->db->get_where('ad_master',array('id'=>$ad_id))->row();
        
        // $cnt=$ad->report_count+0;

        // $this->db->set('report_count',$cnt);
        // $this->db->where('id',$ad_id);
        // $res=$this->db->update('ad_master');
        // if($res)
        // {
        if($this->input->post('name')=='0' && $this->input->post('email')=='0' && $this->input->post('message')=='0')
        {
          $this->session->set_flashdata('err','Sorry! Fill Up All The Input Field');
          redirect(base_url().'ad/details/'.$ad_id);
        }else{
          $data=array(
             'user_id'=>$user_id,
             'name'=>$this->input->post('name'),
             'email'=>$this->input->post('email'),
             'report_cause'=>$this->input->post('message'),
             'ad_id'=>$ad_id,
          );
          $result=$this->db->insert('report_table',$data);
          $this->session->set_flashdata('succ','Thanks! For Your Feedbacks');
          redirect(base_url().'ad/details/'.$ad_id);
        }
          
        
        
        

      }
  /////////
 

  }

 ?>