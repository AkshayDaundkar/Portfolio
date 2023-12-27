<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $category = $_POST["category"];
    $message = $_POST["message"];

    // Recipient email address
    $to = "akshaydaundkar01@gmail.com";

    // Subject of the email
    $subject = "New Contact Form Submission";

    // Message body
    $messageBody = "
        Name: $name\n
        Email: $email\n
        Category: $category\n\n
        Message:\n$message
    ";

    // Additional headers
    $headers = "From: $email";

    // Send the email
    $success = mail($to, $subject, $messageBody, $headers);

    // Respond to the client-side with JSON indicating success or failure
    echo json_encode(['success' => $success]);
} else {
    // If the request method is not POST, return an error
    echo json_encode(['error' => 'Invalid request method']);
}

?>
