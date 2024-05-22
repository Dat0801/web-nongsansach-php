<?php
include __DIR__ROOT . "/public/assets/admin/Content/vendor/PHPMailer-master/src/PHPMailer.php";
include __DIR__ROOT . "/public/assets/admin/Content/vendor/PHPMailer-master/src/Exception.php";
include __DIR__ROOT . "/public/assets/admin/Content/vendor/PHPMailer-master/src/OAuth.php";
include __DIR__ROOT . "/public/assets/admin/Content/vendor/PHPMailer-master/src/POP3.php";
include __DIR__ROOT . "/public/assets/admin/Content/vendor/PHPMailer-master/src/SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer {
    public function sendMail($title, $content, $addressMail) {
        try {
            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();               
            $mail->CharSet = "utf-8";                       // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'nongsansach12@gmail.com';                 // SMTP username
            $mail->Password = 'hbbfeyneuwdfgtzr';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                        // TCP port to connect to

            //Recipients
            $mail->setFrom('nongsansach12@gmail.com', 'NongSanSach');

            $mail->addAddress($addressMail);     // Add a recipient

            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $title;
            $mail->Body = $content;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}
