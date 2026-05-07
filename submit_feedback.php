<?php
session_start();

// Database connection
$conn = new mysqli('localhost', 'root', '', 'zentrek');


// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $conn->real_escape_string($_POST["name"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $feedback = $conn->real_escape_string($_POST["feedback"]);
    $rating = (int)$_POST["rating"];

    // Insert data into the feedback table
    $sql = "INSERT INTO feedback (name, email, feedback, rating) VALUES ('$name', '$email', '$feedback', '$rating')";

    if ($conn->query($sql) === TRUE) {
        echo "Feedback submitted successfully.";
        // Redirect to a thank-you page or display a success message
        header("Location: thank.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
