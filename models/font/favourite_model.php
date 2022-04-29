<?php
class Favourite_model extends CI_Model
{

public function addfavourite($ad_id,$user_id)
		{
			$fav_qry=$this->db->get_where('favourite_ad',array('ad_id'=>$ad_id,'user_id'=>$user_id));
			$cnt=$fav_qry->num_rows();
			if ($cnt==0) {
				$data=array(
                
                'ad_id'=>$ad_id,
                'user_id'=>$user_id
            );
            $result=$this->db->insert('favourite_ad',$data);
            return $result;
			}
			
	   }

	   ///////////////
	   public function delfavourite($ad_id,$user_id)
	   {
	   	$this->db->delete('favourite_ad',array('ad_id'=>$ad_id,'user_id'=>$user_id));
	   	return $this;
	   }


}

?>