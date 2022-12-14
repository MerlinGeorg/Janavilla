<?php

include('config.php');

	
	
		$name=$_POST['regname'];
		$type=$_POST['regtype'];
		
		$email=$_POST['regmail'];
		$number=$_POST['regphn'];
        
        $datetime = date("Y-m-d h:i:sa");

        $pagename=$_POST['pagename'];
		?>
		<input type="hidden" name="pagename" id="pagename" value="<?php echo $pagename ?>">

        <input type="hidden" name="custmail" id="custmail" value="<?php echo $email ?>">
		<?php


$nRows = $db->query('select count(*) from reg_users where reg_mail="'.$email.'"')->fetchColumn(); 

if($nRows==0)
{

$statement = $db->prepare('INSERT INTO reg_users (reg_name, reg_type, reg_mail,reg_phon,reg_datetime)
    VALUES (?, ?, ?, ?, ?)');

if($statement->execute([$name, $type, $email,$number,$datetime]))
	   {
            
        
		
		
		//$details=$_POST['message'];
	    $pageaddress = $_SERVER['HTTP_REFERER'];
        $to="info@nuevoinformatica.com";

            // <tr>
//      <th>Required Course</th>
//     <td>: '.$course.'</td>
//     </tr> 
		$message = '
<html>
<head>
  <title>Registraion Mail</title>
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
    <td>: '.$type.'</td>
    </tr>
	
    </table>
   
    
</body>
</html>
';



$subject='registraion request';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$headers .= "From: ". $email."\r\n";
$headers .= "";
$a=mail($to,$subject,$message,$headers,"-f$email");

if(!$a) {
// echo '<script type="text/javascript">alert("Enquiry cannot be processed at this time!");window.location.href="' . $pageaddress . '";</script>';
// 	echo "cannot be processed at this time!";

?>
	<script type="text/javascript">
	
	var pageurl = document.getElementById('pagename').value;
		alert("register mail cannot be processed at this time!");
		 window.location.href=pageurl;
	</script>

<?php	

}
else 
{
	


	$message1 = '
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

  
$subject1='Responce mail';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$headers .= "From: ". $to."\r\n";
$headers .= "";
$b=mail($email,$subject,$message1,$headers,"-f$to");


if(!$b) {
 ?>
	<script type="text/javascript">
	 var pageurl = document.getElementById('pagename').value;
		alert("register mail is send successfully");
		window.location.href=pageurl;	 
	</script>

<?php
 }
 else
 {
 	?>
	<script type="text/javascript">
	 var pageurl = document.getElementById('pagename').value;
		alert("register mail is processed successfully");
		window.location.href=pageurl;		 
	</script>

<?php
 }
}




   }
        else
        {?>
			<script type="text/javascript">
			 var pageurl = document.getElementById('pagename').value;
				alert("Oops!.something went wrong");
				window.location.href=pageurl;		 
			</script>

		<?php
        }

}	
else
{
  ?>
			<script type="text/javascript">
			 var pageurl = document.getElementById('pagename').value;
				alert("Mail id already registrad");
				window.location.href=pageurl;		 
			</script>

		<?php
}

?>



</script>