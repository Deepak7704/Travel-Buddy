<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Booking</title>
	<link rel="stylesheet" type="text/css" href="book.css">
</head>
<body>
	<!--<div class="heading">
		<h1>Book Now</h1>
	</div>-->
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
				<span>How many:</span>
				<input type="number" placeholder="Number of guests" name="guests" required>
			</div>
			<div class="inputBox">
				<span>Need a Guide?</span>
				<input type="text" placeholder="Yes/No" name="guide" required>
			</div>
			<div class="inputBox">
				<span>Arrivals:</span>
				<input type="date" name="arrivals" required>
			</div>
			<div class="inputBox">
				<span>Leaving:</span>
				<input type="date" name="leaving" required>
			</div>
			<input type="submit" value="Submit" class="btn" name="send">
		</form>
	</section>
</body>
</html>