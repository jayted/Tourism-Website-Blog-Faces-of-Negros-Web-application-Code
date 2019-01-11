<?php
require 'PHPMailerAutoload.php';
require 'cred.php';

$mail = new PHPMailer;
$t_email = $_POST['t_email'];
$f_email = $_POST['f_email'];
$message = $_POST['message'];

// $mail->SMTPDebug = 4;                               // Enable verbose debug output
// 
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = EMAIL;                 // SMTP username
$mail->Password = PASS;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom($f_email);
$mail->addAddress($t_email);  
$mail->addReplyTo($f_email, 'Information');   // Add a recipient
             // Name is optional

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'message from provincial office';
  $mail->Body    = '<b>Check the message below</b> <p>'.$message.'</p>';
    $mail->AltBody = $_POST['email_message'];


if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>