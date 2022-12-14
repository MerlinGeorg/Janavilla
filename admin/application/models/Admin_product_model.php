<?php 
class Admin_product_model extends CI_Model 
{
   function insertProduct($data1)
   {
   	$query = $this->db->insert('product',$data1);
   	return $query;
   }

   function get_product()
   {
   	$query123="SELECT product.product_id,product.product_name,product.product_desc,product.product_pic,product.product_price,product.product_status,sub_menu.submenu_name AS productsubmenu,brands.brands_name AS productbrand,category.category_name AS productcategory FROM product LEFT JOIN sub_menu ON product.product_submenu = sub_menu.submenu_id LEFT JOIN brands ON product.product_brand = brands.brands_id LEFT JOIN category ON product.product_category = category.category_id";

   	$query = $this->db->query($query123);
   	return $query->result();
   }

   function get_product_uservise($puserid)
   {
      $query123="SELECT product.product_id,product.product_name,product.product_desc,product.product_pic,product.product_price,product.product_status,sub_menu.submenu_name AS productsubmenu,brands.brands_name AS productbrand,category.category_name AS productcategory FROM product LEFT JOIN sub_menu ON product.product_submenu = sub_menu.submenu_id LEFT JOIN brands ON product.product_brand = brands.brands_id LEFT JOIN category ON product.product_category = category.category_id WHERE product.product_userid='$puserid'";

      $query = $this->db->query($query123);
      return $query->result();
   }

   function updateprod_stat($prod_id,$data1)
   {
   	$this->db->where('product_id',$prod_id);
   	$query = $this->db->update('product',$data1);
   	return $query;
   }


   function get_prodEdit($prodid)
   {
   	$this->db->where('product_id',$prodid);
   	$query = $this->db->get('product');
   	return $query->row();
   }

   function updateProduct($prod_id,$data1)
   {
   	$this->db->where('product_id',$prod_id);
   	$query = $this->db->update('product',$data1);
   	return $query;
   }

   function delete_prod_part($prod_id)
   {
   	$this->db->where('product_id',$prod_id);
   	$query = $this->db->delete('product');
   	return $query;
   }

   function get_cats()
   {
      $query = $this->db->get('category');
      return $query->result();
   }

   function getsubcats($subid)
   {
      $this->db->where('category_submenu',$subid);
      $query = $this->db->get('category');
      return $query->result();
   }
   
    function getsubproductcat($proid)
   {
      $this->db->where('product_id',$proid);
      $query123 = $this->db->get('product');
      $prodetails = $query123->row();
      $catid = $prodetails->product_category;

      $this->db->where('category_id',$catid);
      $query = $this->db->get('category');
      return $query->row();
   }
   
} 