<?php 
class Admin_logo_model extends CI_Model 
{
  
  function updatelogo($logoid,$data1)
  {
  	$this->db->where('logo_id',$logoid);
  	$query = $this->db->update('logo',$data1);
  	return $query;
  }

  function get_logo()
  {
  	$query = $this->db->get('logo');
  	return $query->result();
  }

  function get_logoEdit($logoid)
  {
  	$this->db->where('logo_id',$logoid);
    $query = $this->db->get('logo');
    return $query->row();
  }

}	