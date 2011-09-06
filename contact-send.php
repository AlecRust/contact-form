<?php

	session_start();

	// Email address to send to
	$mailto = 'me@alecrust.com' ;

	// Email subject
	$subject = "Contact Form Message" ;

	// Where form is sent from
	$formurl = "contact.php" ;

	// Error page
	$errorurl = "contact-error.php" ;

	// Success page
	$successurl = "contact-success.php" ;

	$name = $_POST['name'] ;
	$email = $_POST['email'] ;
	$phone = $_POST['phone'] ;
	$option = $_POST['option'] ;
	$message = $_POST['message'] ;

	$http_referrer = getenv( "HTTP_REFERER" );
	if (!isset($_POST['email'])) {
		header( "Location: $formurl" );
		exit ;
	}

	// Required fields
	if (empty($name) || empty($email) || empty($message) || $_SESSION['answer'] != $_POST['answer']) {
	   header( "Location: $errorurl" );
	   exit ;
	}

	$name = strtok( $name, "\r\n" );
	$email = strtok( $email, "\r\n" );
	$phone = strtok( $phone, "\r\n" );
	$option = strtok( $option, "\r\n" );

	if (get_magic_quotes_gpc()) {
		$message = stripslashes( $message );
	}

	// Output message
	$messageproper =
		"Name: " . $name ."\n" .
		"Email: " . $email ."\n" .
		"Phone: " . $phone ."\n" .
		"Option: " . $option ."\n\n" .
		"Message: " . $message ."\n" ;
	mail($mailto, $subject, $messageproper, "From: \"$name\" <$email>\r\nReply-To: \"$name\" <$email>\r\n" );
	header( "Location: $successurl" );
	exit ;

?>