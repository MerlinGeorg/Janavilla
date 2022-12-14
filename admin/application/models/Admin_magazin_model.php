<?php 
class Admin_magazin_model extends CI_Model 
{
   function get_mag()
   {
   	$query = $this->db->get('magezin');
   	return $query->result();
   }

   function get_magid($magid)
   {
   	$this->db->where('mag_id',$magid);
   	$query = $this->db->get('magezin');
   	return $query->row();
   }

   function updatemag($magenize_id,$data1)
   {
   	$this->db->where('mag_id',$magenize_id);
   	$query = $this->db->update('magezin',$data1);
   	return $query;
   }
}	