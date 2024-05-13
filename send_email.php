<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  
  // Email information
  $to = "michellework09@gmail.com";
  $subject = "New Contact Form Submission";
  $headers = "From: $email";
  
  // Compose the email body
  $body = "Name: $name\n";
  $body .= "Email: $email\n";
  $body .= "Message:\n$message";
  
  // Send email
  if (mail($to, $subject, $body, $headers)) {
    echo "Email sent successfully!";
  } else {
    echo "Failed to send email. Please try again later.";
  }
}
?>
