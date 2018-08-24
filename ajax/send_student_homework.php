<?php

// test send email
include_once '../phpMailer/class.phpmailer.php';
include_once '../phpMailer/class.pop3.php';
include_once '../phpMailer/class.smtp.php';

$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable smtp
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 587; // or 587
$mail->IsHTML(true);
$mail->Username = "dinhnguyen2509@gmail.com";
$mail->Password = "Apx54QoU@@@@@";
$mail->SetFrom("dinhnguyen2509@gmail.com");
$mail->Subject = "Test";
$studentName = $_POST['student_name'];
$studentEmail = $_POST['student_email'];
$mail->Body = "

<h1>$studentName</h1>
<h1>$studentEmail</h1>

";

/*
 * Add multiple attachment files
 * Use move_uploaded_file() to move the file to a temporary location
 * Attach it to the mail from there and delete it afterwards (or keep it, whatever you want to do)
 */
$attachmentFiles = array();

if (isset($_REQUEST['number_uploaded_file']) && $_REQUEST['number_uploaded_file'] > 0) {
    $targetDir = "../upload/files/";
    foreach ($_FILES as $key => $file) {
        if (strpos($key, 'file_') !== false) {

            $path = $targetDir . basename($_FILES[$key]['name']);
            if (move_uploaded_file($_FILES[$key]['tmp_name'], $path)) {
                $fileName = $_FILES[$key]['name'];
                // get real path of uploaded files for deleting after send email action
                $uploadFile = $_SERVER['DOCUMENT_ROOT'] . "/upload/files/" . basename($_FILES[$key]['name']);
                try {
                    $mail->AddAttachment($path, $fileName);
                    $attachmentFiles[] = $uploadFile;
                } catch (\phpmailerException $exception) {
                    echo $exception->getMessage();
                }
            } else {
                echo 'There was an error uploading the file';die();
            }
        }
    }
}

// Send mail to address
$mail->AddAddress("phpmodule3@gmail.com");

try {
    header('Content-Type: application/json');
    echo $mail->Send() ? json_encode(array("Message has been sent")) : json_encode(array("Mailer Error: " => $mail->ErrorInfo));
} catch (\phpmailerException $exception) {
    echo $exception->getMessage();
}

//Remove all files have been attach to email
foreach ($attachmentFiles as $attachmentFile) {
    unlink($attachmentFile);
}