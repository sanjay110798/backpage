<?php
class Listing_model extends CI_Model
{

/////////Reviewer validation///////////////
public function get_count($category) {
    return $this->db->get_where('ad_master',array('category_id'=>$category,'status'=>'Active'))->num_rows();
    
}
public function get_count2($sub_id) {

    return $this->db->get_where('ad_master',array('subcat_id'=>$sub_id,'status'=>'Active'))->num_rows();
	  
}
public function get_count3($child_id) {

    return $this->db->get_where('ad_master',array('sub_child_id'=>$child_id,'status'=>'Active'))->num_rows();
	  
}
public function get_count4($cat_id,$country) {

    return $this->db->get_where('ad_master',array('country'=>$country,'category_id'=>$cat_id,'status'=>'Active'))->num_rows();
	  
}
public function fetchpost($limit, $start,$cat_id)
{
	$this->db->order_by('id','desc');
// $post_qry=$this->db->get_where('ad_master',array('category_id'=>$cat_id,'status'=>'Active'));
// return $post_qry->result();
	 $this->db->limit($limit, $start);
      $post_qry=$this->db->get_where('ad_master',array('category_id'=>$cat_id,'status'=>'Active'));
      return $post_qry->result();
}
//////////////////////////////////////
public function fetchpost2($limit, $start,$sub_id)
{
	// echo $limit." ".$start." ".$sub_id;
$this->db->order_by('id','desc');

$post_qry=$this->db->get_where('ad_master',array('subcat_id'=>$sub_id,'status'=>'Active'));
// print_r($post_qry->result());
return $post_qry->result();
}
///////////////////////////////////////
public function fetchpost3($limit, $start,$child_id)
{
$this->db->order_by('id','desc');
$this->db->limit($limit, $start);	
$post_qry=$this->db->get_where('ad_master',array('sub_child_id'=>$child_id,'status'=>'Active'));
return $post_qry->result();
}
public function fetchpost4($limit, $start,$cat_id,$country)
{
$this->db->order_by('id','desc');
$this->db->limit($limit, $start);
$post_qry=$this->db->get_where('ad_master',array('country'=>$country,'category_id'=>$cat_id,'status'=>'Active'));
return $post_qry->result();
}
///////////list by category name and country///////////////////

///////////////
public function fetchpost5()
{
$item=$this->input->post('item');
$location=$this->input->post('location');
$loc=explode(',', $location);
$l=explode(" ",$loc[0]);
$range=$this->input->post('radius');


$i1_qry=$this->db->get_where('category_master',array('category_name'=>$item));
$i1=$i1_qry->num_rows();
$i11=$i1_qry->row();

$i2_qry=$this->db->get_where('subcategory_master',array('subcategory_name'=>$item));
$i2=$i2_qry->num_rows();
$i22=$i2_qry->row();

$i3_qry=$this->db->get_where('child_sub_master',array('child_sub_name'=>$item));
$i3=$i3_qry->num_rows();
$i33=$i3_qry->row();

$latitude=$this->input->post('Latitude11');
$longitude=$this->input->post('Longitude11');
// $latitude=1;
// $longitude=2;
//echo $latitude." ".$longitude." ".$range;
//die();
// Find Max - Min Lat / Long for Radius and zero point and query  
 $lat_range = $range/69.172;  
 $lon_range = abs($range/(cos($latitude) * 69.172));  
 $min_lat = number_format($latitude - $lat_range, "4", ".", "");  
 $max_lat = number_format($latitude + $lat_range, "4", ".", "");  
 $min_lon = number_format($longitude - $lon_range, "4", ".", "");  
 $max_lon = number_format($longitude + $lon_range, "4", ".", "");  
//////////////////////////

/////////////////////
if($item!='' && $location!='')
{
if($i1==0 && $i2==0 && $i3!=0)
{
 // $post_qry=$this->db->get_where('ad_master',array('sub_child_id'=>$i33->id));
 //    return $post_qry->result();
$sqlstr =  $this->db->query("SELECT * FROM ad_master WHERE latitude BETWEEN '".$min_lat."' AND '".$max_lat."' AND longitude BETWEEN '".$min_lon."' AND '".$max_lon."'AND sub_child_id='".$i33->id."'");  
if($sqlstr->num_rows()==0)
	{
		$this->db->order_by('id','desc');
		$this->db->like('country',"$l[0]");
		$sql1=$this->db->get_where('ad_master',array('sub_child_id'=>$i33->id));
		if($sql1->num_rows()!=0)
		{
			return $sql1->result();
		}
		if($sql1->num_rows()==0)
		{
			$this->db->order_by('id','desc');
			$this->db->like('state',"$l[0]");
			$sql2=$this->db->get_where('ad_master',array('sub_child_id'=>$i33->id));
			if($sql2->num_rows()!=0)
			{
				$this->db->order_by('id','desc');
				$this->db->like('city',"$l[0]");
				$sql3=$this->db->get_where('ad_master',array('sub_child_id'=>$i33->id));
				if($sql3->num_rows()!=0)
				{
					return $sql3->result();
				}
				if($sql3->num_rows()==0)
				{
				return $sql2->result();
			    }
			}
			if($sql2->num_rows()==0)
			{
				$this->db->order_by('id','desc');
				$this->db->like('city',"$l[0]");
				$sql3=$this->db->get_where('ad_master',array('sub_child_id'=>$i33->id));
				if($sql3->num_rows()!=0)
				{
					return $sql3->result();
				}
				if($sql3->num_rows()==0)
				{
					$this->session->set_flashdata('AdshowError4','No Ads!!');
                    $sql4=$this->db->get_where('ad_master',array('sub_child_id'=>$i33->id));
					return $sql4->result();
				}
			}

		}

	} 
	if($sqlstr->num_rows()!=0)
	{
		return $sqlstr->result(); 
	}
}
if($i1==0 && $i2!=0 && $i3==0)
{

 // $post_qry=$this->db->get_where('ad_master',array('subcat_id'=>$i22->id));
 //    return $post_qry->result();
$sqlstr =  $this->db->query("SELECT * FROM ad_master WHERE latitude BETWEEN '".$min_lat."' AND '".$max_lat."' AND longitude BETWEEN '".$min_lon."' AND '".$max_lon."'AND subcat_id='".$i22->id."'");  
if($sqlstr->num_rows()==0)
	{
		$this->db->order_by('id','desc');
		$this->db->like('country',"$l[0]");
		$sql1=$this->db->get_where('ad_master',array('subcat_id'=>$i22->id));
		if($sql1->num_rows()!=0)
		{
			return $sql1->result();
		}
		if($sql1->num_rows()==0)
		{
			$this->db->order_by('id','desc');
			$this->db->like('state',"$l[0]");
			$sql2=$this->db->get_where('ad_master',array('subcat_id'=>$i22->id));
			if($sql2->num_rows()!=0)
			{
				$this->db->order_by('id','desc');
				$this->db->like('city',"$l[0]");
				$sql3=$this->db->get_where('ad_master',array('subcat_id'=>$i22->id));
				if($sql3->num_rows()!=0)
				{
					return $sql3->result();
				}
				if($sql3->num_rows()==0)
				{
				return $sql2->result();
			     }
			}
			if($sql2->num_rows()==0)
			{
				$this->db->order_by('id','desc');
				$this->db->like('city',"$l[0]");
				$sql3=$this->db->get_where('ad_master',array('subcat_id'=>$i22->id));
				if($sql3->num_rows()!=0)
				{
					return $sql3->result();
				}
				if($sql3->num_rows()==0)
				{
					$this->session->set_flashdata('AdshowError3','No Ads!!');
                    $sql4=$this->db->get_where('ad_master',array('subcat_id'=>$i22->id));
					return $sql4->result();
				}
			}

		}

	} 
	if($sqlstr->num_rows()!=0)
	{
		return $sqlstr->result(); 
	}
}
if($i1!=0 && $i2==0 && $i3==0)
{

 // $post_qry=$this->db->get_where('ad_master',array('category_id'=>$i11->id));
 //    return $post_qry->result();
$sqlstr =  $this->db->query("SELECT * FROM ad_master WHERE latitude BETWEEN '".$min_lat."' AND '".$max_lat."' AND longitude BETWEEN '".$min_lon."' AND '".$max_lon."'AND category_id='".$i11->id."'");  
if($sqlstr->num_rows()==0)
	{
		$this->db->order_by('id','desc');
		$this->db->like('country',"$l[0]");
		$sql1=$this->db->get_where('ad_master',array('category_id'=>$i11->id));
		if($sql1->num_rows()!=0)
		{
			return $sql1->result();
		}
		if($sql1->num_rows()==0)
		{
			$this->db->order_by('id','desc');
			$this->db->like('state',"$l[0]");
			$sql2=$this->db->get_where('ad_master',array('category_id'=>$i11->id));
			if($sql2->num_rows()!=0)
			{
				$this->db->order_by('id','desc');
				$this->db->like('city',"$l[0]");
				$sql3=$this->db->get_where('ad_master',array('category_id'=>$i11->id));
				if($sql3->num_rows()!=0)
				{
					return $sql3->result();
				}
				if($sql3->num_rows()==0)
				{
				return $sql2->result();
			    }
			}
			if($sql2->num_rows()==0)
			{
				$this->db->order_by('id','desc');
				$this->db->like('city',"$l[0]");
				$sql3=$this->db->get_where('ad_master',array('category_id'=>$i11->id));
				if($sql3->num_rows()!=0)
				{
					return $sql3->result();
				}
				if($sql3->num_rows()==0)
				{
					$this->session->set_flashdata('AdshowError','No Ads!!');
                    $sql4=$this->db->get_where('ad_master',array('category_id'=>$i11->id));
					return $sql4->result();
				}
			}

		}

	} 
	if($sqlstr->num_rows()!=0)
	{
		return $sqlstr->result(); 
	}
}
}

}
public function defaultfetchpost5()
{
$this->db->order_by('id','RANDOM');
$cat_qry=$this->db->get('category_master',1)->result();
foreach($cat_qry as $cat)
{
 $this->db->order_by('id','RANDOM');
 $this->db->order_by('id','desc');
 $post_qry=$this->db->get_where('ad_master',array('category_id'=>$cat->id,'status'=>'Active'));
 return $post_qry->result();	
}

}
///
public function fetchpost55()
{
$item=$this->input->post('item');
$location=$this->input->post('location');
$loc=explode(',', $location);
$l=explode(" ",$loc[0]);
$range=$this->input->post('radius');


$i1_qry=$this->db->get_where('category_master',array('category_name'=>$item));
$i1=$i1_qry->num_rows();
$i11=$i1_qry->row();

$i2_qry=	$this->db->get_where('subcategory_master',array('subcategory_name'=>$item));
$i2=$i2_qry->num_rows();
$i22=$i2_qry->row();

$i3_qry=$this->db->get_where('child_sub_master',array('child_sub_name'=>$item));
$i3=$i3_qry->num_rows();
$i33=$i3_qry->row();
$cat=$this->db->get_where('category_master',array('category_name'=>'PERSONALS'))->row();
$latitude=$this->input->post('Latitude11');
$longitude=$this->input->post('Longitude11');
// $latitude=1;
// $longitude=2;
//echo $latitude." ".$longitude." ".$range;
//die();
// Find Max - Min Lat / Long for Radius and zero point and query  
 $lat_range = $range/69.172;  
 $lon_range = abs($range/(cos($latitude) * 69.172));  
 $min_lat = number_format($latitude - $lat_range, "4", ".", "");  
 $max_lat = number_format($latitude + $lat_range, "4", ".", "");  
 $min_lon = number_format($longitude - $lon_range, "4", ".", "");  
 $max_lon = number_format($longitude + $lon_range, "4", ".", "");  

	$sqlstr =  $this->db->query("SELECT * FROM ad_master WHERE latitude BETWEEN '".$min_lat."' AND '".$max_lat."' AND longitude BETWEEN '".$min_lon."' AND '".$max_lon."' AND category_id != '".$cat->id."'"); 
	if($sqlstr->num_rows()==0)
	{
		$this->db->order_by('id','desc');
		$this->db->like('country',"$l[0]");
		$sql1=$this->db->get_where('ad_master',array('category_id !='=>$cat->id));
		if($sql1->num_rows()!=0)
		{
			return $sql1->result();
		}
		if($sql1->num_rows()==0)
		{
			$this->db->order_by('id','desc');
			$this->db->like('state',"$l[0]");
			$sql2=$this->db->get_where('ad_master',array('category_id !='=>$cat->id));
			if($sql2->num_rows()!=0)
			{
				$this->db->order_by('id','desc');
				$this->db->like('city',"$l[0]");
				$sql3=$this->db->get_where('ad_master',array('category_id !='=>$cat->id));
				if($sql3->num_rows()!=0)
				{
					return $sql3->result();
				}
				if($sql3->num_rows()==0)
				{
				return $sql2->result();
			}
			}
			if($sql2->num_rows()==0)
			{
				$this->db->order_by('id','desc');
				$this->db->like('city',"$l[0]");
				$sql3=$this->db->get_where('ad_master',array('category_id !='=>$cat->id));
				if($sql3->num_rows()!=0)
				{
					return $sql3->result();
				}
				if($sql3->num_rows()==0)
				{
					$cat=$this->db->get_where('category_master',array('category_name'=>'PERSONALS'))->row();
					$this->session->set_flashdata('AdshowError2','Sorry! No Ads In This Location');
					$this->db->order_by('rand()');
                    $this->db->limit(5);
					$sql4=$this->db->get_where('ad_master',array('category_id !='=>$cat->id));
					return $sql4->result();
				}
			}

		}

	} 
	if($sqlstr->num_rows()!=0)
	{
		return $sqlstr->result(); 
	}

}
//////////////////
public function fetchpost555()
{
$item=$this->input->post('item');
$location=$this->input->post('location');
$range=$this->input->post('radius');


$i1_qry=$this->db->get_where('category_master',array('category_name'=>$item));
$i1=$i1_qry->num_rows();
$i11=$i1_qry->row();

$i2_qry=$this->db->get_where('subcategory_master',array('subcategory_name'=>$item));
$i2=$i2_qry->num_rows();
$i22=$i2_qry->row();

$i3_qry=$this->db->get_where('child_sub_master',array('child_sub_name'=>$item));
$i3=$i3_qry->num_rows();
$i33=$i3_qry->row();

$latitude=$this->input->post('Latitude11');
$longitude=$this->input->post('Longitude11');
// $latitude=1;
// $longitude=2;
//echo $latitude." ".$longitude." ".$range;
//die();
// Find Max - Min Lat / Long for Radius and zero point and query  
 $lat_range = $range/69.172;  
 $lon_range = abs($range/(cos($latitude) * 69.172));  
 $min_lat = number_format($latitude - $lat_range, "4", ".", "");  
 $max_lat = number_format($latitude + $lat_range, "4", ".", "");  
 $min_lon = number_format($longitude - $lon_range, "4", ".", "");  
 $max_lon = number_format($longitude + $lon_range, "4", ".", "");  
 

if($item!='' && $location=='')
{
if($i1==0 && $i2==0 && $i3!=0)
{
	$this->db->order_by('id','desc');
 $post_qry=$this->db->get_where('ad_master',array('sub_child_id'=>$i33->id,'status'=>'Active'));
    return $post_qry->result();

}
if($i1==0 && $i2!=0 && $i3==0)
{
	$this->db->order_by('id','desc');

 $post_qry=$this->db->get_where('ad_master',array('subcat_id'=>$i22->id,'status'=>'Active'));
    return $post_qry->result();
}
if($i1!=0 && $i2==0 && $i3==0)
{
	$this->db->order_by('id','desc');

 $post_qry=$this->db->get_where('ad_master',array('category_id'=>$i11->id,'status'=>'Active'));
    return $post_qry->result();
}
}
}
//////////////////
  private function getlatlang($location)  
 {  
      $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='. urlencode($location) .'&sensor=false');  
        
      $output= json_decode($geocode);  
   
      return $output->results[0]->geometry->location;  
 }  

////////////////////

}

?>