<?php

class Payment_model extends CI_Model
{

public function fetchpayment()
{
	$this->db->order_by('id','desc');
	$pmt_qry=$this->db->get('payment_master');
	return $pmt_qry->result();
}

public function add_payment()
{
	$date=date('Y-m-d');
	$data = array(
				'user_id' => $this->input->post('user_id'),
				'amount' => $this->input->post('amount'),
				'transaction_id'=>$this->input->post('t_id'),
				'payment_date'=>$date,		
				 );	
			$result = $this->db->insert('payment_master', $data);
			return $result;
}


public function viewpayment($id)
{
	$in_qry = $this->db->get_where('payment_master',array('id'=>$id));
    return $in_qry->result();
}

public function edit_payment($p_id)
{   
	$this->db->set('user_id',$this->input->post('user_id'));
	$this->db->set('amount',$this->input->post('amount'));
	$this->db->set('transaction_id',$this->input->post('t_id'));
	$this->db->set('payment_date',date('Y-m-d'));
    $this->db->where('id',$p_id);
    $result=$this->db->update('payment_master');
    return $result;
}

public function approved($i_id)
		{	
			$this->db->set('status','Approved');
			$this->db->where('id',$i_id);
			$result=$this->db->update('payment_master');
			return $result;	
		}
public function delete($i_id)
{
	$this->db->delete('payment_master', array('id' => $i_id));
	return $this;
}
	

}
?>