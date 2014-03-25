<?php
error_reporting(E_ALL);
require '/var/www/PHPMailer/PHPMailerAutoload.php';

header("Location: /-----".( sendMail() ? "": "no-") . "thanks.html");

function sendMail() {
    $mail = new PHPMailer;
    $mail->CharSet = 'UTF-8';
    $mail->From = 'info@spcs.co.il';
    $mail->FromName = 'spcs.co.il';
    $mail->addAddress('altairm@gmail.com', 'Michael A.');
    $mail->addAddress('michael@qoffice.co.il', 'Michael P.');
    $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
    $mail->isHTML(true); 
    $mail->Subject = 'צור קשר מהאתר';
    $name = $_POST['userName'];
    $phone = $_POST['טלפון'];
    $from = $_POST['Email'];
    $company = empty($_POST['חברה']) ? "" : $_POST["חברה"];
    $message = stripslashes(empty($_POST['הודעה']) ? (empty($_POST['ההודעה']) ? "" : $_POST['ההודעה']) : $_POST['הודעה']) ;
    if(empty($name)) return false;
    $content = "NAME: " . $name ."<br/>";
    $content .= "E-MAIL: " . $from ."<br/>";
    $content .= "PHONE: " . $phone. "<br/>"; 
    $content .= "COMPANY: " . $company. "<br/><br/>"; 
    $content .= $message;
    $mail->Body = $content;
    return $mail->send();
}
