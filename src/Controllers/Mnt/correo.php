<?php

use PHPMailer\PHPMailer\PHPMailer;

require("home/usuario/directorioinstalado/PHPMailer-master/src/PHPMailer.php");
require("home/usuario/directorioinstalado/PHPMailer-master/src/SMTP.php");
$mail = new PHPMailer();
 $mail->IsSMTP(); // enable SMTP
 $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
 $mail->SMTPAuth = true; // authentication enabled
 $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
 $mail->Host = "smtp.gmail.com";
 $mail->Port = 465; // or 587
 $mail->IsHTML(true);
 $mail->Username = "josue14saravia@gmail.com";
 $mail->Password = "P35wa5H869r#yR2Y";
 $mail->SetFrom("josue14saravia@gmail.com");
 $mail->Subject = "Asunto del mensaje";
 $mail->Body = "Ingrese el texto del correo electrónico aquí";
 $mail->AddAddress("josue14saravia@gmail.com");
 if(!$mail->Send()) {
 echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
 echo "Mensaje enviado correctamente";
 }
?>