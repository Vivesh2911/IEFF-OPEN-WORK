<?php
    $toEmail = "tiramdasutarun@gmail.com";
    $mailHeaders = "From: " . $_POST["userName"] . "<". $_POST["userEmail"] .">\r\n";
    $txt = $_POST["userName1"];
    
    if(mail($toEmail, $_POST["subject"], $txt, $mailHeaders)) {
        print "<p class='success'>Mail Sent.</p>";
    } else {
        print "<p class='Error'>Problem in Sending Mail.</p>";
    }
?>