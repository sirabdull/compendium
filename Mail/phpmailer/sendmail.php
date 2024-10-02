<?php 
/*
php mmailer configuration file
include in files that needs to send mail
add to gitignore as it contains sensitive data
send mail in required file by adding 
*@ $mail->Subject(string subject)
*@$mail->Body(string body)
$mail->send()

*/

require "PHPMailerAutoload.php";

$mail = new PHPMailer;
//auth
$mail->isSMTP();
$mail->Host='mail.nmscompendium.com.ng';
$mail->Port = 465;
$mail->SMTPAuth =true;
$mail->SMTPSecure ='ssl';
//info
$mail->Username = 'support@nmscompendium.com.ng';
$mail->Password = 'Dashnov@4';
$mail->setFrom('support@nmscompendium.com.ng','NMS compendium');

$mail->addReplyTo('support@nmscompendium.com.ng','NMS compendium');

// $email must be predefined in the script
$mail->addAddress($email);
$mail->isHTML(true);
