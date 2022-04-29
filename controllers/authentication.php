<?php
   // session_start();
   error_reporting(0);
   if(!defined('BASEPATH')) exit('No direct script access allowed');

   class Authentication extends CI_Controller
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
    if($this->session->userdata('login_id')!='')
    {
      redirect(base_url().'profile');
    }
    else{
    $this->load->view('inc/header');
    $this->load->view('inc/loginheader');
    $this->load->view('authentication');
    $this->load->view('inc/footer');
    $this->load->view('inc/loginfooter');
    }
    
  }
  /////////
 public function login()
{
$sql = $this->db->get_where('user_master', array('email' => trim($this->input->post('name')), 
'password'=> trim($this->input->post('password')),'status'=>'Approved'));
$result = $sql->num_rows();
if($result==0)
{
$sql2 = $this->db->get_where('user_master', array('name' => trim($this->input->post('name')), 
'password'=> trim($this->input->post('password')),'status'=>'Approved'));
$result3 = $sql2->num_rows();
if($result3 != 0)
{
$result4 = $sql2->row_array();

$this->session->set_userdata('login_id', $result4['id']);
$this->session->set_userdata('user_email', $result4['email']);

if($result4)
{
 $this->session->set_flashdata('succ','Login Successfully..');
 redirect(base_url().'profile');
}

}
else
{
$this->session->set_flashdata('err','Username Or Password is Invalid..');
redirect(base_url().'authentication');
}
}

if($result != 0)
{
$result2 = $sql->row_array();

$this->session->set_userdata('login_id', $result2['id']);
$this->session->set_userdata('user_email', $result2['email']);

if($result2)
{
$this->session->set_flashdata('succ','Login Successfully..');
redirect(base_url().'profile');
}

}
else
{
$this->session->set_flashdata('err','Username Or Password is Invalid..');
redirect(base_url().'authentication');
}
}
/////////////////////////////////////
public function lostpassword()
{
  if($this->input->post('lost_username')=='' || $this->input->post('lost_username')==NULL)
      {
        $this->session->set_flashdata('err','Enter Email Or User Name');
                redirect(base_url().'authentication');
      }
      $en=$this->input->post('lost_username');
      $qry=$this->db->get_where('user_master',array('email'=>$en,'status'=>'Approved'))->num_rows();
      $qry1=$this->db->get_where('user_master',array('name'=>$en,'status'=>'Approved'))->num_rows();
      if($qry==0)
      {
              if($qry1==0)
              {
                $this->session->set_flashdata('err','This email is not registered with us. Please try with another');
                redirect(base_url().'authentication');
              }
              if($qry1!=0)
              {
                $user=$this->db->get_where('user_master',array('name'=>$en))->row();
                $code=$this->generate_code();
                $this->db->set('password',$code);
                $this->db->where('name',$en);
                $res=$this->db->update('user_master');
                if($res)
                {
                $to = $user->email;
                $subject = "Here is your new password";
                $message = "
        <html>
        <head>
        <title>HTML email</title>
        </head>
        <body>
        <h1>WelCome</h1>
        <hr>
        <p>
        <span >Dear ,".$user->name.",</span>
        <br><br>
        <p>Here is your new password,
            <br><br>
            User Name: ".$user->name."<br></br>
            Email Address: ".$user->email."<br></br>
            New Password: ".$code."<br></br>
           
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
        $headers .= 'From: <support@backpage.online>' . "\r\n";
        // $headers .= 'Cc:support@crackerclassifieds.com'. "\r\n";

        mail($to,$subject,$message,$headers);      
        $this->session->set_flashdata('succ','You Can login now by using your new Password..');
        redirect(base_url().'authentication');
        }
        }
      }
      if($qry!=0)
      {
        $user=$this->db->get_where('user_master',array('email'=>$en))->row();
        $code=$this->generate_code();
                $this->db->set('password',$code);
                $this->db->where('email',$en);
                $res=$this->db->update('user_master');
                if($res)
                {
                $to = $user->email;
                $subject = "Here is your new password";
                $message = "
        <html>
        <head>
        <title>HTML email</title>
        </head>
        <body>
        <h1>WelCome</h1>
        <hr>
        <p>
        <span >Dear ,".$user->name.",</span>
        <br><br>
        <p>Here is your new password,
            <br><br>
            User Name: ".$user->name."<br></br>
            Email Address: ".$user->email."<br></br>
            New Password: ".$code."<br></br>
           
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
        $headers .= 'From: <support@backpage.online>' . "\r\n";
        // $headers .= 'Cc:support@crackerclassifieds.com'. "\r\n";

        mail($to,$subject,$message,$headers); 

        $this->session->set_flashdata('succ','You Can login now by using your new Password..');
        redirect(base_url().'authentication');
                  
       }

      }
  }
  // 
  public function logout()
  {
  $this->session->sess_destroy();
  $this->session->set_flashdata('succ','Logout Successfully..');
  redirect('/');
  }
  private function generate_code(int $length=6)
    {
      $otp="";
      $numbers="0123456789";
      for($i=0;$i<$length;$i++)
      {
        $otp.=$numbers[rand(0,strlen($numbers)-1)];
      }
      return $otp;
    }
    /////////////////
    public function oauth2callback()
    {
      $code=$this->generate_code();
      $email=$this->input->post('email');
      $name=$this->input->post('name');
      $date=date('Y-m-d');
      $check=$this->db->get_where('user_master',array('email'=>$email));
      if($check->num_rows()==0)
      {
       $data = array(
      'name'=>$this->input->post('name'),  
      'email'=> $this->input->post('email'),
      'password'=>$code,
      'register_date'  =>$date,
      'status'=> 'Approved',
      );
       $result=$this->db->insert('user_master',$data);
       $id=$this->db->insert_id();
       $user_qry=$this->db->get_where('user_master',array('id'=>$id))->row();
        $email_qry=$this->db->get('email_master')->row();
        $to = $email;
        $subject = $email_qry->reg_title;
        $message = "
        <html>
        <body>
        <h1>WelCome to Cracker Classifieds</h1>
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
        $headers .= 'From: <support@backpage.online>' . "\r\n";
        // $headers .= 'Cc: support@crackerclassifieds.com'. "\r\n";
        // $headers .= 'Bcc: crackerclassifieds@yahoo.com'. "\r\n";

        mail($to,$subject,$message,$headers);
       $this->session->set_userdata('login_id',$user_qry->id);
       $this->session->set_userdata('email',$user_qry->email);    
        echo"editprofile";
      }
      if($check->num_rows()!=0)
      {
       $user=$check->row();
       $this->session->set_userdata('login_id',$user->id);
       $this->session->set_userdata('email',$user->email);
       echo"profile";
      }
    }
  }

 ?>