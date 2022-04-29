<?php
class City_model extends CI_Model
{

public function fetchcity()
{
$this->db->order_by("city_name","ASC");
$city_qry=$this->db->get('city_master');
return $city_qry->result();
}
public function city_add()
		{
			$data = array(
			'country_id'=>$this->input->post('country_id'),
			'city_name'=>$this->input->post('city_name'),
		   	);	
			$result = $this->db->insert('city_master', $data);
			return $result;
		
			
		}
public function fetch($id)
{

$city_qry=$this->db->get_where('city_master',array('id'=>$id));
return $city_qry->result();
}
public function editcity($id)
{
$this->db->set('country_id',$this->input->post('country_id'));
$this->db->set('city_name',$this->input->post('city_name'));
$this->db->where('id',$id);
$result=$this->db->update('city_master');
return $result;
            

}
public function city_delete($id)
{
	$this->db->delete('city_master',array('id'=>$id));
	return $this;
}


}

?>