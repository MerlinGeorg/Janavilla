<?php 
class Admin_news_model extends CI_Model 
{
  

  function insertnews($data1)
  {
  	$query = $this->db->insert('news',$data1);
  	return $query;
  }

  function get_news()
  {
  	$query = $this->db->get('news');
  	return $query->result();
  }

  function get_anewsid($newsid)
  {
  	$this->db->where('news_id',$newsid);
  	$query = $this->db->get('news');
  	return $query->row();
  }

  function updatenews($news_id,$data1)
  {
  	$this->db->where('news_id',$news_id);
  	$query = $this->db->update('news',$data1);
  	return $query;
  }

  function delete_news_part($news_id)
  {
  	$this->db->where('news_id',$news_id);
  	$query = $this->db->delete('news');
  	return $query;
  }


}	