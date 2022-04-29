<?php
class User_model extends CI_Model
{
public function get_count($array=array()) {
  
	if($array !='' && $array !=NULL && !empty($array))
	{
	$this->db->like($array);
	$query = $this->db->get_where('user_master',array('status !='=>'Pendding'))->num_rows();
	}
	else{
	$query = $this->db->get_where('user_master',array('status !='=>'Pendding'))->num_rows(); 
	}
	return $query;
}
public function fetchcustomer($array=array(),$limit, $start)
// public function fetchcustomer()
{

if($array !='' && $array !=NULL && !empty($array))
$this->db->like($array);
$this->db->order_by('id','desc');
$this->db->limit($limit, $start);
$user_qry=$this->db->get_where('user_master',array('status !='=>'Pendding'));

	if ($user_qry->num_rows() > 0){

	return $user_qry->result();        

	}else{

	return array();

	}
}
public function user_add()
		{
			// $upload_dir= 'upload/';
			// $temp_error = $_FILES['image']['error'];
	  
			// $file_name 	= time().'_'.$_FILES['image']['name']; 
			// $tmp_name 	= $_FILES['image']['tmp_name'];
			// $file_size 	= $_FILES['image']['size'];
		
			// move_uploaded_file($tmp_name,$upload_dir.$file_name);
			$dt=date('Y-m-d');
			$c_qry=$this->db->get_where('credit_master',array('id'=>$this->input->post('credit_id')))->row();         
			$data = array(
							'name'=>$this->input->post('name'),
							'email'=>$this->input->post('email'),
							'password'=>$this->input->post('pass'),
							// 'image'=>$file_name,
							'country'=>$this->input->post('country'),
							'state'=>$this->input->post('state'),
							'city'=>$this->input->post('city'),
							'address'=>$this->input->post('address'),
							'mobile_code'=>$this->input->post('phonecode_id'),
							'mobile'=>$this->input->post('mobile'),
							'register_date'=>$dt,
							'credit_value'=>$c_qry->value,
							'status'=>'Approved',
				);	
			$result = $this->db->insert('user_master', $data);		
			return $result;
		
			
		}
public function fetchuser($id)
{

$user_qry=$this->db->get_where('user_master',array('id'=>$id));
return $user_qry->result();
}
public function edituser($id)
{
	  //       $upload_dir= 'upload/';
			// $temp_error = $_FILES['image']['error'];
	  
			// $file_name 	= time().'_'.$_FILES['image']['name']; 
			// $tmp_name 	= $_FILES['image']['tmp_name'];
			// $file_size 	= $_FILES['image']['size'];
		
			// move_uploaded_file($tmp_name,$upload_dir.$file_name);
			$dt=date('Y-m-d');

            // if($_FILES['image']['name']!='')
            // {
            // 	$this->db->set('name',$this->input->post('name'));
            // 	$this->db->set('email',$this->input->post('email'));
            // 	$this->db->set('password',$this->input->post('pass'));
            // 	$this->db->set('image',$file_name);
            // 	$this->db->set('country_id',$this->input->post('country_id'));
            // 	$this->db->set('city_id',$this->input->post('city_id'));
            // 	$this->db->set('register_date',$dt);
            // 	$this->db->where('id',$id);
            // 	$result=$this->db->update('user_master');
            // 	return $result;
            // }
            
                $this->db->set('name',$this->input->post('name'));
            	$this->db->set('email',$this->input->post('email'));
            	$this->db->set('password',$this->input->post('pass'));
            	$this->db->set('country',$this->input->post('country'));
            	$this->db->set('state',$this->input->post('state'));
            	$this->db->set('city',$this->input->post('city'));
            	$this->db->set('address',$this->input->post('address'));
            	$this->db->set('register_date',$dt);
            	$this->db->where('id',$id);
            	$result=$this->db->update('user_master');
            	return $result;
           

}
public function user_delete($id)
{
	$this->db->delete('user_master',array('id'=>$id));
	return $this;
}


}

?>