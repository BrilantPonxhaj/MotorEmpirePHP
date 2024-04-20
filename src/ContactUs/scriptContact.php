<?php 
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';

    require 'configContact.php';
    $message1 = "We are delighted to tell you that the time you've booked is availiable.";
    $subject1 = "Appointment Booked";
    function sendMail1($email1, $subject1, $message1) {
        $mail1 = new PHPMailer(true);
        $mail1->isSMTP();
        $mail1->SMTPAuth = true;
        $mail1->Host = MAILHOST1;
        $mail1->Username = USERNAME1;
        $mail1->Password = PASSWORD1;
        $mail1->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail1->Port = 587;
        $mail1->setFrom(SEND_FROM1,SEND_FROM_NAME1);
        $mail1->addAddress($email1);
        $mail1->addReplyTo(REPLY_TO1,REPLY_TO_NAME1);
        $mail1->isHTML(true);

        $mail1->Subject = $subject1;
        $mail1->Body = $message1;
        $mail1->AltBody = $message1;

        if(!$mail1->send()){
            echo '<script>alert("Email not send. Please try again")</script>';
        }else{
            echo '<script>alert("Email was sent succesfully")</script>';
        }
    }


?>