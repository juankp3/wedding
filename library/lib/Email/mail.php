<?php

require 'lib/PHPMailer/PHPMailerAutoload.php';


class Mail{

    private $mail;

    function __construct() {
        $mail = new PHPMailer;

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = MAIL_HOST;  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = MAIL_USERNAME;                 // SMTP username
        $mail->Password = MAIL_PASS;          // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;


        $mail->setFrom(MAIL_FROM_EMAIL, MAIL_FROM_NAME);
    //    $mail->addAddress('michael.alozano@janaq.com', 'Joe User');     // Add a recipient
    //    $mail->addAddress('ellen@example.com');               // Name is optional
    //    $mail->addReplyTo('info@example.com', 'Information');
    //    $mail->addCC('cc@example.com');
    //    $mail->addBCC('bcc@example.com');

    //    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = MAIL_SUBJECT;
    //    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    //    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $this->mail = $mail;
    }



    public function envio_correo($datos)
    {
        $correos_envio = RECEPTIONISTS;

        if (is_string($correos_envio)){
            $correos_envio = explode(",", $correos_envio);

            if (is_array($correos_envio)) {
                $this->mail->Body = '<h2>Datos del Participante:</h2>';
                $this->mail->Body .= '<p>Nombres: '.$datos['name'].'</p>';
                $this->mail->Body .= '<p>Correo: '.$datos['email'].'</p>';
                $this->mail->Body .= '<p>Télefono: '.$datos['phone'].'</p>';
                $this->mail->Body .= '<p>Area: '.$datos['area'].'</p>';
                $this->mail->Body .= '<p>Mensaje: '.$datos['message'].'</p>';

                foreach ($correos_envio as $correo) {
                    $validate = preg_match('/^[a-zA-Z0-9+]+(?:([\.\_\-][a-zA-Z0-9+]+))*@(?:([a-zA-Z0-9]+(\-[a-zA-Z0-9]+)*)\.)+[a-zA-Z]+$/',$correo);
                    if ($validate) {
                        $this->mail->addAddress($correo);
                    }
                }

                if(!$this->mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $this->mail->ErrorInfo;
                } else {
                    echo 'Message has been sent';
                }
            }
        }
    }

    public function sendMail($datos)
    {
        $correos_envio = RECEPTIONISTS;

        if (is_string($correos_envio)){
            $correos_envio = explode(",", $correos_envio);

            if (is_array($correos_envio)) {

                $message = "
                    <html>
                        <head>
                            <title>". MAIL_SUBJECT ."</title>
                        </head>
                        <body>";

                $message .= '<h2>Datos del Cliente:</h2>';
                $message .= '<p>Landing: '.$datos['tipo'].'</p>';
                $message .= '<p>Nombres: '.$datos['name'].'</p>';
                $message .= '<p>Correo: '.$datos['email'].'</p>';
                $message .= '<p>Télefono: '.$datos['phone'].'</p>';
                if(!empty($datos['area'])) {
                    $message .= '<p>Area: ('.$datos['area'].') '.$datos['name_area'].'</p>';
                }
                $message .= '<p>Mensaje: '.$datos['message'].'</p>';

                $message .="
                        </body>
                    </html>";

                foreach ($correos_envio as $correo) {
                    $validate = preg_match('/^[a-zA-Z0-9+]+(?:([\.\_\-][a-zA-Z0-9+]+))*@(?:([a-zA-Z0-9]+(\-[a-zA-Z0-9]+)*)\.)+[a-zA-Z]+$/',$correo);
                    if ($validate) {
                        $this->mail->addAddress($correo);
                    }
                }

                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                // More headers
                $headers .= 'From: <'.MAIL_FROM_EMAIL.'>' . "\r\n";

                $fnMail = mail(RECEPTIONISTS ,MAIL_SUBJECT ,$message, $headers);

                // if(!$fnMail) {
                //     echo 'Message could not be sent.';
                //     echo 'Mailer Error: ' . $this->mail->ErrorInfo;
                // } else {
                //     echo 'Message has been sent';
                // }
            }
        }
    }

    public function sendMailPDF($email, $link)
    {
                $message = "
                    <html>
                        <head>
                            <title>". MAIL_SUBJECT ."</title>
                        </head>
                        <body>";

                $message .= '<h2>Descarga nuestro Brochure con el siguiente link :</h2>';
                $message .= '<p><a href="'.$link.'">Descargar PDF</a></p>';

                $message .="
                        </body>
                    </html>";

                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                // More headers
                $headers .= 'From: <'.MAIL_FROM_EMAIL.'>' . "\r\n";

                $fnMail = mail($email ,'Nuevo PDF' ,$message, $headers);

    }
}