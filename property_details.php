<?php
// Database connection
$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$database = 'submitlisting'; 

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$property_id = isset($_GET['id']) ? $_GET['id'] : 0;

$sql = "SELECT * FROM properties WHERE id = $property_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $property = $result->fetch_assoc();
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo htmlspecialchars($property['property_name']); ?> - Property Details</title>
        <link rel="stylesheet" href="styles.css"> <!-- Assuming you have an external stylesheet -->
        <style>
            /* Property Detail Page */
            .property-detail {
                width: 80%;
                margin: auto;
                padding: 20px;
            }

            .property-detail img {
                width: 100%; /* Makes image responsive, taking full width */
                height: 300px; /* Fixed height for consistency */
                object-fit: contain; /* Resize the image to fit without cropping */
                border-radius: 10px; /* Optional: Rounded corners */
            }

            .property-detail h1 {
                font-size: 24px;
                margin-bottom: 10px;
            }

            .property-detail p {
                font-size: 16px;
                margin: 5px 0;
            }

            .property-detail .price {
                font-size: 18px;
                font-weight: bold;
                color: #222;
            }

            .property-detail .info-bar {
                display: flex;
                justify-content: space-between;
                font-size: 14px;
                color: #777;
                margin-top: 10px;
            }
        </style>
    </head>
    <body>

        <?php include 'Header.php'; ?> <!-- Your header file -->
        
        <main>
            <div class="property-detail">
                <h1><?php echo htmlspecialchars($property['property_name']); ?></h1>

                <!-- Display Image -->
                <img src="<?php echo htmlspecialchars($property['images']); ?>" alt="Property Image">

                <!-- Property Description -->
                <p><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($property['description'])); ?></p>

                <!-- Price Information -->
                <p class="price">Price: €<?php echo htmlspecialchars($property['price']); ?> per night</p>

                <!-- Location Info -->
                <p><strong>Location:</strong> <?php echo htmlspecialchars($property['city']); ?></p>

                <!-- Info Bar (Other Property Info) -->
                <div class="info-bar">
                    
                </div>
            </div>
        </main>

        <script src="script.js"></script> <!-- External script -->
    </body>
    </html>
    <?php
} else {
    echo "<p>Property not found.</p>";
}

$conn->close();
?>
