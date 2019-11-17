<?php
  ob_start();
  session_start();
    $email=$_SESSION['email'];

    $randomletter=$_SESSION['randomletter'];
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

            // Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = '298nads@gmail.com';                 // SMTP username
$mail->Password = 'bowjkbbmxngsvwnp';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('298nads@gmail.com');
$mail->addAddress($email);
    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'OTP for change password';
$mail->Body    = $randomletter;

    $mail->send();

    header('location:verify_email.php');

    
} catch (Exception $e) {
    echo "No Email address Found!";
}



?>
