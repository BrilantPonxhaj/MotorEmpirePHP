<?php 
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    require '../src/PHPMailer/src/Exception.php';
    require '../src/PHPMailer/src/PHPMailer.php';
    require '../src/PHPMailer/src/SMTP.php';

    require 'config.php';
    $message = "Thanks for subscribing to us! We will keep in touch with you.";
    $subject = "Subscribed to our newsletter - MotorEmpire";
    function sendMail($email, $subject, $message) {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = MAILHOST;
        $mail->Username = USERNAME;
        $mail->Password = PASSWORD;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->setFrom(SEND_FROM,SEND_FROM_NAME);
        $mail->addAddress($email);
        $mail->addReplyTo(REPLY_TO,REPLY_TO_NAME);
        $mail->isHTML(true);

        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->AltBody = $message;

        if(!$mail->send()){
            echo '<script>alert("Email not send. Please try again")</script>';
        }else{
            echo '<script>alert("Email was sent succesfully")</script>';
        }
    }


?>