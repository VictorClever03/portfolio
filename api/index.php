<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
$mail = new PHPMailer(true);



$form=filter_input_array(INPUT_POST,FILTER_DEFAULT);
// var_dump($form);
// exit;

    $dados=['email'=>trim($form['email']),'message'=>trim($form['message']),'subject'=>trim($form['subject']), 'name'=>trim($form['name'])];

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'vectorclever00@gmail.com';                     //SMTP username
        $mail->Password   = 'lyboetypjexhglqe';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom($dados['email'], $dados['name']);
        $mail->addAddress('victornanga727@gmail.com', 'Client');     //Add a recipient
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Portfolio's message '{$dados['subject']}'";
        $mail->Body    = "Name: {$dados['name']} <br> {$dados['message']}";
        $mail->AltBody = $dados['message'];
    
        $mail->send();
        // header("Location:index.html");
       
        echo 'OK';
    } catch (Exception $e) {
        // header("Location:index.html");
        die("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
    }

