<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_usermanager extends CI_Controller {

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
    	// $this->load->model('Admin_menu_model');
    	$this->load->model('Admin_usermanager_model');
    	$this->load->library('encryption');
	}

	public function index()
	{ 
	    if(isset($_SESSION['username']))
	    {
	    
	    // $getmenus = $this->Admin_submenu_model->getmenus(); 
	    
	    $a = array('content' => 'admin_usermanager_view');
	    $this->load->view('admintemplate',$a);
	    }
	    else
	    {
	      redirect('Admin_login/login_admin');
	    }
   
	}

	public function search_uname()
	{
		if (isset($_GET['term'])) {
         $term = $this->input->get('term');

        
         
     	  $result= $this->Admin_usermanager_model->search_user($term);
    
             foreach ($result as $row)
             {
                 $arr_result[] = $row->reg_mail;
             }
              echo json_encode($arr_result);
        }    
	}

	public function get_udetls()
	{
		$uemail = $this->input->post('uemail');

		$res= $this->Admin_usermanager_model->getudtals($uemail);
		echo json_encode($res);
	}


	public function reguser()
	{
		$userid= $this->input->post('usid');
		$umail=$this->input->post('uemail');
		$username =$this->input->post('username');

		$tdate =date('Y-m-d');


		// $password = $this->encryption->encrypt($this->input->post('upassword'));

		// $depass = $this->encryption->decrypt($password);
		// echo $depass;

		die();

     
		$data1=array(

			'name'=>$this->input->post('uname'),
			'username'=>$username,
			'password'=>$this->input->post('upassword'),
			'mailid'=>$umail,
			'phone'=>$this->input->post('uphon'),
			'type'=>$this->input->post('utype'),
			'ustatus'=>1,
			'uins_date'=>$tdate

		);


		if($userid=='')
		{
           $res = $this->Admin_usermanager_model->checkmailexist($umail);
           $mailcount = $res->mailcount;
           if($mailcount==0)
           {
              $res1 = $this->Admin_usermanager_model->checkusernameexist($username);
              $usnamecount = $res1->usernamecount;
              if($usnamecount==0)
              {
                $res123 = $this->Admin_usermanager_model->insertuser($data1);

                if($res123==1)
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
              	echo "usnameexist";
              }	
           }
           else
           {
             echo "mailexist";
           }
		}
		else
		{
           $res = $this->Admin_usermanager_model->checkmailexist($umail);
           $mailcount = $res->mailcount;
           if($mailcount==0)
           {
              		$res1 = $this->Admin_usermanager_model->checkusernameexist($username);
	              $usnamecount = $res1->usernamecount;
	              if($usnamecount==0)
	              {
                    $res123= $this->Admin_usermanager_model->updateuser($userid,$data1);
                      if($res123==1)
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
	              	$res3 = $this->Admin_usermanager_model->getusnameexist($username);
	              	$existusername_id = $res3->id;
	              	if($existusername_id==$userid)
	              	{
                       $res123= $this->Admin_usermanager_model->updateuser($userid,$data1);
                      if($res123==1)
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
	              		echo "usnameexist";
	              	}	

	              }
           }
           else
           {
           	$res2 = $this->Admin_usermanager_model->getmailexist($umail);
           	$existmails_uid=$res2->id;
	           	if($existmails_uid==$userid)
	           	{
	           		$res1 = $this->Admin_usermanager_model->checkusernameexist($username);
	              $usnamecount = $res1->usernamecount;
	              if($usnamecount==0)
	              {
                    $res123= $this->Admin_usermanager_model->updateuser($userid,$data1);
                      if($res123==1)
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
	              	$res3 = $this->Admin_usermanager_model->getusnameexist($username);
	              	$existusername_id = $res3->id;
	              	if($existusername_id==$userid)
	              	{
                       $res123= $this->Admin_usermanager_model->updateuser($userid,$data1);
                      if($res123==1)
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
	              		echo "usnameexist";
	              	}	

	              }
	           	}
	           	else
	           	{
	           		echo "mailexist";
	           	}
           }
		}	

	}


	public function get_users()
	{
		$result['res'] = $this->Admin_usermanager_model->get_users();

  	    $this->load->view('display_users',$result);
	}

	public function edituser()
	{
		$usid=$this->input->post('id');
		$res = $this->Admin_usermanager_model->get_edituser($usid);
		echo json_encode($res);

	}

	public function changestatus()
	{
		  $stat = $this->input->post('status');
		$id = $this->input->post('id');

		if ($stat==1)
		{
			$data1 = array
			(
				'ustatus'=>0
			);
		}
		else
		{
			if($stat==0)
			{
				$data1 = array
				(
					'ustatus'=>1
				);
			}
		}
       
       $res123 = $this->Admin_usermanager_model->updateuser_stat($id,$data1);

       if ($res123==1) 
       {
       	 echo "success";
       }
       else
       {
       	echo "failed";
       }	
	}

	public function delete_user()
	{
		$id = $this->input->post('id');

		$res= $this->Admin_usermanager_model->deleteuser($id);

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
