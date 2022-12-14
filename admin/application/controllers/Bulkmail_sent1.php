<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bulkmail_sent extends CI_Controller {

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
    	$this->load->model('Bulkmail_send_model');
	}

	public function index()
	{ 
    if(isset($_SESSION['username'])){
      $this->load->model('Coursecat_model');
    
    $a = array('content' => 'bulkmail_send_view',
                );
    $this->load->view('admintemplate',$a);
    }else{
      redirect('Admin_board/login_admin');
    }
   
	}


	public function mailsend()
	{
		$subject = $this->input->post('msubject');
		$usertype = $this->input->post('musertype');
		$message = $this->input->post('summernote');
		$filename=$this->uploadfile();
		$frommail = "ansib@e4technosolutions.com";

        if($usertype=='Supplier')
        {
         $supplierdetails['dtls'] = $this->Bulkmail_send_model->getsuppliersmail();

         $i=0;

          foreach($dtls as $row)
          {
          	$tomail = $row->mailid;

          	$config = array(

          		'protocol'=>'smtp',
          		'smtp_host' => 'mail.nuevoinformatica.com';
                'smtp_port' => '587';
          		'smtp_user'=>'ansib@e4technosolutions.com',
          		'smtp_pass'=>'P@ssword123',
          		'mailtype'=>'html',
          		'charset'=>'utf-8',
          		'wordwrap'=>TRUE
   	             );


          	   $this->load->library('email',$config);
          	   $this->email->set_newline("\r\n");
          	   $this->email->from($filename);
          	   $this->email->to($tomail);
          	   $this->email->subject($subject);
          	   $this->email->message($message);
          	   // $this->email->attach($filename['full_path']);

          	   if($this->email->send())
          	   {
                 echo $i;
          	   }
          	   else
          	   {
          	   	echo "failed";
          	   }	

          	   $i++;
          }

        }	

	}


	public function uploadfile()
	{
		$config['upload_path']="./uploads";
        $config['allowed_types']='jpeg|jpg|png|pdf|xlxs|xls';
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload',$config);

        $this->upload->initialize($config);

         if($this->upload->do_upload('menu_image'))

        {
        	

        	return $this->upload->data();
        }

        else
        {

            return $this->upload->display_e;rrors();

        }
	}

}	