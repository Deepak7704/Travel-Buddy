<?php
session_start();
include("gconnect.php");

$guideName = "No session found";

if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];

    // Using prepared statements to prevent SQL injection
    if($stmt = $conn->prepare("SELECT firstName, lastName FROM guide_details WHERE email = ?")){
        $stmt->bind_param("s", $email); // "s" indicates the type is string
        $stmt->execute();
        $stmt->bind_result($firstName, $lastName);

        if($stmt->fetch()){
            $guideName = htmlspecialchars($firstName . ' ' . $lastName, ENT_QUOTES, 'UTF-8');
        } else {
            $guideName = "Guide Not Found";
        }

        $stmt->close();
    } else {
        $guideName = "Error executing query";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            padding: 50px;
            background-color: white;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        p {
            font-size: 50px;
            font-weight: bold;
            margin: 20px 0;
        }

        a {
            display: inline-block;
            text-decoration: none;
            font-size: 20px;
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }

        .hidden {
            display: none;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const scheduleLink = document.querySelector('a');
            const guideName = document.querySelector('p');

            scheduleLink.addEventListener('click', function (event) {
                event.preventDefault(); // Prevent default link behavior
                guideName.textContent = 'Loading schedule...';

                // Simulate loading with a timeout
                setTimeout(function () {
                    window.location.href = scheduleLink.getAttribute('href');
                }, 1000);
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <p>Guide <?php echo $guideName; ?></p>
        <a href="schedule.php">Schedule</a>
    </div>
</body>
</html>
