<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_store extends CI_Controller {

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
    	
    	
    	$this->load->model('Admin_store_model');
	 }

	 public function index()
	{ 
	    if(isset($_SESSION['username']))
	    {
	    
	    // $getsubmenus = $this->Admin_submenu_model->get_submenus();

	    // $getbrands = $this->Admin_brand_model->get_brands(); 
	    
	    $a = array('content' => 'admin_store_view'
              
                   
	     );
	    $this->load->view('admintemplate',$a);
	    }
	    else
	    {
	      redirect('Admin_login/login_admin');
	    }
   
	}

	public function insertStore()
	{
		$store_id = $this->input->post('storeid');

		$ins_date = date('Y-m-d');

      $data1 = array
      (
       'store_name'=>$this->input->post('storename'),
       'store_adress'=>$this->input->post('storeadress'),
       'store_name_arab'=>$this->input->post('storenamearab'),
       'store_adress_arab'=>$this->input->post('storeadressarab'),
       'store_status'=>1,
       'store_type'=>$this->input->post('storetype'),
       'store_date'=>$ins_date
      );


      if ($store_id=='')
	{
		$result1 = $this->Admin_store_model->insertstore($data1);
	}
	else
	{
         $result1 = $this->Admin_store_model->updatestore($store_id,$data1);
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


	public function display_store()
	{
	    $result['res'] = $this->Admin_store_model->get_stores();

  	    $this->load->view('display_store',$result);
	}

	public function editstore()
	{
		$storeid = $this->input->post('id');

		$res = $this->Admin_store_model->get_storeEdit($storeid);

		echo json_encode($res);
	}


	 public function delete_store()
  {

  	     $store_id = $this->input->post('id');
	     

	    

	        
	        
	        $res = $this->Admin_store_model->delete_store_part($store_id);
	        
	         
	           
	        if($res == 1)
	        {   
	          echo "success";
	        }else{
	        
	          echo "failed";
	        }
  }




}	