<?php 
class Admin_brand_model extends CI_Model 
{
  
  function insertBrand($data1)
  {
    $query = $this->db->insert('brands',$data1);

    return $query;
  }


  function get_brands()
  {
  	$query = $this->db->get('brands');

  	return $query->result();
  }

  function get_brands_uservice($buserid)
  {
    $this->db->where('brands_userid',$buserid);
    $query = $this->db->get('brands');
    return $query->result();
  }


  function updateBrand_stat($brand_id,$data1)
  {
  	$this->db->where('brands_id',$brand_id);
  	$query = $this->db->update('brands',$data1);
  	return $query;
  }

  function get_brandEdit($brandid)
  {
  	$this->db->where('brands_id',$brandid);
  	$query = $this->db->get('brands');
  	return $query->row();
  }


  function updateBrand($brand_id,$data1)
  {
  	$this->db->where('brands_id',$brand_id);
  	$query = $this->db->update('brands',$data1);
  	return $query;
  }

  function delete_brand_part($brand_id)
  {
  	$this->db->where('brands_id',$brand_id);
  	$query = $this->db->delete('brands');
  	return $query;
  }

}