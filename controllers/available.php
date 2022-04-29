<?php
   // session_start();
   error_reporting(0);
   if(!defined('BASEPATH')) exit('No direct script access allowed');

   class Available extends CI_Controller
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
    $this->load->view('inc/availableheader');
    $this->load->view('available');
    $this->load->view('inc/footer');
    $this->load->view('inc/availablefooter');
  }
public function replace()
{   
$tim=$this->input->get('tim');
if($tim==3)
{
 $ttt=1;  
}
if($tim==6)
{
 $ttt=2;  
}
if($tim==9)
{
 $ttt=3;  
}
if($tim==12)
{
 $ttt=4;  
}
if($tim==15)
{
 $ttt=5;  
}
if($tim==18)
{
 $ttt=6;  
}
if($tim==21)
{
 $ttt=7;  
}
if($tim==24)
{
 $ttt=8;  
}
echo $ttt;
}
/////////////////////
public function addavailable()
{
$tim=$this->input->post('how_time');
$credit=$this->input->post('price');
$date=date('Y-m-d');
$time=date('H:i:s');
$ttt=1*$tim;
$tm=date('H:i',strtotime('+'.$ttt.' hour +0 minutes',strtotime($time)));
$l_dat=date('Y-m-d',strtotime('+'.$ttt.' hour +0 minutes',strtotime($time)));
$ad_id=$this->session->userdata('ad_id');
$u_id=$this->session->userdata('login_id');
$qry=$this->db->get_where('available_table',array('ad_id'=>$ad_id))->num_rows();

$this->db->select('credit_value');
$check=$this->db->get_where('user_master',array('id'=>$u_id))->row();
if($check->credit_value>=$credit)
{
if($qry==0)
{
$data=array(
'ad_id'=>$ad_id,
'total_hours'=>$tim,
'set_date'=>$date,
'last_date'=>$l_dat,
'set_time'=>$tm,
'from_time'=>$time,
'from_datetime'=>$date." ".$time,
'last_datetime'=>$l_dat." ".$tm,
);
$res=$this->db->insert('available_table',$data);
$cr=$check->credit_value-$credit;
$this->db->set('credit_value',$cr);
$this->db->where('id',$u_id);
$result=$this->db->update('user_master');
$this->session->set_flashdata('succ','Thanks!!You Have Added Your Ad..');
redirect(base_url().'myads');
}if($qry!=0)
{
$this->db->delete('available_table',array('ad_id'=>$ad_id));
$data=array(
'ad_id'=>$ad_id,
'total_hours'=>$tim,
'set_date'=>$date,
'last_date'=>$l_dat,
'set_time'=>$tm,
'from_time'=>$time,
'from_datetime'=>$date." ".$time,
'last_datetime'=>$l_dat." ".$tm,
);
$res=$this->db->insert('available_table',$data);
$cr=$check->credit_value-$credit;
$this->db->set('credit_value',$cr);
$this->db->where('id',$u_id);
$result=$this->db->update('user_master');
$this->session->set_flashdata('succ','Thanks!!You Have Added Your Ad..');
redirect(base_url().'myads');
}
}
if($check->credit_value<$credit)
{
 $this->session->set_flashdata('err','Sorry!! You Have no enough Credit,Please Purches Credit then make Your ad Available');
 redirect(base_url().'buycredit');
}


}

/////////
 

}

 ?>