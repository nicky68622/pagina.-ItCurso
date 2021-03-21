<?php
$carrera = $_POST["carrera"];
$apellido = $_POST["apellido"];
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];
$mensaje = $_POST["mensaje"];

$body = "Carrera: " . $carrera . "<br>Apellido: " . $apellido . "<br>Nombre: " . $nombre ."<br>Correo: " . $correo . "<br>Telefono: " . $telefono . "<br>Mensaje: " . $mensaje;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'itcursosonline2022@gmail.com';                     //SMTP username
    $mail->Password   = 'Lucyesme01';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($correo, $nombre);
    $mail->addAddress('lucyesmebra04@gmail.com', 'Joe User');     //Add a recipient
    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $carrera;
    $mail->Body    = $body;
    $mail->Charset  = 'UTF-8';

    $mail->send();
    echo '<script>
         alert("El mensaje se envio correctamente");
         window.history.go(-1);
         </script>';
    
} catch (Exception $e) {
    echo "hubo un erroral enviar el mensaje: {$mail->ErrorInfo}";
}
