<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_logo extends CI_Controller {

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
    	$this->load->model('Admin_logo_model');
	}

	public function index()
	{ 
	    if(isset($_SESSION['username']))
	    {
	    
	    // $getmenus = $this->Admin_submenu_model->getmenus(); 
	    
	    $a = array('content' => 'admin_logo_view');
	    $this->load->view('admintemplate',$a);
	    }
	    else
	    {
	      redirect('Admin_login/login_admin');
	    }
   
	}


	public function updatelogo()
	{
		$logo_id = $this->input->post('logoid');
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
        if(!empty($logo_id)){
          $unlink_path = 'uploads/'.$fillimg;
          if(!empty($fillimg)){
            unlink($unlink_path);
          }         
        }
        $filename = $data['upload_data']['file_name'];
      }
	


	 $ins_date = date('Y-m-d');

      $data1 = array
      (
       'logo_name'=>$this->input->post('logoname'),
       'logo_pic'=>$filename,
       'logo_status'=>1,
       'logo_date'=>$ins_date
      );





      if ($logo_id!='')
	{
        // print_r($data1);
        // die();

	   $result1 = $this->Admin_logo_model->updatelogo($logo_id,$data1);
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


  public function get_logo()
  {
  	$result['res'] = $this->Admin_logo_model->get_logo();

  	    $this->load->view('display_logo',$result);
  }


   public function editlogo()
  {
  	    $logoid = $this->input->post('id');

		$res = $this->Admin_logo_model->get_logoEdit($logoid);

		echo json_encode($res);
  }


}	