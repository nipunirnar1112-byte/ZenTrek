<?php
session_start();

// Check if booking details are set
if (!isset($_SESSION['booking_details'])) {
    header("Location: availability.html"); // Redirect if no booking details
    exit();
}

// Get booking details from session
$booking = $_SESSION['booking_details'];

// Clear booking details from session after displaying
unset($_SESSION['booking_details']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital@1&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <title>Booking Confirmation | ZENTrek</title>
    <link rel="stylesheet" href="confirmation.css"> 
   
</head>
<body>
    
    
          
    <header>
        <h1>Booking Confirmation</h1>
    </header>
    <BR><BR><BR><BR>
    <main>
        <h2>Thank you for your booking, <?php echo htmlspecialchars($booking['name']); ?>!</h2>
        <p>Your booking details are as follows:</p>
        <ul>
            <li><strong>Name:</strong> <?php echo htmlspecialchars($booking['name']); ?></li>
            <li><strong>Email:</strong> <?php echo htmlspecialchars($booking['email']); ?></li>
            <li><strong>Phone:</strong> <?php echo htmlspecialchars($booking['phone']); ?></li>
            <li><strong>Guide:</strong> <?php echo htmlspecialchars($booking['guide']); ?></li>
            <li><strong> Start Date:</strong> <?php echo htmlspecialchars($booking['sdate']); ?></li>
            <li><strong>End Date:</strong> <?php echo htmlspecialchars($booking['edate']); ?></li>
            <li><strong>Package:</strong> <?php echo htmlspecialchars($booking['packages']); ?></li>
            <li><strong>Special Requests:</strong> <?php echo htmlspecialchars($booking['requests']); ?></li>
        </ul>
        <p>You will receive a confirmation email shortly.</p>

        <BR><br>
        <div class="home">
                <p>Back to the Home <a href="Home.html"><b>Home</b></a> </p>
</div>
    </main>
    <br><br><br>
     


</body>
</html>
