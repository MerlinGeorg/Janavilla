<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_storemap extends CI_Controller {

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
    	
    	
    	$this->load->model('Admin_storemap_model');
	 }

	 public function index()
	{ 
	    if(isset($_SESSION['username']))
	    {
	    
	    // $getsubmenus = $this->Admin_submenu_model->get_submenus();

	    // $getbrands = $this->Admin_brand_model->get_brands(); 
	    
	    $a = array('content' => 'admin_storemap_view'
              
                   
	     );
	    $this->load->view('admintemplate',$a);
	    }
	    else
	    {
	      redirect('Admin_login/login_admin');
	    }
   
	}


	public function display_map()
	{
		$result['res'] = $this->Admin_storemap_model->get_map();

  	    $this->load->view('display_storemap',$result);
	}

	public function editmap()
	{
		$mapid = $this->input->post('id');

		$res = $this->Admin_storemap_model->get_mapid($mapid);

		echo json_encode($res);
	}


	public function updatemap()
	{
        $map_id= $this->input->post('mapid');
    // echo $map_id;
    // die();
      $ins_date = date('Y-m-d');

      $data1 = array
      (
       'smap_url'=>$this->input->post('maplink'),
       'smap_type'=>$this->input->post('maptype'),
       
       'smap_date'=>$ins_date
      );


              if ($map_id!='')
	{
		
	
         $result1 = $this->Admin_storemap_model->updatemap($map_id,$data1);
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




}