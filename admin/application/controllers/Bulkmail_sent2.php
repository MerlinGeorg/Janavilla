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

         $fsize = $_FILES['menu_image']['size'];
         $fname  = $_FILES['menu_image']['name'];
         $ftempname = $_FILES['menu_image']['tmp_name'];
         $ftype= $_FILES['menu_image']['type'];
         $ferror= $_FILES['menu_image']['error'];


         if($ferror>0)
          { 
        die('Upload error or No files uploaded'); 
         } 
     else
		   {
		     $frommail = "ansib@e4technosolutions.com";



        if($usertype=='Supplier')
        {
         $supplierdetails= $this->Bulkmail_send_model->getsuppliersmail();

         

          foreach($supplierdetails as $row)
          {
          	$tomail = $row->mailid;

//read from the uploaded file & base64_encode content 
    $handle = fopen($ftempname, "r");  // set the file handle only for reading the file 
    $content = fread($handle, $fsize); // reading the file 
    fclose($handle);                  // close upon completion 
  
    $encoded_content = chunk_split(base64_encode($content)); 
  
    $boundary = md5("random"); // define boundary with a md5 hashed value             
            
$pageaddress = $_SERVER['HTTP_REFERER'];

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$headers .= "From: ". $frommail."\r\n";
$headers .= "";

//  $body = "--$boundary\r\n"; 
 $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n"; 
 $body .= "Content-Transfer-Encoding: base64\r\n\r\n";  
 $body .= $message;  

//  attachment 
    $body .= "--$boundary\r\n"; 
    $body .="Content-Type: $file_type; name=".$file_name."\r\n"; 
    $body .="Content-Disposition: attachment; filename=".$file_name."\r\n"; 
    $body .="Content-Transfer-Encoding: base64\r\n"; 
    $body .="X-Attachment-Id: ".rand(1000, 99999)."\r\n\r\n";  
    $body .= $encoded_content; // Attaching the encoded file with email 


$a=mail($tomail,$subject,$body,$headers,"-f$frommail");

if($a)
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