<?php
   // session_start();
   error_reporting(0);
   if(!defined('BASEPATH')) exit('No direct script access allowed');

   class Topad extends CI_Controller
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
    $this->load->view('inc/topadheader');
    $this->load->view('topad');
    $this->load->view('inc/footer');
    $this->load->view('inc/topadfooter');
  }
  public function replace()
{
$ad_days = $this->input->get('addays');
$p=1*$ad_days;
$value=number_format($p,2,'.',',');
echo $value;
}
/////////////////////
public function payment()
{
  $ad=$this->session->userdata('ad_id');
  $ad_days=$this->session->set_userdata('ad_days',$this->input->post('ad_days'));
  $ad_time=$this->session->set_userdata('ad_time',$this->input->post('ad_time'));
  $price=$this->session->set_userdata('price',$this->input->post('price'));

    $this->load->view('inc/header');
    $this->load->view('inc/paymentheader');
    $this->load->view('topadpayment');
    $this->load->view('inc/footer');
    $this->load->view('inc/paymentfooter');

}
public function adpaypalsuccess()
{
$id=$this->session->userdata('login_id');
$ad_id=$this->session->userdata('ad_id');
$date=date('Y-m-d');
$d=$this->session->userdata('ad_days');
$tim=$this->session->userdata('ad_time');
$price=$this->session->userdata('price');
$last_date=date('Y-m-d', strtotime($date. " + {$d} days"));
$p=1*$d;
$qry=$this->db->get_where('topad_table',array('ad_id'=>$ad_id))->num_rows();
if($qry==0)
{
$data=array(
'ad_time'=>$tim,
'ad_days'=>$d,
'price'=>$price,
'ad_id'=>$ad_id,
'added_date'=>$date,
'last_date'=>$last_date
);
$res=$this->db->insert('topad_table',$data);
if($res)
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
$this->session->set_flashdata('succ','Thanks ! Your Ad Added Successfully');
redirect(base_url().'myads');
}
}
if(!$res)
{
redirect(base_url().'topad');
}


}if($qry!=0)
{
$this->db->set('ad_time',$tim);
$this->db->set('ad_days',$d);
$this->db->set('price',$price);
$this->db->set('added_date',$date);
$this->db->set('last_date',$last_date);
$this->db->where('ad_id',$ad_id);
$res=$this->db->update('topad_table');
if($res)
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
$this->session->set_flashdata('succ','Thanks ! Your Ad Added Successfully');
redirect(base_url().'myads');
}
}
if(!$res)
{
redirect(base_url().'topad');
}
}
}
// ///////////////////
public function topbycredit()
{
$id=$this->session->userdata('login_id');
$user=$this->db->get_where('user_master',array('id'=>$id))->row();

$ad_id=$this->session->userdata('ad_id');
$date=date('Y-m-d');
$d=$this->session->userdata('ad_days');
$tim=$this->session->userdata('ad_time');
$price=number_format($this->session->userdata('price'));
$last_date=date('Y-m-d', strtotime($date. " + {$d} days"));
$p=1*$d;
$qry=$this->db->get_where('topad_table',array('ad_id'=>$ad_id))->num_rows();
if($qry==0)
{
$data=array(
'ad_time'=>$tim,
'ad_days'=>$d,
'price'=>$price,
'ad_id'=>$ad_id,
'added_date'=>$date,
'last_date'=>$last_date
);
$res=$this->db->insert('topad_table',$data);
if($res)
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
$cr=$user->credit_value-$price;
$this->db->set('credit_value',$cr);
$this->db->where('id',$id);
$result=$this->db->update('user_master');
$this->session->set_flashdata('succ','Thanks ! Your Ad Added Successfully');
redirect(base_url().'myads');
}
}
if(!$res)
{
redirect(base_url().'topad');
}


}if($qry!=0)
{
$this->db->set('ad_time',$tim);
$this->db->set('ad_days',$d);
$this->db->set('price',$price);
$this->db->set('added_date',$date);
$this->db->set('last_date',$last_date);
$this->db->where('ad_id',$ad_id);
$res=$this->db->update('topad_table');
if($res)
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
$cr=$user->credit_value-$price;
$this->db->set('credit_value',$cr);
$this->db->where('id',$id);
$result=$this->db->update('user_master');
$this->session->set_flashdata('succ','Thanks ! Your Ad Added Successfully');
redirect(base_url().'myads');
}
}
if(!$res)
{
redirect(base_url().'topad');
}
}
}

// ///////////////////
public function admarchentsuccess()
{

$id=$this->session->userdata('login_id');
$ad_id=$this->session->userdata('ad_id');
$date=date('Y-m-d');
$d=$this->session->userdata('ad_days');
$tim=$this->session->userdata('ad_time');
$price=$this->session->userdata('price');
$last_date=date('Y-m-d', strtotime($date. " + {$d} days"));
$p=1*$d;
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
$pos = strpos($result,"Transaction approved");
if($pos!='')
{
$qry=$this->db->get_where('topad_table',array('ad_id'=>$ad_id))->num_rows();
if($qry==0)
{
$data=array(
'ad_time'=>$tim,
'ad_days'=>$d,
'price'=>$price,
'ad_id'=>$ad_id,
'added_date'=>$date,
'last_date'=>$last_date
);
$res=$this->db->insert('topad_table',$data);
if($res)
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
$this->session->set_flashdata('succ','Thanks ! Your Ad Added Successfully');
redirect(base_url().'myads');
}
}
if(!$res)
{
redirect(base_url().'topad');
}


}if($qry!=0)
{
$this->db->set('ad_time',$tim);
$this->db->set('ad_days',$d);
$this->db->set('price',$price);
$this->db->set('added_date',$date);
$this->db->set('last_date',$last_date);
$this->db->where('ad_id',$ad_id);
$res=$this->db->update('topad_table');
if($res)
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
$this->session->set_flashdata('succ','Thanks ! Your Ad Added Successfully');
redirect(base_url().'myads');
}
}
if(!$res)
{
redirect(base_url().'topad');
}
}
}
else
{
echo $result;   
exit(); 
// redirect('makeadtop/add/'.$ad_id);
}

}


/////////
 

}

 ?>