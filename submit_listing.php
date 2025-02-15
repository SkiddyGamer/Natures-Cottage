<?php

$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$database = 'submitlisting'; 

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
    $price = $conn->real_escape_string($_POST['price']);
    $description = $conn->real_escape_string($_POST['Short_description']);
    
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

    $sql = "INSERT INTO properties (first_name, last_name, phone, email, street_address, city, postal_code, property_name, price, description, images) 
            VALUES ('$first_name', '$last_name', '$phone', '$email', '$street_address', '$city', '$postal_code', '$property_name', '$price', '$description', '$imagePathsString')";

if ($conn->query($sql) === TRUE) {
    
    header("Location: listings.php");
    exit(); 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
?>
