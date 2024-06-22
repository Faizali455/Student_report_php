<?php
session_start();

if (!isset($_SESSION['report'])) {
    echo "No report data found.";
    exit();
}

$report = $_SESSION['report'];

// Include PHPMailer files
require '../vendor/phpmailer/phpmailer/src/Exception.php'; 
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';  
require '../vendor/phpmailer/phpmailer/src/SMTP.php';       

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp-relay.brevo.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'your-smtp-username';
    $mail->Password = 'your-smtp-password';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipients
    $mail->setFrom('faizalisayyed69@gmail.com', 'Student Report');
    $mail->addAddress($report['email']); // Add a recipient

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Student Report Card';
    $mail->Body    = "
    <html>
    <head>
        <title>Student Report Card</title>
    </head>
    <body>
        <h2>Student Report</h2>
        <table border='1' cellpadding='5'>
            <tr><th>Student ID</th><td>{$report['studentId']}</td></tr>
            <tr><th>First Name</th><td>{$report['firstName']}</td></tr>
            <tr><th>Last Name</th><td>{$report['lastName']}</td></tr>
            <tr><th>Batch/Class</th><td>{$report['batch']}</td></tr>
            <tr><th>Email</th><td>{$report['email']}</td></tr>
            <tr><th>English</th><td>{$report['english']}</td></tr>
            <tr><th>Hindi</th><td>{$report['hindi']}</td></tr>
            <tr><th>Math</th><td>{$report['math']}</td></tr>
            <tr><th>Science</th><td>{$report['science']}</td></tr>
            <tr><th>History</th><td>{$report['history']}</td></tr>
            <tr><th>Geography</th><td>{$report['geography']}</td></tr>
            <tr><th>Remarks</th><td>{$report['remarks']}</td></tr>
            <tr><th>Grade</th><td>{$report['grade']}</td></tr>
        </table>
    </body>
    </html>
    ";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
