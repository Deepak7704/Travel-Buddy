<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "book_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data and sanitize it
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$phone = htmlspecialchars($_POST['phone']);
$address = htmlspecialchars($_POST['address']);
$guests = (int)$_POST['guests'];
$guide = htmlspecialchars($_POST['guide']);
$arrivals = $_POST['arrivals'];
$leaving = $_POST['leaving'];

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format");
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO bookings (name, email, phone, address, guests, guide, arrivals, leaving) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssisss", $name, $email, $phone, $address, $guests, $guide, $arrivals, $leaving);

// Execute the statement
if ($stmt->execute()) {
    echo "Booking successfully created";
    // You might want to redirect to a confirmation page instead of just echoing a message
    // header('Location: confirmation.php');
    // exit();
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
