<?php
class Buy_model extends CI_Model
{

public function fetchcredit()
{
$this->db->order_by('id','desc');
$credit_qry=$this->db->get('credit_ad_details');
return $credit_qry->result();
}
public function credit_add()
		{
			$data = array(
			'credit_id'=>$this->input->post('credit_id'),
			'user_id'=>$this->input->post('user_id'),
		    
		   	);	
			$result = $this->db->insert('credit_ad_details', $data);
			if($result)
			{
				$u_qry=$this->db->get_where('user_master',array('id'=>$this->input->post('user_id')))->row();
                 $c_qry=$this->db->get_where('credit_master',array('id'=>$this->input->post('credit_id')))->row();
				$val=($u_qry->credit_value)+($c_qry->value);
			    $this->db->set('credit_value',$val);
                $this->db->where('id',$this->input->post('user_id'));
                $rs=$this->db->update('user_master');
                if($rs)
                {
                	return $rs;
                }
				
			}
		
			
		}
	


public function fetch($id)
{

$credit_qry=$this->db->get_where('credit_ad_details',array('id'=>$id));
return $credit_qry->result();
}


///////////////
public function editcredit($id)
{
$this->db->set('credit_id',$this->input->post('credit_id'));
$this->db->set('user_id',$this->input->post('user_id'));

$this->db->where('id',$id);
$result=$this->db->update('credit_ad_details');
return $result;
}


public function credit_delete($id)
{
	$this->db->delete('credit_ad_details',array('id'=>$id));
	return $this;
}

}

?>