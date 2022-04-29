<?php
class Credit2_model extends CI_Model
{

public function fetchcredit()
{
$this->db->order_by('id','desc');
$credit_qry=$this->db->get('credit_master');
return $credit_qry->result();
}
public function credit_add()
		{
			$data = array(
			'credit_level'=>$this->input->post('credit_level'),
			'value'=>$this->input->post('value'),
		    // 'days'=>$this->input->post('days'),
		   	);	
			$result = $this->db->insert('credit_master', $data);
			return $result;
		
			
		}
	


public function fetch($id)
{

$credit_qry=$this->db->get_where('credit_master',array('id'=>$id));
return $credit_qry->result();
}


///////////////
public function editcredit($id)
{
$this->db->set('credit_level',$this->input->post('credit_level'));
$this->db->set('value',$this->input->post('value'));
// $this->db->set('days',$this->input->post('days'));
$this->db->where('id',$id);
$result=$this->db->update('credit_master');
return $result;
}


public function credit_delete($id)
{
	$this->db->delete('credit_master',array('id'=>$id));
	return $this;
}

}

?>