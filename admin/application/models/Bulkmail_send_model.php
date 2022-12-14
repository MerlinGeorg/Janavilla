<?php 
class Bulkmail_send_model extends CI_Model 
{
   function getsuppliersmail()
   {
   	$this->db->where('type','Supplier');
   	$query = $this->db->get('user');
   	return $query->result();
   }

   function getcustomersmail()
   {
   	$this->db->where('reg_type','Customer');
   	$query = $this->db->get('reg_users');
   	return $query->result();
   }
}	