<?php
// Enable CORS for local development
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: POST");

// Get the data from the request
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['name']) && isset($data['email']) && isset($data['message'])) {
  $name = htmlspecialchars($data['name']);
  $email = htmlspecialchars($data['email']);
  $message = htmlspecialchars($data['message']);

  $to = "a9942212@gmail.com"; // Replace with your email address
  $subject = "Message from $name";
  $body = "Name: $name\nEmail: $email\nMessage:\n$message";

  // Use PHP's mail function (for basic use) or PHPMailer for better email handling
  if (mail($to, $subject, $body, "From: $email")) {
    http_response_code(200);
    echo json_encode(["status" => "success", "message" => "Email sent successfully!"]);
  } else {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Failed to send email."]);
  }
} else {
  http_response_code(400);
  echo json_encode(["status" => "error", "message" => "Invalid input."]);
}
?>