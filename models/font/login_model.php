<?php
class Login_model extends CI_Model
{
public function login()
{
$sql = $this->db->get_where('user_master', array('email' => trim($this->input->post('email')), 
'password'=> trim($this->input->post('pass')),'status'=>'Approved'));
$result = $sql->num_rows();
if($result==0)
{
$sql2 = $this->db->get_where('user_master', array('name' => trim($this->input->post('email')), 
'password'=> trim($this->input->post('pass')),'status'=>'Approved'));
$result3 = $sql2->num_rows();
if($result3 != 0)
{
$result4 = $sql2->row_array();

$this->session->set_userdata('login_id', $result4['id']);
$this->session->set_userdata('user_email', $result4['email']);

if($result4)
{
$d=date('Y-m-d');
$t=date("h:i:s");
$qry=$this->db->get_where('time_table',array('u_id'=>$this->session->userdata('login_id')));
$c=$qry->num_rows();
if($c!='')
{
	$this->db->set('in_time',$t);
	$this->db->set('out_time',0);
	$this->db->set('login_date',$d);
	$this->db->where('u_id',$this->session->userdata('login_id'));
	$r=$this->db->update('time_table');
	redirect('userdashboard/editprofile/'.$result4['id']);
}
if($c=='')
{
	$data=array(
     'u_id'=>$result4['id'],
     'in_time'=>$t,
     'out_time'=>0,
     'login_date'=>$d
	);
	$rr=$this->db->insert('time_table',$data);
	redirect('userdashboard/editprofile/'.$result4['id']);
}	

}

}
else
{
$this->session->set_flashdata('error_log','Username Or Password is Invalid..');
redirect('login');
}
}

if($result != 0)
{
$result2 = $sql->row_array();

$this->session->set_userdata('login_id', $result2['id']);
$this->session->set_userdata('user_email', $result2['email']);

if($result2)
{
$d=date('Y-m-d');
$t=date("h:i:s");
$qry=$this->db->get_where('time_table',array('u_id'=>$this->session->userdata('login_id')));
$c=$qry->num_rows();
if($c!='')
{
	$this->db->set('in_time',$t);
	$this->db->set('out_time',0);
	$this->db->set('login_date',$d);
	$this->db->where('u_id',$this->session->userdata('login_id'));
	$r=$this->db->update('time_table');
	redirect('userdashboard/editprofile/'.$result2['id']);
}
if($c=='')
{
	$data=array(
     'u_id'=>$result2['id'],
     'in_time'=>$t,
     'out_time'=>0,
     'login_date'=>$d
	);
	$rr=$this->db->insert('time_table',$data);
	redirect('userdashboard/editprofile/'.$result2['id']);
}	

}

}
else
{
$this->session->set_flashdata('error_log','Username Or Password is Invalid..');
redirect('login');
}
}

///////////////////End Reviewer Validation//////////
public function fetch_forgot_user($u_email)
{

 $email_query=$this->db->get_where('user_master',array('email'=>$u_email));
 return $email_query->result();
}
public function change_pass($u_id)
{
  $this->db->set('password',$this->input->post('newpass'));
  $this->db->where('id',$u_id);
  $result = $this->db->update('user_master');
    return $result;
}
//////////////////
public function user_logout()
{
    $this->session->sess_destroy();
    return $this;
}

}
?>