<?php
class Register_model extends CI_Model
{

/////////Reviewer validation///////////////
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

	//$sql =$this->db->get_where('user_master', array('email' => $this->input->post('email'),'status'=>'Approved'));
	$sql =$this->db->get_where('user_master', array('email' => $this->input->post('email')));
	$result = $sql->num_rows();
	
	if ($result != 0)
	   {
		$this->session->set_flashdata('error','Error ! Email Already Exists..');
		redirect('register');
	
	   }
	if($result == 0)
	{
	//$sql2 = $this->db->get_where('user_master', array('name' => $this->input->post('first_nm'),'status'=>'Approved'));
	$sql2 = $this->db->get_where('user_master', array('name' => $this->input->post('first_nm')));
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
		'status'=> 'Pendding',
	);
	
		$result1 = $this->db->insert('user_master', $data);
		$id=$this->db->insert_id();
		redirect('register/otp/'.$id);	
	  }
	}
  }
}

?>