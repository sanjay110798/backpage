<?php
   // session_start();
   error_reporting(0);
   if(!defined('BASEPATH')) exit('No direct script access allowed');

   class Payment extends CI_Controller
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
    $this->session->set_userdata('credit_id',$this->input->post('credit_id'));
    $this->session->set_userdata('credit_value',$this->input->post('credit_value'));
    $this->session->set_userdata('price',$this->input->post('price'));

    $this->load->view('inc/header');
    $this->load->view('inc/paymentheader');
    $this->load->view('payment');
    $this->load->view('inc/footer');
    $this->load->view('inc/paymentfooter');
  }
  public function adpayment()
  {
    $this->session->set_userdata('credit_id',$this->input->post('credit_id'));
    $this->session->set_userdata('credit_value',$this->input->post('credit_value'));
    $this->session->set_userdata('price',$this->input->post('price'));

    $this->load->view('inc/header');
    $this->load->view('inc/paymentheader');
    $this->load->view('adpayment');
    $this->load->view('inc/footer');
    $this->load->view('inc/paymentfooter');
  }
  public function paypalsuccess()
  {
      $id=$this->uri->segment(3);
      $cr_id=$this->uri->segment(4);
      $price=$this->uri->segment(5);
      $credit_qry=$this->db->get_where('credit_master',array('id'=>$cr_id))->row();
      $date=date('Y-m-d H:i:s');
      $data=array(
      'credit_id'=>$cr_id,
      'user_id'=>$id
      );
      $res=$this->db->insert('credit_ad_details',$data);
      if($res)
      {
      $this->db->select('id,credit_value'); 
      $u_qry=$this->db->get_where('user_master',array('id'=>$id))->row();

      $val=($u_qry->credit_value)+($credit_qry->value);
      $this->db->set('credit_value',$val);
      $this->db->where('id',$id);
      $rs=$this->db->update('user_master');
      if($rs)
      {
      $data2=array(
      'user_id'=>$id,
      'amount'=>$price,
      'status'=>"Approved",
      'payment_date'=>$date,
      );
      $ress=$this->db->insert('payment_master',$data2);
      if($ress)
      {
      $this->session->set_flashdata('succ','Your Payment Successfully Done');
      redirect(base_url().'buycredit?paymentsuccess==1');
      }

      }

      }
    }
    public function adpaypalsuccess()
  {
      $ad_id=$this->session->userdata('ad_id');
      $type=$this->session->userdata('all');
      $id=$this->uri->segment(3);
      $cr_id=$this->uri->segment(4);
      $price=$this->uri->segment(5);
      $credit_qry=$this->db->get_where('credit_master',array('id'=>$cr_id))->row();
      $date=date('Y-m-d H:i:s');
      $data=array(
      'credit_id'=>$cr_id,
      'user_id'=>$id
      );
      $res=$this->db->insert('credit_ad_details',$data);
      if($res)
      {
      $this->db->select('id,credit_value'); 
      $u_qry=$this->db->get_where('user_master',array('id'=>$id))->row();

      $val=($u_qry->credit_value)+($credit_qry->value);
      $this->db->set('credit_value',$val);
      $this->db->where('id',$id);
      $rs=$this->db->update('user_master');
      if($rs)
      {
      $data2=array(
      'user_id'=>$id,
      'amount'=>$price,
      'status'=>"Approved",
      'payment_date'=>$date,
      );
      $ress=$this->db->insert('payment_master',$data2);
      if($ress)
      {
      $this->session->set_flashdata('succ','Your Payment Successfully Done');
      redirect(base_url().'bestview?all='.$type);
      }

      }

      }
    }
    //////////////////
    public function marchentsuccess()
    {
      $id=$this->uri->segment(3);
      $cr_id=$this->uri->segment(4);
      $price=$this->uri->segment(5);
      $credit_qry=$this->db->get_where('credit_master',array('id'=>$cr_id))->row();
      $date=date('Y-m-d H:i:s');

      $fields = array(
      'method' => urlencode('processCard'),
      'merchantUUID' =>  urlencode($_REQUEST['merchantUUID']),
      'apiKey'  =>  urlencode($_REQUEST['apiKey']),
      'payframeToken' =>  urlencode($_REQUEST['payframeToken']),
      'payframeKey' =>  urlencode($_REQUEST['payframeKey']),
      'transactionAmount' =>  urlencode($_REQUEST['transactionAmount']),
      'transactionCurrency' =>  urlencode($_REQUEST['transactionCurrency']),
      'transactionProduct'=> urlencode($_REQUEST['transactionProduct']),
      'customerName'=> urlencode($_REQUEST['customerName']),
      'customerCountry'=> urlencode($_REQUEST['customerCountry']),
      'customerState'=> urlencode($_REQUEST['customerState']),
      'customerCity'=> urlencode($_REQUEST['customerCity']),
      'customerAddress'=> urlencode($_REQUEST['customerAddress']),
      'customerPostCode'=>urlencode($_REQUEST['customerPostCode']),
      'customerIP' => urlencode($_SERVER['REMOTE_ADDR']),
      'hash'=>urlencode($_REQUEST['hash']),
      );

      $fields_string = http_build_query($fields, '', '&');

      $ch = curl_init("https://api.merchantwarrior.com/payframe/");

      curl_setopt($ch,CURLOPT_POST,count($fields));
      curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

      curl_setopt($ch,CURLOPT_HEADER , false);
      curl_setopt($ch,CURLOPT_SAFE_UPLOAD , false);
      curl_setopt($ch,CURLOPT_RETURNTRANSFER , true);
      curl_setopt($ch,CURLOPT_SSL_VERIFYPEER , false);
      curl_setopt($ch,CURLOPT_FORBID_REUSE , true);
      curl_setopt($ch,CURLOPT_FRESH_CONNECT , true);
      curl_setopt($ch,CURLOPT_TIMEOUT , 45);
      curl_setopt($ch,CURLOPT_CONNECTTIMEOUT , 30);

      $result = curl_exec($ch);
      curl_close($ch);
      // print_r($result);
      $pos = strpos($result,"Transaction approved");
      if($pos!='')
      {
      $data=array(
      'credit_id'=>$cr_id,
      'user_id'=>$id
      );
      $res=$this->db->insert('credit_ad_details',$data);
      if($res)
      {
      $this->db->select('id,credit_value'); 
      $u_qry=$this->db->get_where('user_master',array('id'=>$id))->row();

      $val=($u_qry->credit_value)+($credit_qry->value);
      $this->db->set('credit_value',$val);
      $this->db->where('id',$id);
      $rs=$this->db->update('user_master');
      if($rs)
      {
      $data2=array(
      'user_id'=>$id,
      'amount'=>$price,
      'status'=>"Approved",
      'payment_date'=>$date,
      );
      $ress=$this->db->insert('payment_master',$data2);
      if($ress)
      {
       $this->session->set_flashdata('succ','Your Payment Successfully Done');
      redirect(base_url().'buycredit?paymentsuccess==1');
      }

      }

      }

      }
      else
      {
      echo $result;   
      exit(); 
      // redirect('discount');
      }
    }
    /////////////////
     public function admarchentsuccess()
    {
      $ad_id=$this->session->userdata('ad_id');
      $type=$this->session->userdata('all');
      $id=$this->uri->segment(3);
      $cr_id=$this->uri->segment(4);
      $price=$this->uri->segment(5);
      $credit_qry=$this->db->get_where('credit_master',array('id'=>$cr_id))->row();
      $date=date('Y-m-d H:i:s');

      $fields = array(
      'method' => urlencode('processCard'),
      'merchantUUID' =>  urlencode($_REQUEST['merchantUUID']),
      'apiKey'  =>  urlencode($_REQUEST['apiKey']),
      'payframeToken' =>  urlencode($_REQUEST['payframeToken']),
      'payframeKey' =>  urlencode($_REQUEST['payframeKey']),
      'transactionAmount' =>  urlencode($_REQUEST['transactionAmount']),
      'transactionCurrency' =>  urlencode($_REQUEST['transactionCurrency']),
      'transactionProduct'=> urlencode($_REQUEST['transactionProduct']),
      'customerName'=> urlencode($_REQUEST['customerName']),
      'customerCountry'=> urlencode($_REQUEST['customerCountry']),
      'customerState'=> urlencode($_REQUEST['customerState']),
      'customerCity'=> urlencode($_REQUEST['customerCity']),
      'customerAddress'=> urlencode($_REQUEST['customerAddress']),
      'customerPostCode'=>urlencode($_REQUEST['customerPostCode']),
      'customerIP' => urlencode($_SERVER['REMOTE_ADDR']),
      'hash'=>urlencode($_REQUEST['hash']),
      );

      $fields_string = http_build_query($fields, '', '&');

      $ch = curl_init("https://api.merchantwarrior.com/payframe/");

      curl_setopt($ch,CURLOPT_POST,count($fields));
      curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

      curl_setopt($ch,CURLOPT_HEADER , false);
      curl_setopt($ch,CURLOPT_SAFE_UPLOAD , false);
      curl_setopt($ch,CURLOPT_RETURNTRANSFER , true);
      curl_setopt($ch,CURLOPT_SSL_VERIFYPEER , false);
      curl_setopt($ch,CURLOPT_FORBID_REUSE , true);
      curl_setopt($ch,CURLOPT_FRESH_CONNECT , true);
      curl_setopt($ch,CURLOPT_TIMEOUT , 45);
      curl_setopt($ch,CURLOPT_CONNECTTIMEOUT , 30);

      $result = curl_exec($ch);
      curl_close($ch);
      // print_r($result);
      $pos = strpos($result,"Transaction approved");
      if($pos!='')
      {
      $data=array(
      'credit_id'=>$cr_id,
      'user_id'=>$id
      );
      $res=$this->db->insert('credit_ad_details',$data);
      if($res)
      {
      $this->db->select('id,credit_value'); 
      $u_qry=$this->db->get_where('user_master',array('id'=>$id))->row();

      $val=($u_qry->credit_value)+($credit_qry->value);
      $this->db->set('credit_value',$val);
      $this->db->where('id',$id);
      $rs=$this->db->update('user_master');
      if($rs)
      {
      $data2=array(
      'user_id'=>$id,
      'amount'=>$price,
      'status'=>"Approved",
      'payment_date'=>$date,
      );
      $ress=$this->db->insert('payment_master',$data2);
      if($ress)
      {
       $this->session->set_flashdata('succ','Your Payment Successfully Done');
      redirect(base_url().'bestview?all='.$type);
      }

      }

      }

      }
      else
      {
      echo $result;   
      exit(); 
      // redirect('discount');
      }
    }

  /////////

   }

 ?>