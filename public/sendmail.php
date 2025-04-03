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

  $currentDate = date("Y-m-d");

  $recipients = ["a9942212@gmail.com", $email];

  $subject = "[simplythedesk.net] $currentDate | $name";
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

  // Send a separate email to each recipient
  foreach ($recipients as $to) {
    $headers = "From: info@simplythedesk.net" . "\r\n" .
      "Reply-To: info@simplythedesk.net" . "\r\n" .
      "MIME-Version: 1.0" . "\r\n" .
      "Content-Type: text/html; charset=UTF-8" . "\r\n" .
      "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $body, $headers)) {
      $successCount++;
    } else {
      $errorCount++;
    }
  }

  if ($successCount > 0) {
    http_response_code(200);
    echo json_encode([
      "status" => "success",
      "message" => "Emails sent successfully",
    ]);
  } else {
    http_response_code(500);
    echo json_encode([
      "status" => "error",
      "message" => "Failed to send emails.",
    ]);
  }
} else {
  http_response_code(400);
  echo json_encode(["status" => "error", "message" => "Invalid input."]);
}
