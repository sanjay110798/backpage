<?php
class About_model extends CI_Model
{

public function fetchabout()
{

$about_qry=$this->db->get('about_master');
return $about_qry->result();
}
public function about_add()
		{		
			$data = array(
							'category_id'=>$this->input->post('category_id'),
						    'description'=>$this->input->post('description'),
							
				);	
			$result = $this->db->insert('about_master', $data);
			return $result;
		
			
		}
public function fetch($id)
{

$blog_qry=$this->db->get_where('about_master',array('id'=>$id));
return $blog_qry->result();
}
public function editabout($id)
{
$this->db->set('category_id',$this->input->post('category_id'));
$this->db->set('description',$this->input->post('description'));
$this->db->where('id',$id);
$result=$this->db->update('about_master');
return $result;          

}
public function about_delete($id)
{
	$this->db->delete('about_master',array('id'=>$id));
	return $this;
}


}

?>