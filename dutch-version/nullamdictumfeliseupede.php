<?php
// if(isset($_POST) && ($_SERVER['REQUEST_METHOD'] == 'POST')){
		require('./phpmailer/PHPMailerAutoload.php');	
	$mail = new PHPMailer(); // create a new object
	//$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 2; // debugging: 1 = errors and messages, 2 = messages only
	//$mail->SMTPAuth = true; // authentication enabled
	//$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
	$mail->Host = "localhost";
	$mail->Port = 25;
	$mail->IsHTML(true);
	//$mail->Username = "internetmoguls@cms99.cloudmailstore.com";
	//$mail->Password = "Mn%GB45(*#$@412";
	$mail->SetFrom("info@greenheartboutiquehotel.com","Greenheart Contact Form Dutch Version");
		
	$mail->AddAddress('info@greenheartboutiquehotel.com');
	$mail->AddAddress('contact@greenheartboutiquehotel.com');
    $mail->AddAddress("notification@internetmoguls.com");

	// $mail->AddAddress('anuj@internetmoguls.com'); 

	$mail->Subject ='Greenheart Contact Form Dutch Version';
	
	
    $name              =	        $_REQUEST['name'];
    $email  	       =	        $_REQUEST['email'];
    $phone		       =	        $_REQUEST['phone'];
	$message		   =	        $_REQUEST['message'];

date_default_timezone_set("Asia/Calcutta"); 
	$today = date("Y-m-d H:i:s");
	$ip_address=$_SERVER['REMOTE_ADDR'];
	$form_type='contactus';


	
	
	$message = "
		<html>
		<head>
		<title>Greenheart Contact Form Dutch Version</title>
		</head>
		<body>

		<table>
		<tr>
			<td colspan='2'><h2>Greenheart Contact Form Dutch Version</h2></td>
		</tr>
		
		<tr>
		<td>Name</td>
		<td>".$name."</td>
		</tr>

	    <tr>
		<td>Email</td>
		<td>".$email."</td>
		</tr>

		
		<tr>
		<td>Phone</td>
		<td>".$phone."</td>
		</tr>
        
		<tr>
		<td>Message</td>
		<td>".$message."</td>
		</tr>
		
		</table>
		</body>
		</html>
		";
	$mail->msgHTML($message, dirname(__FILE__));
	
	//Replace the plain text body with one created manually
	$mail->AltBody = 'Hello';
		function isRealDate($date) { 
			if (false === strtotime($date)) { 
				return false;
			} 
			list($year, $month, $day) = explode('-', $date); 
			return checkdate($month, $day, $year);
		}
		$reg_exUrl = "/(http|https|ftp|ftps|www)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
		if(empty($name) || $name=='') 
		{			
			echo "Enter name";
		}
		else if(!preg_match("/^[a-zA-Z ]*$/",$name)) 
		{
	      echo "Enter valid name";
		}
		else if(empty($email) || $email=='')
		{
        	echo "Enter email";
		}
		else if(!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i', $email)) 
		{
				echo "Enter valid email";
		}
		else if((empty($phone) || $phone==''))
		{
			echo "Enter phone number";
		}
		else if(strlen($phone)!=10)
		{
			echo "Enter valid phone number";
		}
		else if((!preg_match("/^[0-9]{10}$/",$phone)))
		{
			echo "Enter valid phone number";
		}
		else if((empty($message) || $message==''))
		{
			echo "Enter message";
		}
		else
		{
			//send the message, check for errors
			if (!$mail->send()) 
			{
			echo "Mailer Error: " . $mail->ErrorInfo;
			}
			else 
			{
			// echo "Mail Send";
		  header('location:http://www.greenheartboutiquehotel.com/dutch-version/thank-you.php');
			}
			
			
		}
		// }
	
			header('location:http://www.greenheartboutiquehotel.com/dutch-version/thank-you.php');
?>