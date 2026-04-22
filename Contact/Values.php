<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"] ?? "";
    $email = $_POST["email"] ?? "";
    $message = $_POST["message"] ?? "";

    echo "Roger<br><br>";

    echo "Name: " . htmlspecialchars($name) . "<br>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Message: " . nl2br(htmlspecialchars($message)) . "<br>";
    mail("hartmanaden@gmail.com", "New Contact Form", $name,  $email, $message);
}
?>