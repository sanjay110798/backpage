<?php
class Blog_model extends CI_Model
{

public function fetchblog()
{

$blog_qry=$this->db->get('blog_master');
return $blog_qry->result();
}
public function blog_add()
		{		
			$data = array(
							'blog_title'=>$this->input->post('title'),
						    'blog_details'=>$this->input->post('details'),
							
				);	
			$result = $this->db->insert('blog_master', $data);
			return $result;
		
			
		}
public function fetch($id)
{

$blog_qry=$this->db->get_where('blog_master',array('id'=>$id));
return $blog_qry->result();
}
public function editblog($id)
{
$this->db->set('blog_title',$this->input->post('title'));
$this->db->set('blog_details',$this->input->post('details'));
$this->db->where('id',$id);
$result=$this->db->update('blog_master');
return $result;          

}
public function blog_delete($id)
{
	$this->db->delete('blog_master',array('id'=>$id));
	return $this;
}


}

?>