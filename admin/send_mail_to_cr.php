<?php
include 'includes/session.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
$check_trimester_query="SELECT * FROM requests where trimester_id='$trimester_id'";
$check_trimester_run=mysqli_query($conn,$check_trimester_query);              
    if(mysqli_num_rows($check_trimester_run)>0){
        $query="SELECT * FROM batches where id IN (SELECT batch_id from routine where trimester_id='$trimester_id')";
$run=mysqli_query($conn,$query);              
    if(mysqli_num_rows($run)>0){
        while($row=mysqli_fetch_array($run)){
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
$mail->addAddress($row['cr_email']);
    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Reply From Admin';
$mail->Body    = 'Check your routine and give us confirmation within 2 days';

    $mail->send();
    
} catch (Exception $e) {
    echo "No Email address Found!";
}
        }
    }
        echo "<span class='alert alert-success' >Successfully email sent to all CR</span>";
    }
     else{
    echo "<span class='alert alert-danger' >No Request Found</span>";
}   


?>
