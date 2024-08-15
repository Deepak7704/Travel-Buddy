<!DOCTYPE html>
<html>
<head>
    <title>Guide Schedule</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
        <h1 >Guide Schedule</h1>
        <br>
        <form method="post" action="sch_gconnect.php">
            <label for="start">Starting Schedule Date:</label>
            <input type="date" name="start" placeholder="Enter starting schedule date" id="start" required>
            <br>
            <label for="end">Number of Available Days:</label>
            
            <input type="number" name="end" placeholder="No. of available days" id="end" required>
            <br>
            <input type="submit" class="btn" value="Submit" name="submit">
        </form>
    
</body>
</html>
