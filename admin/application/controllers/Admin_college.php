<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_college extends CI_Controller {

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
	// function __construct()
	//  {
 //    	parent::__construct();
 //    	$this->load->model('Admin_board_model');
	// }

	public function index()
	{ 
    if(isset($_SESSION['username'])){
      $this->load->model('Coursecat_model');
    $categories = $this->Coursecat_model->allcategories();
    $a = array('content' => 'college_view',
                'categories' => $categories);
    $this->load->view('admintemplate',$a);
    }else{
      redirect('Admin_board/login_admin');
    }
   
	}

	 public function add_collg()
       {
         $this->load->model('Admin_board_model'); 

         $fillimg = $this->input->post('image1');
         $st_id = $this->input->post('colgid');

         $usertype_id = $this->input->post('typeid');
         // $course = $this->input->post('course');


        $config['upload_path']="./uploads";
        $config['allowed_types']='jpeg|jpg|png';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload',$config);
        $data = array('upload_data' => $this->upload->data());
        $this->upload->initialize($config);
        
        if(!$this->upload->do_upload('image_file')){
        	$error = array('error'=> $this->upload->display_errors());
        }
        else
        {
        $data = array('upload_data' => $this->upload->data());
        }

          if ( $_FILES['image_file']['size'] == 0)
      {
          $filename = $fillimg;

      }else{
            if(!empty($st_id)){
          $unlink_path = 'uploads/'.$fillimg;
          if(!empty($fillimg)){
            unlink($unlink_path);
          }         
        }
        $filename = $data['upload_data']['file_name'];
      }
        	
        //  echo $st_id;
        // die();
        
        date_default_timezone_set("UTC");
         
         $todays = date("Y-m-d");

         $stud_civilId = $this->input->post('civilid');
          

         


         

      //   echo $st_id;

      // die();
         
         
        

        
        if($st_id!='')
        {

          $res124 = $this->Admin_board_model->checkCivilId($stud_civilId);

          $countcivil = $res124->civilcount;

          
         
         

          
           $data2 = array(
        'student_id' => $st_id,
        'student_civil_id' => $stud_civilId,
        'student_reg'=> $this->input->post('regno'),
        'first_name' => $this->input->post('fname'),
        'last_name'=>$this->input->post('lname'),
        'gender'=>$this->input->post('gender'),
        'dob'=>$this->input->post('dob'),
        'email'=>$this->input->post('mail'),
        'phno'=>$this->input->post('phno'),
        'student_pwd'=>$this->input->post('spassword'),
        'qualification'=>$this->input->post('qualification'),
        'p_course'=>$this->input->post('pcourse'),
        'picture' =>  $filename,
        'ins_date'=> $todays
        // 'priority'=>0
        ); 

          $reslt24 = $this->Admin_board_model->civilEditCheck($stud_civilId);
          if ($reslt24=='')
          {
            $getingstud_id = $st_id;
            $getingstud_civil_id = $stud_civilId;
          }
          else
          {
          $getingstud_id = $reslt24->student_id;
          $getingstud_civil_id = $reslt24->student_civil_id;
          }

          if($st_id==$getingstud_id)
          {
           

             if($getingstud_civil_id == $stud_civilId)
             {
                $result= $this->Admin_board_model->student_update($st_id,$data2);

                  if ($result == true)
                   {
                     echo "true"; 
                   }
                   else
                   {
                    echo "false";
                   }  
             }
             else
             {
                 
                 if($countcivil == 0)
                 {
                   $result= $this->Admin_board_model->student_update($st_id,$data2);
                   if ($result == true)
                   {
                     echo "true"; 
                   }
                   else
                   {
                    echo "false";
                   } 
                 }
                 else
                 {
                  echo "civi id exist";
                 }
             }
           }

        }
        else
        {
          $res124 = $this->Admin_board_model->checkCivilId($stud_civilId);

        $countcivil = $res124->civilcount;

        if ($countcivil != 0) 
        {
          echo "civi id exist";
        }
        else
        {  

         


           $data2 = array(
        'student_id' => $st_id,
        'student_civil_id' => $stud_civilId,
        'student_reg'=> $this->input->post('regno'),
        'first_name' => $this->input->post('fname'),
        'last_name'=>$this->input->post('lname'),
        'gender'=>$this->input->post('gender'),
        'dob'=>$this->input->post('dob'),
        'email'=>$this->input->post('mail'),
        'phno'=>$this->input->post('phno'),
        'student_pwd'=>$this->input->post('spassword'),
        'qualification'=>$this->input->post('qualification'),
        'p_course'=>$this->input->post('pcourse'),
        'picture' =>  $filename,
        'ins_date'=> $todays
        // 'priority'=>0
        ); 
        	// $pico="";	
      
        // if(empty($st_id))
        // { 
        $result= $this->Admin_board_model->insert_student($data2);
        
        // }
        // else
        // {
        
        // $result= $this->Admin_board_model->student_update($st_id,$data2);
        // }	
       

        if ($result == true)
         {
           echo "true"; 
         }
         else
         {
         	echo "false";
         }	
         }
      }
  }

         public function display_studets_list()
  {
  	$this->load->model("Admin_board_model");
  	$res_college['res'] = $this->Admin_board_model->get_students_list();
    

  	$this->load->view('get_college_view',$res_college);
  }


  public function editcolg()
  {
  	  $id=$this->input->post('id');
		 	$this->load->model('Admin_board_model');
		 	$res = $this->Admin_board_model->edit_colg_part($id);
			echo json_encode($res);
  }

  // public function deletecolg()
  // {
  // 	$colgid = $this->input->post('id');


		// 		$this->load->model('Admin_board_model');
				
		// 		$res = $this->Admin_board_model->delete_colg_part($colgid);
	 				
					 
		// 		if($res == 1)
		// 		{		
		// 			echo "success";
		// 		}else{
				
		// 			echo "failed";
		// 		}
  // }


  public function delete_student()
  {
    $st_id = $this->input->post('id');
    $image_name = $this->input->post('img');

    

        $this->load->model('Admin_board_model');
        
        $res = $this->Admin_board_model->delete_colg_part($st_id);
        
        $img_path = 'uploads/'.$image_name;

        unlink($img_path);  
           
        if($res == 1)
        {   
          echo "success";
        }else{
        
          echo "failed";
        }
  }


  public function pro_check_colg()
  {
    $this->load->model('Admin_board_model');
           $id=$this->input->post('id');
           $status=$this->input->post('status');

           if($status=='high')
           {
            $res2 = $this->Admin_board_model->set_pro1(0,$id);
            echo $res2;

           }
           else
           {
            $res2 = $this->Admin_board_model->set_pro1(1,$id);
            echo $res2;
           }
  }


  public function auto_regno()
  {
    // $autoin = mt_rand();
    // echo $autoin;
  $this->load->model('Admin_board_model');
    $res3 = $this->Admin_board_model->get_st_count();
    // echo $res3->student_id;
    // die();
    if($res3 == '0')
    {
     $stdlastid = 0;
    }
    else
    {
    $stdlastid = $res3->student_id+1;
    }
    // echo $stdlastid;
    // die();
    date_default_timezone_set("UTC");
    $today = date("ymd");
    $mass = "MHC";

    // $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
    echo $unique =$mass . $today . $stdlastid;
  }


}