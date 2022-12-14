<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_product extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	
    	
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_board extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	 {
    	parent::__construct();
    	// $this->load->model('Admin_login_model');
    	
    	
    	$this->load->model('Admin_product_model');
	 }

	 public function index()
	{ 
	    if(isset($_SESSION['username']))
	    {
	    $this->load->model('Admin_submenu_model');
	    $this->load->model('Admin_brand_model');

	    $getsubmenus = $this->Admin_submenu_model->get_submenus();

	    $getbrands = $this->Admin_brand_model->get_brands(); 

	    // $getcats = $this->Admin_product_model->get_cats();
	    
	    $a = array('content' => 'admin_product_view',
              
                    'submenus'=>$getsubmenus,
                    'brands' =>$getbrands

	     );
	    $this->load->view('admintemplate',$a);
	    }
	    else
	    {
	      redirect('Admin_login/login_admin');
	    }
   
	}

	public function insertprod()
	{
		$prod_id= $this->input->post('prodid');
		$fillimg = $this->input->post('image1');

		$config['upload_path']="./uploads";
        $config['allowed_types']='jpeg|jpg|png';
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload',$config);
        $data = array('upload_data' => $this->upload->data());
        $this->upload->initialize($config);

        
        if(!$this->upload->do_upload('menu_image'))

        {
        	$error = array('error'=> $this->upload->display_errors());
        }

        else
        {

        $data = array('upload_data' => $this->upload->data());

        }

     
      if ($_FILES['menu_image']['size'] == 0)
      {
          $filename = $fillimg;

      }
      else
      {
        if(!empty($prod_id)){
          $unlink_path = 'uploads/'.$fillimg;
          if(!empty($fillimg)){
            unlink($unlink_path);
          }         
        }
        $filename = $data['upload_data']['file_name'];
      }
	
     $userid = $this->session->userdata('id');

	 $ins_date = date('Y-m-d');

      $data1 = array
      (
       'product_name'=>$this->input->post('prodname'),
       'product_userid'=>$userid,
       'product_desc'=>$this->input->post('proddesc'),
       'product_submenu'=>$this->input->post('prodsubmenu'),
       'product_brand'=>$this->input->post('prodbrand'),
       'product_category'=>$this->input->post('prodcat'),
       'product_price'=>$this->input->post('prodprice'),
       'product_pic'=>$filename,
       'product_status'=>1,
       'product_date'=>$ins_date
      );

            if ($prod_id=='')
	{
		$result1 = $this->Admin_product_model->insertProduct($data1);
	}
	else
	{
         $result1 = $this->Admin_product_model->updateProduct($prod_id,$data1);
	}	


	if ($result1==1)
	{
		echo "success";
	}
	else
	{
		echo "failed";
	}	

  }

  public function display_product()
  {
      $usertype = $this->session->userdata('type');

      if($usertype=='admin') 
      {
      
  	    $result['res'] = $this->Admin_product_model->get_product();
  	  }
  	  else
  	  {
        $puserid = $this->session->userdata('id');

  	  	$result['res'] = $this->Admin_product_model->get_product_uservise($puserid);
  	  }  

  	    $this->load->view('display_product',$result);
  }


  public function changestatus()
  {
  	    $prod_stat = $this->input->post('status');
		$prod_id = $this->input->post('id');

		if ($prod_stat==1)
		{
			$data1 = array
			(
				'product_status'=>0
			);
		}
		else
		{
			if($prod_stat==0)
			{
				$data1 = array
				(
					'product_status'=>1
				);
			}
		}
       
       $res123 = $this->Admin_product_model->updateprod_stat($prod_id,$data1);

       if ($res123==1) 
       {
       	 echo "success";
       }
       else
       {
       	echo "failed";
       }	
  }

  public function editproduct()
  {
  	    $prodid = $this->input->post('id');

		$res = $this->Admin_product_model->get_prodEdit($prodid);

		echo json_encode($res);
  }

  public function delete_prod()
  {
  	     $prod_id = $this->input->post('id');
	     $image_name = $this->input->post('img');

	    

	        
	        
	        $res = $this->Admin_product_model->delete_prod_part($prod_id);
	        
	        $img_path = 'uploads/'.$image_name;

	        unlink($img_path);  
	           
	        if($res == 1)
	        {   
	          echo "success";
	        }else{
	        
	          echo "failed";
	        }
  }

  public function getsubcat()
  {
  	$subid = $this->input->post('subid');
  	$proid = $this->input->post('proid');

  	$res1['res'] = $this->Admin_product_model->getsubcats($subid);
  	if($proid!='')
  	{
  	$res1['prod_cat']= $this->Admin_product_model->getsubproductcat($proid);
  	$res1['subid']=$subid;
    }

  	$this->load->view('catdiv_display',$res1);

  }




}	