<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'zentrek');

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch booking details
$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Guide</th>
                <th>Date</th>
                <th>Time</th>
                <th>Duration</th>
                <th>Requests</th>
                <th>Created At</th>
            </tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['guide'] . "</td>
                <td>" . $row['date'] . "</td>
                <td>" . $row['time'] . "</td>
                <td>" . $row['duration'] . "</td>
                <td>" . $row['requests'] . "</td>
                <td>" . $row['created_at'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No bookings found.";
}

// Close the connection
$conn->close();
?>
