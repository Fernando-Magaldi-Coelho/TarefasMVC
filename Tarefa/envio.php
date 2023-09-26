<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'libs/PHPMailer/src/Exception.php';
require 'libs/PHPMailer/src/PHPMailer.php';
require 'libs/PHPMailer/src/SMTP.php';

require "vendor/autoload.php";

$mail = new PHPMailer(true);

if (isset($_POST['enviar'])) {
    $nome = $_POST['nome'];
    $email_destinatario = $_POST['email_destinatario'];
    $msg = $_POST['msg'];

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'magaldicoelhofernando@gmail.com';
        $mail->Password = 'xyht wnbi rsdz ohyj'; // Senha do app
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('magaldicoelhofernando@gmail.com'); // Use o e-mail do remetente como remetente
        $mail->addAddress($email_destinatario);

        $mail->isHTML(true);
        $mail->Subject = 'Assunto do E-mail';

        $mail->Body = "<strong>$nome,</strong><br><br>$msg";

        $mail->AltBody = strip_tags($msg);
        $mail->send();

        echo 'Email enviado';

    } catch (Exception $e) {
        echo "<h1>Vish, falha ao enviar:</h1> {$mail->ErrorInfo}";
    }
}