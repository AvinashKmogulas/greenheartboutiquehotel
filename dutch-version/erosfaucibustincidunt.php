<?php
if(isset($_POST) && ($_SERVER['REQUEST_METHOD'] == 'POST')){
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
	$mail->SetFrom("contact@greenheartboutiquehotel.com","Table Reservation for Greenheart Boutique Hotel");
		
		$mail->AddAddress('info@greenheartboutiquehotel.com'); 
		$mail->AddBcc('seoqueris@gmail.com');
		$mail->AddBcc('anil.moguls@gmail.com'); 


	$mail->Subject ='Table Reservation for Greenheart Boutique Hotel';
	
	
    $name              =	        $_POST['name'];
    $email  	       =	        $_POST['email'];
    $phone		       =	        $_POST['phone'];
	$message		   =	        $_POST['message'];

date_default_timezone_set("Asia/Calcutta"); 
	$today = date("Y-m-d H:i:s");
	$ip_address=$_SERVER['REMOTE_ADDR'];
	$form_type='contactus';


	
	
	$message = "
		<html>
		<head>
		<title>Table Reservation for Greenheart Boutique Hotel</title>
		</head>
		<body>

		<table>
		<tr>
			<td colspan='2'>
			<p>
			Dear Team,</p><p>
			Please find below the Inquiry received for Restaurant & Meetings from Greenheart Boutique :
			</p>
			</td>
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
		<tr>
		<td colspan='2'>
			<p>
			<strong>Regards,</strong><br>
			Internet Moguls
			</p>
		</td>
		</tr>
		</table>
		</body>
		</html>
		";
	$mail->msgHTML($message, dirname(__FILE__));
	
	//Replace the plain text body with one created manually
	$mail->AltBody = 'Hello';
	
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
			else if(strlen($phone) < 10 AND  strlen($phone) > 13)
		{
			echo "Enter valid phone number";
		}
		else if((!preg_match("/^[0-9]{10}$/",$phone)))
		{
			echo "Enter valid phone number";
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
$thnksubject="Thank you for your inquiry about Greenheart Boutique Hotel We're excited to hear from you!";
$mail_3 = new PHPMailer;
//$mail->IsSMTP(); // enable SMTP
$mail_3->SMTPDebug = 2; // debugging: 1 = errors and messages, 2 = messages only
//$mail->SMTPAuth = true; // authentication enabled
//$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
$mail_3->Host = "localhost";
$mail_3->Port = 25;
$mail_3->IsHTML(true);
//$mail->Username = "internetmoguls@cms99.cloudmailstore.com";
//$mail->Password = "Mn%GB45(*#$@412";
$mail_3->SetFrom("contact@greenheartboutiquehotel.com","$thnksubject");

$mail_3->addAddress($email);

$mail_3->isHTML(true);

$mail_3->Subject = "$thnksubject";
$mail_3->Body = "<table><tr><td width='100%' style='padding: 3px 3px 3px 3px;'>

Dear ".$name.", 
<p>Thank you for reaching out to us regarding your interest in dining at Greenheart Boutique Hotel!</p>
<p>Your request has been successfully received, and the team will get back to you as soon as possible.  
</p>
<p></p>
<p style=\"font-size:0.9em;\"><strong>Warm Regards,</strong></p>

<p>Greenheart Boutique Hotel.</p>
<p>Greenheart Boutique Hotel Costerstraat 68-70 Paramaribo,<br> Suriname, South America</p>
<p>Email: 	info@greenheartboutiquehotel.com</p>
<p>Mobile : +597 892 5109 | Visit us: https://www.greenheartboutiquehotel.com/ </p> 
</td></tr></table>";
$mail_3->AltBody = "";
$mail_3->send();
	header('location:http://www.greenheartboutiquehotel.com/thank-you.php');
			}
			
			
		}
		}
	header('location:http://www.greenheartboutiquehotel.com/thank-you.php');
?>