<?php
	session_start();
	$mailto = 'me@alecrust.com' ;
	$subject = "Contact Form Message" ;
	$formurl = "index.php" ;
	$errorurl = "error.php" ;
	$thankyouurl = "success.php" ;
	$name = $_POST['name'] ;
	$email = $_POST['email'] ;
	$phone = $_POST['phone'] ;
	$message = $_POST['message'] ;
	$http_referrer = getenv( "HTTP_REFERER" );
	if (!isset($_POST['email'])) {
		header( "Location: $formurl" );
		exit ;
	}
	if (empty($name) || empty($email) || empty($phone) || empty($message) || $_SESSION['answer'] != $_POST['answer']) {
	   header( "Location: $errorurl" );
	   exit ;
	}
	$name = strtok( $name, "\r\n" );
	$email = strtok( $email, "\r\n" );
	$phone = strtok( $phone, "\r\n" );
	if (get_magic_quotes_gpc()) {
		$message = stripslashes( $message );
	}
	$messageproper =
		"Name: " . $name ."\n" .
		"Email: " . $email ."\n" .
		"Phone: " . $phone ."\n\n" .
		"Message: " . $message ."\n" ;
	mail($mailto, $subject, $messageproper, "From: \"$name\" <$email>\r\nReply-To: \"$name\" <$email>\r\n" );
	header( "Location: $thankyouurl" );
	exit ;
?>