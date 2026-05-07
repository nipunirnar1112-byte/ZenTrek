<?php
// Start the session
session_start();

// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'zentrek');

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize message and styling variables
$message = '';
$messageClass = '';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $guide = $_POST['guide'] ?? '';
    $sdate = $_POST['sdate'] ?? '';
    $edate = $_POST['edate'] ?? '';

    // Validate the input data
    if (empty($guide) || empty($sdate) || empty($edate)) {
        $message = 'Please provide guide, start date, and end date.';
        $messageClass = 'error';
    } else {
        // Check for overlapping bookings using a prepared statement
        $stmt_check = $conn->prepare("
            SELECT * 
            FROM bookings 
            WHERE guide = ? 
              AND (
                  (sdate BETWEEN ? AND ?) 
                  OR 
                  (? BETWEEN sdate AND edate)
                  OR
                  (? BETWEEN sdate AND edate)
              )
        ");
        $stmt_check->bind_param("sssss", $guide, $sdate, $edate, $sdate, $edate);
        $stmt_check->execute();
        $result = $stmt_check->get_result();

        if ($result->num_rows > 0) {
            // If there is already a booking in the selected date range
            $message = "Sorry, the guide is not available from $sdate to $edate.";
            $messageClass = 'error';
        } else {
            // Guide is available
            $message = "Great news! The guide is available from $sdate to $edate.";
            $messageClass = 'success';
        }

        $stmt_check->close();
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Guide Availability</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            max-width: 600px;
            margin: auto;
        }
        h1 {
            text-align: center;
        }
        .message {
            padding: 10px;
            margin-top: 20px;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
        }
        .success {
            background-color: #ddffdd;
            color: #006400;
            border: 1px solid #006400;
        }
        .error {
            background-color: #ffdddd;
            color: #d8000c;
            border: 1px solid #d8000c;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        label, input, button {
            font-size: 16px;
        }
        button {
            padding: 10px;
            background-color: #006400;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #004d00;
        }
    </style>
</head>
<body>
    <h1>Check Guide Availability</h1>
    <form method="POST" action="availability.php">
        <label for="guide">Guide Name:</label>
        <input type="text" id="guide" name="guide" placeholder="Enter guide name" required>

        <label for="sdate">Start Date:</label>
        <input type="date" id="sdate" name="sdate" required>

        <label for="edate">End Date:</label>
        <input type="date" id="edate" name="edate" required>

        <button type="submit">Check Availability</button>
    </form>

    <?php if ($message): ?>
        <div class="message <?php echo $messageClass; ?>">
            <?php echo htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>
</body>
</html>

