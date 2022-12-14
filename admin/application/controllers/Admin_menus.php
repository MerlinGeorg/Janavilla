<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_menus extends CI_Controller {

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
	}

	public function index()
	{ 
    if(isset($_SESSION['username']))
    {
     
    
    $a = array('content' => 'admin_menu_view'
                // 'categories' => $categories
            );
    $this->load->view('admintemplate',$a);
    }
    else
    {
      redirect('Admin_login/login_admin');
    }
   
	}


	public function display_menu()
	{
		$result['res'] = $this->Admin_menu_model->get_menus();

  	    $this->load->view('display_menu',$result);
	}

	public function editmenu()
	{
		$menuid = $this->input->post('id');

		$res = $this->Admin_menu_model->getmenusEdit($menuid);

		echo json_encode($res);
	}


	public function updateMenus()
	{
         $fillimg = $this->input->post('image1');
		 $menuid = $this->input->post('menuid');
		

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


      $update_date = date('Y-m-d');

      $m_priority = $this->input->post('mprio');

      

      if ($menuid!='')
      {

         
         $checkprio = $this->Admin_menu_model->checkprio($m_priority);  
         $getmenu_id = $checkprio->menu_id;

      	 if($getmenu_id==$menuid)
      	 {
            
            $data1 = array
			      (
			        'menu_id'=>$menuid,
			        'menu_name'=>$this->input->post('menuname'),
			        'menu_name_arab'=>$this->input->post('menunamearab'),
			        'menu_indextitle'=>$this->input->post('indextitle'),
			        'menu_priority'=>$m_priority,
			        'menu_pic'=>$filename,
			        'menu_date'=>$update_date
			      );
           
           // print_r($data1);
           // die();

           $res = $this->Admin_menu_model->updatemenu($menuid,$data1);


           if($res==1)
           {
           	echo "success";
           }
           else
           {

           	echo "failed";
           }	
      	 }
      	 else
      	 {

           if ($getmenu_id!=$menuid)
           {
              

           	$res1 = $this->Admin_menu_model->get_existing_thismenuprio($menuid);
             
             $existmeu_prio = $res1->menu_priority;

             $prioidaray = array('menu_priority'=>$existmeu_prio);

             $res2 = $this->Admin_menu_model->updateOthermenu($prioidaray,$getmenu_id);

             if($res2==1)
             {
             	

                $data1 = array
			      (
			        'menu_id'=>$menuid,
			        'menu_name'=>$this->input->post('menuname'),
			        'menu_indextitle'=>$this->input->post('indextitle'),
			        'menu_pic'=>$filename,
			        'menu_priority'=>$m_priority,
			        'menu_date'=>$update_date
			      );



             	$res = $this->Admin_menu_model->updatemenu($menuid,$data1);

             	if ($res==1) 
             	{
             		echo "success";
             	}
             	else
             	{
             		echo "failed";
             	}
             }



           }
      	 }	

      }
        
	}


	


}
