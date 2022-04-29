<?php

class Custom_model extends CI_Model
{

public function fetchcustom()
{
	$cust_qry=$this->db->get('additional_data_master');
	return $cust_qry->result();
}

public function custom_add()
{
	$data = array(
				'category_id' => $this->input->post('category_id'),
				'sub_category_id' => $this->input->post('subcategory_id'),
				'meta_key' =>str_replace(" ","_",$this->input->post('key_name')),
				'meta_type'=> $this->input->post('type'),
								
				 );	
			$result = $this->db->insert('additional_data_master', $data);
			return $result;
}

public function custom_delete($i_id)
{
	$this->db->delete('additional_data_master', array('id' => $i_id));
	return $this;
}

}

?>