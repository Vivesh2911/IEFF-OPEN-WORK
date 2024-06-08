<?php
if($_POST)
{
require('constant.php');
    
    $name      = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $email     = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $need     = filter_var($_POST["need"], FILTER_SANITIZE_STRING);
    $message   = filter_var($_POST["message"], FILTER_SANITIZE_STRING);
    
    if(empty($name)) {
		$empty[] = "<b>Name</b>";		
	}
	if(empty($email)) {
		$empty[] = "<b>Email</b>";
	}
	if(empty($need)) {
		$empty[] = "<b>need Number</b>";
	}	
	if(empty($message)) {
		$empty[] = "<b>Comments</b>";
	}
	
	if(!empty($empty)) {
		$output = json_encode(array('type'=>'error', 'text' => implode(", ",$empty) . ' Required!'));
        die($output);
	}
	
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ //email validation
	    $output = json_encode(array('type'=>'error', 'text' => '<b>'.$email.'</b> is an invalid Email, please correct it.'));
		die($output);
	}
	
	//reCAPTCHA validation
	if (isset($_POST['g-recaptcha-response'])) {
		
		require('component/recaptcha/src/autoload.php');		
		
		$recaptcha = new \ReCaptcha\ReCaptcha(SECRET_KEY);

		$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

		  if (!$resp->isSuccess()) {
				$output = json_encode(array('type'=>'error', 'text' => '<b>Captcha</b> Validation Required!'));
				die($output);				
		  }	
	}
	
	$toEmail = "malini9197@gmail.com";
	$mailHeaders = "From: " . $name . "<" . $email . ">\r\n";
	$mailBody = "User Name: " . $name . "\n";
	$mailBody .= "User Email: " . $email . "\n";
	$mailBody .= "need: " . $need . "\n";
	$mailBody .= "message: " . $message . "\n";

	if (mail($toEmail, "Contact Mail", $mailBody, $mailHeaders)) {
	    $output = json_encode(array('type'=>'message', 'text' => 'Hi '.$name .', thank you for the comments. We will get back to you shortly.'));
	    die($output);
	} else {
	    $output = json_encode(array('type'=>'error', 'text' => 'Unable to send email, please contact'.SENDER_EMAIL));
	    die($output);
	}
}
?>