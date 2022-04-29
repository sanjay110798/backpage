<?php
class Credit_model extends CI_Model
{

public function credit_add1()
		{
			$country=$this->input->post('country');
			for ($i=0, $n=count($country); $i < $n; $i++)

					{

						if($country[$i] != '')

						{

                            $data2 = array(

                                'country' => $country[$i],
                                'credit_id'=>$this->input->post('credit_id'),
                                'price'=>$this->input->post('price'),

                            );

                           $result = $this->db->insert('featured_ad', $data2);
			               

                        }

                    }
                    return $result;
			
		}
		
////////////////////
		public function credit_add3()
		{
			$data = array(
			'country_id'=>$this->input->post('country_id'),
			'credit_id'=>$this->input->post('credit_id'),
			'price'=>$this->input->post('price'),
		   	);	
			$result = $this->db->insert('premium_ad', $data);
			return $result;
		
			
		}

public function fetch($id)
{

$credit_qry=$this->db->get_where('featured_ad',array('id'=>$id));
return $credit_qry->result();
}

//////////////////
public function fetch3($id)
{

$credit_qry=$this->db->get_where('premium_ad',array('id'=>$id));
return $credit_qry->result();
}
///////////////
public function editcredit($id)
{
$this->db->set('country',$this->input->post('country'));
$this->db->set('credit_id',$this->input->post('credit_id'));
$this->db->set('price',$this->input->post('price'));
$this->db->where('id',$id);
$result=$this->db->update('featured_ad');
return $result;
}
///////////////

public function editcredit3($id)
{
$this->db->set('country_id',$this->input->post('country_id'));
$this->db->set('credit_id',$this->input->post('credit_id'));
$this->db->set('price',$this->input->post('price'));
$this->db->where('id',$id);
$result=$this->db->update('premium_ad');
return $result;
            

}
public function credit_delete($id)
{
	$this->db->delete('featured_ad',array('id'=>$id));
	return $this;
}

public function credit_delete3($id)
{
	$this->db->delete('premium_ad',array('id'=>$id));
	return $this;
}


}

?>