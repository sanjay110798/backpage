<?php

class Subcategory_model extends CI_Model
{

public function fetchsubcategory()
{    $this->db->order_by('subcategory_name','asc');
	$cat_qry=$this->db->get('subcategory_master');
	return $cat_qry->result();
}

public function subcategory_add()
{
	$data = array(
				'category_id' => $this->input->post('category_id'),
				'subcategory_name'=>$this->input->post('subcategory_name'),
								
				 );	
			$result = $this->db->insert('subcategory_master', $data);
			return $result;
}

public function subcategory_delete($i_id)
{
	$this->db->delete('subcategory_master', array('id' => $i_id));
	return $this;
}

public function fetch($id)
{
	$in_qry = $this->db->get_where('subcategory_master',array('id'=>$id));
    return $in_qry->result();
}

public function editsubcategory($p_id)
{
	$this->db->set('category_id',$this->input->post('category_id'));
	$this->db->set('subcategory_name',$this->input->post('subcategory_name'));
    $this->db->where('id',$p_id);
    $result=$this->db->update('subcategory_master');
    return $result;
}


}

?>