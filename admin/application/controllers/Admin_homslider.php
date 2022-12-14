<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_homslider extends CI_Controller {

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
    	$this->load->model('Admin_homeslider_model');
	}

	public function index()
	{ 
    if(isset($_SESSION['username']))
    {
     
    
    $a = array('content' => 'admin_homeslider_view'
                // 'categories' => $categories
            );
    $this->load->view('admintemplate',$a);
    }
    else
    {
      redirect('Admin_login/login_admin');
    }
   
	}

	public function display_sliders()
	{
		$result['res'] = $this->Admin_homeslider_model->get_sliders();

  	    $this->load->view('display_homeslider',$result);
	}

		public function editslider()
	{
		$sliderid = $this->input->post('id');

		$res = $this->Admin_homeslider_model->getsliderEdit($sliderid);

		echo json_encode($res);
	}

	public function updateSlider()
	{
		$fillimg = $this->input->post('image1');
		 $slider_id = $this->input->post('sliderid');
		

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
        if(!empty($slider_id)){
          $unlink_path = 'uploads/'.$fillimg;
          if(!empty($fillimg)){
            unlink($unlink_path);
          }         
        }
        $filename = $data['upload_data']['file_name'];
      }


      $update_date = date('Y-m-d');

      $slider_priority = $this->input->post('sliderprio');

      if($slider_id!='')
      {
      	$checkprio = $this->Admin_homeslider_model->checkprio($slider_priority);  
         $getslider_id = $checkprio->homeslider_id;
      }

         if($getslider_id==$slider_id)
      	 {
            
            $data1 = array
			      (
			        'homeslider_title'=>$this->input->post('slidertitle'),
			        'homeslider_subtitle'=>$this->input->post('slidersubtitle'),
			        'homeslider_priority'=>$slider_priority,
			        'homeslider_pic'=>$filename,
			        'homeslider_status'=>1,
			        'homeslider_date'=>$update_date
			      );
           
           // print_r($data1);
           // die();

           $res = $this->Admin_homeslider_model->updateslider($slider_id,$data1);


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
      	 	if ($getslider_id!=$slider_id)
           {
              
             $res1 = $this->Admin_homeslider_model->get_existing_thissliderprio($slider_id);
             
             $existslider_prio = $res1->homeslider_priority;

             $prioidaray = array('homeslider_priority'=>$existslider_prio);

              $res2 = $this->Admin_homeslider_model->updateOtherslider($prioidaray,$getslider_id);

              if($res2==1)
             {
             	

                $data1 = array
			      (
			        'homeslider_title'=>$this->input->post('slidertitle'),
			        'homeslider_subtitle'=>$this->input->post('slidersubtitle'),
			        'homeslider_priority'=>$slider_priority,
			        'homeslider_pic'=>$filename,
			        'homeslider_status'=>1,
			        'homeslider_date'=>$update_date
			      );



             	$res = $this->Admin_homeslider_model->updateslider($slider_id,$data1);

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