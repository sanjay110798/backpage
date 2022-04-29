<?php

class Faq_model extends CI_Model
{

public function fetchfaq()
{
	$faq_qry=$this->db->get('faq_master');
	return $faq_qry->result();
}

public function add_faq()
{
	$data = array(
				'faq_qus' => $this->input->post('qus'),
				'faq_ans' => $this->input->post('ans'),
						
				 );	
			$result = $this->db->insert('faq_master', $data);
			return $result;
}

public function delete($i_id)
{
	$this->db->delete('faq_master', array('id' => $i_id));
	return $this;
}

public function viewfaq($id)
{
	$in_qry = $this->db->get_where('faq_master',array('id'=>$id));
    return $in_qry->result();
}

public function edit_faq($p_id)
{
	$this->db->set('faq_qus',$this->input->post('qus'));
	$this->db->set('faq_ans',$this->input->post('ans'));
    $this->db->where('id',$p_id);
    $result=$this->db->update('faq_master');
    return $result;
}

public function inactive($i_id)
		{	
			$this->db->set('status','In-Active');
			$this->db->where('id',$i_id);
			$result=$this->db->update('faq_master');
			return $result;	
		}

public function active($i_id)
		{	
			$this->db->set('status','Active');
			$this->db->where('id',$i_id);
			$result=$this->db->update('faq_master');
			return $result;	
		}		

}