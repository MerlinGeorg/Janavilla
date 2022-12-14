<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_ouragencies extends CI_Controller {

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
    	$this->load->model('Admin_ouragencies_model');
	}

	public function index()
	{ 
	    if(isset($_SESSION['username']))
	    {
	    
	    // $getmenus = $this->Admin_submenu_model->getmenus(); 
	    
	    $a = array('content' => 'admin_ouragencies_view');
	    $this->load->view('admintemplate',$a);
	    }
	    else
	    {
	      redirect('Admin_login/login_admin');
	    }
   
	}


		public function insertagency()
	{
		$agency_id = $this->input->post('agencyid');
		$fillimg = $this->input->post('image1');
		$fillimg1 = $this->input->post('image2');

		// echo $agency_id;
		// die();

		$config['upload_path']="./uploads";
        $config['allowed_types']='pdf|jpg|png';
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload',$config);
        $data = array('upload_data' => $this->upload->data());
        $this->upload->initialize($config);

        // file
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
        if(!empty($agency_id)){
          $unlink_path = 'uploads/'.$fillimg;
          if(!empty($fillimg)){
            unlink($unlink_path);
          }         
        }
        $filename = $data['upload_data']['file_name'];
      }
      // file
	 

	 // logo
         if(!$this->upload->do_upload('menu_image1'))

        {
        	$error = array('error'=> $this->upload->display_errors());
        }

        else
        {

        $data = array('upload_data' => $this->upload->data());

        }

     
      if ($_FILES['menu_image1']['size'] == 0)
      {
          $filename1 = $fillimg1;

      }
      else
      {
        if(!empty($agency_id)){
          $unlink_path = 'uploads/'.$fillimg1;
          if(!empty($fillimg1)){
            unlink($unlink_path);
          }         
        }
        $filename1 = $data['upload_data']['file_name'];
      }
      //logo


	 $ins_date = date('Y-m-d');

      $data1 = array
      (
       'agencies_name'=>$this->input->post('agencyname'),
       'agencies_desc'=>$this->input->post('agencydesc'),
       'agencies_name_arab'=>$this->input->post('agencynamearab'),
       'agencies_desc_arab'=>$this->input->post('agencydescarab'),
       'agencies_file'=>$filename,
       'agencies_logo'=>$filename1,
       'agencies_status'=>1,
       'agencies_date'=>$ins_date
      );


      if ($agency_id=='')
	{
		$result1 = $this->Admin_ouragencies_model->insertagency($data1);
	}
	else
	{
         $result1 = $this->Admin_ouragencies_model->updateagency($agency_id,$data1);
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

  public function getagency()
  {
  	$result['res'] = $this->Admin_ouragencies_model->get_agencys();

  	    $this->load->view('display_agency',$result);
  }


  public function editAgency()
  {
  	    $agencyid = $this->input->post('id');

		$res = $this->Admin_ouragencies_model->get_agencyEdit($agencyid);

		echo json_encode($res);
  }

  public function delete_agency()
  {
  	     $agency_id = $this->input->post('id');
	     $image_name = $this->input->post('img');
	     $logo = $this->input->post('logo');

	    

	        
	        
	        $res = $this->Admin_ouragencies_model->delete_agency_part($agency_id);
	        
	        $img_path = 'uploads/'.$image_name;

	        unlink($img_path);  

	        $img_path1 = 'uploads/'.$logo;

	        unlink($img_path1);  
	           
	        if($res == 1)
	        {   
	          echo "success";
	        }else{
	        
	          echo "failed";
	        }
  }



}
