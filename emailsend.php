<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* Exception class. */
require './PHPMailer/Exception.php';

/* The main PHPMailer class. */
require './PHPMailer/PHPMailer.php';

/* SMTP class, needed if you want to use SMTP. */
require './PHPMailer/SMTP.php';

/*
OLD Code
*/
// if(isset($_POST['email']) )
// {
// $email_from = $_POST['email'];
// $pName = $_POST['policyName'];
// $reason = $_POST['reason'];
// $persName = $_POST['personName'];


//   $to = "bpetcaugh@holyghostprep.org";

//   $headers = "From: " . $email_from . " \r\n";

//   $email_body = $pName;

//   $email_subject = "Sample Policy Change from " . $persName;

//   mail($to,$email_subject,$email_body,$headers);

// echo $headers ;
// echo "<br>";
// echo "To: " . $to ;
// echo "<br>";
// echo "Email Subject: " . $email_subject;
// echo "<br>";
// echo "Reason: " . $reason ;
// echo "<br>";


$email_body_full = "<html>
 
<center>
<b>
<p>STATE OF NEW JERSEY</p>
<p>DEPARTMENT OF CHILDREN AND FAMILIES</p>
<p>Office of Policy & Regulatory Development</p>
<p>Policy and Regulatory Inquiry and Request Form</p>
</b>
<br />
<hr />
Use this form when inquiring about policy or regulation, or to request a new policy or form, or the revision or obsoleting of an
existing policy or form.
<hr />
</center>
<br />
<p><i><u><b>Inquirer Information:</b></u></i></p>
<p><b>Name Of Inquirer:</b> ??????????</p>
<p><b>Working Title:</b> ??????????</p>
<p><b>Job Location:</b> ??????????</p>
<p><b>Contact Number:</b> ??????????</p>
<p><b>Date of Inquiry:</b>" . date("m/d/Y") . "</p>
<br />
<p><i><u><b>Inquiry Information:</b></u></i></p>
<p><b>Inquiry:</b> ??????????</p>
<p><b>Policy/Regulation Citation:</b> ??????????</p>
<br />
<p><i><u><b>Policy Creating, Revising, Obsoleting Request:</b></u></i></p>
<p><b>Policy Request:</b> ??????????</p>
<p><b>Policy Citation:</b> ??????????</p>
<p><b>Policy Request:</b> ??????????</p>
<br />
<p><i><u><b>Other Suggestions or Comments:</b></u></i></p>
<br>
<h1>Internal Use Only</h1>
<hr />
<p><b>Responder's Name:</b> ??????????</p>
<p><b>Date Responded:</b> ??????????</p>
<p><b>Date Closed:</b> ??????????</p>
<p><b>Tracking No.:</b> ??????????</p>
<hr />
<p><b>Office of Policy and Regulatory Development Resolution:</b></p>

</html>
";



/* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
$mail = new PHPMailer(TRUE);

/* Open the try/catch block. */
try {
    /* Use SMTP. */
$mail->isSMTP();
$mail->isHTML(TRUE);

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
   $mail->addAddress('bpetcaugh@holyghostprep.org', 'Me');

   /* Set the subject. */
   $mail->Subject = 'Time to Party';

   /* Set the mail message body. */
   $mail->Body = $email_body_full;

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