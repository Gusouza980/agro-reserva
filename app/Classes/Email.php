<?php

namespace App\Classes;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email{
    
    public static function enviar($file, $assunto, $destinatario, $admin = false){
        $mail = new PHPMailer(true);

        try {

            // Mail server settings
            $mail->SMTPDebug = 0; // Enable verbose debug output
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = "smtp.zoho.com"; // Endereço do servidor SMTP
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'noreply@evoxtech.com.br'; // SMTP username
            $mail->Password = 'bk*yMe5Wd_ydN56_L6f$'; // SMTP password
            $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;

            $mail->setFrom('noreply@evoxtech.com.br', 'Contato - Minerembryo');
            if($admin){
                $mail->addAddress("gusouza980@gmail.com"); // Add a recipient, Name is optional
                // $mail->addAddress("gusouza980@gmail.com");
            }else{
                $mail->addAddress($destinatario); // Add a recipient, Name is optional
            }
            $mail->addReplyTo('gusouza980@gmail.com', 'Contato - Minerembryo');
            // print_r($_FILES['file']); exit;


            $mail->isHTML(true); // Set email format to HTML

            // $file = file_get_contents('site/emails/nova_senha.html');
            // $file = str_replace("{{senha}}", Str::random(6), $file);
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';
            
            $mail->Subject = $assunto;
            $mail->Body    = $file;

            // $mail->AltBody = plain text version of your message;

            if( !$mail->send() ) {
                return false;
            } else {
                return true;
            }

        } catch (Exception $e) {
            return false;
        }
    }

}

?>
