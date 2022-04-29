<?php
class Ad_model extends CI_Model
{
  public function get_count() {
    return $this->db->get_where('ad_master',array('status'=>'Active'))->num_rows();
    
  }
  public function get_count_cat($array=array()) {
   
    if($array !='' && $array !=NULL && !empty($array))
    {
      $this->db->like($array);
      $query = $this->db->get_where('ad_master',array('status'=>'Active'))->num_rows();
    }
    else{
      $query = $this->db->get_where('ad_master',array('status'=>'Active'))->num_rows();  
    }
    return $query;
    
  }
  public function fetchad($limit, $start)
// public function fetchad()
  {
    $this->db->order_by('id','desc');
    $this->db->limit($limit, $start);
    $ad_qry=$this->db->get_where('ad_master',array('status'=>'Active'));
    return $ad_qry->result();
  }
  public function fetchad_by_cat($array=array(),$limit, $start)
  {

    if($array !='' && $array !=NULL && !empty($array))

      $this->db->like($array);

    $this->db->order_by("id","DESC");

    $this->db->limit($limit,$start);

    $query = $this->db->get_where('ad_master',array('status'=>'Active'));

    if ($query->num_rows() > 0){

      return $query->result();        

    }else{

      return array();

    }
  }
  public function ad_add()
  {
   $upload_dir= 'upload/';
   $temp_error = $_FILES['image']['error'];
   
   $file_name 	= time().'_'.$_FILES['image']['name']; 
   $tmp_name 	= $_FILES['image']['tmp_name'];
   $file_size 	= $_FILES['image']['size'];
   
   move_uploaded_file($tmp_name,$upload_dir.$file_name);

      // $file_name = time().'_'.$_FILES['image']['name'];
      // $config['image_library'] = 'gd2';
      // $config['source_image'] = $_FILES['image']['tmp_name'];
      // $config['create_thumb'] = FALSE;
      // $config['maintain_ratio'] = FALSE;
      // $config['width'] = 300;
      // $config['height'] = 300;
      // $config['new_image'] = 'upload/' . $file_name;
      // $this->load->library('image_lib', $config);
      // $this->image_lib->resize();
			// $dt=$this->db->get_where('user_master',array('id'=>$this->input->post('user_id')))->row();
     $det=$this->db->get_where('api_det',array('id'=>'1'))->row();
      $queryString = http_build_query([
      'access_key' => $det->loc_key,
    'query' => $this->input->post('location'),
    'output' => 'json',
    'limit' => 1,
  ]);

   $ch = curl_init(sprintf('%s?%s', 'http://api.positionstack.com/v1/forward', $queryString));
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

   $json = curl_exec($ch);

   curl_close($ch);

   $apiResult = json_decode($json, true);
   $date=date('Y-m-d');
   $last_date=date('Y-m-d', strtotime($date. " + 7 days"));
   $data = array(
     'user_id'=>$this->input->post('user_id'),
     'country'=>$this->input->post('country'),
     'state'=>$this->input->post('state'),
     'city'=>$this->input->post('city'),
     
     'zip_code'=>$this->input->post('zip_code'),
     'category_id'=>$this->input->post('category_id'),
     'subcat_id'=>$this->input->post('subcategory_id'),
     'sub_child_id'=>$this->input->post('sub_child'),
							//'ad_type'=>$this->input->post('type'),
							//'time_period'=>$this->input->post('time_period'),
							//'price'=>$this->input->post('price'),
     'ad_title'=>addslashes(utf8_encode($this->input->post('ad_title'))),
     'ad_description'=>$this->input->post('desc'),
     'ad_image'=>'https://backpageclassifieds.com/upload/'.$file_name,
     'location'=>$this->input->post('location'),
     'latitude'=>$apiResult['data'][0][latitude],
     'longitude'=>$apiResult['data'][0][longitude],
     'Web_link'=>$this->input->post('link'),
     'contact_number'=>$this->input->post('number'),
     'posted_date'=>$date,
     'status'=>'Active'
   );	
   $result = $this->db->insert('ad_master', $data);
   $ad_id=$this->db->insert_id();

   foreach($_FILES['gelleryimage']['tmp_name'] as $key => $image)
   {

    $file_name2  = time().'_'.$_FILES['gelleryimage']['name'][$key]; 
    $tmp_name   = $_FILES['gelleryimage']['tmp_name'][$key];
    $temp_error = $_FILES['gelleryimage']['error'][$key]; 
    $file_size  = $_FILES['gelleryimage']['size'][$key];
    $upload_dir= 'detailsimage/';
    move_uploaded_file($tmp_name,$upload_dir.$file_name2); 

    $data3=array(
      'ad_id'=>$ad_id,
      'ad_details_image'=>'https://backpageclassifieds.com/detailsimage/'.$file_name2,
    );
    $result3=$this->db->insert('details_image_master',$data3);

  }


  if($result)
  {
   $m_key = $this->input->post('meta_key');
             //print_r($m_key);
   if($m_key!='')
   {
     foreach($m_key as $val)
     {
			  	//echo $val.'<br>';
			  	//echo $this->input->post('meta_value'.$val).'<br>';
      
      $data=array(
        'ad_id'=>$ad_id,
        'meta_key'=>$val,
        'meta_value'=>$this->input->post('meta_value'.$val)
      );
      $result2=$this->db->insert('additional_value_master',$data);
    } 
  }
              //exit();
  if($result)
  {
    $date=date('Y-m-d');
    $featured_days=$this->input->post('c_featured_days');
    $premium_days=$this->input->post('c_premium_days');
    $last_datef=date('Y-m-d', strtotime($date. " + {$featured_days} days"));
    $last_datep=date('Y-m-d', strtotime($date. " + {$premium_days} days"));
    
    $dataf=array(
      'ad_id'=>$ad_id,
      'user_id'=>$this->input->post('user_id'),
      'days'=>$last_datef,
      'status'=>'Approved'
    );
    $resf=$this->db->insert('featured_ad_details',$dataf);
    $datap=array(
      'ad_id'=>$ad_id,
      'user_id'=>$this->input->post('user_id'),
      'days'=>$last_datep,
      'status'=>'Approved'
    );
    $resp=$this->db->insert('premium_ad_details',$datap);
    return $resp;
    
  }
  
}
else
{
  return $result;
}
}
public function fetch($id)
{

  $ad_qry=$this->db->get_where('ad_master',array('id'=>$id));
  return $ad_qry->result();
}
public function editad($id)
{
 
  $ad_qry=$this->db->get_where('ad_master',array('id'=>$id))->row();
  if($_FILES['image']['name']!='')
  {
    $upload_dir= 'upload/';
    $temp_error = $_FILES['image']['error'];

    $file_name  = time().'_'.$_FILES['image']['name']; 
    $tmp_name   = $_FILES['image']['tmp_name'];
    $file_size  = $_FILES['image']['size'];

    move_uploaded_file($tmp_name,$upload_dir.$file_name);
    $fil_name='https://backpageclassifieds.com/upload/'.$file_name;
  }
  if($_FILES['image']['name']=='')
  {
    $fil_name=$ad_qry->ad_image;
  }

  //   if($_FILES['video']['name']!='')
  //   {
  //       $upload_dir= 'video/';
  //       $temp_error = $_FILES['video']['error'];

  //       $video_name  = time().'_'.$_FILES['video']['name']; 
  //       $tmp_name   = $_FILES['video']['tmp_name'];
  //       $file_size  = $_FILES['video']['size'];

  //       move_uploaded_file($tmp_name,$upload_dir.$video_name);

  //       $vid_name='https://backpageclassifieds.com/video/'.$video_name;
  //   }
  //   if($_FILES['video']['name']=='')
  //   {
  //       $vid_name=$ad_qry->ad_video;
  //   }
  
  //   if($_FILES['gallery_image']['tmp_name'] !='')
  //   {

  //    foreach($_FILES['gallery_image']['tmp_name'] as $key => $image)
  //   {

  //   $file_name2  = time().'_'.$_FILES['gallery_image']['name'][$key]; 
  //   $tmp_name   = $_FILES['gallery_image']['tmp_name'][$key];
  //   $temp_error = $_FILES['gallery_image']['error'][$key]; 
  //   $file_size  = $_FILES['gallery_image']['size'][$key];
  //   $upload_dir= 'detailsimage/';
  //   move_uploaded_file($tmp_name,$upload_dir.$file_name2); 
  
  //   $data3=array(
  //   'ad_id'=>$ad_id,
  //   'ad_details_image'=>'https://backpageclassifieds.com/detailsimage/'.$file_name2,
  //   );
  //   $result3=$this->db->insert('details_image_master',$data3);

  //   } 
  // }
  $queryString = http_build_query([
    'access_key' => '74cc3c06e41e45735687178334aa0962',
    'query' => $this->input->post('location'),
    'output' => 'json',
    'limit' => 1,
  ]);

  $ch = curl_init(sprintf('%s?%s', 'http://api.positionstack.com/v1/forward', $queryString));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  $json = curl_exec($ch);

  curl_close($ch);

  $apiResult = json_decode($json, true);
  $dt=$this->db->get_where('user_master',array('id'=>$this->input->post('user_id')))->row();    
  $date=date('Y-m-d');
  $last_date=date('Y-m-d', strtotime($date. " + 5 days"));		
  $data=array(
    'user_id'=>$this->input->post('user_id'),
    'country'=>$this->input->post('country'),
    'state'=>$this->input->post('state'),
    'city'=>$this->input->post('city'),
    'zip_code'=>$this->input->post('zip_code'),
    'category_id'=>$this->input->post('category_id'),
    'subcat_id'=>$this->input->post('subcategory_id'),
    'ad_title'=>addslashes(utf8_encode($this->input->post('ad_title'))),
    'ad_description'=>addslashes(utf8_encode($this->input->post("desc"))),
    'ad_image'=>$fil_name,
  // 'ad_video'=>$vid_name,
    'location'=>$this->input->post('location'),
    'latitude'=>$apiResult['data'][0][latitude],
    'longitude'=>$apiResult['data'][0][longitude],
    'Web_link'=>$this->input->post('link'),
    'contact_number'=>$this->input->post('number'),
    'posted_date'=>$date,
  ); 
  if($this->input->post('sub_child')!='')
  {
    $data['sub_child_id']=$this->input->post('sub_child');
  }

  $this->db->where('id',$id);
  $result=$this->db->update('ad_master',$data);     
  // echo"<pre>";
  // print_r($data);
  // exit();
  $qry=$this->db->get_where('featured_ad_details',array('ad_id'=>$id))->num_rows();
  $qry2=$this->db->get_where('premium_ad_details',array('ad_id'=>$id))->num_rows();
  if($this->input->post('c_featured_days')!='')
  {
    $last_date_f=date('Y-m-d', strtotime($date. " + {$this->input->post('c_featured_days')} days"));
    $data_f=array(
      'ad_id'=>$id,
      'user_id'=>$this->input->post('user_id'),
      'days'=>$last_date_f,
      'status'=>'Approved',
    );

    if($qry==0){
      $res=$this->db->insert('featured_ad_details',$data_f);
      
    }
    if($qry!=0){
     $this->db->delete('featured_ad_details',array('ad_id'=>$id));
     $res=$this->db->insert('featured_ad_details',$data_f);
     
   }

 }
 if($this->input->post('c_premium_days')!='')
 {
  $last_date_p=date('Y-m-d', strtotime($date. " + {$this->input->post('c_premium_days')} days"));
  $data_p=array(
    'ad_id'=>$id,
    'user_id'=>$this->input->post('user_id'),
    'days'=>$last_date_p,
    'status'=>'Approved',
  );
  if($qry2==0){
    $res=$this->db->insert('premium_ad_details',$data_p);
    
  }
  if($qry2!=0){
    $this->db->delete('premium_ad_details',array('ad_id'=>$id));
    $res=$this->db->insert('premium_ad_details',$data_p);
    
  }
  
}
return true;

}
public function ad_delete($ad_id)
{
	$res=$this->db->delete('ad_master',array('id'=>$ad_id));
  if ($res) {
    $res1=$this->db->delete('favourite_ad',array('ad_id'=>$ad_id));
    
    $res2=$this->db->delete('featured_ad_details',array('ad_id'=>$ad_id));
    $res12=$this->db->delete('topad_table',array('ad_id'=>$ad_id));
    $res3=$this->db->delete('premium_ad_details',array('ad_id'=>$ad_id));
    $res4=$this->db->delete('available_table',array('ad_id'=>$ad_id));
    return $res;
    
    
  }
  else
  {
    return $res;
  }
}


}

?>