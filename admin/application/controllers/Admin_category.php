<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_category extends CI_Controller {


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
    	$this->load->model('Admin_category_model');
    	$this->load->model('Admin_submenu_model');
	}

	public function index()
	{ 
	    if(isset($_SESSION['username']))
	    {
	    
	    $getsubmenus = $this->Admin_category_model->getsubmenus(); 
	    
	    $a = array('content' => 'admin_category_view',
	                'getsubmenus' => $getsubmenus
	            );
	    $this->load->view('admintemplate',$a);
	    }
	    else
	    {
	      redirect('Admin_login/login_admin');
	    }
   
	}


	public function insertcat()
	{
		$cat_id = $this->input->post('catid');
		

      $ins_date = date('Y-m-d');

      $data1 = array
      (
       'category_name'=>$this->input->post('catname'),
       'category_name_arab'=>$this->input->post('catnamearab'),
       'category_code'=>$this->input->post('catcod'),
       'category_submenu'=>$this->input->post('catsub'),
       'category_desc'=>$this->input->post('catdesc'),
       'category_desc_arab'=>$this->input->post('catdescarab'),
       
       'category_status'=>1,
       'category_date'=>$ins_date
      );
      
	

	if ($cat_id=='')
	{
		$result1 = $this->Admin_category_model->insertcat($data1);
	}
	else
	{
         $result1 = $this->Admin_category_model->updatecat($cat_id,$data1);
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

	public function display_cat()
	{
		$result['res'] = $this->Admin_category_model->get_cats();

  	    $this->load->view('display_cat',$result);
	}

	public function editcat()
	{
		$catid = $this->input->post('id');

		$res = $this->Admin_category_model->get_catEdit($catid);

		echo json_encode($res);
	} 

	public function delete_cat()
	{
		$cat_id = $this->input->post('id');
	    
	        $res = $this->Admin_category_model->delete_cat_part($cat_id);
	         
	        if($res == 1)
	        {   
	          echo "success";
	        }else{
	        
	          echo "failed";
	        }
	}

	public function changestatus()
	{
		$cat_stat = $this->input->post('status');
		$cat_id = $this->input->post('id');

		if ($cat_stat==1)
		{
			$data1 = array
			(
				'category_status'=>0
			);
		}
		else
		{
			if($cat_stat==0)
			{
				$data1 = array
				(
					'category_status'=>1
				);
			}
		}
       
       $res123 = $this->Admin_category_model->updatecat_stat($cat_id,$data1);

       if ($res123==1) 
       {
       	 echo "success";
       }
       else
       {
       	echo "failed";
       }	
	}


}	