<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$_email  = $_REQUEST['email'];

$mail = new PHPMailer(true);
$mail->isSMTP();    
$mail->Host = 'smtp.gmail.com';
$mail->CharSet    = 'UTF-8';
$mail->SMTPDebug  = 0;                          //Send using SMTP
$mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
$mail->SMTPAuth   = true;             //Enable SMTP authentication
$mail->Username   = 'joelsswipefile@gmail.com';   //SMTP write your email
$mail->Password   = 'hghpnekarepehnmv ';      //SMTP password
$mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
$mail->Port       = 587;                                    

$mail->setFrom('joelsswipefile@gmail.com', 'Joel');

$mail->isHTML(true);
$mail->Subject     = 'New inquiry from CC';
$mail->Body        = <<<EOD
     <strong>Email:</strong> <a href="mailto:$_email?subject=feedback" "email me">$_email</a> <br> <br>
EOD;

if($mail->Send()) {
    $autoRespond = new PHPMailer();

    $autoRespond->IsSMTP();
    $autoRespond->CharSet    = 'UTF-8';
    $autoRespond->SMTPDebug  = 0;
    $autoRespond->SMTPAuth   = TRUE;
    $autoRespond->SMTPSecure = "ssl";
    $autoRespond->Port       = 587;
    $autoRespond->Username   = 'joelsswipefile@gmail.com';   //SMTP write your email
    $autoRespond->Password   = 'hghpnekarepehnmv ';

    $autoRespond->setFrom('joelsswipefile@gmail.com', 'Joel');
    $autoRespond->addAddress($_email);
    $autoRespond->Subject = "Autorepsonse: We received your submission"; 
    $autoRespond->Body = "We received your submission. We will contact you";

    $autoRespond->Send(); 
}else {
        echo "Mail could not be sent. Mailer Error: ".$mail->ErrorInfo;
    }


?>