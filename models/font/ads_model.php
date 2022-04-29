<?php
class Ads_model extends CI_Model
{

/////////Reviewer validation///////////////
public function fetchpost($ad_id)
{
$post_qry=$this->db->get_where('ad_master',array('id'=>$ad_id,'status'=>'Active'));
return $post_qry->result();
}
/////////////////////////////
// public function fetchpostforedit($ad_id,$user_id)
// {
// $post_qry=$this->db->get_where('ad_master',array('id'=>$ad_id));
// return $post_qry->result();
// }
/////////////////////////////
public function edit($id,$user_id)
{
	        $upload_dir= 'upload/';
			$temp_error = $_FILES['image']['error'];
	  
			$file_name 	= time().'_'.$_FILES['image']['name']; 
			$tmp_name 	= $_FILES['image']['tmp_name'];
			$file_size 	= $_FILES['image']['size'];
		
			move_uploaded_file($tmp_name,$upload_dir.$file_name);
			
            $dt=$this->db->get_where('user_master',array('id'=>$user_id))->row();
            $date=date('Y-m_d');
            if($_FILES['image']['name']!='' && $this->input->post('sub_child')!='')
            {
            	$this->db->set('user_id',$user_id);
            	$this->db->set('country',$this->input->post('country'));
                $this->db->set('state',$this->input->post('state'));
            	$this->db->set('city',$this->input->post('city'));
                
                $this->db->set('zip_code',$this->input->post('zip_code'));
            	$this->db->set('category_id',$this->input->post('category_id'));
            	$this->db->set('subcat_id',$this->input->post('subcategory_id'));
            	$this->db->set('sub_child_id',$this->input->post('sub_child'));
            	$this->db->set('ad_title',addslashes(utf8_encode($this->input->post('ad_title'))));
            	$this->db->set('ad_description',addslashes(utf8_encode($this->input->post('subject'))));
            	$this->db->set('ad_image',$file_name);
            	$this->db->set('location',$this->input->post('location'));
            	$this->db->set('Web_link',$this->input->post('link'));
            	$this->db->set('contact_number',$this->input->post('number'));
                $this->db->set('email_address',$this->input->post('e_mail'));
            	$this->db->set('posted_date',$date);
                $this->db->set('status','Active');
                $this->db->set('pic_url',1);
            	$this->db->where('id',$id);
            	$result=$this->db->update('ad_master');
                if($result)
                { 

                    if($_FILES["otherimage"]["name"][0] != null)
                    {
                    $this->db->where('ad_id',$id);
                    $res2=$this->db->delete('details_image_master');
                    if($res2)
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
                         'ad_id'=>$id,
                         'ad_details_image'=>$file_name,
                         'pic_url'=>1,
                        );
                        $result3=$this->db->insert('details_image_master',$data3);
                    
                    }
                    }
                    if($result3)
                    {
                    $this->db->where('ad_id',$id);
                    $res=$this->db->delete('additional_value_master');
                    if ($res) 
                    {
                    $m_key = $this->input->post('meta_key');
                    //print_r($m_key);

                    foreach($m_key as $val)
                    {
                    //echo $val.'<br>';
                   // echo $this->input->post('meta_value'.$val).'<br>';
                
                    $data=array(
                    'ad_id'=>$id,
                    'meta_key'=>$val,
                    'meta_value'=>$this->input->post('meta_value'.$val)
                     );
                    $result2=$this->db->insert('additional_value_master',$data);
                    } 
                    $qry=$this->db->get_where('featured_ad_details',array('ad_id'=>$id))->num_rows();
                    $qry2=$this->db->get_where('premium_ad_details',array('ad_id'=>$id))->num_rows();
                    if($qry==0)
                    {
                        if($qry2==0)
                        {
                           redirect('addpost/premium/'.$id); 
                        }
                        if($qry2!=0)
                        {
                            redirect('myads');
                        }
                    }
                    if($qry!=0)
                    {
                        redirect('myads');
                    }
                    
                    }

                    }

                    }
                    if($_FILES["otherimage"]["name"][0] == null)
                    {
                    $this->db->where('ad_id',$id);
                    $res=$this->db->delete('additional_value_master');
                    if ($res) 
                    {
                    $m_key = $this->input->post('meta_key');
                    //print_r($m_key);

                    foreach($m_key as $val)
                    {
                    //echo $val.'<br>';
                   // echo $this->input->post('meta_value'.$val).'<br>';
                
                    $data=array(
                    'ad_id'=>$id,
                    'meta_key'=>$val,
                    'meta_value'=>$this->input->post('meta_value'.$val)
                     );
                    $result2=$this->db->insert('additional_value_master',$data);
                    } 
                    $qry=$this->db->get_where('featured_ad_details',array('ad_id'=>$id))->num_rows();
                    $qry2=$this->db->get_where('premium_ad_details',array('ad_id'=>$id))->num_rows();
                    if($qry==0)
                    {
                        if($qry2==0)
                        {
                           redirect('addpost/premium/'.$id); 
                        }
                        if($qry2!=0)
                        {
                            redirect('myads');
                        }
                    }
                    if($qry!=0)
                    {
                        redirect('myads');
                    }
                    
                    }  
                        
                    }
                    
                }
            	else
                {
                    $qry=$this->db->get_where('featured_ad_details',array('ad_id'=>$id))->num_rows();
                    $qry2=$this->db->get_where('premium_ad_details',array('ad_id'=>$id))->num_rows();
                    if($qry==0)
                    {
                        if($qry2==0)
                        {
                           redirect('addpost/premium/'.$id); 
                        }
                        if($qry2!=0)
                        {
                            redirect('myads');
                        }
                    }
                    if($qry!=0)
                    {
                        redirect('myads');
                    }
                }
            }
             if($_FILES['image']['name']=='' && $this->input->post('sub_child')=='')
            {
                $this->db->set('user_id',$user_id);
            	$this->db->set('country',$this->input->post('country'));
                $this->db->set('state',$this->input->post('state'));
                $this->db->set('city',$this->input->post('city'));
               
                $this->db->set('zip_code',$this->input->post('zip_code'));
            	$this->db->set('category_id',$this->input->post('category_id'));
            	$this->db->set('subcat_id',$this->input->post('subcategory_id'));
            	$this->db->set('ad_title',addslashes(utf8_encode($this->input->post('ad_title'))));
            	$this->db->set('ad_description',addslashes(utf8_encode($this->input->post('subject'))));
            	$this->db->set('location',$this->input->post('location'));
            	$this->db->set('Web_link',$this->input->post('link'));
            	$this->db->set('contact_number',$this->input->post('number'));
                $this->db->set('email_address',$this->input->post('e_mail'));
            	$this->db->set('posted_date',$date);
            	$this->db->where('id',$id);
            	$result=$this->db->update('ad_master');
                if($result)
                { 

                    if($_FILES["otherimage"]["name"][0] != null)
                    {
                    $this->db->where('ad_id',$id);
                    $res2=$this->db->delete('details_image_master');
                    if($res2)
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
                         'ad_id'=>$id,
                         'ad_details_image'=>$file_name,
                         'pic_url'=>1,
                        );
                        $result3=$this->db->insert('details_image_master',$data3);
                    
                    }
                    }
                    if($result3)
                    {
                    $this->db->where('ad_id',$id);
                    $res=$this->db->delete('additional_value_master');
                    if ($res) 
                    {
                    $m_key = $this->input->post('meta_key');
                    //print_r($m_key);

                    foreach($m_key as $val)
                    {
                    //echo $val.'<br>';
                   // echo $this->input->post('meta_value'.$val).'<br>';
                
                    $data=array(
                    'ad_id'=>$id,
                    'meta_key'=>$val,
                    'meta_value'=>$this->input->post('meta_value'.$val)
                     );
                    $result2=$this->db->insert('additional_value_master',$data);
                    } 
                    $qry=$this->db->get_where('featured_ad_details',array('ad_id'=>$id))->num_rows();
                    $qry2=$this->db->get_where('premium_ad_details',array('ad_id'=>$id))->num_rows();
                    if($qry==0)
                    {
                        if($qry2==0)
                        {
                           redirect('addpost/premium/'.$id); 
                        }
                        if($qry2!=0)
                        {
                            redirect('myads');
                        }
                    }
                    if($qry!=0)
                    {
                        redirect('myads');
                    }
                    
                    }

                    }

                    }
                    if($_FILES["otherimage"]["name"][0] == null)
                    {
                    $this->db->where('ad_id',$id);
                    $res=$this->db->delete('additional_value_master');
                    if ($res) 
                    {
                    $m_key = $this->input->post('meta_key');
                    //print_r($m_key);

                    foreach($m_key as $val)
                    {
                    //echo $val.'<br>';
                   // echo $this->input->post('meta_value'.$val).'<br>';
                
                    $data=array(
                    'ad_id'=>$id,
                    'meta_key'=>$val,
                    'meta_value'=>$this->input->post('meta_value'.$val)
                     );
                    $result2=$this->db->insert('additional_value_master',$data);
                    } 
                    $qry=$this->db->get_where('featured_ad_details',array('ad_id'=>$id))->num_rows();
                    $qry2=$this->db->get_where('premium_ad_details',array('ad_id'=>$id))->num_rows();
                    if($qry==0)
                    {
                        if($qry2==0)
                        {
                           redirect('addpost/premium/'.$id); 
                        }
                        if($qry2!=0)
                        {
                            redirect('myads');
                        }
                    }
                    if($qry!=0)
                    {
                        redirect('myads');
                    }
                    
                    }  
                        
                    }
                    
                }else{
                   $qry=$this->db->get_where('featured_ad_details',array('ad_id'=>$id))->num_rows();
                    $qry2=$this->db->get_where('premium_ad_details',array('ad_id'=>$id))->num_rows();
                    if($qry==0)
                    {
                        if($qry2==0)
                        {
                           redirect('addpost/premium/'.$id); 
                        }
                        if($qry2!=0)
                        {
                            redirect('myads');
                        }
                    }
                    if($qry!=0)
                    {
                        redirect('myads');
                    }
                }
            }
             if($_FILES['image']['name']=='' && $this->input->post('sub_child')!='')
            {
                $this->db->set('user_id',$user_id);
            	$this->db->set('country',$this->input->post('country'));
                $this->db->set('state',$this->input->post('state'));
                $this->db->set('city',$this->input->post('city'));
               
                $this->db->set('zip_code',$this->input->post('zip_code'));
            	$this->db->set('category_id',$this->input->post('category_id'));
            	$this->db->set('subcat_id',$this->input->post('subcategory_id'));
            	$this->db->set('sub_child_id',$this->input->post('sub_child'));
            	$this->db->set('ad_title',addslashes(utf8_encode($this->input->post('ad_title'))));
            	$this->db->set('ad_description',addslashes(utf8_encode($this->input->post('subject'))));
            	$this->db->set('location',$this->input->post('location'));
            	$this->db->set('Web_link',$this->input->post('link'));
            	$this->db->set('contact_number',$this->input->post('number'));
                $this->db->set('email_address',$this->input->post('e_mail'));
            	$this->db->set('posted_date',$date);
            	$this->db->where('id',$id);
            	$result=$this->db->update('ad_master');
                 if($result)
                { 

                    if($_FILES["otherimage"]["name"][0] != null)
                    {
                    $this->db->where('ad_id',$id);
                    $res2=$this->db->delete('details_image_master');
                    if($res2)
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
                         'ad_id'=>$id,
                         'ad_details_image'=>$file_name,
                         'pic_url'=>1,
                        );
                        $result3=$this->db->insert('details_image_master',$data3);
                    
                    }
                    }
                    if($result3)
                    {
                    $this->db->where('ad_id',$id);
                    $res=$this->db->delete('additional_value_master');
                    if ($res) 
                    {
                    $m_key = $this->input->post('meta_key');
                    //print_r($m_key);

                    foreach($m_key as $val)
                    {
                    //echo $val.'<br>';
                   // echo $this->input->post('meta_value'.$val).'<br>';
                
                    $data=array(
                    'ad_id'=>$id,
                    'meta_key'=>$val,
                    'meta_value'=>$this->input->post('meta_value'.$val)
                     );
                    $result2=$this->db->insert('additional_value_master',$data);
                    } 
                    $qry=$this->db->get_where('featured_ad_details',array('ad_id'=>$id))->num_rows();
                    $qry2=$this->db->get_where('premium_ad_details',array('ad_id'=>$id))->num_rows();
                    if($qry==0)
                    {
                        if($qry2==0)
                        {
                           redirect('addpost/premium/'.$id); 
                        }
                        if($qry2!=0)
                        {
                            redirect('myads');
                        }
                    }
                    if($qry!=0)
                    {
                        redirect('myads');
                    }
                    
                    }

                    }

                    }
                    if($_FILES["otherimage"]["name"][0] == null)
                    {
                    $this->db->where('ad_id',$id);
                    $res=$this->db->delete('additional_value_master');
                    if ($res) 
                    {
                    $m_key = $this->input->post('meta_key');
                    //print_r($m_key);

                    foreach($m_key as $val)
                    {
                    //echo $val.'<br>';
                   // echo $this->input->post('meta_value'.$val).'<br>';
                
                    $data=array(
                    'ad_id'=>$id,
                    'meta_key'=>$val,
                    'meta_value'=>$this->input->post('meta_value'.$val)
                     );
                    $result2=$this->db->insert('additional_value_master',$data);
                    } 
                    $qry=$this->db->get_where('featured_ad_details',array('ad_id'=>$id))->num_rows();
                    $qry2=$this->db->get_where('premium_ad_details',array('ad_id'=>$id))->num_rows();
                    if($qry==0)
                    {
                        if($qry2==0)
                        {
                           redirect('addpost/premium/'.$id); 
                        }
                        if($qry2!=0)
                        {
                            redirect('myads');
                        }
                    }
                    if($qry!=0)
                    {
                        redirect('myads');
                    }
                    
                    }  
                        
                    }
                    
                }else{
                    $qry=$this->db->get_where('featured_ad_details',array('ad_id'=>$id))->num_rows();
                    $qry2=$this->db->get_where('premium_ad_details',array('ad_id'=>$id))->num_rows();
                    if($qry==0)
                    {
                        if($qry2==0)
                        {
                           redirect('addpost/premium/'.$id); 
                        }
                        if($qry2!=0)
                        {
                            redirect('myads');
                        }
                    }
                    if($qry!=0)
                    {
                        redirect('myads');
                    }
                }
            }
              if($_FILES['image']['name']!='' && $this->input->post('sub_child')=='')
            {
                $this->db->set('user_id',$user_id);
            $this->db->set('country',$this->input->post('country'));
                $this->db->set('state',$this->input->post('state'));
                $this->db->set('city',$this->input->post('city'));
                
                $this->db->set('zip_code',$this->input->post('zip_code'));
            	$this->db->set('category_id',$this->input->post('category_id'));
            	$this->db->set('subcat_id',$this->input->post('subcategory_id'));
            	$this->db->set('sub_child_id',$this->input->post('sub_child'));
            	$this->db->set('ad_title',addslashes(utf8_encode($this->input->post('ad_title'))));
            	$this->db->set('ad_description',addslashes(utf8_encode($this->input->post('subject'))));
            	$this->db->set('ad_image',$file_name);
            	$this->db->set('location',$this->input->post('location'));
            	$this->db->set('Web_link',$this->input->post('link'));
            	$this->db->set('contact_number',$this->input->post('number'));
                $this->db->set('email_address',$this->input->post('e_mail'));
            	$this->db->set('posted_date',$date);
                $this->db->set('pic_url',1);
            	$this->db->where('id',$id);
            	$result=$this->db->update('ad_master');
                 if($result)
                { 

                    if($_FILES["otherimage"]["name"][0] != null)
                    {
                    $this->db->where('ad_id',$id);
                    $res2=$this->db->delete('details_image_master');
                    if($res2)
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
                         'ad_id'=>$id,
                         'ad_details_image'=>$file_name,
                         'pic_url'=>1,
                        );
                        $result3=$this->db->insert('details_image_master',$data3);
                    
                    }
                    }
                    if($result3)
                    {
                    $this->db->where('ad_id',$id);
                    $res=$this->db->delete('additional_value_master');
                    if ($res) 
                    {
                    $m_key = $this->input->post('meta_key');
                    //print_r($m_key);

                    foreach($m_key as $val)
                    {
                    //echo $val.'<br>';
                   // echo $this->input->post('meta_value'.$val).'<br>';
                
                    $data=array(
                    'ad_id'=>$id,
                    'meta_key'=>$val,
                    'meta_value'=>$this->input->post('meta_value'.$val)
                     );
                    $result2=$this->db->insert('additional_value_master',$data);
                    } 
                    $qry=$this->db->get_where('featured_ad_details',array('ad_id'=>$id))->num_rows();
                    $qry2=$this->db->get_where('premium_ad_details',array('ad_id'=>$id))->num_rows();
                    if($qry==0)
                    {
                        if($qry2==0)
                        {
                           redirect('addpost/premium/'.$id); 
                        }
                        if($qry2!=0)
                        {
                            redirect('myads');
                        }
                    }
                    if($qry!=0)
                    {
                        redirect('myads');
                    }
                    
                    }

                    }

                    }
                    if($_FILES["otherimage"]["name"][0] == null)
                    {
                    $this->db->where('ad_id',$id);
                    $res=$this->db->delete('additional_value_master');
                    if ($res) 
                    {
                    $m_key = $this->input->post('meta_key');
                    //print_r($m_key);

                    foreach($m_key as $val)
                    {
                    //echo $val.'<br>';
                   // echo $this->input->post('meta_value'.$val).'<br>';
                
                    $data=array(
                    'ad_id'=>$id,
                    'meta_key'=>$val,
                    'meta_value'=>$this->input->post('meta_value'.$val)
                     );
                    $result2=$this->db->insert('additional_value_master',$data);
                    } 
                    $qry=$this->db->get_where('featured_ad_details',array('ad_id'=>$id))->num_rows();
                    $qry2=$this->db->get_where('premium_ad_details',array('ad_id'=>$id))->num_rows();
                    if($qry==0)
                    {
                        if($qry2==0)
                        {
                           redirect('addpost/premium/'.$id); 
                        }
                        if($qry2!=0)
                        {
                            redirect('myads');
                        }
                    }
                    if($qry!=0)
                    {
                        redirect('myads');
                    }
                    
                    }  
                        
                    }
                    
                }else
                {
                    $qry=$this->db->get_where('featured_ad_details',array('ad_id'=>$id))->num_rows();
                    $qry2=$this->db->get_where('premium_ad_details',array('ad_id'=>$id))->num_rows();
                    if($qry==0)
                    {
                        if($qry2==0)
                        {
                           redirect('addpost/premium/'.$id); 
                        }
                        if($qry2!=0)
                        {
                            redirect('myads');
                        }
                    }
                    if($qry!=0)
                    {
                        redirect('myads');
                    }
                }
            }
        }
public function deleteads($ad_id,$u_id)
{
	$res=$this->db->delete('ad_master',array('id'=>$ad_id,'user_id'=>$u_id));
	if ($res) 
    {
		$res1=$this->db->delete('favourite_ad',array('ad_id'=>$ad_id,'user_id'=>$u_id));
		  $res2=$this->db->delete('featured_ad_details',array('ad_id'=>$ad_id,'user_id'=>$u_id));
              $res12=$this->db->delete('topad_table',array('ad_id'=>$ad_id));
                $res3=$this->db->delete('premium_ad_details',array('ad_id'=>$ad_id,'user_id'=>$u_id));
                $res4=$this->db->delete('available_table',array('ad_id'=>$ad_id));
                $res44=$this->db->delete('verified_table',array('ad_id'=>$ad_id));
                return $res;
      
	}
else
{
    return $res;
}
}
}

?>