<?php
class Show_model extends CI_Model
{

/////////Reviewer validation///////////////
public function get_count($id) {
	$cat=$this->db->get_where('category_master',array('category_name'=>'PERSONALS'))->row();
    $this->db->order_by('id','desc');
    return $this->db->get_where('ad_master',array('country'=>$id,'status'=>'Active','category_id !='=>$cat->id))->num_rows();
    
}
public function get_count2($id) {
	$cat=$this->db->get_where('category_master',array('category_name'=>'PERSONALS'))->row();
    $this->db->order_by('id','desc');
    return $this->db->get_where('ad_master',array('state'=>$id,'status'=>'Active','category_id !='=>$cat->id))->num_rows();
    
}
public function fetchpost($limit, $start,$id)
{
$cat=$this->db->get_where('category_master',array('category_name'=>'PERSONALS'))->row();
// $this->db->limit($limit, $start);
$this->db->order_by('id','desc');
$post_qry=$this->db->get_where('ad_master',array('country'=>$id,'status'=>'Active','category_id !='=>$cat->id));
return $post_qry->result();
}
//////////////////////////////////////
public function fetchpost2($limit, $start,$id)
{
$cat=$this->db->get_where('category_master',array('category_name'=>'PERSONALS'))->row();
// $this->db->limit($limit, $start);
$this->db->order_by('id','desc');
$post_qry=$this->db->get_where('ad_master',array('state'=>$id,'status'=>'Active','category_id !='=>$cat->id));
return $post_qry->result();
}
///////////////////////////////////////
public function fetchpost3($country_id,$city_id)
{
	$this->db->order_by('id','desc');
$post_qry=$this->db->get_where('ad_master',array('country'=>$country_id,'state'=>$city_id,'status'=>'Active'));
return $post_qry->result();
}
public function fetchpost4($cat_id,$city_id)
{
	$this->db->order_by('id','desc');
$post_qry=$this->db->get_where('ad_master',array('state'=>$city_id,'category_id'=>$cat_id,'status'=>'Active'));
return $post_qry->result();
}
public function fetchpost5($sub_id)
{
	$this->db->order_by('id','desc');
$post_qry=$this->db->get_where('ad_master',array('subcat_id'=>$sub_id,'status'=>'Active'));
return $post_qry->result();
}
///////////list by category name and country///////////////////


}

?>