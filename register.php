<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'connect.php';

if (isset($_POST['signUp'])) {
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phoneNumber = $_POST['pNumber'];

    
    var_dump($_POST); 
    

    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    
    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmail);

    if ($result->num_rows > 0) {
        echo "Email Address Already Exists!";
    } else {
        $insertQuery = "INSERT INTO users (firstName, lastName, email, password, phoneNumber, CreatedAt)
                VALUES ('$firstName', '$lastName', '$email', '$hashedPassword', '$phoneNumber', NOW())";

        if ($conn->query($insertQuery) === TRUE) {
            echo "User registered successfully!";
            header("Location: index.php"); 
            exit(); 
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>
