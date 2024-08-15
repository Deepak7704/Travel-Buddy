<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" type="text/css" href="book.css">
    <script>
        function toggleGuideBooking() {
            var guideNeed = document.querySelector('input[name="guide"]:checked').value;
            var guideForm = document.getElementById('guideForm');
            if (guideNeed.toLowerCase() === 'yes') {
                guideForm.style.display = 'block';
            } else {
                guideForm.style.display = 'none';
            }
        }

        function fetchAvailableGuides() {
            var arrivalDate = document.querySelector('input[name="arrivals"]').value;
            if (arrivalDate) {
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "fetch_guides.php?arrival_date=" + arrivalDate, true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var guides = JSON.parse(xhr.responseText);
                        var guideList = document.getElementById('guideList');
                        guideList.innerHTML = "";
                        guides.forEach(function (guide) {
                            var guideItem = document.createElement('div');
                            guideItem.className = 'guide-item';
                            guideItem.innerHTML = `<strong>${guide.guide_name}</strong> (${guide.guide_email})<br>
                                                    Available from ${guide.available_from} to ${guide.available_to}`;
                            guideList.appendChild(guideItem);
                        });
                    }
                };
                xhr.send();
            }
        }
    </script>
</head>
<body>
    <section class="booking">
        <h1 class="heading-title" style="color: rgb(248,184,120);">Book Your Trip</h1>

        <form action="book_form.php" method="post" class="book-form">
            <div class="inputBox">
                <span>Name:</span>
                <input type="text" placeholder="Enter your name" name="name" required>
            </div>
            <div class="inputBox">
                <span>Email:</span>
                <input type="email" placeholder="Enter your email" name="email" required>
            </div>
            <div class="inputBox">
                <span>Phone:</span>
                <input type="tel" placeholder="Enter your number" name="phone" required>
            </div>
            <div class="inputBox">
                <span>Address:</span>
                <input type="text" placeholder="Enter your address" name="address" required>
            </div>
            <div class="inputBox">
                <span>Where to:</span>
                <input type="text" placeholder="Place you want to visit" name="location" required>
            </div>
            <div class="inputBox">
                <span>How many:</span>
                <input type="number" placeholder="Number of guests" name="guests" required>
            </div>
            <div class="inputBox">
                <span>Need a Guide?</span>
                <input type="radio" name="guide" value="Yes" onclick="toggleGuideBooking()" required> Yes
                <input type="radio" name="guide" value="No" onclick="toggleGuideBooking()" required> No
            </div>
            <div class="inputBox">
                <span>Arrivals:</span>
                <input type="date" name="arrivals" onchange="fetchAvailableGuides()" required>
            </div>
            <div class="inputBox">
                <span>Leaving:</span>
                <input type="date" name="leaving" required>
            </div>
            <input type="submit" value="Submit" class="btn" name="send">
        </form>

        <div id="guideForm" style="display:none; margin-top:20px;">
            <h1 class="heading-title" style="color: rgb(248,184,120);">Available Guides</h1>
            <div id="guideList"></div>
        </div>
    </section>
</body>
</html>

<?php
// Database connection details
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the booking form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['send'])) {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    
    $guests = $_POST['guests'];
    $guide = $_POST['guide'];
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO bookings (name, email, phone, address, guests, guide, arrivals, leaving) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssiiss", $name, $email, $phone, $address, $guests, $guide, $arrivals, $leaving);

    // Execute the statement
    if ($stmt->execute()) {
        if (strtolower($guide) == 'yes') {
            echo "<script>document.getElementById('guideForm').style.display = 'block';</script>";
        } else {
            echo "Booking successfully created";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connection
    $stmt->close();
    $conn->close();
}
?>
