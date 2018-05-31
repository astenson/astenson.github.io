<?php

if(!isset($_POST['submit'])) {
  echo "Error: please submit the form.";
}
$name = $_POST['name'];
$visitor_email = $_POST['email'];
$message = $_POST['message'];

//Validate
if(empty($name)||empty($visitor_email)) {
  echo "Error: The name and email fields are mandatory."
  exit;
}
if(IsInjected($visitor_email)) {
  echo "Error: bad email value."
  exit;
}

$email_from = 'astenson@ur.rochester.edu';
$email_subject = "New Form Submission, Resume Website"
$email_body = "You have received a new message from $name.\n. Here is the message:\n $message";

$to = "astenson@ur.rochester.edu";
$headers = "From: $email_from\r\n";
$headers = "Reply-To: $visitor_email\r\n";

mail($to,$email_subject,$email_body,$headers);
?>
