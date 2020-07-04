<?php

	require 'PHPMailerAutoload.php';
		require 'Credential.php';
		require 'Config/Config.php';



		$receiver=$_POST['MMail'];///li ghnasaredlo email 
		$password="";

		//echo '<script>alert("'.$receiver.'");</script>';
		$name = $db->real_escape_string($receiver);
		$r = $name;
		$receiver = $r;

		try{

			$sql ="SELECT * from users where email like '%$receiver%'";
			$res = $db->query($sql);
			while ($ac = $res->fetch_assoc()) {
				$password=$ac['password'];

			}

			//echo '<script>alert("'.$password.'");</script>';
		
		



		$mail = new PHPMailer;

		//$mail->SMTPDebug = 4;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = EMAIL;                 // SMTP username
		$mail->Password = PASSWORD;                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		$mail->setFrom(EMAIL, 'I-Chat');
		$mail->addAddress($receiver);     // Add a recipient
		
		             // Name is optional
		

		       // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = 'Forget Password ? I-chat Reset it to you :)';
		$mail->Body    = 'Your Password is here , Do not Forget it again :)  <br> '.$password.'';
		$mail->AltBody = 'Thank you ';

		if(!$mail->send()) {
		    echo 'Message could not be sent.';
		    //echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    echo 'Message has been sent with Success !';
		}


		}catch(Exception $ex){
			throw new Exception("Error in email handling !!", 1);
			
		}

?>