<?php 
class Admin_submenu_model extends CI_Model 
{
 
 function getmenus()
 {
 	$query = $this->db->get('menu');
 	return $query->result();
 }

 function insert($data1)
 {
 	$query = $this->db->insert('sub_menu',$data1);

 	return $query;
 }

 function get_submenus()
 {
 	// 	$query1 = $this->db->get('sub_menu');
		// return $query1->result();

 	$query123 = "SELECT sub_menu.submenu_id,sub_menu.submenu_name,sub_menu.submenu_name_arab,sub_menu.submenu_desc,sub_menu.submenu_desc_arab,sub_menu.submenu_pic,sub_menu.submenu_main,sub_menu.submenu_status,menu.menu_name AS main_menu FROM sub_menu LEFT JOIN menu ON sub_menu.submenu_main = menu.menu_id";

 	$query = $this->db->query($query123);

 	return $query->result();
 }

 function get_submenusEdit($menuid)
 {
 	$this->db->where('submenu_id',$menuid);
 	$query = $this->db->get('sub_menu');
 	return $query->row();
 }

 function updatesub_stat($submenu_id,$data1)
 {
 	$this->db->where('submenu_id',$submenu_id);
 	$query = $this->db->update('sub_menu',$data1);

 	return $query;
 }


 function update($submenu_id,$data1)
 {
 	$this->db->where('submenu_id',$submenu_id);
 	$query = $this->db->update('sub_menu',$data1);
 	return $query;
 }

 function delete_submenu_part($submenu_id)
 {
 	$this->db->where('submenu_id',$submenu_id);
 	$query = $this->db->delete('sub_menu');

 	return $query;
 }
 
}