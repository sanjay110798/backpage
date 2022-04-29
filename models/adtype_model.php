<?php
class Adtype_model extends CI_Model
{

public function fetchadtype()
{

$type_qry=$this->db->get('ad_type');
return $type_qry->result();
}
public function about_add()
		{		
			$data = array(
			'ad_type'=>$this->input->post('title'),
			);	
			$result = $this->db->insert('ad_type', $data);
			return $result;
		
			
		}
public function fetch($id)
{

$ad_qry=$this->db->get_where('ad_type',array('id'=>$id));
return $ad_qry->result();
}
public function editadtype($id)
{
$this->db->set('ad_type',$this->input->post('title'));
$this->db->where('id',$id);
$result=$this->db->update('ad_type');
return $result;          

}
public function adtype_delete($id)
{
	$this->db->delete('ad_type',array('id'=>$id));
	return $this;
}


}

?>