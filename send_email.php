<?php

	// Replace this with your own email address
	$to="admin@octsol.com";

	// Extract form contents
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
		
	// Validate email address
	function valid_email($str) {
		return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
	}
	
	// Return errors if present
	$errors = "";
	
	if($name =='') { $errors .= "name,"; }
	if(valid_email($email)==FALSE) { $errors .= "email,"; }
	if($message =='') { $errors .= "message,"; }

	// Send email
	if($errors =='') {

		$headers =  'From: sCard <no-reply@fluidapp.com>'. "\r\n" .
					'Reply-To: '.$email.'' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();
		$email_subject = "Website Contact Form: $email";
		$message="Name: $name \n\nEmail: $email \n\Phone: $phone \n\nSubject: $subject \n\nMessage:\n\n $message";
	
		mail($to, $email_subject, $message, $headers);
		echo "true";
	
	} else {
		echo $errors;
	}
	
?>
