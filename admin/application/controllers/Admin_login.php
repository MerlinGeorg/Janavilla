<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Controller {

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
     $this->load->model('Admin_login_model');
  }

  public function index()
  { 

    if(isset($_SESSION['username']))
      {
        
      // $categories = $this->Coursecat_model->allcategories();
      $a = array('content' => 'college_view'
                  // 'categories' => $categories
                );
      $this->load->view('admintemplate',$a);
      }
    else
      {
        redirect('Admin_login/login_admin');
      }
   
  }


  public function login_admin()
  {
    $this->load->library('session');  
     $result = $this->Admin_login_model->validate_login();

     if(!$result)
     {
       ?>
      <script type="text/javascript">
        alert('failed');
      </script>
      <?php 


      $this->load->view('admin_login_view');
     }
     else
     { 
      redirect('Admin_login/react');
     }  
  }
  

  public function react()
  {
    if(isset($_SESSION['username']))
      {
        $a = array('content' => 'dashboard_view',
                   // 'courscat' => $cours_cat
    );
      $this->load->view('admintemplate',$a);
      }

  }

  public function logout()
  {
    $this->session->sess_destroy();

    $this->load->view('admin_login_view');
  }

}
