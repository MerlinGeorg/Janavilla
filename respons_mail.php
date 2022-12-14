<?php

	
	
		$email="info@janafurniture.com";
		
		
		
		//$details=$_POST['message'];
	    $pageaddress = $_SERVER['HTTP_REFERER'];
        $to= $_POST['cmail'];

            // <tr>
//      <th>Required Course</th>
//     <td>: '.$course.'</td>
//     </tr> 
		$message = '
<html>
<head>
  <title>Responce Mail from Jana Furniture</title>
</head>
<body>
  
 <h3>Thanks for contacting us </h3>
 <p> Our team will connect you soon...</p>
   
    
</body>
</html>
';



$subject='responce mail from jana furniture';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$headers .= "From: ". $email."\r\n";
$headers .= "";
$a=mail($to,$subject,$message,$headers,"-f$email");


	

?>