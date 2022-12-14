<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bulkmail_sent extends CI_Controller {

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
      $this->load->model('Bulkmail_send_model');
  }

  public function index()
  { 
    if(isset($_SESSION['username'])){
      
    
    $a = array('content' => 'bulkmail_send_view',
                );
    $this->load->view('admintemplate',$a);
    }else{
      redirect('Admin_board/login_admin');
    }
   
  }
  
  
//  public function upload_file()
//         {
//             $config['upload_path'] = 'uploads/';
//             $config['allowed_types'] = 'doc|pdf|docx|jpg';
//             $this->load->library('upload',$config);
//             if($this->upload->do_upload('care_file'))
//             {
//                 return $this->upload->data();
//             }
//             else
//              {
//                 return $this->upload->display_errors();
//              }   
//         }


  public function mailsend()
  {
    $subject = $this->input->post('msubject');
    $usertype = $this->input->post('musertype');
    $htmlContent = $this->input->post('summernote');
    
    $config['upload_path'] = 'mailfile/';
            $config['allowed_types'] = 'doc|pdf|docx|jpg|png|jpeg';
            $this->load->library('upload',$config);
            
            $file_data =  $this->upload->data();
           $this->upload->initialize($config);
            
            if($this->upload->do_upload('menu_image'))
            {
                $file_data = $this->upload->data();
            }
            else
             {
                $file_data = $this->upload->display_errors();
             }  
         
         // echo $tcbox;
         // die();
    // $totalTraveler=$bookdetails->item_ad_qty+$bookdetails->item_ch_qty+$bookdetails->item_in_qty;
        
        // $htmlBody="
        // <h3>Complaint Mail</h3>
        // <p>Name: $names</p>
        // <p>Mail Id: $emails</p>
        // <p>Phone No: $phone</p>
        // <p>Issue: $issue</p>
        // <p>Description: $descrip</p>
        // ";


        // $file_data = $this->upload_file();

if($usertype=='Supplier')
        {
         $supplierdetails= $this->Bulkmail_send_model->getsuppliersmail();

         foreach($supplierdetails as $row)
          {
            $tomail = $row->mailid; 
            
            // echo  $tomail;

    if(is_array($file_data))
         {
            $this->load->library ( 'email' );
            $config ['protocol'] = 'smtp';
            $config ['smtp_host'] = 'mail.nuevoinformatica.com';
            $config ['smtp_port'] = '587';
            $config ['smtp_user'] = 'info@nuevoinformatica.com';
            $config ['smtp_pass'] = 'nuevoofficial';
            $config ['mailtype'] = 'html';
            $config ['charset'] = 'utf-8';
            $config ['wordwrap'] = TRUE;
            $config ['newline'] = "\r\n";
            
           
            $this->email->initialize ( $config );
           
           
            $this->email->from ( 'info@nuevoinformatica.com', 'jana furniture' );
            
            $this->email->to ( $tomail,'Supplier' );
            $this->email->reply_to('info@nuevoinformatica.com', 'jana furniture');
            $this->email->subject ( $subject );
//          $this->email->message ( $htmlBody);
            $this->email->message($htmlContent);
//          $this->email->send ();
            $this->email->attach($file_data['full_path']);
            
        
        if($this->email->send())
          {
              if(delete_files($file_data['file_path']))
              {   
              echo 'success';
              } 
          }
           else {
           echo 'error';
            // echo  $this->email->print_debugger();
        }

      }

      else
      {
          echo 'upload failed';
      }

    }

   } 
   else
   {
     if($usertype=='Customer')
     {
       $customerdetails= $this->Bulkmail_send_model->getcustomersmail();

         foreach($customerdetails as $row)
          {
            $tomail = $row->reg_mail; 
            
            // echo  $tomail;

    if(is_array($file_data))
         {
            $this->load->library ( 'email' );
            $config ['protocol'] = 'smtp';
            $config ['smtp_host'] = 'mail.nuevoinformatica.com';
            $config ['smtp_port'] = '587';
            $config ['smtp_user'] = 'info@nuevoinformatica.com';
            $config ['smtp_pass'] = 'nuevoofficial';
            $config ['mailtype'] = 'html';
            $config ['charset'] = 'utf-8';
            $config ['wordwrap'] = TRUE;
            $config ['newline'] = "\r\n";
            
           
            $this->email->initialize ( $config );
           
           
            $this->email->from ( 'info@nuevoinformatica.com', 'jana furniture' );
            
            $this->email->to ( $tomail,'Supplier' );
            $this->email->reply_to('info@nuevoinformatica.com', 'jana furniture');
            $this->email->subject ( $subject );
//          $this->email->message ( $htmlBody);
            $this->email->message($htmlContent);
//          $this->email->send ();
            $this->email->attach($file_data['full_path']);
            
        
        if($this->email->send())
          {
              if(delete_files($file_data['file_path']))
              {   
              echo 'success';
              } 
          }
           else {
           echo 'error';
            // echo  $this->email->print_debugger();
        }

      }

      else
      {
          echo 'upload failed';
      }

    }


     }
   }      
  }

  


}