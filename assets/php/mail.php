<?php

require_once "PHPMailer/vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$response = array();
$Name = $_POST["name"];
$Email = $_POST["email"];
$Phone = $_POST["phone"];
$Subject = $_POST["subject"];
$Message = $_POST["message"];

/* Email to Admin */
$to ="lahavmauda@gmail.com";// This is your email address
$subject = 'Lahav - Contact Us';
$ishtml = true;
$text = "";

$text .= "<strong>Name</strong>: " . $Name . "<br>";
$text .= "<strong>Email</strong>: " . $Email . "<br>";
$text .= "<strong>Phone</strong>: " . $Phone . "<br>";
$text .= "<strong>Subject</strong>: " . $Subject . "<br>";
$text .= "<strong>Message</strong>: " . $Message . "<br>";

$mail = new PHPMailer(true);
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;

// For gmail
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.hostinger.com';
$mail->Port = 465;

$mail->Username = 'info@isolate.buddyspizzaandcafe.com';
$mail->Password = 'Isolate#97377@';

$mail->setFrom('info@isolate.buddyspizzaandcafe.com' , 'Contact Us');

$mail->AddAddress($to);
$mail->Subject = $subject;
$mail->isHTML($ishtml);
$mail->Body = $text;

try {
    $mail->send();
}
catch (Exception $e) {
    $response["error"] = '<p class="alert alert-danger w-100 m-0 mt-4">There was an error trying to send your message. Please try again later.</p>';
}
$response["success"] = '<p class="alert alert-success w-100 m-0 mt-4">Thank you for your message. It has been sent.</p>';

echo json_encode($response);
die;

?>
