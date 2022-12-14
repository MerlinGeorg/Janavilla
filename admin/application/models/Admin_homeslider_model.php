<?php 
class Admin_homeslider_model extends CI_Model 
{
   function get_sliders()
   {
   	$query = $this->db->get('home_slider');
   	return $query->result();
   }

   function getsliderEdit($sliderid)
   {
   	$this->db->where('homeslider_id',$sliderid);
   	$query = $this->db->get('home_slider');
   	return $query->row();
   }

   function checkprio($slider_priority)
   {
   	$this->db->where('homeslider_priority',$slider_priority);
  	$query = $this->db->get('home_slider');
  	return $query->row();
   }

   function updateslider($slider_id,$data1)
   {
   	$this->db->where('homeslider_id',$slider_id);
   	$query = $this->db->update('home_slider',$data1);
   	return $query;
   }

   function get_existing_thissliderprio($slider_id)
   {
   	$this->db->where('homeslider_id',$slider_id);
  	$query = $this->db->get('home_slider');
  	return $query->row();
   }

   function updateOtherslider($prioidaray,$getslider_id)
   {
   	$this->db->where('homeslider_id',$getslider_id);
   	$query = $this->db->update('home_slider',$prioidaray);
  	return $query;

   }


}	