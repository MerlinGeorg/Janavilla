<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_submenu extends CI_Controller {

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
    	$this->load->model('Admin_submenu_model');
	}

	public function index()
	{ 
    if(isset($_SESSION['username']))
    {
    
    $getmenus = $this->Admin_submenu_model->getmenus(); 
    
    $a = array('content' => 'admin_submenu_view',
                'getmenus' => $getmenus
            );
    $this->load->view('admintemplate',$a);
    }
    else
    {
      redirect('Admin_login/login_admin');
    }
   
	}


	public function insertSubmenu()
	{
		$submenu_id = $this->input->post('submenuid');
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
        if(!empty($menuid)){
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
       'submenu_name'=>$this->input->post('submenuname'),
       'submenu_desc'=>$this->input->post('subdesc'),
       'submenu_name_arab'=>$this->input->post('submenunamearab'),
       'submenu_desc_arab'=>$this->input->post('subdescarab'),
       'submenu_main'=>$this->input->post('submain'),
       'submenu_pic'=>$filename,
       'submenu_status'=>1,
       'submenu_date'=>$ins_date
      );
      
	

	if ($submenu_id=='')
	{
		$result1 = $this->Admin_submenu_model->insert($data1);
	}
	else
	{
         $result1 = $this->Admin_submenu_model->update($submenu_id,$data1);
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


  

  public function display_submenu()
	{
		$result['res'] = $this->Admin_submenu_model->get_submenus();

  	    $this->load->view('display_submenu',$result);
	}



  public function editsubmenu()
	{
		$menuid = $this->input->post('id');

		$res = $this->Admin_submenu_model->get_submenusEdit($menuid);

		echo json_encode($res);
	}


public function changestatus()
	{
		$submenu_stat = $this->input->post('status');
		$submenu_id = $this->input->post('id');

		if ($submenu_stat==1)
		{
			$data1 = array
			(
				'submenu_status'=>0
			);
		}
		else
		{
			if($submenu_stat==0)
			{
				$data1 = array
				(
					'submenu_status'=>1
				);
			}
		}
       
       $res123 = $this->Admin_submenu_model->updatesub_stat($submenu_id,$data1);

       if ($res123==1) 
       {
       	 echo "success";
       }
       else
       {
       	echo "failed";
       }	

	}	


	public function delete_submenu()
	  {
	    $submenu_id = $this->input->post('id');
	    $image_name = $this->input->post('img');

	    

	        
	        
	        $res = $this->Admin_submenu_model->delete_submenu_part($submenu_id);
	        
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
