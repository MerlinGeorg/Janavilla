<?php 
class Admin_regusers_model extends CI_Model 
{
     function get_regusers()
     {
     	// $query = $this->db->get('reg_users');
     	// 

     	$sqry = "SELECT * FROM reg_users ORDER BY reg_check_stat ASC";
     	$query = $this->db->query($sqry);
     	return $query->result();

     }

     function updateprod_stat($reg_id,$data1)
     {
     	$this->db->where('reg_id',$reg_id);
     	$query = $this->db->update('reg_users',$data1);

        

     	return $query;
     }

     function getreqsts()
     {
          $query7="SELECT count(reg_check_stat) as totalreqst FROM reg_users WHERE reg_check_stat='0'";
     $query = $this->db->query($query7);

     return $query->row();
     }
}