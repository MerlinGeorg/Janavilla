<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_regusers extends CI_Controller {


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
    	
    	
    	$this->load->model('Admin_regusers_model');
	 }

	 public function index()
	{ 
	    if(isset($_SESSION['username']))
	    {
	    
	    // $getsubmenus = $this->Admin_submenu_model->get_submenus();

	    // $getbrands = $this->Admin_brand_model->get_brands(); 
	    
	    $a = array('content' => 'admin_regusers_view'
              
                   
	     );
	    $this->load->view('admintemplate',$a);
	    }
	    else
	    {
	      redirect('Admin_login/login_admin');
	    }
   
	}


	public function display_regusers()
	{
		$result['res'] = $this->Admin_regusers_model->get_regusers();

  	    $this->load->view('display_regusers',$result);
	}


	 public function changestatus()
  {
  	    $check_stat = $this->input->post('status');
		$reg_id = $this->input->post('id');

		if ($check_stat==0)
		{
			$data1 = array
			(
				'reg_check_stat'=>1
			);
		}
		
       
       $res123 = $this->Admin_regusers_model->updateprod_stat($reg_id,$data1);

       if ($res123==1) 
       {
       	 echo "success";
       }
       else
       {
       	echo "failed";
       }	
  }

    public function getnewRequestscount()
    {
    	$res = $this->Admin_regusers_model->getreqsts();

      echo $res->totalreqst;
    }

}