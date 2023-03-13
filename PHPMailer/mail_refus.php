<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendmail($email){

    require 'src/Exception.php';
    require 'src/PHPMailer.php';
    require 'src/SMTP.php';

$mail_refus = new PHPMailer(true);

try {
   
    $mail_refus->SMTPDebug = 2;
    $mail_refus->isSMTP();                                         
    $mail_refus->Host       = 'smtp.gmail.com';                     
    $mail_refus->SMTPAuth   = true;                                  
    $mail_refus->Username   = 'openges75@gmail.com';                 
    $mail_refus->Password   = 'vvpsmjlijszlyvjm';                   
    $mail_refus->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
    $mail_refus->Port       = 465;                                   

    $mail_refus->setFrom('openges75@gmail.com', 'Openges');
    $mail_refus->addAddress($email);  

    $mail_refus->isHTML(true);                                 
    $mail_refus->Subject = 'Refus de propositions d\'association';         
    $mail_refus->Body    = 'Votre propositions d\'association à été refusé.<br><br>Cordialement.<br>Caroline PLATON';  
    
    $mail_refus->send();
    echo 'Le message a été envoyé';
} catch (Exception $e) {
    echo "Le message n\'a pas pu être envoyé. Erreur de l\'expéditeur : {$mail_refus->ErrorInfo}";
}
}
?>


<!-- include('PHPMailer/mail_refus.php');

$destinataire = $email;
sendmail($destinataire); -->