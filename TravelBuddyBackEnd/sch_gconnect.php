<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "schedule";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$start_date = $_POST['start'];
$available_days = $_POST['end'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO schedule (start_date, available_days) VALUES (?, ?)");
$stmt->bind_param("si", $start_date, $available_days);

// Execute the statement
if ($stmt->execute()) {
    echo "New schedule created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
