<?php 
class Admin_category_model extends CI_Model 
{

	function getsubmenus()
 {
 	$query = $this->db->get('sub_menu');
 	return $query->result();
 }

 function insertcat($data1)
 {
 	$query = $this->db->insert('category',$data1);
 	return $query;
 }

 function get_cats()
 {
 	
 	$query123 = "SELECT category.category_id ,category.category_code ,category.category_name,category.category_name_arab,category.category_submenu,category.category_desc,category.category_desc_arab,category.category_status,sub_menu.submenu_name AS sub_menu FROM category LEFT JOIN sub_menu ON category.category_submenu = sub_menu.submenu_id";
 	$query = $this->db->query($query123);
 	return $query->result();
 }

 function get_catEdit($catid)
 {
 	$this->db->where('category_id',$catid);
 	$query = $this->db->get('category');
 	return $query->row();
 }

  function updatecat($cat_id,$data1)
  {
  	$this->db->where('category_id',$cat_id);
  	$query = $this->db->update('category',$data1);
  	return $query;
  }

  function delete_cat_part($cat_id)
  {
  	$this->db->where('category_id',$cat_id);
  	$query = $this->db->delete('category');
  	return $query;
  }
  function updatecat_stat($cat_id,$data1)
  {
  	$this->db->where('category_id',$cat_id);
  	$query = $this->db->update('category',$data1);
  	return $query;
  }

}
