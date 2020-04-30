<?php
$nombre = $_POST['nombre'];
$email = $_POST['mail'];
$telefono = $_POST['telefono'];
$comentario = $_POST['comentario'];

$body = "<h3><b>Gracias por enviarnos su consulta</b></h3><br><br>"
        . "<i>En breve nos comunicaremos con usted</i><br><br>"
        . "<b>Su mensaje fue: </b><br><br>"
        . "<b>Nombre: </b>" . $nombre . "<br><br>"
        . "<b>Mail: </b>" . $email . "<br><br>"
        . "<b>Telefono de contacto: </b>" . $telefono . "<br><br>"
        . "<b>Consulta: </b>" . $comentario . "<br><br>"
        . "Recuerde que este es un mensaje generado en forma automatica, no lo responda.<br>"
        . "En caso de querer enviarnos otro mail hagalo a <b><i>mail calamar</b></i><br>"
        . "Muchas Gracias!<br>CalamarEnSuTinta.";
        

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'consultashidroflores@gmail.com';           // SMTP username
    $mail->Password   = 'Hidro2019';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('consultashidroflores@gmail.com', 'Hidroflores');
    $mail->addAddress($email);     // Add a recipient
    $mail->addAddress('consultashidroflores@gmail.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'CONSULTAS HIDROFLORES';
    $mail->Body    = $body;
    $mail->send();
    echo 'Mensaje enviado correctamente';
} catch (Exception $e) {
    echo "mensaje incorrecto: {$mail->ErrorInfo}";
}