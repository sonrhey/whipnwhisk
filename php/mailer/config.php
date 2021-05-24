<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

function sendMail($to, $subject, $message){
    $mail = new PHPMailer();
    try{
            // Settings
    $mail->IsSMTP();
    $mail->CharSet = 'UTF-8';

    $mail->Host       = "smtp.elasticemail.com"; // SMTP server example
    $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    $mail->Port       = 2525;                    // set the SMTP port for the GMAIL server
    $mail->Username   = "noreply@whipnwhisk.com"; // SMTP account username example
    $mail->Password   = "34BE921916E6DD0BC70570C95FB8E10344B9";        // SMTP account password example

    //Recipients
    $mail->setFrom('noreply@whipnwhisk.com', 'Whip n Whisk Order');
    $mail->addAddress($to);      
    // $mail->addCC('sonrheydeiparine2@gmail.com');
    
    // Content                                // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body = $message;

    $mail->send();

    }catch (phpmailerException $e) {
        echo $e->errorMessage(); //Pretty error messages from PHPMailer
      } catch (Exception $e) {
        echo $e->getMessage(); //Boring error messages from anything else!
      }
}   