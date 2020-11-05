<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* Exception class. */
require './PHPMailer/Exception.php';

/* The main PHPMailer class. */
require './PHPMailer/PHPMailer.php';

/* SMTP class, needed if you want to use SMTP. */
require './PHPMailer/SMTP.php';

/* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
$mail = new PHPMailer(TRUE);

/* Open the try/catch block. */
try {
    /* Use SMTP. */
$mail->isSMTP();

/* Google (Gmail) SMTP server. */
$mail->Host = 'smtp.gmail.com';

/* SMTP port. */
$mail->Port = 587;

/* Set authentication. */
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';

/* Username (email address). */
$mail->Username = 'njdcf.website@gmail.com';

/* Google account password. */
$mail->Password = 'nj*dcf^8462';

   /* Set the mail sender. */
   $mail->setFrom('njdcf.website@gmail.com', 'B P');

   /* Add a recipient. */
   $mail->addAddress('bpetcaugh@gmail.com', 'Me');

   /* Set the subject. */
   $mail->Subject = 'Time to Party';

   /* Set the mail message body. */
   $mail->Body = 'There is a great disturbance in the Force.';

   /* Finally send the mail. */
   $mail->send();
}
catch (Exception $e)
{
   /* PHPMailer exception. */
   echo $e->errorMessage();
}
catch (\Exception $e)
{
   /* PHP exception (note the backslash to select the global namespace Exception class). */
   echo $e->getMessage();
}

?>
