<?php
// Database connection
$host = 'localhost'; // Change if needed
$username = 'root'; // Your database username
$password = ''; // Your database password
$database = 'submitlisting'; // Your database name

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $conn->real_escape_string($_POST['first_name']);
    $last_name = $conn->real_escape_string($_POST['last_name']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $email = $conn->real_escape_string($_POST['email']);
    $street_address = $conn->real_escape_string($_POST['street_address']);
    $city = $conn->real_escape_string($_POST['city']);
    $postal_code = $conn->real_escape_string($_POST['postal_code']);
    $property_name = $conn->real_escape_string($_POST['property_name']);
    $price = (float) $_POST['price']; // Ensuring it's a numeric value
    $description = $conn->real_escape_string($_POST['description']);
    $guests = (int) $_POST['guests']; // Ensuring it's an integer
    $bedrooms = (int) $_POST['bedrooms']; // Ensuring it's an integer
    $bathrooms = (float) $_POST['bathrooms']; // Ensuring it's a decimal (e.g., 1.5)
    $property_type = $conn->real_escape_string($_POST['property_type']);

    // Handling Image Upload
    $imagePaths = [];
    if (!empty($_FILES['image']['name'][0])) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        foreach ($_FILES['image']['tmp_name'] as $key => $tmp_name) {
            $fileName = basename($_FILES['image']['name'][$key]);
            $targetFilePath = $uploadDir . time() . "_" . $fileName;
            
            if (move_uploaded_file($tmp_name, $targetFilePath)) {
                $imagePaths[] = $targetFilePath;
            }
        }
    }
    
    $imagePathsString = implode(',', $imagePaths);

    $sql = "INSERT INTO properties 
            (first_name, last_name, phone, email, street_address, city, postal_code, property_name, price, guests, bedrooms, bathrooms, property_type, description, images) 
            VALUES 
            ('$first_name', '$last_name', '$phone', '$email', '$street_address', '$city', '$postal_code', '$property_name', '$price', '$guests', '$bedrooms', '$bathrooms', '$property_type', '$description', '$imagePathsString')";

    if ($conn->query($sql) === TRUE) {
        header("Location: listings.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
