<?php
class Country_model extends CI_Model
{

public function fetchcountry()
{
$this->db->order_by("country_name","ASC");
$user_qry=$this->db->get('country_master');
return $user_qry->result();
}
public function country_add()
		{
			$upload_dir= 'upload/';
			$temp_error = $_FILES['image']['error'];
	  
			$file_name 	= time().'_'.$_FILES['image']['name']; 
			$tmp_name 	= $_FILES['image']['tmp_name'];
			$file_size 	= $_FILES['image']['size'];
		
			move_uploaded_file($tmp_name,$upload_dir.$file_name);
			if($_FILES['image']['name']==''){
				$data = array(
							'country_name'=>$this->input->post('name'),
						    // 'image'=>$file_name,
							
				);	
			$result = $this->db->insert('country_master', $data);
			return $result;
			}
			if($_FILES['image']['name']!='')
			{
				$data = array(
							'country_name'=>$this->input->post('name'),
						    'image'=>$file_name,
							
				);	
			$result = $this->db->insert('country_master', $data);
			return $result;
			}
			
		
			
		}
public function fetch($id)
{

$user_qry=$this->db->get_where('country_master',array('id'=>$id));
return $user_qry->result();
}
public function editcountry($id)
{
	        $upload_dir= 'upload/';
			$temp_error = $_FILES['image']['error'];
	  
			$file_name 	= time().'_'.$_FILES['image']['name']; 
			$tmp_name 	= $_FILES['image']['tmp_name'];
			$file_size 	= $_FILES['image']['size'];
		
			move_uploaded_file($tmp_name,$upload_dir.$file_name);
			$dt=date('Y-m-d');

            if($_FILES['image']['name']!='')
            {
            	$this->db->set('country_name',$this->input->post('name'));
                $this->db->set('image',$file_name);
                $this->db->where('id',$id);
            	$result=$this->db->update('country_master');
            	return $result;
            }
             if($_FILES['image']['name']=='')
            {
                $this->db->set('country_name',$this->input->post('name'));
            	$this->db->where('id',$id);
            	$result=$this->db->update('country_master');
            	return $result;
            }

}
public function country_delete($id)
{
	$this->db->delete('country_master',array('id'=>$id));
	return $this;
}


}

?>