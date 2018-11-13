<?php


    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/PHPMailer/src/Exception.php';
    require 'phpmailer/PHPMailer/src/PHPMailer.php';
    require 'phpmailer/PHPMailer/src/SMTP.php';

    if (enviarEmail()) {        
        header('location:index2.html#otros');
    }
    function enviarEmail(){
        if (isset($_Post['nombre'])) {
            $destino="44803182x@gmail.com";
            $nombre=$_POST['nombre'];
            $email=$_POST['email'];
            if (isset($_Post['telefono'])) {
                $telefono=$_POST['telefono'];
            }else{
                $telefono='';
            }
            
            $mensaje=$_POST['mensaje'];
            

            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->SMTPDebug = 2;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';                   // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = $destino;                 // SMTP username
                $mail->Password = '696030160';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom($destino, 'Mailer');
                $mail->addAddress($destino, 'Mailer');     // Add a recipient
                //$mail->addAddress('ellen@example.com');               // Name is optional
                //$mail->addReplyTo('info@example.com', 'Information');
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');

                //Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Correo de contacto';
                $mail->Body    = 'Nombre: '.$nombre.'<br>Email: '.$email.'<br>Telefono: '.$telefono.'<br>Mensaje: '.$mensaje;
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Message has been sent';
                return 1;
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;                
                return 0;
            }

        }else{
            return 0;
        }
    }
    
?>