<?php
session_start();
include("connect.php");

$userName = "Guest";

if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];

    // Using prepared statements to prevent SQL injection
    if($stmt = $conn->prepare("SELECT firstName, lastName FROM user_details WHERE email = ?")){
        $stmt->bind_param("s", $email); // "s" indicates the type is string
        $stmt->execute();
        $stmt->bind_result($firstName, $lastName);

        if($stmt->fetch()){
            $userName = htmlspecialchars($firstName . ' ' . $lastName, ENT_QUOTES, 'UTF-8');
        } else {
            $userName = "User Not Found";
        }

        $stmt->close();
    } else {
        $userName = "Error executing query";
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
            background-color: #f9f9f9;
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
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
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
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        a:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }

        .hidden {
            display: none;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const bookLink = document.querySelector('a');
            const userNameElement = document.querySelector('p');

            bookLink.addEventListener('click', function (event) {
                event.preventDefault(); // Prevent default link behavior
                userNameElement.textContent = 'Preparing your booking...';

                // Simulate loading with a timeout
                setTimeout(function () {
                    window.location.href = bookLink.getAttribute('href');
                }, 1000);
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <p>Hello <?php echo $userName; ?></p>
        <a href="book.php">Book</a>
    </div>
</body>
</html>
