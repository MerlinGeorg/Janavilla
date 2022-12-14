<?php 
class Admin_usermanager_model extends CI_Model 
{

    function search_user($term)
    {
    	$selqry = "SELECT * FROM reg_users WHERE reg_mail LIKE '%".$term."%' AND reg_type = 'Supplier' ORDER BY reg_name ASC  LIMIT 10";

    	$query = $this->db->query($selqry);
			return $query->result();
    }

    function getudtals($uemail)
    {
    	$this->db->where('reg_mail',$uemail);
    	$query = $this->db->get('reg_users');
    	return $query->row();
    }

    function checkmailexist($umail)
    {
        $query1 = "SELECT count(*) AS mailcount FROM user WHERE mailid='$umail'";
        $query = $this->db->query($query1);
        return $query->row();
    }

    function checkusernameexist($username)
    {
         $query1 = "SELECT count(*) AS usernamecount FROM user WHERE username='$username'";
        $query = $this->db->query($query1);
        return $query->row();
    }

    function insertuser($data1)
    {
        $query = $this->db->insert('user',$data1);
        return $query;
    }

    function getmailexist($umail)
    {
        $query1 = "SELECT * FROM user WHERE mailid='$umail' LIMIT 1";
        $query = $this->db->query($query1);
        return $query->row();
    }

    function getusnameexist($username)
    {
         $query1 = "SELECT * FROM user WHERE username='$username' LIMIT 1";
        $query = $this->db->query($query1);
        return $query->row();
    }


    function get_users()
    {
        $this->db->where('type','Supplier');
        $query = $this->db->get('user');
        return $query->result();
    }

    function get_edituser($usid)
    {
        $this->db->where('id',$usid);
        $query = $this->db->get('user');
        return $query->row();
    }

    function updateuser($userid,$data1)
    {
        $this->db->where('id',$userid);
        $query = $this->db->update('user',$data1);
        return $query;
    }

    function updateuser_stat($id,$data1)
    {
        $this->db->where('id',$id);
        $query = $this->db->update('user',$data1);
        return $query;
    }

    function deleteuser($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->delete('user');
        return $query;
    }
}
