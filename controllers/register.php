<?php
   // session_start();
   error_reporting(0);
   if(!defined('BASEPATH')) exit('No direct script access allowed');
   require_once( "vendor/autoload.php" ); 
    use Twilio\Rest\Client;
   class Register extends CI_Controller
   {
      /**
     * This is default constructor of the class
     */
    private $sid;
    private $token;
    public function __construct()
    {
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->library("pagination");
		$this->load->database();
    $this->sid="AC0f7c17458e9fb8a171e4ed7a9d189185";
    $this->token="bb02c26cbb53b998dd9734689b0cc89e";
    }
  	public function replacelocation()
    {
      $items = array();
      
      $det=$this->db->get_where('api_det',array('id'=>'1'))->row();
      $queryString = http_build_query([
      'access_key' => $det->loc_key,
      'query' => $this->input->get('q'),
      'output' => 'json',
      'limit' => 5,
      ]);

      $ch = curl_init(sprintf('%s?%s', 'http://api.positionstack.com/v1/forward', $queryString));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      $json = curl_exec($ch);

      curl_close($ch);

      $apiResult = json_decode($json, true);
      

                if(count($apiResult['data']) > 0){

                    foreach($apiResult['data'] as $val)
                     {

                        $items[] = array(

                            'id' => $val[label],

                            'text' => $val[label]

                        );

                    }

                }

            

            

        echo json_encode($items);
    }
  public function newregister()
  {
    if($this->session->userdata('login_id')!='')
    {
      redirect(base_url().'profile');
    }
    else{    
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $userIP = $_SERVER['HTTP_CLIENT_IP'];
    }
    else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $userIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else {
    $userIP = $_SERVER['REMOTE_ADDR'];
    }
    $apiURL = 'https://freegeoip.app/json/'.$userIP; 
    $ch = curl_init($apiURL); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    $apiResponse = curl_exec($ch);  
    curl_close($ch); 
    $ipData = json_decode($apiResponse, true); 
    $country_code = 'IN';
    if(!empty($ipData)){ 
    $country_code = $ipData['country_code']; 
    }
    $result['country_code'] = $country_code;
    $this->load->view('inc/header');
    $this->load->view('inc/registerheader');
    $this->load->view('newregister' , $result);
    $this->load->view('inc/footer');
    $this->load->view('inc/registerfooter');
   }
  }
	public function index()
	{
    if($this->session->userdata('login_id')!='')
    {
      redirect(base_url().'profile');
    }
    else{    
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $userIP = $_SERVER['HTTP_CLIENT_IP'];
    }
    else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $userIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else {
    $userIP = $_SERVER['REMOTE_ADDR'];
    }
    $apiURL = 'https://freegeoip.app/json/'.$userIP; 
    $ch = curl_init($apiURL); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    $apiResponse = curl_exec($ch);  
    curl_close($ch); 
    $ipData = json_decode($apiResponse, true); 
    $country_code = 'IN';
    if(!empty($ipData)){ 
    $country_code = $ipData['country_code']; 
    }
    $result['country_code'] = $country_code;
    $this->load->view('inc/header');
    $this->load->view('inc/registerheader');
    $this->load->view('register' , $result);
    $this->load->view('inc/footer');
    $this->load->view('inc/registerfooter');
   }
  }
  /////////
  public function replace()
  {
  $cntry=$this->input->get('country');
  $this->db->select('id');
  $qry=$this->db->get_where('countries_new',array('country_name'=>$cntry))->row();
  ?>
  <option>Select</option>
  <?php 
  $this->db->select('city_name');
  $city_qry=$this->db->get_where('cities',array('country_id'=>$qry->id));
  foreach ($city_qry->result_array() as $city) 
  {      
  ?>
  <option value="<?=$city['city_name']?>"><?=$city['city_name']?></option>
  <?php }  } 

  public function replacestate()
  {
  $cntry=$this->input->get('country');
  $this->db->select('id');
  $qry=$this->db->get_where('countries_new',array('country_name'=>$cntry))->row();
  ?>
  <option>Select</option>
  <?php 
  $this->db->select('state_name');
  $state_qry=$this->db->get_where('state_list_new',array('country_id'=>$qry->id));
  foreach ($state_qry->result_array() as $state) 
  {      
  ?>
  <option value="<?=$state['state_name']?>"><?=$state['state_name']?></option>
  <?php }  } 

  public function insertuser()
  {
    $namecheck=$this->db->get_where('user_master',array('name'=>$this->input->post('username')))->num_rows();
    $emailcheck=$this->db->get_where('user_master',array('email'=>$this->input->post('email')))->num_rows();
    if($namecheck==0)
    {
      if($emailcheck==0)
    {
        // $loc = $this->input->post('address');
        // $cls = explode(",",$loc);
        // $k=key($cls) - 1;
        // if($k < 0)
        // {
        // $k=0;
        // }
      $date = date('Y-m-d H:i:s');
      $this->db->select('state_id');
      $ct_qry=$this->db->get_where('cities',array('city_name'=>$this->input->post('city')))->row();
      $this->db->select('state_name');
      $st_qry=$this->db->get_where('state_list_new',array('id'=>$ct_qry->state_id))->row();
      $data = array(
      'name'=>$this->input->post('username'),  
      'email'=> $this->input->post('email'),
      'password'=>$this->input->post('password'),
      'country'=>$this->input->post('country'),
      'state'=>$st_qry->state_name,
      'city'=>$this->input->post('city'),
      'mobile_code'=>$this->input->post('phonecode'),
      'mobile'=>$this->input->post('mobile'),
      'register_date'  =>$date,
      'status'=> 'Pendding',

      );

      $result1 = $this->db->insert('user_master', $data);
      $id=$this->db->insert_id();
      // $user_qry=$this->db->get_where('user_master',array('id'=>$id))->row();
      // $email_qry=$this->db->get('email_master')->row();

      $otp=$this->generate_otp();
      $this->session->set_userdata('user_otp',$otp);

      $phone_number=$this->input->post('phonecode').$this->input->post('mobile');

      $client = new Client($this->sid, $this->token);
      $client->messages->create(
      $phone_number,
      array(
      "from" => '61407902452',
      "body" => "Here is your OTP to register in Backpage ".$otp
      )
      );

      $to = $this->input->post('email');
      $subject = "Notification For OTP";
      $message = "
      <html>
      <body>
      <h1>WelCome to Backpage</h1>
      <hr>
      <p>
      <span >Dear , ".$this->input->post('username')."</span>
      <br><br>
      <p>
      <br><br>
      Here is your OTP to register in Backpage - ".$otp."
      </p>

      <span>Backpage.click
      <a href='https://backpageclassifieds.com/register/verify/$id'>here for Enter OTP</a>
      </span>
      </p>

      </body>
      </html>
      ";
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

      // More headers
      $headers .= 'From: <support@backpageclassifieds.com>' . "\r\n";
      mail($to,$subject,$message,$headers); 
                   
      ////////////////
      $this->session->set_flashdata('succ','Otp ! Send Successfully..');
      redirect(base_url().'register/verify/'.$id);
    }
     if($emailcheck!=0)
    {
      $this->session->set_flashdata('err','Sorry!! Email already exsist');
      redirect(base_url().'register');
    }
    }
    if($namecheck!=0)
    {
      $this->session->set_flashdata('err','Sorry!! Username already exsist');
      redirect(base_url().'register');
    }
   
  }
  
  public function verify()
  {
    $this->load->view('inc/header');
    $this->load->view('inc/registerheader');
    $this->load->view('otpmatch');
    $this->load->view('inc/footer');
    $this->load->view('inc/registerfooter');
  }
  
  public function verify_otp()
    {
      $id=$this->uri->segment(3);
      if(isset($_POST['btnn']))
      {
      $user_otp=$this->input->post('sms_otp');
      if($user_otp==$this->session->userdata('user_otp'))
      {
         $this->db->set('status','Approved');
         $this->db->where('id',$id);
         $res=$this->db->update('user_master');

         $this->db->select('email,name,mobile,status');
         $user_qry=$this->db->get_where('user_master',array('id'=>$id))->row();
         //$this->session->sess_destroy();
        ////For Sent Mail/////
          $email_qry=$this->db->get('email_master')->row();
          $to = $user_qry->email;
          $subject = $email_qry->reg_title;
          $message = "
          <html>
          <body>
          <h1>WelCome to Backpage</h1>
          <hr>
          <p>
          <span >Dear , ".$user_qry->name."</span>
          <br><br>
          <p>".$email_qry->reg_desc."
          <br><br>
          User Name: ".$user_qry->name."<br></br>
          Email Address: ".$user_qry->email."<br></br>
          Phone Number: ".$user_qry->mobile."<br></br>
          Account Status: ".$user_qry->status."<br></br>
          </p>

          <span>To Login into Backpage.click
          <a href='https://backpageclassifieds.com/authentication'>here</a>
          </span>
          </p>

          </body>
          </html>
          ";
          $headers = "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

          // More headers
          $headers .= 'From: <support@backpageclassifieds.com>' . "\r\n";
          // $headers .= 'Cc: support@crackerclassifieds.com'. "\r\n";
          // $headers .= 'Bcc: crackerclassifieds@yahoo.com'. "\r\n";

          mail($to,$subject,$message,$headers);          
        ////////////////
        $this->session->set_flashdata('succ','Thanks ! Register Successfully..');
        redirect(base_url('authentication'));
      }
      else
      {
        // $this->db->delete('user_master',array('id'=>$id));
        $this->session->set_flashdata('err','Sorry ! This OTP is Invalid');
        redirect(base_url('register/verify/'.$id));
      }

      }if(isset($_POST['btnnn'])){
        
        $this->db->delete('user_master',array('id'=>$id));
        redirect(base_url('register'));
      }
      
    }
  //////////////////
  public function checkuser()
    {
      $username=$this->input->get('username');
      if($username=='')
      {
        echo "notvalid";
      }
      else
      {
       $check=$this->db->get_where('user_master',array('name'=>$username))->num_rows();
      if($check==0)
      {
        echo "available";
      }
      if($check!=0)
      {
        echo "notavailable";
      } 
      }
      
    }
    ////////////
      public function checkemail()
    {
      $email=$this->input->get('email');
      if($email=='')
      {
        echo "notvalid";
      }
      else
      {
       $check=$this->db->get_where('user_master',array('email'=>$email))->num_rows();
      if($check==0)
      {
        echo "available";
      }
      if($check!=0)
      {
        echo "notavailable";
      } 
      }
      
    }
    private function generate_otp(int $length=6)
    {
      $otp="";
      $numbers="0123456789";
      for($i=0;$i<$length;$i++)
      {
        $otp.=$numbers[rand(0,strlen($numbers)-1)];
      }
      return $otp;
    }
  }

 ?>