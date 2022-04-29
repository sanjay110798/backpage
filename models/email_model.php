<?php

class Email_model extends CI_Model
{

public function fetchemail()
{
	$faq_qry=$this->db->get('email_master');
	return $faq_qry->result();
}

public function add_email()
{
	$data = array(
				'reg_email' => $this->input->post('r_email'),
				'sup_email' => $this->input->post('s_email'),
				'reg_title' => $this->input->post('r_title'),
				'sup_title' => $this->input->post('s_title'),
				'reg_desc' => $this->input->post('r_desc'),
				'sup_desc' => $this->input->post('s_desc'),
						
				 );	
			$result = $this->db->insert('email_master', $data);
			return $result;
}

public function delete($i_id)
{
	$this->db->delete('email_master', array('id' => $i_id));
	return $this;
}

public function viewemail($id)
{
	$in_qry = $this->db->get_where('email_master',array('id'=>$id));
    return $in_qry->result();
}

public function edit_email($p_id)
{
	$this->db->set('reg_email',$this->input->post('r_email'));
	$this->db->set('sup_email',$this->input->post('s_email'));
	$this->db->set('reg_title',$this->input->post('r_title'));
	$this->db->set('sup_title',$this->input->post('s_title'));
	$this->db->set('reg_desc',$this->input->post('r_desc'));
    $this->db->set('sup_desc',$this->input->post('s_desc'));
    $this->db->where('id',$p_id);
    $result=$this->db->update('email_master');
    return $result;
}

}
?>