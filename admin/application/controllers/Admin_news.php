<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_news extends CI_Controller {

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
      
      
      $this->load->model('Admin_news_model');
   }

   public function index()
  { 
      if(isset($_SESSION['username']))
      {
      
      // $getsubmenus = $this->Admin_submenu_model->get_submenus();

      // $getbrands = $this->Admin_brand_model->get_brands(); 
      
      $a = array('content' => 'admin_news_view'
              
                   
       );
      $this->load->view('admintemplate',$a);
      }
      else
      {
        redirect('Admin_login/login_admin');
      }
   
  }


  public function insertNews()
  {
    $news_id= $this->input->post('newsid');
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
        if(!empty($news_id)){
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
       'news_title'=>$this->input->post('newstitle'),
       'news_desc'=>$this->input->post('newsdesc'),
       'news_title_arab'=>$this->input->post('newstitlearab'),
       'news_desc_arab'=>$this->input->post('newsdescarab'),
       'news_status'=>1,
       'news_pic'=>$filename,
       'news_date'=>$ins_date
      );


              if ($news_id!='')
  {
    
  
         $result1 = $this->Admin_news_model->updatenews($news_id,$data1);
  } 
  else
  {
    $result1 = $this->Admin_news_model->insertnews($data1);
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

     public function display_news()
     {
      $result['res'] = $this->Admin_news_model->get_news();

        $this->load->view('display_news',$result);
     }

     public function editnews()
     {
      $newsid = $this->input->post('id');

    $res = $this->Admin_news_model->get_anewsid($newsid);

    echo json_encode($res);
     }

     public function delete_news()
     {
       $news_id = $this->input->post('id');
       $image_name = $this->input->post('img');

      

          
          
          $res = $this->Admin_news_model->delete_news_part($news_id);
          
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
