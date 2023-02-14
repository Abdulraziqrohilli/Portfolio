<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';


    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->SMTPAuth = true; 
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;        
        $mail->Username = 'contact.raziq@gmail.com';
        $mail->Password = 'qyifvqeoznhkcjxm';       
        $mail->SMTPSecure = 'ssl';                  
        $mail->Port = 465;        

        $mail->setFrom("contact.raziq@gmail.com", 'No-reply');
        $mail->addAddress('abdulraziqrohilli@gmail.com', 'Email from Abdulraziq Rohilli');
        //Content
        $mail->isHTML(true);    

        $mail->Subject = $_POST['subject'];
        $mail->Body = $_POST['msg'];

        $mail->send();
        header("Location: index.php?emailSent");
    } catch (Exception $e) {
        header("Location: index.php?sendError");
    }

    } else{
        header("Location: index.php");
    }
?>