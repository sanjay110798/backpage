<?php
   // session_start();
   error_reporting(0);
   if(!defined('BASEPATH')) exit('No direct script access allowed');

   class Verifyphoto extends CI_Controller
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
    $this->load->view('inc/profileheader');
    $this->load->view('verifyphoto');
    $this->load->view('inc/footer');
    $this->load->view('inc/profilefooter');
   
  }
  //////////////
  public function add()
  {
  $email_qry=$this->db->get('email_master')->row();
  $ad_id=$this->uri->segment(3);
  $upload_dir= 'upload/';
  $temp_error = $_FILES['first_photo']['error'];

  $file_name  = time().'_'.$_FILES['first_photo']['name']; 
  $tmp_name   = $_FILES['first_photo']['tmp_name'];
  $file_size  = $_FILES['first_photo']['size'];

  move_uploaded_file($tmp_name,$upload_dir.$file_name);
  $upload_dirr= 'upload/';
  $temp_error = $_FILES['second_photo']['error'];

  $file_name2 = time().'_'.$_FILES['second_photo']['name']; 
  $tmp_name   = $_FILES['second_photo']['tmp_name'];
  $file_size  = $_FILES['second_photo']['size'];

  move_uploaded_file($tmp_name,$upload_dir.$file_name2);
  $date=date('Y-m-d');
  $data=array(
  'ad_id'=>$ad_id,
  'first_photo'=>'https://backpageclassifieds.com/upload/'.$file_name,
  'second_photo'=>'https://backpageclassifieds.com/upload/'.$file_name2,
  'sub_date'=>$date
  );
  $res=$this->db->insert('verified_table',$data);
  $id=$this->db->insert_id();
  $to = 'support@crackerclassifieds.com';
  $subject = 'Notification for verify user photo';
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
  <p>
  Someone Want to verify his/her photo's 
  </p>

  <span>To Show and verify.click
  <a href='https://crackerclassifieds.com/admin/verify/show/<?=$id?>'>here</a>
  </span>
  </p>

  </body>
  </html>
  ";
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

  // More headers
  $headers .= 'From: <support@crackerclassifieds.com>' . "\r\n";
  // $headers .= 'Cc: '.$email_qry->reg_email. "\r\n";

  mail($to,$subject,$message,$headers); 
  $this->session->set_flashdata('succ','Thanks ! Form Submitted Successfuly..');
  redirect(base_url().'myads');
  }
  /////////

   }

 ?>