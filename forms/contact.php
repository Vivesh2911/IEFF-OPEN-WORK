<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'folkfestivalindia@gmail.com';


    $toName = "International Cultural and Dance Festival";
    $toEmail = "folkfestivalindia@gmail.com";
    $fromEmail="folkfestivalindia@gmail.com";
	$ftype=$_POST["ftype"];

$headers = "From: ".$toName." < ".$fromEmail." >\r\n";
$emessage = '<html><body style="text-align:center;">';
$emessage .= '<img style="text-align: center;" src="http://ieffindia.com/assets/img/logo.png" alt="'.$toName.'" style="width:200px;"/>';
$emessage .= '<table rules="all" width="100%" style="border-color: #666;max-width:500px;margin: 0 auto;" cellpadding="10">';	
	if($ftype=="lcontact")
	{
		$country=$_POST["country"];
		$state=$_POST["state"];
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
		$Subject="NEW GROUP'S INFO ".$gname." Director Name ".$dname;	
		$headers .= "Reply-To: " . $gname . "< ".$email." >\r\n";
		if ((!empty($country))) 
		{
			$emessage .= "<tr style='background: #eee;'><td><strong>Country:</strong> </td><td>" . strip_tags($country) . "</td></tr>";
		}
		if ((!empty($state))) 
		{
			$emessage .= "<tr><td><strong>State:</strong> </td><td>" . strip_tags($state) . "</td></tr>";
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
		if ((!empty($message))) 
		{
			$emessage .= "<tr style='background: #eee;'><td><strong>Message:</strong> </td><td>" . strip_tags($message) . "</td></tr>";
		}		
	}
	if($ftype=="contact")
	{
		$name=$_POST["name"];
		$email=$_POST["email"];
		$Subject=$_POST["subject"];
		$message=$_POST["message"];	
		$headers .= "Reply-To: " . $name . "< ".$email." >\r\n";
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
			$emessage .= "<tr style='background: #eee;'><td><strong>Subject:</strong> </td><td>" . strip_tags($Subject) . "</td></tr>";
		}
		if ((!empty($message))) 
		{
			$emessage .= "<tr><td><strong>Message:</strong> </td><td>" . strip_tags($message) . "</td></tr>";
		}
	}
	
	if(($ftype=="contact2")|| ($ftype=="contact1"))
	{
		$email=$_POST["email"];
		if(strpos($email, '@') !== false) 
		{
		  // explodable
			$name=explode('@',$email);
			$name=$name[0];
		} 
		else 
		{
		  // not explodable
			$name=$email;
		}
		
		$Subject="New Subscription to our Newsletter for Festival Updates";
		$headers .= "Reply-To: " . $name . "< ".$email." >\r\n";
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
			$emessage .= "<tr style='background: #eee;'><td><strong>Subject:</strong> </td><td>" . strip_tags($Subject) . "</td></tr>";
		}
	}
	
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";	
$emessage .= "</table>";
$emessage .= "</body></html>";

    if(mail($toEmail, $Subject, $emessage, $headers)) 
	{
        echo '200';
    } 
	else 
	{
       echo '400';
    }
?>

