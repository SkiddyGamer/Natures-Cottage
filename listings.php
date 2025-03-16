<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Listings - NaturesCottage</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Grid Layout for Listings */
        .property-listings {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 25px;
            padding: 20px;
            max-width: 1200px;
            margin: auto;
        }

        /* Property Card */
        .property-card {
            background: #fff;
            border-radius: 12px;
            padding: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
            text-align: left;
            width: 270px;
            height: 350px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.2s ease-in-out;
            overflow: hidden;
            cursor: pointer;
        }

        .property-card:hover {
            transform: scale(1.02);
        }

        /* Image Styling */
        .property-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
        }

        /* Property Details */
        .property-details {
            padding: 8px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .property-details h2 {
            font-size: 16px;
            font-weight: bold;
            margin: 5px 0;
        }

        /* Truncate long descriptions */
        .property-details p {
            font-size: 13px;
            color: #555;
            margin: 5px 0;
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
        }

        .property-details .price {
            font-size: 14px;
            font-weight: bold;
            color: #222;
            margin-top: auto;
        }

        /* Info Bar (Location, Icons) */
        .info-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            color: #777;
            margin-top: 3px;
        }

        .info-bar span {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .info-bar i {
            font-size: 14px;
            color: #444;
        }

        /* Responsive Layout */
        @media (max-width: 1024px) {
            .property-listings {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .property-listings {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .property-listings {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> 
</head>
<body>

    <?php include 'Header.php'; ?>
    <?php include 'login_form.php'; ?>

    <main>
        <h1>Property Listings</h1>
        <p>Browse through our available vacation rentals.</p>

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

        // Fetch listings from the database
        $sql = "SELECT * FROM properties ORDER BY id DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<div class="property-listings">';
            while ($row = $result->fetch_assoc()) {
                $property_id = $row['id']; // Get the property ID
                $property_type = htmlspecialchars($row['property_type']);
                $bedrooms = (int)$row['bedrooms'];
                $bathrooms = (float)$row['bathrooms'];
                $guests = (int)$row['guests'];

                // Determine the correct icon for the property type
                $propertyIcons = [
                    'house' => 'fa-home',
                    'villa' => 'fa-landmark',
                    'cabin' => 'fa-tree',
                    'apartment' => 'fa-building'
                ];
                $propertyIcon = isset($propertyIcons[$property_type]) ? $propertyIcons[$property_type] : 'fa-home';

                echo '<a href="property_details.php?id=' . $property_id . '" class="property-card">';  // Link to the details page
                $images = explode(',', $row['images']);
                if (!empty($images[0])) {
                    echo '<img src="' . htmlspecialchars($images[0]) . '" alt="Property Image">';
                }
                echo '<div class="property-details">';
                echo '<h2>' . htmlspecialchars($row['property_name']) . '</h2>';
                echo '<p>' . htmlspecialchars($row['description']) . '</p>';
                echo '<p class="price"><strong>€' . htmlspecialchars($row['price']) . '</strong> / night</p>';

                // Icons for property details
                echo '<div class="info-bar">';
                echo '<span><i class="fas fa-map-marker-alt"></i> ' . htmlspecialchars($row['city']) . '</span>';
                echo '<span><i class="fas fa-bed"></i> ' . $bedrooms . '</span>';
                echo '<span><i class="fas fa-bath"></i> ' . $bathrooms . '</span>';
                echo '<span><i class="fas fa-user-group"></i> ' . $guests . '</span>';  // Guests icon
                echo '<span><i class="fas ' . $propertyIcon . '"></i> ' . ucfirst($property_type) . '</span>';
                echo '</div>';

                echo '</div>';
                echo '</a>';
            }
            echo '</div>';
        } else {
            echo "<p>No listings available.</p>";
        }

        $conn->close();
        ?>
    </main>

</body>
</html>
