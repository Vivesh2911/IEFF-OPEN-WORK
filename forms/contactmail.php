<?php
if(isset($_POST['submit']))
{
$country=$_POST['country'];
$name=$_POST['name'];
$email=$_POST['email'];
$need=$_POST['need'];
$message=$_POST['message'];

$email_from='malini9197@gmail.com';
$email_subject = "IEFFindia contact form";
$email_body = "Country :$country.\n".
               "Name :$name.\n".
               "Email id :$email.\n".
               "Specific Need :$need.\n".
               "Message :$message.\n"."";
$to_email ="babubudda12@gmail.com";
$headers ="From:$email_from \r\n";
$headers ="Reply-To: $emai \r\n";

$secretkey="6Le-j5oaAAAAACy8qNEkJ6mrSi7cAD89k2WhZaD_";
$responsekey=$_POST['g-recaptcha-response'];
$UserIP= $_SERVER['REMOTE_ADDR'];
$Url="https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$responseKey&remoteip=$UserIP";

$response = file_get_contents($url);
$response = json_decode($response);

if($response->success)
{
 mail($to_email,$email_subject,$email_body,$headers);
 echo "Message sent successfully;

}
else 

{
echo"<span>invaild Captcha, please try Again</span>"
}
}
?>

