<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_magezin extends CI_Controller {

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
    	
    	
    	$this->load->model('Admin_magazin_model');
	 }

	 public function index()
	{ 
	    if(isset($_SESSION['username']))
	    {
	    
	    // $getsubmenus = $this->Admin_submenu_model->get_submenus();

	    // $getbrands = $this->Admin_brand_model->get_brands(); 
	    
	    $a = array('content' => 'admin_magazin_view'
              
                   
	     );
	    $this->load->view('admintemplate',$a);
	    }
	    else
	    {
	      redirect('Admin_login/login_admin');
	    }
   
	}


	public function updatemagezin()
	{
		 $magenize_id= $this->input->post('magid');

		 // echo $magenize_id;
		// $fillimg = $this->input->post('image1');

		// $config['upload_path']="./uploads";
  //       $config['allowed_types']='jpeg|jpg|png|pdf|xls|xlsx';
  //       $config['remove_spaces'] = TRUE;
  //       $config['encrypt_name'] = TRUE;
  //       $this->load->library('upload',$config);
  //       $data = array('upload_data' => $this->upload->data());
  //       $this->upload->initialize($config);

        
  //       if(!$this->upload->do_upload('menu_image'))

  //       {
  //       	$error = array('error'=> $this->upload->display_errors());
  //       }

  //       else
  //       {

  //       $data = array('upload_data' => $this->upload->data());

  //       }

     
  //     if ($_FILES['menu_image']['size'] == 0)
  //     {
  //         $filename = $fillimg;

  //     }
  //     else
  //     {
  //       if(!empty($magenize_id)){
  //         $unlink_path = 'uploads/'.$fillimg;
  //         if(!empty($fillimg)){
  //           unlink($unlink_path);
  //         }         
  //       }
  //       $filename = $data['upload_data']['file_name'];
  //     }
	


	 $ins_date = date('Y-m-d');

      $data1 = array
      (
       'mag_title'=>$this->input->post('magtitle'),       
       'mag_file'=>'n/a',
       'mag_src'=>$this->input->post('magsrc'),
       'mag_date'=>$ins_date
      );


       if ($magenize_id!='')
	{
				
			
		         $result1 = $this->Admin_magazin_model->updatemag($magenize_id,$data1);
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



	public function display_mag()
	{
		$result['res'] = $this->Admin_magazin_model->get_mag();

  	    $this->load->view('display_mag',$result);
	}

	public function editmag()
	{
		$magid = $this->input->post('id');

		$res = $this->Admin_magazin_model->get_magid($magid);

		echo json_encode($res);
	}



}	