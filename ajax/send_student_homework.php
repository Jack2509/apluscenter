<?php

//TODO: handle a upload file
if (isset($_REQUEST['number_uploaded_file']) && $_REQUEST['number_uploaded_file'] > 0) {
    $targetDir = "../upload/files/";
    foreach ($_FILES as $key => $file) {
        if (strpos($key, 'file_') !== false) {
            $path = $targetDir . basename($_FILES[$key]['name']);

            if (!move_uploaded_file($_FILES[$key]['tmp_name'], $path)) {
                echo 'There was an error uploading the file';die();
            }


        }
    }
}
echo 'Uploading ok';
die();

//$targetFile = $targetDir . basename($_FILES[]);


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
$mail->Body = "

<h1>$studentName</h1>
<h1>$studentEmail</h1>

";
$mail->AddAddress("phpmodule3@gmail.com");

if(!$mail->Send()) {
    header('Content-Type: application/json');
    return  json_encode(array("Mailer Error: " => $mail->ErrorInfo));
} else {
    header('Content-Type: application/json');
    return  json_encode(array("Message has been sent"));
}