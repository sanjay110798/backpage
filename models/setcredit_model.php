<?php
class Setcredit_model extends CI_Model
{

public function fetchcrdt()
{
$this->db->order_by('id','desc');
$credit_qry=$this->db->get('premium_ad');
return $credit_qry->result();
}
public function credit_add()
		{
			$data = array(
			'days'=>$this->input->post('days'),
			'featured_credit'=>$this->input->post('featured_credit'),
		    'premium_credit'=>$this->input->post('premium_credit'),
		   	);	
			$result = $this->db->insert('premium_ad', $data);
			return $result;
		
			
		}
	


public function fetch($id)
{

$credit_qry=$this->db->get_where('premium_ad',array('id'=>$id));
return $credit_qry->result();
}


///////////////
public function editcredit($id)
{
$this->db->set('days',$this->input->post('days'));
$this->db->set('featured_credit',$this->input->post('featured_credit'));
$this->db->set('premium_credit',$this->input->post('premium_credit'));
$this->db->where('id',$id);
$result=$this->db->update('premium_ad');
return $result;
}


public function credit_delete($id)
{
	$this->db->delete('premium_ad',array('id'=>$id));
	return $this;
}

}

?>