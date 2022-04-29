<?php
class Cityy_model extends CI_Model
{

public function fetchcity()
{
$this->db->order_by("city","ASC");
$city_qry=$this->db->get('city2_master');
return $city_qry->result();
}
public function city_add()
		{
			$data = array(
			'state_id'=>$this->input->post('state_id'),
			'city'=>$this->input->post('city_name'),
		   	);	
			$result = $this->db->insert('city2_master', $data);
			return $result;
		
			
		}
public function fetch($id)
{

$city_qry=$this->db->get_where('city2_master',array('id'=>$id));
return $city_qry->result();
}
public function editcity($id)
{
$this->db->set('state_id',$this->input->post('state_id'));
$this->db->set('city',$this->input->post('city_name'));
$this->db->where('id',$id);
$result=$this->db->update('city2_master');
return $result;
            

}
public function city_delete($id)
{
	$this->db->delete('city2_master',array('id'=>$id));
	return $this;
}


}

?>