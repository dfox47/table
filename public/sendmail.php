<?php
// Enable CORS for local development
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: POST");

// Include the email template function
require_once "email_template.php";

// Get the data from the request
$data = json_decode(file_get_contents("php://input"), true);

if (
  isset($data['email']) &&
  isset($data['message']) &&
  isset($data['name'])
) {
  // Sanitize input
  $data = array_map('htmlspecialchars', $data);

  // Get current date and time
  $currentDate = date("Y-m-d | H:i:s");

  // Recipients list
  // $recipients = ["a9942212@gmail.com", $data['email']];
  $recipients = ["a9942212@gmail.com"];

  // Email subject
  $subject = "[simplythedesk.net] $currentDate | {$data['name']}";

  // Get the email body from the template
  $body = getEmailTemplate($data);

  $successCount = 0;
  $errorCount = 0;

  // Send a separate email to each recipient
  foreach ($recipients as $to) {
    $headers = "From: info@simplythedesk.net\r\n" .
      "Reply-To: info@simplythedesk.net\r\n" .
      "MIME-Version: 1.0\r\n" .
      "Content-Type: text/html; charset=UTF-8\r\n" .
      "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $body, $headers)) {
      $successCount++;
    } else {
      $errorCount++;
    }
  }

  // Return response
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
