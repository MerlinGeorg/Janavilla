<?php 
class Admin_store_model extends CI_Model 
{

	function insertstore($data1)
	{
		$query = $this->db->insert('store',$data1);
		return $query;
	}

	function get_stores()
	{
		$query = $this->db->get('store');
		return $query->result();
	}

	function get_storeEdit($storeid)
	{
		$this->db->where('store_id',$storeid);
		$query = $this->db->get('store');
		return $query->row();
	}

	function updatestore($store_id,$data1)
	{
		$this->db->where('store_id',$store_id);
		$query = $this->db->update('store',$data1);
		return $query;
	}

	function delete_store_part($store_id)
	{
		$this->db->where('store_id',$store_id);
		$query = $this->db->delete('store');
		return $query;
	}

}