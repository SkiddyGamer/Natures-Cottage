<?php
session_start();
include 'connect.php';  // savienojas ar datubāzi login

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // iegūst email un password no formas
    $email = $_POST['email'];
    $password = $_POST['password'];

    // pārbauda vai lietotājs ar tādu e-pastu eksistē
    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmail);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Pārbauda, vai ievadītā parole ir vienāda ar hashoto datubāzē
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['Id'];
            $_SESSION['user_name'] = $user['firstName'];
            $_SESSION['user_email'] = $user['email'];

             
             $redirect = isset($_POST['redirect']) && !empty($_POST['redirect']) ? $_POST['redirect'] : 'index.php';
             header("Location: " . $redirect);
             exit();
         } else {
             echo "Incorrect password!";
        }
    } else {
        echo "No user found with that email!";
    }
}

?>
