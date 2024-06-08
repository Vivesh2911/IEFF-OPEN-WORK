<?php

$subjectt = 'New message from contact form';

// form field names and their translations.
// array variable name => Text to appear in the email
$fields = array('country' => 'country', 'name' => 'Name', 'need' => 'Need', 'email' => 'Email', 'message' => 'Message'); 

// message that will be displayed when everything is OK :)
$okMessage = 'Your form successfully submitted. Thank you, We will get back to you soon!';

// If something goes wrong, we will display this message.
$errorMessage = 'There was an error while submitting the form. Please try again later';
/*
 *  LET'S DO THE SENDING
 */

// if you are not debugging and don't need error reporting, turn this off by error_reporting(0);
error_reporting(E_ALL & ~E_NOTICE);

    $toName = "International Cultural and Dance Festival";
    $toEmail = "folkfestivalindia@gmail.com";
    $fromEmail="folkfestivalindia@gmail.com";
	$ftype=$_POST["ftype"];

$headers = "From: ".$toName." < ".$fromEmail." >\r\n";
$emessage = '<html><body style="text-align:center;">';
$emessage .= '<h3 style="text-align: center;">  '.$toName.'</h3>';
$emessage .= '<table rules="all" width="100%" style="border-color: #666;max-width:500px;margin: 0 auto;" cellpadding="10">';	

	if($ftype=="contact")
	{
		$country=$_POST["country"];
		$name=$_POST["name"];
		$email=$_POST["email"];
		$Subject=$_POST["need"];
		$message=$_POST["message"];	
		$emailText = "You have a new message from your contact form\n=>\n";	
		$headers .= "Reply-To: " . $name . "< ".$email." >\r\n";
		if ((!empty($country))) 
		{
			$emessage .= "<tr style='background: #eee;'><td><strong>Country:</strong> </td><td>" . strip_tags($country) . "</td></tr>";
		}
		if ((!empty($name))) 
		{
			$emessage .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($name) . "</td></tr>";
		}
		if ((!empty($email))) 
		{
			$emessage .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($email) . "</td></tr>";
		}
		if ((!empty($Subject))) 
		{
			$emessage .= "<tr style='background: #eee;'><td><strong>Need:</strong> </td><td>" . strip_tags($Subject) . "</td></tr>";
		}
		if ((!empty($message))) 
		{
			$emessage .= "<tr><td><strong>Message:</strong> </td><td>" . strip_tags($message) . "</td></tr>";
		}
	}

	if($ftype=="applicationform")
	{
		$country=$_POST["country"];
		$noap=$_POST["noap"];
		$gname=$_POST["gname"];
		$gstyle=$_POST["gstyle"];
		$dname=$_POST["dname"];
		$address=$_POST["address"];
		$email=$_POST["email"];
		$phone=$_POST["phone"];
		$edition=$_POST["edition"];
		$totalmembers=$_POST["totalmembers"];
		$nom=$_POST["nom"];
		$nofm=$_POST["nofm"];
		$message=$_POST["message"];
		$emailText="NEW GROUP'S INFO ".$gname." Director Name ".$dname;	
		$headers .= "Reply-To: " . $gname . "< ".$email." >\r\n";
		if ((!empty($country))) 
		{
			$emessage .= "<tr style='background: #eee;'><td><strong>Country:</strong> </td><td>" . strip_tags($country) . "</td></tr>";
		}

		if ((!empty($gname))) 
		{
			$emessage .= "<tr style='background: #eee;'><td><strong>Group's Name:</strong> </td><td>" . strip_tags($gname) . "</td></tr>";
		}
		if ((!empty($gstyle))) 
		{
			$emessage .= "<tr><td><strong>Group's Style:</strong> </td><td>" . strip_tags($gstyle) . "</td></tr>";
		}
		if ((!empty($dname))) 
		{
			$emessage .= "<tr style='background: #eee;'><td><strong>Director's Name:</strong> </td><td>" . strip_tags($dname) . "</td></tr>";
		}
		if ((!empty($address))) 
		{
			$emessage .= "<tr><td><strong>Address:</strong> </td><td>" . strip_tags($address) . "</td></tr>";
		}
		if ((!empty($email))) 
		{
			$emessage .= "<tr style='background: #eee;'><td><strong>Email:</strong> </td><td>" . strip_tags($email) . "</td></tr>";
		}
		if ((!empty($phone))) 
		{
			$emessage .= "<tr><td><strong>Phone No:</strong> </td><td>" . strip_tags($phone) . "</td></tr>";
		}
		if ((!empty($edition))) 
		{
			$emessage .= "<tr style='background: #eee;'><td><strong>Edition:</strong> </td><td>" . strip_tags($edition) . "</td></tr>";
		}
		if ((!empty($totalmembers))) 
		{
			$emessage .= "<tr><td><strong>Total Group Members:</strong> </td><td>" . strip_tags($totalmembers) . "</td></tr>";
		}
		if ((!empty($nom))) 
		{
			$emessage .= "<tr style='background: #eee;'><td><strong>No of Males:</strong> </td><td>" . strip_tags($nom) . "</td></tr>";
		}
		if ((!empty($nofm))) 
		{
			$emessage .= "<tr><td><strong>No of Females:</strong> </td><td>" . strip_tags($nofm) . "</td></tr>";
		}
		if ((!empty($noap))) 
		{
			$emessage .= "<tr><td><strong>State:</strong> </td><td>" . strip_tags($noap) . "</td></tr>";
		}
		if ((!empty($message))) 
		{
			$emessage .= "<tr style='background: #eee;'><td><strong>Message:</strong> </td><td>" . strip_tags($message) . "</td></tr>";
		}		
	}


$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";	
$emessage .= "</table>";
$emessage .= "</body></html>";

    if(mail($toEmail, $emailText, $emessage, $headers)) 
	{
        $responseArray = array('type' => 'warning', 'message' => $okMessage);
    } 
	else 
	{
      $responseArray = array('type' => 'danger', 'message' => $errorMessage);
    }

// if requested by AJAX request return JSON response
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
}
// else just display the message
else {
    echo $responseArray['message'];
}
?>