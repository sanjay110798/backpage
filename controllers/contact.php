<?php
   // session_start();
   error_reporting(0);
   if(!defined('BASEPATH')) exit('No direct script access allowed');

   class Contact extends CI_Controller
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
    $this->load->view('contact');
    $this->load->view('inc/footer');
  }
  ////////
  public function add()
      {
      $data=array(
      'u_name'=>$this->input->post('name'),
      'email'=>$this->input->post('email'),
      'subject'=>$this->input->post('subject'),
      'description'=>$this->input->post('message')
      );
      $res=$this->db->insert('contact_us_table',$data);

      if($res)
      {
      $email_qry=$this->db->get('email_master')->row();
      $to ='support@crackerclassifieds.com';
      $subject = $email_qry->sup_title;
      $message = "<html>
      <head><title>BackPage</title></head>
      <body>
      <h1>WelCome to Back Page</h1>

      <table width='75%' border='0'>
      <tr>
      <td colspan='2'>".$email_qry->sup_desc."</td>
      </tr>
      <tr>
      <td>User Name</td>
      <td>".$this->input->post('name')."</td>
      </tr>
      <tr>
      <td>Email Address</td>
      <td>".$this->input->post('email')."</td>
      </tr>
      <tr>
      <td>Subject</td>
      <td>".$this->input->post('subject')."</td>
      </tr>
      <tr>
      <td>Description</td>
      <td>".$this->input->post('message')."</td>
      </tr>

      <tr>
      <td colspan='2'>To See Details.click <a href='https://backpageclassifieds.com/admin/login'>here</a></td>
      </tr>

      </table>

      </body>
      </html>";
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

      // More headers
      $headers .= 'From: <support@backpage.online>' . "\r\n";
      // $headers .= 'Cc:'.$this->input->post('email'). "\r\n";
      //$headers .= 'Bcc: ascinate7@gmail.com'. "\r\n";

      mail($to,$subject,$message,$headers);
      $this->session->set_flashdata('succ','Message Sent Successfuly.');
      redirect(base_url().'contact');
      }
      }
  /////////
 

  }

 ?>