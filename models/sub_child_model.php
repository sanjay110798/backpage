<?php

class Sub_child_model extends CI_Model
{

public function fetchsub_child()
{
	$this->db->order_by('child_sub_name');
	$cat_qry=$this->db->get('child_sub_master');
	return $cat_qry->result();
}

public function subchild_add()
{
	$data = array(
				'subcategory_id' => $this->input->post('subcategory_id'),
				'child_sub_name'=>$this->input->post('sub_child')
								
				 );	
			$result = $this->db->insert('child_sub_master', $data);
			return $result;
}

public function subchild_delete($i_id)
{
	$this->db->delete('child_sub_master', array('id' => $i_id));
	return $this;
}

public function fetch($id)
{
	$in_qry = $this->db->get_where('child_sub_master',array('id'=>$id));
    return $in_qry->result();
}

public function editsubchild($p_id)
{
	$this->db->set('subcategory_id',$this->input->post('subcategory_id'));
	$this->db->set('child_sub_name',$this->input->post('sub_child'));
    $this->db->where('id',$p_id);
    $result=$this->db->update('child_sub_master');
    return $result;
}


}

?>