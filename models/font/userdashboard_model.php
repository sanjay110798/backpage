<?php
class Userdashboard_model extends CI_Model
{

/////////Reviewer validation///////////////


public function edit($id)
{
	        $upload_dir= 'upload/';
			$temp_error = $_FILES['userimage']['error'];
	  
			$file_name 	= time().'_'.$_FILES['userimage']['name']; 
			$tmp_name 	= $_FILES['userimage']['tmp_name'];
			$file_size 	= $_FILES['userimage']['size'];
		
			move_uploaded_file($tmp_name,$upload_dir.$file_name);
			
			if ($_FILES['userimage']['name']!='') {
				$this->db->set('name',$this->input->post('user_name'));
				$this->db->set('email',$this->input->post('email_add'));
			    $this->db->set('password',$this->input->post('pasw_add'));
				$this->db->set('mobile',$this->input->post('mobile'));
				$this->db->set('image',$file_name);
				$this->db->set('nickname',$this->input->post('nick_name'));
				$this->db->set('birthday',$this->input->post('bday'));
				$this->db->set('gender',$this->input->post('gender'));
				$this->db->set('pic_url',1);
				$this->db->where('id',$id);
				$result=$this->db->update('user_master');
				return $result;
			}
			if ($_FILES['userimage']['name']=='') {
				$this->db->set('name',$this->input->post('user_name'));
				$this->db->set('email',$this->input->post('email_add'));
				$this->db->set('password',$this->input->post('pasw_add'));
				$this->db->set('mobile',$this->input->post('mobile'));
				
				$this->db->set('nickname',$this->input->post('nick_name'));
				$this->db->set('birthday',$this->input->post('bday'));
				$this->db->set('gender',$this->input->post('gender'));
				$this->db->where('id',$id);
				$result=$this->db->update('user_master');
				return $result;
			}
}
////
public function edit2($id)
{
			
			
				$this->db->set('street',$this->input->post('street'));
				$this->db->set('zipcode',$this->input->post('zipcode'));
				$this->db->set('usertype',$this->input->post('user_type'));
			
				$this->db->where('id',$id);
				$result=$this->db->update('user_master');
				return $result;
			
}
}

?>