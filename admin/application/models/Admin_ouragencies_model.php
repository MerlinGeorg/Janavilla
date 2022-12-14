<?php 
class Admin_ouragencies_model extends CI_Model 
{

   function insertagency($data1)
   {
   	$query = $this->db->insert('agencies',$data1);
   	return $query;
   }

   function get_agencys()
   {
   	$query = $this->db->get('agencies');
   	return $query->result();
   }

   function get_agencyEdit($agencyid)
   {
   	$this->db->where('agencies_id ',$agencyid);
   	$query = $this->db->get('agencies');
   	return $query->row();
   }

   function updateagency($agency_id,$data1)
   {
   	$this->db->where('agencies_id',$agency_id);
   	$query = $this->db->update('agencies',$data1);
   	return $query;
   }

   function delete_agency_part($agency_id)
   {
   	$this->db->where('agencies_id',$agency_id);
   	$query = $this->db->delete('agencies');
   	return $query;
   }

}