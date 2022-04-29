<?php

class Category_model extends CI_Model
{

public function fetchcategory()
{
	$cat_qry=$this->db->get('category_master');
	return $cat_qry->result();
}

public function category_add()
{
	        $upload_dir= 'upload/';
			$temp_error = $_FILES['category_icon']['error'];
	  
			$file_name 	= time().'_'.$_FILES['category_icon']['name']; 
			$tmp_name 	= $_FILES['category_icon']['tmp_name'];
			$file_size 	= $_FILES['category_icon']['size'];
		
			move_uploaded_file($tmp_name,$upload_dir.$file_name);

			if($_FILES['category_icon']['name']=='')
		    {
		    	$data = array(
				'category_name'=>$this->input->post('category_name'),
			    					
				 );	
			$result = $this->db->insert('category_master', $data);
			return $result;

		    }
			if($_FILES['category_icon']['name']!='')
			{
	        $data = array(
				'category_name'=>$this->input->post('category_name'),
			    'category_icon'=>'https://backpageclassifieds.com/upload/'.$file_name,					
				 );	
			$result = $this->db->insert('category_master', $data);
			return $result;
		    }
		   
}

public function category_delete($i_id)
{
	$this->db->delete('category_master', array('id'=>$i_id));
	return $this;
}
public function get_sub($id)
{
	$res=$this->db->get_where('subcategory_master',array('category_id'=>$id));
	return $res->result();
}
public function fetch($id)
{
	$in_qry = $this->db->get_where('category_master',array('id'=>$id));
    return $in_qry->result();
}

public function editcategory($p_id)
{
	        $upload_dir= 'upload/';
			$temp_error = $_FILES['category_icon']['error'];
	  
			$file_name 	= time().'_'.$_FILES['category_icon']['name']; 
			$tmp_name 	= $_FILES['category_icon']['tmp_name'];
			$file_size 	= $_FILES['category_icon']['size'];
		
			move_uploaded_file($tmp_name,$upload_dir.$file_name);
			if ($_FILES['category_icon']['name']=='') {
				$this->db->set('category_name',$this->input->post('category_name'));
                
                $this->db->where('id',$p_id);
                $result=$this->db->update('category_master');
                return $result;
			}
			if ($_FILES['category_icon']['name']!='') {
				$this->db->set('category_name',$this->input->post('category_name'));
                $this->db->set('category_icon','https://backpageclassifieds.com/upload/'.$file_name);
                $this->db->where('id',$p_id);
                $result=$this->db->update('category_master');
                return $result;
			}
	
}


}

?>