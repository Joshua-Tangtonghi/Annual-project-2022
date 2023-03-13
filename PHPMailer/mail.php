<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendmail($email){

    require 'src/Exception.php';
    require 'src/PHPMailer.php';
    require 'src/SMTP.php';

$mail = new PHPMailer(true);

try {
   
    $mail->SMTPDebug = 2;
    $mail->isSMTP();                                         
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = 'openges75@gmail.com';                 
    $mail->Password   = 'vvpsmjlijszlyvjm';                   
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
    $mail->Port       = 465;                                   

    $mail->setFrom('openges75@gmail.com', 'Openges');
    $mail->addAddress($email);  

    $mail->isHTML(true);                                 
    $mail->Subject = 'Confirmation mail openges';         
    $mail->Body    = 'Vous avez créé votre compte avec succès<br><br>Cliquez sur ce lien pour continuer https://openges.ddns.net/verification_email.php';  
    
    $mail->send();
    echo 'Le message a été envoyé';
} catch (Exception $e) {
    echo "Le message n\'a pas pu être envoyé. Erreur de l\'expéditeur : {$mail->ErrorInfo}";
}
}
?>