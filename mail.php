<?php
$to = "maxny1@gmail.com";
$subject = "budget 2 summary";
$message = "Hello! This is a simple email message.";
$from = "ymcodeinfo@gmail.com";
$headers .= "Reply-To: ymcodeinfo@gmail.com \r\n";
$headers .= "Return-Path: ymcode@gmail.com \r\n";
$headers .= "From: \”ymcode info\” <ymcodeinfo@gmail.com> \r\n";
$headers .= "Organization: ymcode budget 2\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
$headers .= "Content-Transfer-Encoding: binary";
$headers .= "X-Priority: 3\r\n";
$headers .= "X-Mailer: PHP”. phpversion() .”\r\n";

mail($to,$subject,$message,$headers);
echo "Mail Sent.";

?>
