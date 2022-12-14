<?php 
class Admin_storemap_model extends CI_Model 
{
   function get_map()
   {
   	$query = $this->db->get('store_map');
   	return $query->result();
   }

  function get_mapid($mapid)

  {
  	$this->db->where('smap_id',$mapid);
  	$query = $this->db->get('store_map');
  	return $query->row();
  }

  function updatemap($map_id,$data1)
  {
  	$this->db->where('smap_id',$map_id);
  	$query = $this->db->update('store_map',$data1);
  	return $query;
  }

}   