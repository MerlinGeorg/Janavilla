<?php 
class Admin_login_model extends CI_Model 
{

	function validate_login()
	{
		 $username = $this->security->xss_clean($this->input->post('inputUsername'));
        $password = $this->security->xss_clean($this->input->post('inputPassword'));

        $this->db->where('username',$username);

        $this->db->where('password',$password);

        

        $query3 = $this->db->get('user');

        if($query3->num_rows()==1)
        {
        	$row = $query3->row();

        	$data = array(
                'id'=>$row->id,
                'username'=>$row->username,
                'type'=>$row->type,
                'validate'=>true
        	);

        	$this->session->set_userdata($data);

        	return true;

        }
        else
        {
        	return false;
        }	

	}
  
}