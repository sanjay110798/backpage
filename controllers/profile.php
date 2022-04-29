<?php
   // session_start();
   error_reporting(0);
   if(!defined('BASEPATH')) exit('No direct script access allowed');

   class Profile extends CI_Controller
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
	public function deleteaccount(){

  
  $user=$this->db->get_where('user_master',array('id'=>$this->session->userdata('login_id')))->row();

    $ad=$this->db->get_where('ad_master',array('user_id',$user->id))->row();
    if (file_exists($ad->ad_image)) {
      unlink($ad->ad_image);
    }
    $lst1=$this->db->get_where('details_image_master',array('ad_id'=>$ad->id))->result();
    foreach($lst1 as $ll1)
    {
    if (file_exists($ll1->ad_details_image)) {
    unlink($ll1->ad_details_image);
    }
    }
    $this->db->delete('details_image_master',array('ad_id'=>$ad->id));
    $this->db->delete('ad_master',array('user_id',$user->id));

    if (file_exists($user->image)) {
      unlink($user->image);
    }
    $esc=$this->db->get_where('escorts_user_master',array('cracker_id',$this->session->userdata('login_id')))->row();
    $this->db->delete('escorts_verify_photo',array('escort_id'=>$esc->id));
    $this->db->delete('escort_topad_table',array('ad_id'=>$esc->id));
    $this->db->delete('escorts_featured_ad',array('escort_id'=>$esc->id));
    $this->db->delete('escorts_details_master',array('escort_id'=>$esc->id));
    $this->db->delete('escorts_available_master',array('escort_id'=>$esc->id));
    $this->db->delete('escorts_rate_master',array('escort_id'=>$esc->id));
    $this->db->delete('escorts_premium_ad',array('escort_id'=>$esc->id));
    $this->db->delete('escorts_user_master',array('cracker_id',$this->session->userdata('login_id')));
    $this->session->sess_destroy();
    $this->session->set_flashdata('succ','Logout Successfully');
    redirect('authentication');
  }
	public function index()
	{
        
    $this->load->view('inc/header');
    $this->load->view('inc/profileheader');
    $this->load->view('profile');
    $this->load->view('inc/footer');
    $this->load->view('inc/profilefooter');
   
  }
  /////////
  public function edit()
  {
    $this->load->view('inc/header');
    $this->load->view('inc/editprofileheader');
    $this->load->view('profileedit');
    $this->load->view('inc/footer');
    $this->load->view('inc/editprofilefooter');
  
  }
  public function update($id)
  {
    $data=array(
    'nickname'=>$this->input->post('nickname'),
    'gender'=>$this->input->post('gender'),
    'password'=>$this->input->post('password'),
    'mobile_code'=>$this->input->post('phonecode'),
    'mobile'=>$this->input->post('mobile'),
    'birthday'=>$this->input->post('birthday'),
    );
    $this->db->where('id',$id);
    $result=$this->db->update('user_master',$data);
    $this->session->set_flashdata('succ','Porfile Updated Successfuly');
    redirect(base_url().'profile/edit');
  }
  public function updatepicture($id)
  {
    $upload_dir= 'upload/';
    $temp_error = $_FILES['profilepicture']['error'];

    $file_name  = time().'_'.$_FILES['profilepicture']['name']; 
    $tmp_name   = $_FILES['profilepicture']['tmp_name'];
    $file_size  = $_FILES['profilepicture']['size'];

    move_uploaded_file($tmp_name,$upload_dir.$file_name);
    
    $fl_name='https://backpageclassifieds.com/upload/'.$file_name;
    $this->db->set('image',$fl_name);
    $this->db->where('id',$id);
    $result=$this->db->update('user_master');
    $this->session->set_flashdata('succ','Porfile Picture Updated Successfuly');
    redirect(base_url().'profile/edit');
  }
  public function updatedetails($id)
  {
    $data=array(
    'country'=>$this->input->post('country'),
    'state'=>$this->input->post('state'),
    'city'=>$this->input->post('city'),
    'zipcode'=>$this->input->post('zipcode'),
    'address'=>$this->input->post('street'),
    'usertype'=>$this->input->post('user_type'),
    );
    $this->db->where('id',$id);
    $result=$this->db->update('user_master',$data);
    $this->session->set_flashdata('succ','Porfile Updated Successfuly');
    redirect(base_url().'profile/edit');
  }
  }

 ?>