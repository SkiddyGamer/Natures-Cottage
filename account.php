<?php
session_start();
include 'connect.php'; 


$host = 'localhost';
$username = 'root';
$password = '';
$database_booking = 'submitlisting';
$conn_booking = new mysqli($host, $username, $password, $database_booking);


if ($conn_booking->connect_error) {
    die("Connection failed: " . $conn_booking->connect_error);
}


if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); 
    exit();
}


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
    <style>
        .booking-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: flex-start; 
    margin-top: 20px;
    padding-left: 20px; 
}

        .booking-card {
            width: 300px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            background: #fff;
            text-align: center;
            padding-bottom: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        
        .booking-card:hover {
            transform: scale(1.05);
            box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.15);
        }

        
        .booking-card.selected {
            border: 3px solid #4CAF50;
            box-shadow: 0px 6px 12px rgba(76, 175, 80, 0.5);
        }

        .booking-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .booking-card h3 {
            margin: 10px 0;
            font-size: 18px;
        }

        .booking-card p {
            margin: 5px 0;
            color: #555;
        }
        .btn-bookers {
            padding: 10px 20px;
	border: none;
	cursor: pointer;
	border-radius: 25px;
	background-color: #5c7f4a;
	color: white;
	font-size: 16px;
	font-weight: bold;
	transition: transform 0.3s, box-shadow 0.3s;
        }
        
        
    </style>
</head>
<body>

<header>
    <div class="logo">Nature's<span> Cottage</span></div>
    <nav>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="listings.php">Browse properties</a></li>
            <li><a href="details.php">List your property</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <div class="auth-buttons">
            <a href="logout.php" class="btn">Log out</a>
        </div>
    </nav>
</header>

<main>
    <section class="account-info">
        <h2>Your Account:</h2>
        <p>Name: <?php echo htmlspecialchars($user['firstName']); ?></p>
        <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
        <p>Phone Number: <?php echo htmlspecialchars($user['phoneNumber']); ?></p>

        <h3>Your Bookings:</h3>

        <div class="booking-container">
            <?php
            
            $bookingQuery = "SELECT b.id, b.property_id, b.start_date, b.end_date, b.total_price, p.property_name, p.images 
                            FROM bookings b
                            JOIN properties p ON b.property_id = p.id
                            WHERE b.user_id = '$user_id'";

            $bookingResult = $conn_booking->query($bookingQuery);

            if ($bookingResult->num_rows > 0) {
                while ($booking = $bookingResult->fetch_assoc()) {
                    
                    if (!empty($booking['images'])) {
                        $imageArray = explode(',', $booking['images']);
                        $image_url = trim($imageArray[0]);
                    } else {
                        $image_url = 'default-property.jpg'; 
                    }

                    echo '<div class="booking-card">';
                    echo '    <img src="' . htmlspecialchars($image_url) . '" alt="Property Image">';
                    echo '    <h3>' . htmlspecialchars($booking['property_name']) . '</h3>';
                    echo '    <p>From: ' . date("F j, Y", strtotime($booking['start_date'])) . '</p>';
                    echo '    <p>To: ' . date("F j, Y", strtotime($booking['end_date'])) . '</p>';
                    echo '    <p>Total Price: €' . number_format($booking['total_price'], 2) . '</p>';
                    echo '</div>';
                }
            } else {
                echo "<p>You have no bookings yet.</p>";
            }
            ?>
        </div>
        <h3>Your Listings:</h3>

        <div class="booking-container">
    <?php
    
    $user_email = $user['email']; 
    $listingQuery = "SELECT id, property_name, price, images FROM properties WHERE email = '$user_email'";
    $listingResult = $conn_booking->query($listingQuery);

    if ($listingResult->num_rows > 0) {
        while ($listing = $listingResult->fetch_assoc()) {
            
            if (!empty($listing['images'])) {
                $imageArray = explode(',', $listing['images']);
                $image_url = trim($imageArray[0]);
            } else {
                $image_url = 'default-property.jpg'; 
            }

            echo '<div class="booking-card">';
            echo '    <img src="' . htmlspecialchars($image_url) . '" alt="Property Image">';
            echo '    <h3>' . htmlspecialchars($listing['property_name']) . '</h3>';
            echo '    <p>Price: €' . number_format($listing['price'], 2) . ' per night</p>';
            echo '    <a href="edit_listing.php?id=' . $listing['id'] . '" class="btn">Edit</a>';
            echo '    <a href="view_bookers.php?id=' . $listing['id'] . '" class="btn btn-bookers">View Bookers</a>'; // Optional edit link
            echo '</div>';
        }
    } else {
        echo "<p>You haven't listed any properties yet.</p>";
    }
    ?>
</div>


    </section>
</main>

<footer>
    <p>© 2024 NaturesCottage. Crafted with ❤️ for your perfect vacation.</p>
    <div class="social-links">
            <a href="#">Facebook</a>
            <a href="#">Instagram</a>
            <a href="#">Twitter</a>
</footer>
<script>
    function toggleSelection(card) {
        card.classList.toggle("selected");
    }
</script>
</body>
</html>

<?php

$conn_booking->close();
?>