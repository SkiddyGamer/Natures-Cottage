<?php
session_start();
include 'connect.php';  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmail);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Check if the password is correct
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['Id'];
            $_SESSION['user_name'] = $user['firstName'];

            // Redirect to the index page after successful login
            header("Location: index.php");
            exit();
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "No user found with that email!";
    }
}

?>
