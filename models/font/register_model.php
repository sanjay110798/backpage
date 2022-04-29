<?php
class Register_model extends CI_Model
{

/////////Reviewer validation///////////////
// public function register()
// {
// $first_name = $this->input->post('first_nm');
// //$last_name  = $this->input->post('last_nm');
// $upload_dir= 'upload/';
// 			$temp_error = $_FILES['user_image']['error'];
	  
// 			$file_name 	= time().'_'.$_FILES['user_image']['name']; 
// 			$tmp_name 	= $_FILES['user_image']['tmp_name'];
// 			$file_size 	= $_FILES['user_image']['size'];
		
// 			move_uploaded_file($tmp_name,$upload_dir.$file_name);
// $sql22 =$this->db->get_where('user_master', array('email' => $this->input->post('email'),'status'=>'Pendding'))->num_rows();
// if($sql22==0)
// {

// $sql =$this->db->get_where('user_master', array('email' => $this->input->post('email'),'status'=>'Approved'));
// $result = $sql->num_rows();

// if ($result != 0)
//    {
//     $this->session->set_flashdata('error','Error ! Email Already Exists..');
//     redirect('register');

//    }
// if($result == 0){
// 	$sql2 =$this->db->get_where('user_master', array('name' => $this->input->post('first_nm'),'status'=>'Approved'));
//     $result2 = $sql2->num_rows();
// if($result2!=0)
// {
//  $this->session->set_flashdata('error','Error ! User name Already Exists..');
//     redirect('register');
// }
// if($result2==0)
// {
// $date = date('Y-m-d H:i:s');
// $ct_qry=$this->db->get_where('cities',array('city_name'=>$this->input->post('city')))->row();
// $st_qry=$this->db->get_where('state_list_new',array('id'=>$ct_qry->state_id))->row();
// $data = array(
// 'name'=>$first_name,	
// 'email'=> $this->input->post('email'),
// 'password'=>$this->input->post('pass'),
// 'country'=>$this->input->post('country'),
// 'state'=>$st_qry->state_name,
// 'city'=>$this->input->post('city'),
// // 'address'=>$this->input->post('address'),
// 'mobile_code'=>$this->input->post('phonecode_id'),
// 'mobile'=>$this->input->post('mobile'),

// // 'image'=>$file_name,
// // 'country_id'=>$this->input->post('country_id'),
// // 'city_id'=>$this->input->post('city_id'),
// 'register_date'  =>$date,
// 'status'=> 'Pendding',

// );

// $result1 = $this->db->insert('user_master', $data);
// $id=$this->db->insert_id();
// redirect('register/otp/'.$id);	
// }


// }

// }
// if($sql22!=0)
// {
// $this->session->set_flashdata('error','Sorry !!! You Already Applied For Registration ,There is Something Wrong,So Your Registration is Pendding.Our Team will Activated Your Account and You will Get a Email From CrackerClassifieds,Please Check Your inbox or spam..THANK YOU');
// redirect('register');
// }
// }


//////////////////New Update ///////////////////////
public function register()
{
$first_name = $this->input->post('first_nm');
//$last_name  = $this->input->post('last_nm');
$upload_dir= 'upload/';
			$temp_error = $_FILES['user_image']['error'];
	  
			$file_name 	= time().'_'.$_FILES['user_image']['name']; 
			$tmp_name 	= $_FILES['user_image']['tmp_name'];
			$file_size 	= $_FILES['user_image']['size'];
		
			move_uploaded_file($tmp_name,$upload_dir.$file_name);
$sql22 =$this->db->get_where('user_master', array('email' => $this->input->post('email'),'status'=>'Pendding'))->num_rows();
if($sql22==0)
{

$sql =$this->db->get_where('user_master', array('email' => $this->input->post('email'),'status'=>'Approved'));
$result = $sql->num_rows();

if ($result != 0)
   {
    $this->session->set_flashdata('error','Error ! Email Already Exists..');
    redirect('register');

   }
if($result == 0){
	$sql2 =$this->db->get_where('user_master', array('name' => $this->input->post('first_nm'),'status'=>'Approved'));
    $result2 = $sql2->num_rows();
if($result2!=0)
{
 $this->session->set_flashdata('error','Error ! User name Already Exists..');
    redirect('register');
}
if($result2==0)
{
$date = date('Y-m-d H:i:s');
$ct_qry=$this->db->get_where('cities',array('city_name'=>$this->input->post('city')))->row();
$st_qry=$this->db->get_where('state_list_new',array('id'=>$ct_qry->state_id))->row();
$data = array(
'name'=>$first_name,	
'email'=> $this->input->post('email'),
'password'=>$this->input->post('pass'),
'country'=>$this->input->post('country'),
'state'=>$st_qry->state_name,
'city'=>$this->input->post('city'),
// 'address'=>$this->input->post('address'),
'mobile_code'=>$this->input->post('phonecode_id'),
'mobile'=>$this->input->post('mobile'),

// 'image'=>$file_name,
// 'country_id'=>$this->input->post('country_id'),
// 'city_id'=>$this->input->post('city_id'),
'register_date'  =>$date,
'status'=> 'Approved',

);

$result1 = $this->db->insert('user_master', $data);
$id=$this->db->insert_id();
// redirect('register/otp/'.$id);	
$user_qry=$this->db->get_where('user_master',array('id'=>$id))->row();
$email_qry=$this->db->get('email_master')->row();
$to = $user_qry->email;
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

<span>To Login into CrackerClassifieds.click
<a href='https://crackerclassifieds.com/login'>here</a>
</span>
</p>

</body>
</html>
";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <support@crackerclassifieds.com>' . "\r\n";
$headers .= 'Cc: support@crackerclassifieds.com'. "\r\n";
// $headers .= 'Bcc: crackerclassifieds@yahoo.com'. "\r\n";

mail($to,$subject,$message,$headers);              
////////////////
$this->session->set_flashdata('success','Thanks ! Register Successfully..');
redirect(base_url('login'));
}


}

}
if($sql22!=0)
{
$this->session->set_flashdata('error','Sorry !!! You Already Applied For Registration ,There is Something Wrong,So Your Registration is Pendding.Our Team will Activated Your Account and You will Get a Email From CrackerClassifieds,Please Check Your inbox or spam..THANK YOU');
redirect('register');
}
//////////////////////////
}
////////////////////////////////////////

}

?>