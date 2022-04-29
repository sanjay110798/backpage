<?php
class Ad_model extends CI_Model
{

public function ad_add()
		{

			$upload_dir= 'upload/';
			$temp_error = $_FILES['image']['error'];
	  
			$file_name 	= time().'_'.$_FILES['image']['name']; 
			$tmp_name 	= $_FILES['image']['tmp_name'];
			$file_size 	= $_FILES['image']['size'];
		
			move_uploaded_file($tmp_name,$upload_dir.$file_name);
			//$dt=$this->db->get_where('user_master',array('id'=>$this->input->post('user_id')))->row();
			$date=date('Y-m_d');
			$data = array(
							'user_id'=>$this->input->post('user_id'),
							'country'=>$this->input->post('country'),
							'state'=>$this->input->post('state'),
							'city'=>$this->input->post('city'),
							
							'zip_code'=>$this->input->post('zip_code'),
							'category_id'=>$this->input->post('category_id'),
							'subcat_id'=>$this->input->post('subcategory_id'),
							'sub_child_id'=>$this->input->post('subchildcategory_id'),
							'ad_title'=>addslashes(utf8_encode($this->input->post('ad_title'))),
							'ad_description'=>addslashes(utf8_encode($this->input->post('subject'))),
							'ad_image'=>$file_name,
							'location'=>$this->input->post('location'),
							'latitude'=>$this->input->post('lat'),
							'longitude'=>$this->input->post('lan'),
							'Web_link'=>$this->input->post('website'),
							'contact_number'=>$this->input->post('phone'),
							'email_address'=>$this->input->post('e_mail'),
							'posted_date'=>$date,
				);	
			$result = $this->db->insert('ad_master', $data);
			$ad_id=$this->db->insert_id();
            //return $result;
            ///
            if($result)
              {
                             
                         
                 foreach($_FILES['otherimage']['tmp_name'] as $key => $image)
                    {
                       
                            $file_name  = $_FILES['otherimage']['name'][$key]; 
                            $tmp_name   = $_FILES['otherimage']['tmp_name'][$key];
                            $temp_error = $_FILES['otherimage']['error'][$key]; 
                            $file_size  = $_FILES['otherimage']['size'][$key];
                            $upload_dir= 'detailsimage/';
                            move_uploaded_file($tmp_name,$upload_dir.$file_name); 
                        
                        $data3=array(
                         'ad_id'=>$ad_id,
                         'ad_details_image'=>$file_name,
                        );
                        $result3=$this->db->insert('details_image_master',$data3);
                    
                    }
    

              }
			if($result3)
			{

			  $m_key = $this->input->post('meta_key');
             //print_r($m_key);
           
			  foreach($m_key as $val)
			  {
			  	// echo $val.'<br>';
			  	// echo $this->input->post('meta_value'.$val).'<br>';
			  	
              $data=array(
                  'ad_id'=>$ad_id,
                   'meta_key'=>$val,
                   'meta_value'=>$this->input->post('meta_value'.$val)
			  );
			  $result2=$this->db->insert('additional_value_master',$data);
              }
              redirect('addpost/premium/'.$ad_id);
              
              }else{
               redirect('addpost/premium/'.$ad_id);
              }
               
              //exit();
			 }
public function fetch($id)
{

$ad_qry=$this->db->get_where('ad_master',array('id'=>$id,'status'=>'Active'));
return $ad_qry->result();
}

public function ad_delete($id)
{
	$this->db->delete('ad_master',array('id'=>$id));
	return $this;
}
////////////////Cart/////////////////////
public function addfcart($id,$u_id,$ad_id)
{
	$data=array(
      'type_id'=>$id,
      'ad_id'=>$ad_id,
      'user_id'=>$u_id,
	);
	$res=$this->db->insert('featured_ad_details',$data);
	$t_id=$this->db->insert_id();
	if($res)
	{
		redirect('cart/showfeaturedcart/'.$t_id.'/'.$ad_id.'/'.$u_id);
	}
}
///////////////////////////
public function addgcart($id,$u_id,$ad_id)
{
	$data=array(
      'type_id'=>$id,
      'ad_id'=>$ad_id,
      'user_id'=>$u_id,
	);
	$res=$this->db->insert('gallery_ad_details',$data);
	$t_id=$this->db->insert_id();
	if($res)
	{
		redirect('cart/showgallerycart/'.$t_id.'/'.$ad_id.'/'.$u_id);
	}
}
/////////////////////////////////////////////
public function addpcart($id,$u_id,$ad_id)
{
	$data=array(
      'type_id'=>$id,
      'ad_id'=>$ad_id,
      'user_id'=>$u_id,
	);
	$res=$this->db->insert('premium_ad_details',$data);
	$t_id=$this->db->insert_id();
	if($res)
	{
		redirect('cart/showpremiumcart/'.$t_id.'/'.$ad_id.'/'.$u_id);
	}
}



}

?>