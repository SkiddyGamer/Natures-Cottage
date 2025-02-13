<?php
session_start();
include 'connect.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); // Redirect to homepage if not logged in
    exit();
}

// Fetch user details from the database using the user_id session variable
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = '$user_id'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "No user found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Account</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <div class="logo">Natures<span>Cottage</span></div>
    <nav>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="listings.php">Browse properties</a></li>
            <li><a href="details.php">List your property</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <div class="auth-buttons">
            <a href="logout.php" class="btn">Logout</a>
        </div>
    </nav>
</header>

<main>
    <section class="account-info">
        <h2>Your Account</h2>
        <p>Name: <?php echo $user['firstName']; ?></p>
        <p>Email: <?php echo $user['email']; ?></p>
        <p>Phone Number: <?php echo $user['phoneNumber']; ?></p>

        <h3>Your Bookings:</h3>
        <!-- Example of fetching user bookings if you have a bookings table -->
        <?php
        $bookingQuery = "SELECT * FROM bookings WHERE user_id = '$user_id'";
        $bookingResult = $conn->query($bookingQuery);

        if ($bookingResult->num_rows > 0) {
            while ($booking = $bookingResult->fetch_assoc()) {
                echo "<p>Booking ID: " . $booking['id'] . " - " . $booking['property_name'] . "</p>";
            }
        } else {
            echo "<p>You have no bookings yet.</p>";
        }
        ?>
    </section>
</main>

<footer>
    <p>© 2024 NaturesCottage. Crafted with ❤️ for your perfect vacation.</p>
</footer>

</body>
</html>
