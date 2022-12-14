<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_contact extends CI_Controller {

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *    http://example.com/index.php/welcome
   *  - or -
   *    http://example.com/index.php/welcome/index
   *  - or -
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
   *    http://example.com/index.php/welcome
   *  - or -
   *    http://example.com/index.php/welcome/index
   *  - or -
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
      
      
      $this->load->model('Admin_contact_model');
   }

   public function index()
  { 
      if(isset($_SESSION['username']))
      {
      
      // $getsubmenus = $this->Admin_submenu_model->get_submenus();

      // $getbrands = $this->Admin_brand_model->get_brands(); 
      
      $a = array('content' => 'admin_contact_view'
              
                   
       );
      $this->load->view('admintemplate',$a);
      }
      else
      {
        redirect('Admin_login/login_admin');
      }
   
  }


  public function display_contact()
  {
    $result['res'] = $this->Admin_contact_model->get_contact();

        $this->load->view('display_contact',$result);
  }

  public function editcontact()
  {
    $contactid = $this->input->post('id');

    $res = $this->Admin_contact_model->get_contactid($contactid);

    echo json_encode($res);
  }

  public function updatecontact()
  {
    $contact_id= $this->input->post('contactid');
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
        if(!empty($contact_id)){
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
       'contact_title'=>$this->input->post('conatcttitle'),
       'contact_ph1'=>$this->input->post('phone1'),
       'contact_ph2'=>$this->input->post('phone2'),
       'contact_mail1'=>$this->input->post('mailid1'),
       'contact_mail2'=>$this->input->post('mailid2'),
       'contact_adrs1'=>$this->input->post('address1'),
       'contact_adrs2'=>$this->input->post('address2'),
       'contact_adrs_arab'=>$this->input->post('addressarab'),
       'map'=>$this->input->post('map'),
       'contact_pic'=>$filename,
       'contact_date'=>$ins_date
      );


         if ($contact_id!='')
  {
    
  
         $result1 = $this->Admin_contact_model->updateConatact($contact_id,$data1);
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
