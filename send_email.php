<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  http_response_code(405);
  exit("Method Not Allowed");
}

// Honeypot: if filled, it's a bot
if (!empty($_POST['website'])) {
  http_response_code(200);
  exit("OK");
}

$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

// Basic validation
if ($name === '' || $email === '' || $message === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
  http_response_code(400);
  exit("Please provide a valid name, email, and message.");
}

// Compose email
$to      = "michellework09@gmail.com";
$subject = "New Contact Form Submission";
$body    = "Name: $name\nEmail: $email\n\nMessage:\n$message";

// Use a fixed From for deliverability; put sender in Reply-To
$headers = [];
$headers[] = "From: Portfolio Contact <no-reply@yourdomain.com>"; // change to your domain
$headers[] = "Reply-To: $name <$email>";
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-Type: text/plain; charset=UTF-8";

// Send
$ok = mail($to, $subject, $body, implode("\r\n", $headers));

if ($ok) {
  http_response_code(200);
  echo "Email sent successfully!";
} else {
  http_response_code(500);
  echo "Failed to send email. Please try again later.";
}
$data = json_decode(file_get_contents('php://input'), true);
$name = $data['name'] ?? '';

