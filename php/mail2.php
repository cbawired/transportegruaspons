<?php
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require '../vendor/autoload.php';

//traemos los datos del formulario.
$telefono = $_POST["telefono"];
$nombre=$_POST["nombre"];
$html=$_POST["texto"];
$text=$_POST["texto"];
$from=$_POST["email"];

$mensaje = '<p>Su consulta es: '.$text.'<br>Su telefono es: '.$telefono.'</p>';


//instancia de phpmailer
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'consulta.web.wiredin@gmail.com';                 // SMTP username
    $mail->Password = 'cr15t1an';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($from, 'Consulta Web');
    $mail->addAddress('transporteponscba@gmail.com', $nombre);     // Add a recipient
//  $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo($from, 'Consulta Web');
//  $mail->addCC('cdroldan1@hotmail.com');
//  $mail->addBCC('bcc@example.com');

    //Attachments
//  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $html;
    $mail->Body    = $mensaje;
    $mail->AltBody = $mensaje;

    $mail->send();
    echo 'Su mensaje ha sido enviado, estaremos en contacto a la brevedad.';
} catch (Exception $e) {
    echo '<p>Su mensaje no se ha enviado, por favor intente por otro medio. <br>Mailer Error: </p>', $mail->ErrorInfo;
}
