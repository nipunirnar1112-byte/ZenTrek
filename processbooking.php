<?php
session_start();

// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'zentrek');

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data sent via POST method
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$guide = $_POST['guide'];
$sdate = $_POST['sdate'];
$edate = $_POST['edate'];
$packages = $_POST['packages'];
$requests = $_POST['requests'];

// Prepare the SQL query to insert the booking data into the database
$stmt = $conn->prepare("INSERT INTO bookings (name, email, phone, guide, sdate, edate, packages, requests) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssi", $name, $email, $phone, $guide, $sdate, $edate, $packages, $requests);

// Execute the query and check if the insertion was successful
if ($stmt->execute()) {
    // Set booking details in session
    $_SESSION['booking_details'] = [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'guide' => $guide,
        'sdate' => $sdate,
        'edate' => $edate,
        'packages' => $packages,
        'requests' => $requests,
    ];

    // Redirect to confirmation page
    header("Location: confirmation.php");
    exit();
} else {
    // If the query fails, set an error message
    $_SESSION['error_message'] = "Error: " . $conn->error;
    header("Location: availability.html");
    exit();
}

// Close the connection
$stmt->close();
$conn->close();
?>
