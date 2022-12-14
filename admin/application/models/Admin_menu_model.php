<?php 
class Admin_menu_model extends CI_Model 
{
   
  function get_menus()
  {
  	$query = $this->db->get('menu');

  	return $query->result();
  }

  function getmenusEdit($menuid)
  {
     $this->db->where('menu_id',$menuid);
     $query = $this->db->get('menu');
     return $query->row();
  }

  function checkprio($m_priority)
  {
  	$this->db->where('menu_priority',$m_priority);
  	$query = $this->db->get('menu');
  	return $query->row();
  }

  function get_existing_thismenuprio($menuid)
  {
  	$this->db->where('menu_id',$menuid);
  	$query = $this->db->get('menu');
  	return $query->row();
  }


  function updateOthermenu($prioidaray,$getmenu_id)
  {
  	$this->db->where('menu_id',$getmenu_id);
  	$query = $this->db->update('menu',$prioidaray);
  	return $query;

  }

  function updatemenu($menuid,$data1)
  {
  	// echo $menuid;
  	// die();
    $this->db->where('menu_id',$menuid); 

    if($count = $this->db->update('menu',$data1))
    {
      return 1;

    }

    else
    {
      return 0;
    }
  }


  //  function updatemenu($menuid,$menuname)
  // {
  	
    
  //   $query12="UPDATE menu SET menu_name = '$menuname' WHERE menu_id='$menuid";

  //   $query = $this->db->query($query12);

  //   // echo $query;

  // 	return $query;
  // }

}