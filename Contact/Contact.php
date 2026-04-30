<?php
header("Content-Type: application/json");

// Only allow POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo json_encode(["error" => "Method not allowed"]);
    exit;
}

// Get raw JSON input
$data = json_decode(file_get_contents("php://input"), true);

// Validate input
$name = $data["name"] ?? "";
$email = $data["email"] ?? "";
$message = $data["message"] ?? "";

if (!$name || !$email || !$message) {
    http_response_code(400);
    echo json_encode(["error" => "All fields required"]);
    exit;
}

// Send email (your original logic)
$to = "hartmanaden@gmail.com";
$subject = "New Contact Form Submission";

$body = "Name: $name\nEmail: $email\nMessage:\n$message";

$headers = "From: $email";

if (mail($to, $subject, $body, $headers)) {
    echo json_encode(["success" => true]);
} else {
    http_response_code(500);
    echo json_encode(["error" => "Mail failed"]);
}