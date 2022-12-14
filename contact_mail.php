<?php

	
	
		$name=$_POST['exampleInputname1'];
		
		$email=$_POST['exampleInputEmail1'];
		$number=$_POST['exampleInputphone1'];
		
		$enquiry=$_POST['exampleInputQuery1']; 
		
		//$details=$_POST['message'];
	    $pageaddress = $_SERVER['HTTP_REFERER'];
        $to="info@janafurniture.com";

            // <tr>
//      <th>Required Course</th>
//     <td>: '.$course.'</td>
//     </tr> 
		$message = '
<html>
<head>
  <title>Contact Mail</title>
</head>
<body>
  
  <table>
  
    <tr>
     <th>Name </th>
     <td>: '.$name.'</td>
    </tr>
	
	<tr>
    <th>Email ID</th>
    <td>: '.$email.'</td>
    </tr>
	
    <tr>
    <th>Mobile</th>
    <td>: '.$number.'</td>
    </tr>

     
    	<tr>
    <th>Enquiry</th>
    <td>: '.$enquiry.'</td>
    </tr>
	
    </table>
   
    
</body>
</html>
';



$subject='Contact mail';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$headers .= "From: ". $email."\r\n";
$headers .= "";
$a=mail($to,$subject,$message,$headers,"-f$email");

if(!$a) {
// echo '<script type="text/javascript">alert("Enquiry cannot be processed at this time!");window.location.href="' . $pageaddress . '";</script>';
	// echo "Enquiry cannot be processed at this time!";

?>
	<script type="text/javascript">
		alert("Enquiry cannot be processed at this time!");
		 window.location.href="contact.php";
	</script>

<?php	
}
else {
	// echo '<script type="text/javascript">alert("Enquiry is processed successfully");window.location.href="' . $pageaddress . '";</script>';
	// echo "Enquiry is processed successfully";

?>
	<script type="text/javascript">
		alert("Enquiry is processed successfully");
		window.location.href="contact.php";
	</script>

<?php
}

	

?>