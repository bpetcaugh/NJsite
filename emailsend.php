<?php

if(isset($_POST['email']) )
{
$email_from = $_POST['email'];
$pName = $_POST['policyName'];
$reason = $_POST['reason'];
$persName = $_POST['personName'];


  $to = "bpetcaugh@holyghostprep.org";

  $headers = "From: " . $email_from . " \r\n";

  $email_body = $pName;

  $email_subject = "Sample Policy Change from " . $persName;

  mail($to,$email_subject,$email_body,$headers);

echo $headers ;
echo "<br>";
echo "To: " . $to ;
echo "<br>";
echo "Email Subject: " . $email_subject;
echo "<br>";
echo "Reason: " . $reason ;
echo "<br>";
}
 ?>