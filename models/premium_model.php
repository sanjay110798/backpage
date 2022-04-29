<?php
class Premium_model extends CI_Model
{


public function fetchpremiumad($array=array(),$limit, $start)
// public function fetchad()
{
$date=date('Y-m-d');
if($array !='' && $array !=NULL && !empty($array))
{
$this->db->like($array);
}
$this->db->order_by('id','desc');
$this->db->limit($limit, $start);
$ad_qry=$this->db->get_where('premium_ad_details',array('days >=' =>$date));
if ($ad_qry->num_rows() > 0){

return $ad_qry->result();        

}else{

return array();

}

}



}

?>