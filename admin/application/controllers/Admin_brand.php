<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_brand extends CI_Controller {

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
    	$this->load->model('Admin_login_model');
    	$this->load->model('Admin_menu_model');
    	$this->load->model('Admin_brand_model');
	}

	public function index()
	{ 
	    if(isset($_SESSION['username']))
	    {
	    
	    // $getmenus = $this->Admin_submenu_model->getmenus(); 
	    
	    $a = array('content' => 'admin_brand_view');
	    $this->load->view('admintemplate',$a);
	    }
	    else
	    {
	      redirect('Admin_login/login_admin');
	    }
   
	}

	public function insertBrand()
	{
		$brand_id = $this->input->post('brandid');
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
        if(!empty($brand_id)){
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
       'brands_name'=>$this->input->post('brandname'),
       'brands_userid'=>$userid,
       'brands_pic'=>$filename,
       'brands_status'=>1,
       'brands_date'=>$ins_date
      );


      if ($brand_id=='')
	{
		$result1 = $this->Admin_brand_model->insertBrand($data1);
	}
	else
	{
         $result1 = $this->Admin_brand_model->updateBrand($brand_id,$data1);
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


  public function display_brand()
  {

  	$usertype = $this->session->userdata('type');
    
    if($usertype=='admin')
    {
  
  	$result['res'] = $this->Admin_brand_model->get_brands();

  	    
  	}
  	else
  	{
  		$buserid = $this->session->userdata('id');

  		$result['res'] = $this->Admin_brand_model->get_brands_uservice($buserid);
  	}

  	$this->load->view('display_brand',$result);
  }

  public function changestatus()
  {
  	    $brand_stat = $this->input->post('status');
		$brand_id = $this->input->post('id');

		if ($brand_stat==1)
		{
			$data1 = array
			(
				'brands_status'=>0
			);
		}
		else
		{
			if($brand_stat==0)
			{
				$data1 = array
				(
					'brands_status'=>1
				);
			}
		}
       
       $res123 = $this->Admin_brand_model->updateBrand_stat($brand_id,$data1);

       if ($res123==1) 
       {
       	 echo "success";
       }
       else
       {
       	echo "failed";
       }	
  }

  public function editbrand()
  {
  	    $brandid = $this->input->post('id');

		$res = $this->Admin_brand_model->get_brandEdit($brandid);

		echo json_encode($res);
  }

  public function delete_brand()
  {

  	     $brand_id = $this->input->post('id');
	     $image_name = $this->input->post('img');

	    

	        
	        
	        $res = $this->Admin_brand_model->delete_brand_part($brand_id);
	        
	        $img_path = 'uploads/'.$image_name;

	        unlink($img_path);  
	           
	        if($res == 1)
	        {   
	          echo "success";
	        }else{
	        
	          echo "failed";
	        }
  }


}
