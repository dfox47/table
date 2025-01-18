<?php
// Enable CORS for local development
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: POST");

// Get the data from the request
$data = json_decode(file_get_contents("php://input"), true);

if (
  isset($data['email']) &&
  isset($data['message']) &&
  isset($data['name'])
  ) {
  $bottomColor = htmlspecialchars($data['bottomColor']);
  $email = htmlspecialchars($data['email']);
  $mainColor = htmlspecialchars($data['mainColor']);
  $message = htmlspecialchars($data['message']);
  $name = htmlspecialchars($data['name']);
  $phoneHolder = htmlspecialchars($data['phoneHolder']);
  $tabletHolder = htmlspecialchars($data['tabletHolder']);
  $ventHoles = htmlspecialchars($data['ventHoles']);
  $whiteboard = htmlspecialchars($data['whiteboard']);

  $to = "a9942212@gmail.com";
  $subject = "Message from $name";
  $body = "Name: $name\n
  Email: $email\n
  Message: $message\n
  Bottom color: $bottomColor\n
  Main color: $mainColor\n
  Phone holder: $phoneHolder\n
  Tablet holder: $tabletHolder\n
  Vent holes: $ventHoles\n
  Whiteboard: $whiteboard\n
  ";

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
} ?>