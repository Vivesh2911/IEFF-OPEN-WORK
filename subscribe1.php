<?php
$toEmail = "folkfestivalindia@gmail.com";
$mailHeaders = "From: " . $_POST["userName"] . "<". $_POST["userEmail"] .">\r\n";
if(mail($toEmail, $_POST["subject"], $_POST["content"], $mailHeaders)) {
print "<p class='success'>Thank you for Subscribing.</p>";
} else {
print "<p class='Error'>Problem in Subscribing.</p>";
}
?>