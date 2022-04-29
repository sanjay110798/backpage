<?php
class Admin_model extends CI_Model
{

public function admin_login()
{
$sql = $this->db->get_where('admin_master', array('email_address' => $this->input->post('login_id'), 
'password'=> $this->input->post('pass')));
$result = $sql->num_rows();
//echo $this->db->last_query(); exit();

if($result!=0)
{
$result2 = $sql->row_array();

$this->session->set_userdata('admin_login', $result2['id']);


if($result2['id'] != '')
{
return $result2;
}
}
}

public function user_logout()
{
    $this->session->sess_destroy();
    return $this;
}

}

?>