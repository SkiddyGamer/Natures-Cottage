<?php
// parāda kļūdu ziņojumus, lai varētu redzēt problēmas izstrādes laikā
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'connect.php'; // savienojas ar datubāzi login

$redirectURL = isset($_POST['redirect']) ? $_POST['redirect'] : 'index.php';

if (isset($_POST['signUp'])) {
    // Iegūst ievadītos datus
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phoneNumber = $_POST['pNumber'];

    // paroļu šifrēšana
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Pārbauda, vai e-pasts jau pastāv datubāzē
    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmail);

    // Ja e-pasts jau eksistē, informē lietotāju un novirza atpakaļ uz sākuma lapu
    if ($result->num_rows > 0) {
        
        echo "<script>alert('Email is already in use. Please sign in.'); window.location = \"" . $redirectURL . "\";</script>";
    } else {
        // Ja e-pasts vēl nav reģistrēts, ievieto jaunu lietotāju datubāzē
        $insertQuery = "INSERT INTO users (firstName, lastName, email, password, phoneNumber, CreatedAt)
                        VALUES ('$firstName', '$lastName', '$email', '$hashedPassword', '$phoneNumber', NOW())";

if ($conn->query($insertQuery) === TRUE) {
    
    header("Location: $redirectURL?register_success=true");
    exit();
} else {
    echo "Error: " . $conn->error;
}
}
}
?>

