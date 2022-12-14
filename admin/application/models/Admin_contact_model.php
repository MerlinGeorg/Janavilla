<?php 
class Admin_contact_model extends CI_Model 
{
   function get_contact()
   {
   	$query = $this->db->get('contact_page');
   	return $query->result();
   }

   function get_contactid($contactid)
   {
   	$this->db->where('contact_id',$contactid);
   	$query = $this->db->get('contact_page');
   	return $query->row();
   }

   function updateConatact($contact_id,$data1)
   {
   	$this->db->where('contact_id',$contact_id);
   	$query = $this->db->update('contact_page',$data1);
   	return $query;
   }
}	